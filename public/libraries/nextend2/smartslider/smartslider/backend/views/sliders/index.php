<?php
/**
 * @var $this   N2View
 * @var $_class N2SmartsliderBackendSlidersView
 */

$this->widget->init('topbar', array());
?>

<div class="n2-box n2-box-border n2-box-huge n2-ss-create-slider">
    <img src="<?php echo N2ImageHelper::fixed('$ss$/admin/images/create-slider.png') ?>">

    <div class="n2-box-placeholder">
        <table>
            <tbody>
            <tr>
                <td class="n2-box-button">
                    <div class="n2-h2"><?php n2_e('It\'s a great day to start something new.'); ?></div>

                    <div class="n2-h3"><?php n2_e('Click on the \'Create Slider\' button to get started.'); ?></div>
                    <a href="#"
                       class="n2-button n2-button-x-big n2-button-green n2-uc n2-h3 n2-ss-create-slider"><?php n2_e('Create slider'); ?></a>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</div>

<?php
$buttonHTML = NHtml::tag("td", array('class' => 'n2-box-button'), '<div>' . n2_('Choose a file from your computer.') . '</div><a href="' . $this->appType->router->createUrl(array('sliders/importbyupload')) . '" class="n2-button n2-button-small n2-button-green n2-uc n2-h5">' . n2_('Import by upload') . '</a>');
echo NHtml::tag('div', array('class' => 'n2-box n2-box-border n2-box-title '), NHtml::image(N2ImageHelper::fixed('$ss$/admin/images/import-upload.png')) . NHtml::tag("div", array('class' => 'n2-box-placeholder'), NHtml::tag("table", array(), NHtml::tag("tr", array(), $buttonHTML))));

$buttonHTML = NHtml::tag("td", array('class' => 'n2-box-button'), '<div>' . n2_('Choose a file from your server.') . '</div><a href="' . $this->appType->router->createUrl(array('sliders/importfromserver')) . '" class="n2-button n2-button-small n2-button-green n2-uc n2-h5">' . n2_('Import from server') . '</a>');
echo NHtml::tag('div', array('class' => 'n2-box n2-box-border n2-box-title '), NHtml::image(N2ImageHelper::fixed('$ss$/admin/images/import-server.png')) . NHtml::tag("div", array('class' => 'n2-box-placeholder'), NHtml::tag("table", array(), NHtml::tag("tr", array(), $buttonHTML))));

echo $_class->_import();
?>

<div class="n2-clear"></div>