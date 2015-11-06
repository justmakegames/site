<?php
N2Loader::import("libraries.slider.abstract", "smartslider");

class N2SmartsliderGeneratorModel extends N2Model
{

    private static $layouts = array(
        'image'          => '{"title":"{title}","description":"","thumbnail":"{thumbnail}","backgroundColor":"ffffff00","backgroundImage":"{image}","backgroundAlt":"","backgroundMode":"fill","backgroundVideoMp4":"","backgroundVideoWebm":"","backgroundVideoOgg":"","backgroundVideoMuted":"1","backgroundVideoLoop":"1","backgroundVideoMode":"fill","link":"|*|_self","slidedurationin":"0","slidedurationout":"0","slide":[]}',
        'image_extended' => '{"title":"{title}","description":"{description}","thumbnail":"{image}","backgroundColor":"ffffff00","backgroundImage":"{image}","backgroundAlt":"","backgroundMode":"fill","backgroundVideoMp4":"","backgroundVideoWebm":"","backgroundVideoOgg":"","backgroundVideoMuted":"1","backgroundVideoLoop":"1","backgroundVideoMode":"fill","link":"|*|_self","slidedurationin":"0","slidedurationout":"0","slide":[]}',
        'article'        => '{"title":"{title}","description":"{description}","thumbnail":"{thumbnail}","backgroundColor":"ffffff00","backgroundImage":"{featured_image}","backgroundAlt":"","backgroundMode":"fill","backgroundVideoMp4":"","backgroundVideoWebm":"","backgroundVideoOgg":"","backgroundVideoMuted":"1","backgroundVideoLoop":"1","backgroundVideoMode":"fill","link":"{url}|*|_self","slidedurationin":"0","slidedurationout":"0","slide":[]}',
        'youtube'        => '{"title":"{title/1}","description":"{removehtml(description/1)}","thumbnail":"{thumbnail_medium/1}","backgroundColor":"ffffff00","backgroundImage":"","backgroundAlt":"","backgroundMode":"fill","backgroundVideoMp4":"","backgroundVideoWebm":"","backgroundVideoOgg":"","backgroundVideoMuted":"1","backgroundVideoLoop":"1","backgroundVideoMode":"fill","link":"|*|_self","slidedurationin":"0","slidedurationout":"0","simplebganimation":"","kenburns":"50|*|50|*|","slide":[{"style":"position: absolute; z-index: 1;left:0%;top:0%;width:100%;height:100%;","animations":{},"name":"youtube","crop":"visible","align":"left","desktopportrait":1,"desktoplandscape":1,"tabletportrait":1,"tabletlandscape":1,"mobileportrait":1,"mobilelandscape":1,"desktopportraitleft":0,"desktopportraittop":0,"desktopportraitwidth":100,"desktopportraitheight":100,"items":[{"type":"youtube","values":{"youtubeurl":"{video_id/1}","volume":"-1","autoplay":"1","center":"0","loop":"0","theme":"dark","related":"0","vq":"default"}}]}]}'
    );

    public function __construct() {
        parent::__construct("nextend2_smartslider3_generators");
    }

    public function createGenerator($sliderId, $params) {

        $data = new N2Data($params);

        unset($params['type']);
        unset($params['group']);
        unset($params['record-slides']);

        try {
            $generatorId = $this->_create($data->get('type'), $data->get('group'), json_encode($params));;

            $info = $this->getGeneratorInfo($data->get('group'), $data->get('type'));
            if (self::$layouts[$info->type]) {
                $slideData = json_decode(self::$layouts[$info->type], true);
            } else {
                $slideData = array(
                    'title'       => 'title',
                    'slide'       => array(),
                    'description' => '',
                    'thumbnail'   => '',
                    'published'   => 1
                );
            }

            $slideData['published']     = '1';
            $slideData['publishdates']  = '|*|';
            $slideData['generator_id']  = $generatorId;
            $slideData['record-slides'] = intval($data->get('record-slides', 1));
            $slideData['slide']         = json_encode($slideData['slide']);
            $slidesModel                = new N2SmartsliderSlidesModel();
            $slideId                    = $slidesModel->create($sliderId, $slideData, false);


            return array(
                'slideId'     => $slideId,
                'generatorId' => $generatorId
            );
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    public function generatorCommonForm($data = array()) {
        $configurationXmlFile = dirname(__FILE__) . '/forms/multigenerator.xml';

        N2Loader::import('libraries.form.form');
        $form = new N2Form();
        $form->set('class', 'nextend-smart-slider-admin');
        $form->loadArray($data);

        $form->loadXMLFile($configurationXmlFile);

        echo $form->render('generator');
    }

    public function generatorEditForm($data = array()) {
        $configurationXmlFile = dirname(__FILE__) . '/forms/generator_edit.xml';

        N2Loader::import('libraries.form.form');
        $form = new N2Form();
        $form->set('class', 'nextend-smart-slider-admin');
        $form->loadArray($data);

        $form->loadXMLFile($configurationXmlFile);

        echo $form->render('generator');
    }

    public function generatorSpecificForm($group, $type, $data = array()) {

        $info = $this->getGeneratorInfo($group, $type);

        $xmlPath = $info->path . '/config.xml';

        $form = new N2Form();
        $form->loadArray($data);

        $form->loadXMLFile($xmlPath);

        $form->set('info', $info);

        echo $form->render('generator');

        return $xmlPath;
    }

    /**
     * @param $group
     * @param $type
     *
     * @return N2GeneratorInfo
     * @throws Exception
     */
    public function getGeneratorInfo($group, $type = null) {

        list($groups, $list) = self::getGenerators();

        if (isset($list[$group])) {
            if (isset($list[$group][$type])) {
                return $list[$group][$type];
            } else {
                return $list[$group][key($list[$group])];
            }
        }
        throw new Exception('Generator not found: ' . $group . ' - ' . $type);
    }

    public static function getGenerators() {

        static $groups;
        static $list;

        if (!$list) {
            $groups = array();
            $list   = array();
            N2Plugin::callPlugin('ssgenerator', 'onGeneratorList', array(
                &$groups,
                &$list
            ));
        }

        return array(
            &$groups,
            &$list
        );
    }

    public function get($id) {
        return $this->db->queryRow("SELECT * FROM " . $this->db->tableName . " WHERE id = :id", array(
            ":id" => $id
        ));
    }

    public function import($generator) {
        $this->db->insert(array(
            'type'   => $generator['type'],
            'group'  => $generator['group'],
            'params' => $generator['params']
        ));

        return $this->db->insertId();
    }

    private function _create($type, $group, $params) {
        $this->db->insert(array(
            'type'   => $type,
            'group'  => $group,
            'params' => $params
        ));

        return $this->db->insertId();
    }

    public function save($generatorId, $params) {

        $this->db->update(array(
            'params' => json_encode($params)
        ), array('id' => $generatorId));

        return $generatorId;
    }

    public function delete($id) {
        $this->db->deleteByAttributes(array(
            "id" => intval($id)
        ));
    }

    public function duplicate($id) {
        $generatorRow = $this->get($id);
        $generatorId  = $this->_create($generatorRow['type'], $generatorRow['group'], $generatorRow['params']);
        return $generatorId;
    }

    public function getSliderId($generatorId) {

        $slidesModal = new N2SmartsliderSlidesModel();
        $slideData   = $this->db->queryRow("SELECT slider FROM " . $slidesModal->db->tableName . " WHERE generator_id = :id", array(
            ":id" => $generatorId
        ));

        return $slideData['slider'];
    }
}