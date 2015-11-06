<?php

N2Loader::import('libraries.slider.generator.NextendSmartSliderGeneratorAbstract', 'smartslider');

class N2GeneratorJEventsEvents extends N2GeneratorAbstract
{

    function findImage($s) {
        preg_match_all('/(<img.*?src=[\'"](.*?)[\'"][^>]*>)|(background(-image)??\s*?:.*?url\((["|\']?)?(.+?)(["|\']?)?\))/i', $s, $r);
        if (isset($r[2]) && !empty($r[2][0])) {
            $s = $r[2][0];
        } else if (isset($r[6]) && !empty($r[6][0])) {
            $s = trim($r[6][0], "'\" \t\n\r\0\x0B");
        } else {
            $s = '';
        }
        return $s;
    }

    private function formatDate($datetime, $dateOrTime = 0) {
        switch ($dateOrTime) {
            case 0:
                $dot = 'Y-m-d';
                break;
            case 1:
                $dot = 'H:i:s';
                break;
        }
        if ($dateOrTime == 1 || $datetime != '0000-00-00 00:00:00') {
            return date($dot, strtotime($datetime));
        } else {
            return '0000-00-00';
        }
    }

    protected function _getData($count, $startIndex) {

        $categories = array_map('intval', explode('||', $this->data->get('sourcecategories', '')));
        $calendars  = array_map('intval', explode('||', $this->data->get('sourcecalendars', '')));
        $model      = new N2Model('jevents_vevent');

        $innerWhere = array();
        if (!in_array('0', $categories)) {
            $innerWhere = 'catid IN(' . implode(', ', $categories) . ')';
        }
        if (!in_array('0', $calendars)) {
            $innerWhere = 'icsid IN(' . implode(', ', $calendars) . ')';
        }

        if (!empty($innerWhere)) {
            $innerWhereStr = 'WHERE';
            $innerWhereStr .= implode(' AND ', $innerWhere);
        } else {
            $innerWhereStr = '';
        }

        $where = array(
            'a.evdet_id IN (SELECT ev_id FROM #__jevents_vevent ' . $innerWhereStr . ')'
        );

        $today = time();

        switch ($this->data->get('started', '0')) {
            case 1:
                $where[] = 'a.dtstart < ' . $today;
                break;
            case -1:
                $where[] = 'a.dtstart >= ' . $today;
                break;
        }

        switch ($this->data->get('ended', '-1')) {
            case 1:
                $where[] = 'a.dtend < ' . $today;
                break;
            case -1:
                $where[] = 'a.dtend >= ' . $today;
                break;
        }

        switch ($this->data->get('noendtime', 0)) {
            case 1:
                $where[] = 'a.noendtime = 0';
                break;
            case -1:
                $where[] = 'a.noendtime = 1';
                break;
        }

        $location = $this->data->get('location', '*');
        if ($location != '*' && !empty($location)) {
            $where[] = "location = '" . $location . "'";
        }

        $order = N2Parse::parse($this->data->get('jeventsorder', 'a.event_start|*|asc'));
        if ($order[0]) {
            $orderBy = 'ORDER BY ' . $order[0] . ' ' . $order[1] . ' ';
        }

        $query = 'SELECT b.ev_id, FROM_UNIXTIME(a.dtstart) AS event_start, FROM_UNIXTIME(a.dtend) AS event_end, a.description, a.location, a.summary, a.contact, a.hits, a.extra_info
                  FROM #__jevents_vevdetail AS a LEFT JOIN #__jevents_vevent AS b ON a.evdet_id = b.detail_id WHERE ' . implode(' AND ', $where) . ' ' . $orderBy . ' LIMIT ' . $startIndex . ', ' . $count;

        $result = $model->db->queryAll($query);

        $data = array();
        foreach ($result AS $res) {
            $image  = $this->findImage($res['description']);
            $r      = array(
                'title'       => $res['summary'],
                'description' => $res['description'],
                'image'       => $image,
                'thumbnail'   => $image,
                'url'         => 'index.php?option=com_jevents&task=icalrepeat.detail&evid=' . $res['ev_id'],
                'start_date'  => $this->formatDate($res['event_start']),
                'start_time'  => $this->formatDate($res['event_start'], 1),
                'end_date'    => $this->formatDate($res['event_end']),
                'end_time'    => $this->formatDate($res['event_end'], 1),
                'location'    => $res['location'],
                'contact'     => $res['contact'],
                'hits'        => $res['hits'],
                'extra_info'  => $res['extra_info']
            );
            $data[] = $r;
        }
        return $data;
    }
}
