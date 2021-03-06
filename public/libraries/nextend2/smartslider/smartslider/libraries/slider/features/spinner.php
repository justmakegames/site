<?php
/**
* @author    Roland Soos
* @copyright (C) 2015 Nextendweb.com
* @license GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
**/
defined('_JEXEC') or die('Restricted access');
?><?php

class N2SmartSliderFeatureSpinner
{

    private $slider;

    private static $spinners = array(
        '-1'            => '',
        '0'             => '',
        'rectangleDark' => '<div><div class="n2-ss-spinner-rectangle-dark-container"><div class="n2-ss-spinner-rectangle-dark"><div class="n2-ss-spinner-rectangle-1"></div><div class="n2-ss-spinner-rectangle-2"></div><div class="n2-ss-spinner-rectangle-3"></div><div class="n2-ss-spinner-rectangle-4"></div></div></div>
<style type="text/css">
.n2-ss-spinner-rectangle-dark-container {
    position: absolute;
    top: 50%;
    left: 50%;
    margin: -20px -30px;
    background: RGBA(0,0,0,0.8);
    width: 50px;
    height: 30px;
    padding: 5px;
    border-radius: 3px;
    z-index: 1000;
}
.n2-ss-spinner-rectangle-dark {
  width:100%;
  height: 100%;
  outline: 1px solid RGBA(0,0,0,0);
  text-align: center;
  font-size: 10px;
}

.n2-ss-spinner-rectangle-dark > div {
  background-color: #fff;
  margin: 0 1px;
  height: 100%;
  width: 6px;
  display: inline-block;
  -webkit-animation: n2RectangleDark 1.2s infinite ease-in-out;
  animation: n2RectangleDark 1.2s infinite ease-in-out;
}
div.n2-ss-spinner-rectangle-2 {
  -webkit-animation-delay: -1.1s;
  animation-delay: -1.1s;
}
div.n2-ss-spinner-rectangle-3 {
  -webkit-animation-delay: -1.0s;
  animation-delay: -1.0s;
}
div.n2-ss-spinner-rectangle-4 {
  -webkit-animation-delay: -0.9s;
  animation-delay: -0.9s;
}

@-webkit-keyframes n2RectangleDark {
  0%, 40%, 100% { -webkit-transform: scaleY(0.4) }
  20% { -webkit-transform: scaleY(1.0) }
}

@keyframes n2RectangleDark {
  0%, 40%, 100% {
    transform: scaleY(0.4);
    -webkit-transform: scaleY(0.4);
  }  20% {
    transform: scaleY(1.0);
    -webkit-transform: scaleY(1.0);
  }
}
</style>',
        'simpleDark'    => '<div><div class="n2-ss-spinner-simple-dark-container"><div class="n2-ss-spinner-simple-dark"></div></div>
<style type="text/css">
.n2-ss-spinner-simple-dark-container {
    position: absolute;
    top: 50%;
    left: 50%;
    margin: -20px;
    background: RGBA(0,0,0,0.8);
    width: 20px;
    height: 20px;
    padding: 10px;
    border-radius: 50%;
    z-index: 1000;
}

.n2-ss-spinner-simple-dark {
  outline: 1px solid RGBA(0,0,0,0);
  width:100%;
  height: 100%;
}

.n2-ss-spinner-simple-dark:before {
    position: absolute;
    top: 50%;
    left: 50%;
    width: 20px;
    height: 20px;
    margin-top: -11px;
    margin-left: -11px;
}

.n2-ss-spinner-simple-dark:not(:required):before {
    content: \'\';
    border-radius: 50%;
    border-top: 2px solid #fff;
    border-right: 2px solid transparent;
    animation: n2SimpleDark .6s linear infinite;
    -webkit-animation: n2SimpleDark .6s linear infinite;
}
@keyframes n2SimpleDark {
    to {transform: rotate(360deg);}
}

@-webkit-keyframes n2SimpleDark {
    to {-webkit-transform: rotate(360deg);}
}

</style>',
        'simpleWhite'   => '<div><div class="n2-ss-spinner-simple-white-container"><div class="n2-ss-spinner-simple-white"></div></div>
<style type="text/css">
.n2-ss-spinner-simple-white-container {
    position: absolute;
    top: 50%;
    left: 50%;
    margin: -20px;
    background: #fff;
    width: 20px;
    height: 20px;
    padding: 10px;
    border-radius: 50%;
    z-index: 1000;
}

.n2-ss-spinner-simple-white {
  outline: 1px solid RGBA(0,0,0,0);
  width:100%;
  height: 100%;
}

.n2-ss-spinner-simple-white:before {
    position: absolute;
    top: 50%;
    left: 50%;
    width: 20px;
    height: 20px;
    margin-top: -11px;
    margin-left: -11px;
}

.n2-ss-spinner-simple-white:not(:required):before {
    content: \'\';
    border-radius: 50%;
    border-top: 2px solid #333;
    border-right: 2px solid transparent;
    animation: n2SimpleWhite .6s linear infinite;
    -webkit-animation: n2SimpleWhite .6s linear infinite;
}
@keyframes n2SimpleWhite {
    to {transform: rotate(360deg);}
}

@-webkit-keyframes n2SimpleWhite {
    to {-webkit-transform: rotate(360deg);}
}

</style>',
        'infiniteDark'  => '<div><div class="n2-ss-spinner-infinite-dark-container"><div class="n2-ss-spinner-infinite-dark"></div></div>
<style type="text/css">
.n2-ss-spinner-infinite-dark-container {
    position: absolute;
    top: 50%;
    left: 50%;
    margin: -15px;
    background: RGBA(0,0,0,0.8);
    width: 20px;
    height: 20px;
    padding: 5px;
    border-radius: 50%;
    z-index: 1000;
}
.n2-ss-spinner-infinite-dark {
    outline: 1px solid RGBA(0,0,0,0);
    width:100%;
    height: 100%;
}
.n2-ss-spinner-infinite-dark:before {
    position: absolute;
    top: 50%;
    left: 50%;
    width: 16px;
    height: 16px;
    margin-top: -10px;
    margin-left: -10px;
}
.n2-ss-spinner-infinite-dark:not(:required):before {
    content: \'\';
    border-radius: 50%;
    border: 2px solid rgba(255, 255, 255, .3);
    border-top-color: #fff;
    animation: n2InfiniteDark .6s linear infinite;
    -webkit-animation: n2InfiniteDark .6s linear infinite;
}
@keyframes n2InfiniteDark {
    to {transform: rotate(360deg);}
}
@-webkit-keyframes n2InfiniteDark {
    to {-webkit-transform: rotate(360deg);}
}
</style></div>',
        'infiniteWhite' => '<div><div class="n2-ss-spinner-infinite-white-container"><div class="n2-ss-spinner-infinite-white"></div></div>
<style type="text/css">
.n2-ss-spinner-infinite-white-container {
    position: absolute;
    top: 50%;
    left: 50%;
    margin: -10px;
    background: #fff;
    width: 20px;
    height: 20px;
    padding: 5px;
    border-radius: 50%;
    z-index: 1000;
}
.n2-ss-spinner-infinite-white {
    outline: 1px solid RGBA(0,0,0,0);
  width:100%;
  height: 100%;
}
.n2-ss-spinner-infinite-white:before {
    position: absolute;
    top: 50%;
    left: 50%;
    width: 16px;
    height: 16px;
    margin-top: -10px;
    margin-left: -10px;
}
.n2-ss-spinner-infinite-white:not(:required):before {
    content: \'\';
    border-radius: 50%;
    border: 2px solid rgba(0, 0, 0, .3);
    border-top-color: rgba(0, 0, 0, .6);
    animation: n2InfiniteWhite .6s linear infinite;
    -webkit-animation: n2InfiniteWhite .6s linear infinite;
}
@keyframes n2InfiniteWhite {
    to {transform: rotate(360deg);}
}
@-webkit-keyframes n2InfiniteWhite {
    to {-webkit-transform: rotate(360deg);}
}
</style></div>'
    );

    public function __construct($slider) {

        $this->slider = $slider;
    }

    public function makeJavaScriptProperties(&$properties) {
        $properties['load']['spinner'] = self::$spinners[$this->slider->params->get('spinner', 'simpleWhite')];
    }
}