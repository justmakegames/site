<?php

N2Loader::import('libraries.slider.generator.N2SmartSliderGeneratorAbstract', 'smartslider');

class N2GeneratorEasyBlogPosts extends N2GeneratorAbstract
{

    protected function _getData($count, $startIndex) {

        $model = new N2Model('EasyBlog_Post');

        $category = array_map('intval', explode('||', $this->data->get('easyblogcategories', '')));

        $query = 'SELECT con.*, con.intro as "main_content_of_post", con.content as "rest_of_the_post", usr.nickname as "blogger", usr.avatar as "blogger_avatar_picture", cat.title as cat_title ';

        /* id 	created_by 	title 	description 	alias 	avatar 	parent_id 	private 	created 	status 	published 	ordering 	level 	lft 	rgt 	default */

        $query .= 'FROM #__easyblog_post con ';

        $query .= 'LEFT JOIN #__easyblog_users usr ON usr.id = con.created_by ';

        $query .= 'LEFT JOIN #__easyblog_category cat ON cat.id = con.category_id ';

        $jnow  = JFactory::getDate();
        $now   = $jnow->toSql();
        $where = array("con.published = 1 AND (con.publish_up = '0000-00-00 00:00:00' OR con.publish_up < '" . $now . "') AND (con.publish_down = '0000-00-00 00:00:00' OR con.publish_down > '" . $now . "') ");

        if (!in_array('0', $category)) {
            $where[] = 'con.category_id IN (' . implode(',', $category) . ') ';
        }

        $tags = array_map('intval', explode('||', $this->data->get('easyblogtags', '0')));

        if (!in_array(0, $tags)) {
            $where[] = 'con.id IN (SELECT post_id FROM #__easyblog_post_tag WHERE tag_id IN(' . implode(',', $tags) . '))';
        }

        switch ($this->data->get('easyblogfrontpage', 0)) {
            case 1:
                $where[] = "con.frontpage = 1 ";
                break;
            case -1:
                $where[] = "con.frontpage = 0 ";
                break;
        }

        switch ($this->data->get('easyblogfeatured', 0)) {
            case 1:
                $where[] = "con.id IN (SELECT content_id FROM #__easyblog_featured WHERE type = 'post')";
                break;
            case -1:
                $where[] = "con.id NOT IN (SELECT content_id FROM #__easyblog_featured WHERE type = 'post')";
                break;
        }

        $sourceUserId = intval($this->data->get('easybloguserid', ''));
        if (!empty($sourceUserId)) {
            $where[] = 'con.created_by = ' . $sourceUserId . ' ';
        }

        if (count($where) > 0) {
            $query .= 'WHERE ' . implode(' AND ', $where) . ' ';
        }

        $order = N2Parse::parse($this->data->get('easyblogorder', 'con.title|*|asc'));
        if ($order[0]) {
            $query .= 'ORDER BY ' . $order[0] . ' ' . $order[1] . ' ';
        }

        $query .= 'LIMIT ' . $startIndex . ', ' . $count . ' ';

        $result = $model->db->queryAll($query);

        $data = array();

        for ($i = 0; $i < count($result); $i++) {
            $r = array(
                'title'       => $result[$i]['title'],
                'description' => $result[$i]['main_content_of_post'],
                'url'         => 'index.php?option=com_easyblog&view=entry&id=' . $result[$i]['id'],
            );

            $img = json_decode($result[$i]["image"], true);
            if (is_array($img)) {
                $r['image']     = N2ImageHelper::dynamic($img["url"]);
                $r['thumbnail'] = N2ImageHelper::dynamic($img["thumbnail"]["url"]);
                if (isset($img["url"])) {
                    $r['blog_image'] = N2ImageHelper::dynamic($img["url"]);
                } else
                    $r['blog_image'] = "";
                if (isset($img["icon"]) && isset($img["icon"]["url"])) {
                    $r['blog_image_icon'] = N2ImageHelper::dynamic($img["icon"]["url"]);
                } else
                    $r['blog_image_icon'] = "";
                if (isset($img["thumbnail"]) && isset($img["thumbnail"]["url"])) {
                    $r['blog_image_thumbnail'] = N2ImageHelper::dynamic($img["thumbnail"]["url"]);
                } else
                    $r['blog_image_thumbnail'] = N2ImageHelper::dynamic($result[$i]['blog_image']);
            }

            $r += array(
                'url_label'              => sprintf(n2_('View %s'), n2_('post')),
                'category_url'           => 'index.php?option=com_easyblog&view=categories&id=' . $result[$i]['category_id'],
                'cat_title'              => $result[$i]['cat_title'],
                'blogger'                => $result[$i]['blogger'],
                'blogger_avatar_picture' => ($result[$i]['blogger_avatar_picture'] == "default_blogger.png" ? "components/com_easyblog/assets/images/" . $result[$i]['blogger_avatar_picture'] : "images/easyblog/avatar/" . $result[$i]['blogger_avatar_picture']),
                'created_by'             => $result[$i]['created_by'],
                'created'                => $result[$i]['created'],
                'modified'               => $result[$i]['modified'],
                'permalink'              => $result[$i]['permalink'],
                'content'                => $result[$i]['content'],
                'vote'                   => $result[$i]['vote'],
                'latitude'               => $result[$i]['latitude'],
                'longitude'              => $result[$i]['longitude'],
                'address'                => $result[$i]['address'],
                'hits'                   => $result[$i]['hits'],
                'category_id'            => $result[$i]['category_id'],
                'id'                     => $result[$i]['id'],
            );
            $data[] = $r;
        }
        return $data;
    }
}
