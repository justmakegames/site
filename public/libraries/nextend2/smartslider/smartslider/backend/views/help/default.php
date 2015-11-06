<div class="n2-form">
    <div class="n2-form-tab " id="n2-tab-general"><div class="n2-h2 n2-content-box-title-bg">Help</div>
        <table>
            <colgroup>
                <col class="n2-label-col">
                <col class="n2-element-col">
            </colgroup>
            <tbody>
            <tr>
                <td class="n2-label"><label>Version</label></td>
                <td class="n2-element"><div class="n2-element-plain"><?php echo N2SS3::$version; ?></div></td>
            </tr>
            <tr>
                <td class="n2-label"><label>Platform</label></td>
                <td class="n2-element"><div class="n2-element-plain"><?php echo N2Platform::getPlatformName(); ?></div></td>
            </tr>
            <tr>
                <td class="n2-label"><label>Nextend Framework version</label></td>
                <td class="n2-element"><div class="n2-element-plain"><?php echo N2::$version; ?></div></td>
            </tr>
            <tr>
                <td class="n2-label"><label>Documentation</label></td>
                <td class="n2-element"><div class="n2-element-plain">
                        <a class="n2-button n2-button-blue n2-button-medium n2-h4" target="_blank"
                           href="<?php echo N2Form::$documentation; ?>">View</a>
                    </div></td>
            </tr>
            </tbody>
        </table>
    </div>
</div>