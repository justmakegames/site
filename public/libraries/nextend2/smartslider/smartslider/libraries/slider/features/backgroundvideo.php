<?php

class N2SmartSliderFeatureBackgroundVideo
{

    private $slider;

    public function __construct($slider) {

        $this->slider = $slider;
    }

    /**
     * @param $slide N2SmartSliderSlide
     *
     * @return string
     */
    public function make($slide) {
        $mp4  = $slide->fill($slide->parameters->get('backgroundVideoMp4', ''));
        $webm = $slide->fill($slide->parameters->get('backgroundVideoWebm', ''));
        $ogg  = $slide->fill($slide->parameters->get('backgroundVideoOgg', ''));

        if (empty($mp4) && empty($webm) && empty($ogg)) {
            return '';
        }

        $sources = '';

        if ($mp4) {
            $sources .= NHtml::tag("source", array(
                "src"  => $mp4,
                "type" => "video/mp4"
            ));
        }

        if ($webm) {
            $sources .= NHtml::tag("source", array(
                "src"  => $webm,
                "type" => "video/webm"
            ));
        }

        if ($ogg) {
            $sources .= NHtml::tag("source", array(
                "src"  => $ogg,
                "type" => "video/ogg"
            ));
        }

        $attributes = array();

        if ($slide->parameters->get('backgroundVideoMuted', 1)) {
            $attributes['muted'] = 'muted';
        }

        if ($slide->parameters->get('backgroundVideoLoop', 1)) {
            $attributes['loop'] = 'loop';
        }

        return NHtml::tag('video', $attributes + array(
                'class'     => 'n2-ss-slide-background-video',
                'data-mode' => $slide->parameters->get('backgroundVideoMode', 'fill')
            ), $sources);
    }

}