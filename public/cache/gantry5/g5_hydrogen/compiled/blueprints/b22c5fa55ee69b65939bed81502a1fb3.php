<?php
return [
    '@class' => 'Gantry\\Component\\Config\\CompiledBlueprints',
    'timestamp' => 1443837785,
    'checksum' => 'c1f2e1debc24099420d94671996393b3',
    'files' => [
        'templates/g5_hydrogen/particles' => [
            'particles/sample' => [
                'file' => 'templates/g5_hydrogen/particles/sample.yaml',
                'modified' => 1443837785
            ]
        ],
        'media/gantry5/engines/nucleus/particles' => [
            'particles/analytics' => [
                'file' => 'media/gantry5/engines/nucleus/particles/analytics.yaml',
                'modified' => 1443837725
            ],
            'particles/assets' => [
                'file' => 'media/gantry5/engines/nucleus/particles/assets.yaml',
                'modified' => 1443837725
            ],
            'particles/branding' => [
                'file' => 'media/gantry5/engines/nucleus/particles/branding.yaml',
                'modified' => 1443837725
            ],
            'particles/copyright' => [
                'file' => 'media/gantry5/engines/nucleus/particles/copyright.yaml',
                'modified' => 1443837725
            ],
            'particles/custom' => [
                'file' => 'media/gantry5/engines/nucleus/particles/custom.yaml',
                'modified' => 1443837725
            ],
            'particles/date' => [
                'file' => 'media/gantry5/engines/nucleus/particles/date.yaml',
                'modified' => 1443837725
            ],
            'particles/logo' => [
                'file' => 'media/gantry5/engines/nucleus/particles/logo.yaml',
                'modified' => 1443837725
            ],
            'particles/menu' => [
                'file' => 'media/gantry5/engines/nucleus/particles/menu.yaml',
                'modified' => 1443837725
            ],
            'particles/mobile-menu' => [
                'file' => 'media/gantry5/engines/nucleus/particles/mobile-menu.yaml',
                'modified' => 1443837725
            ],
            'particles/module' => [
                'file' => 'media/gantry5/engines/nucleus/particles/module.yaml',
                'modified' => 1443837725
            ],
            'particles/pagecontent' => [
                'file' => 'media/gantry5/engines/nucleus/particles/pagecontent.yaml',
                'modified' => 1443837725
            ],
            'particles/position' => [
                'file' => 'media/gantry5/engines/nucleus/particles/position.yaml',
                'modified' => 1443837725
            ],
            'particles/social' => [
                'file' => 'media/gantry5/engines/nucleus/particles/social.yaml',
                'modified' => 1443837725
            ],
            'particles/spacer' => [
                'file' => 'media/gantry5/engines/nucleus/particles/spacer.yaml',
                'modified' => 1443837725
            ],
            'particles/system-messages' => [
                'file' => 'media/gantry5/engines/nucleus/particles/system-messages.yaml',
                'modified' => 1443837725
            ],
            'particles/totop' => [
                'file' => 'media/gantry5/engines/nucleus/particles/totop.yaml',
                'modified' => 1443837725
            ]
        ],
        'templates/g5_hydrogen/blueprints' => [
            'page' => [
                'file' => 'templates/g5_hydrogen/blueprints/page.yaml',
                'modified' => 1443837785
            ],
            'styles/accent' => [
                'file' => 'templates/g5_hydrogen/blueprints/styles/accent.yaml',
                'modified' => 1443837785
            ],
            'styles/base' => [
                'file' => 'templates/g5_hydrogen/blueprints/styles/base.yaml',
                'modified' => 1443837785
            ],
            'styles/breakpoints' => [
                'file' => 'templates/g5_hydrogen/blueprints/styles/breakpoints.yaml',
                'modified' => 1443837785
            ],
            'styles/feature' => [
                'file' => 'templates/g5_hydrogen/blueprints/styles/feature.yaml',
                'modified' => 1443837785
            ],
            'styles/footer' => [
                'file' => 'templates/g5_hydrogen/blueprints/styles/footer.yaml',
                'modified' => 1443837785
            ],
            'styles/header' => [
                'file' => 'templates/g5_hydrogen/blueprints/styles/header.yaml',
                'modified' => 1443837785
            ],
            'styles/main' => [
                'file' => 'templates/g5_hydrogen/blueprints/styles/main.yaml',
                'modified' => 1443837785
            ],
            'styles/menu' => [
                'file' => 'templates/g5_hydrogen/blueprints/styles/menu.yaml',
                'modified' => 1443837785
            ],
            'styles/navigation' => [
                'file' => 'templates/g5_hydrogen/blueprints/styles/navigation.yaml',
                'modified' => 1443837785
            ],
            'styles/offcanvas' => [
                'file' => 'templates/g5_hydrogen/blueprints/styles/offcanvas.yaml',
                'modified' => 1443837785
            ],
            'styles/showcase' => [
                'file' => 'templates/g5_hydrogen/blueprints/styles/showcase.yaml',
                'modified' => 1443837785
            ],
            'styles/subfeature' => [
                'file' => 'templates/g5_hydrogen/blueprints/styles/subfeature.yaml',
                'modified' => 1443837785
            ]
        ]
    ],
    'data' => [
        'items' => [
            'page' => [
                'type' => '_parent',
                'name' => 'page'
            ],
            'page.doctype' => [
                'type' => 'input.text',
                'label' => 'Doctype',
                'default' => 'html',
                'name' => 'page.doctype'
            ],
            'page.body' => [
                'type' => '_parent',
                'name' => 'page.body'
            ],
            'page.body.class' => [
                'type' => 'input.text',
                'label' => 'Body Class',
                'default' => 'gantry',
                'name' => 'page.body.class'
            ],
            'styles' => [
                'type' => '_parent',
                'name' => 'styles'
            ],
            'styles.accent' => [
                'type' => '_parent',
                'name' => 'styles.accent'
            ],
            'styles.accent.color-1' => [
                'type' => 'input.colorpicker',
                'label' => 'Accent Color 1',
                'default' => '#439A86',
                'name' => 'styles.accent.color-1'
            ],
            'styles.accent.color-2' => [
                'type' => 'input.colorpicker',
                'label' => 'Accent Color 2',
                'default' => '#8F4DAE',
                'name' => 'styles.accent.color-2'
            ],
            'styles.base' => [
                'type' => '_parent',
                'name' => 'styles.base'
            ],
            'styles.base.background' => [
                'type' => 'input.colorpicker',
                'label' => 'Base Background',
                'default' => '#ffffff',
                'name' => 'styles.base.background'
            ],
            'styles.base.text-color' => [
                'type' => 'input.colorpicker',
                'label' => 'Base Text Color',
                'default' => '#666666',
                'name' => 'styles.base.text-color'
            ],
            'styles.base.body-font' => [
                'type' => 'input.fonts',
                'label' => 'Body Font',
                'default' => 'roboto, sans-serif',
                'name' => 'styles.base.body-font'
            ],
            'styles.base.heading-font' => [
                'type' => 'input.fonts',
                'label' => 'Heading Font',
                'default' => 'roboto, sans-serif',
                'name' => 'styles.base.heading-font'
            ],
            'styles.base.favicon' => [
                'type' => 'input.imagepicker',
                'label' => 'Favicon',
                'filter' => '.(jpe?g|gif|png|svg|ico)$',
                'name' => 'styles.base.favicon'
            ],
            'styles.breakpoints' => [
                'type' => '_parent',
                'name' => 'styles.breakpoints'
            ],
            'styles.breakpoints.large-desktop-container' => [
                'type' => 'input.text',
                'label' => 'Large Desktop',
                'description' => 'Set breakpoint size in rem, em, or px unit values',
                'default' => '75rem',
                'pattern' => '\\d+(\\.\\d+){0,1}(rem|em|ex|ch|vw|vh|vmin|vmax|%|px|cm|mm|in|pt|pc)',
                'name' => 'styles.breakpoints.large-desktop-container'
            ],
            'styles.breakpoints.desktop-container' => [
                'type' => 'input.text',
                'label' => 'Desktop',
                'description' => 'Set breakpoint size in rem, em, or px unit values',
                'default' => '60rem',
                'pattern' => '\\d+(\\.\\d+){0,1}(rem|em|ex|ch|vw|vh|vmin|vmax|%|px|cm|mm|in|pt|pc)',
                'name' => 'styles.breakpoints.desktop-container'
            ],
            'styles.breakpoints.tablet-container' => [
                'type' => 'input.text',
                'label' => 'Tablet',
                'description' => 'Set breakpoint size in rem, em, or px unit values',
                'default' => '48rem',
                'pattern' => '\\d+(\\.\\d+){0,1}(rem|em|ex|ch|vw|vh|vmin|vmax|%|px|cm|mm|in|pt|pc)',
                'name' => 'styles.breakpoints.tablet-container'
            ],
            'styles.breakpoints.large-mobile-container' => [
                'type' => 'input.text',
                'label' => 'Mobile',
                'description' => 'Set breakpoint size in rem, em, or px unit values',
                'default' => '30rem',
                'pattern' => '\\d+(\\.\\d+){0,1}(rem|em|ex|ch|vw|vh|vmin|vmax|%|px|cm|mm|in|pt|pc)',
                'name' => 'styles.breakpoints.large-mobile-container'
            ],
            'styles.breakpoints.mobile-menu-breakpoint' => [
                'type' => 'input.text',
                'label' => 'Mobile Menu',
                'description' => 'Set breakpoint size in rem, em, or px unit values',
                'default' => '48rem',
                'pattern' => '\\d+(\\.\\d+){0,1}(rem|em|ex|ch|vw|vh|vmin|vmax|%|px|cm|mm|in|pt|pc)',
                'name' => 'styles.breakpoints.mobile-menu-breakpoint'
            ],
            'styles.feature' => [
                'type' => '_parent',
                'name' => 'styles.feature'
            ],
            'styles.feature.background' => [
                'type' => 'input.colorpicker',
                'label' => 'Background',
                'default' => '#ffffff',
                'name' => 'styles.feature.background'
            ],
            'styles.feature.text-color' => [
                'type' => 'input.colorpicker',
                'label' => 'Text',
                'default' => '#666666',
                'name' => 'styles.feature.text-color'
            ],
            'styles.footer' => [
                'type' => '_parent',
                'name' => 'styles.footer'
            ],
            'styles.footer.background' => [
                'type' => 'input.colorpicker',
                'label' => 'Background',
                'default' => '#ffffff',
                'name' => 'styles.footer.background'
            ],
            'styles.footer.text-color' => [
                'type' => 'input.colorpicker',
                'label' => 'Text',
                'default' => '#666666',
                'name' => 'styles.footer.text-color'
            ],
            'styles.header' => [
                'type' => '_parent',
                'name' => 'styles.header'
            ],
            'styles.header.background' => [
                'type' => 'input.colorpicker',
                'label' => 'Background',
                'default' => '#2A816D',
                'name' => 'styles.header.background'
            ],
            'styles.header.text-color' => [
                'type' => 'input.colorpicker',
                'label' => 'Text',
                'default' => '#ffffff',
                'name' => 'styles.header.text-color'
            ],
            'styles.main' => [
                'type' => '_parent',
                'name' => 'styles.main'
            ],
            'styles.main.background' => [
                'type' => 'input.colorpicker',
                'label' => 'Background',
                'default' => '#ffffff',
                'name' => 'styles.main.background'
            ],
            'styles.main.text-color' => [
                'type' => 'input.colorpicker',
                'label' => 'Text',
                'default' => '#666666',
                'name' => 'styles.main.text-color'
            ],
            'styles.menu' => [
                'type' => '_parent',
                'name' => 'styles.menu'
            ],
            'styles.menu.col-width' => [
                'type' => 'input.text',
                'label' => 'Simple Dropdown Width',
                'description' => 'Specify the default width of menu dropdowns for simple mode in rem, em or px units. This width can be overridden on each individual menu item from the menu editor.',
                'default' => '180px',
                'pattern' => '\\d+(\\.\\d+){0,1}(rem|em|px)',
                'name' => 'styles.menu.col-width'
            ],
            'styles.menu.animation' => [
                'type' => 'select.selectize',
                'label' => 'Dropdown Animation',
                'description' => 'Select the dropdown animation.',
                'default' => 'g-fade',
                'options' => [
                    'g-no-animation' => 'No Animation',
                    'g-fade' => 'Fade',
                    'g-zoom' => 'Zoom',
                    'g-fade-in-up' => 'Fade In Up'
                ],
                'name' => 'styles.menu.animation'
            ],
            'styles.navigation' => [
                'type' => '_parent',
                'name' => 'styles.navigation'
            ],
            'styles.navigation.background' => [
                'type' => 'input.colorpicker',
                'label' => 'Background',
                'default' => '#439A86',
                'name' => 'styles.navigation.background'
            ],
            'styles.navigation.text-color' => [
                'type' => 'input.colorpicker',
                'label' => 'Text',
                'default' => '#ffffff',
                'name' => 'styles.navigation.text-color'
            ],
            'styles.navigation.overlay' => [
                'type' => 'input.colorpicker',
                'label' => 'Overlay',
                'description' => 'Set the color of the page overlay when the certain menu modes are active.',
                'default' => 'rgba(0, 0, 0, 0.4)',
                'name' => 'styles.navigation.overlay'
            ],
            'styles.offcanvas' => [
                'type' => '_parent',
                'name' => 'styles.offcanvas'
            ],
            'styles.offcanvas.background' => [
                'type' => 'input.colorpicker',
                'label' => 'Background',
                'default' => '#354D59',
                'name' => 'styles.offcanvas.background'
            ],
            'styles.offcanvas.text-color' => [
                'type' => 'input.colorpicker',
                'label' => 'Text',
                'default' => '#ffffff',
                'name' => 'styles.offcanvas.text-color'
            ],
            'styles.offcanvas.width' => [
                'type' => 'input.text',
                'label' => 'Panel Width',
                'description' => 'Set offcanvas size in rem, em, px, or percentage unit values',
                'default' => '17rem',
                'pattern' => '\\d+(\\.\\d+){0,1}(rem|em|ex|ch|vw|vh|vmin|vmax|%|px|cm|mm|in|pt|pc)',
                'name' => 'styles.offcanvas.width'
            ],
            'styles.offcanvas.toggle-color' => [
                'type' => 'input.colorpicker',
                'label' => 'Toggle Color',
                'default' => '#ffffff',
                'name' => 'styles.offcanvas.toggle-color'
            ],
            'styles.showcase' => [
                'type' => '_parent',
                'name' => 'styles.showcase'
            ],
            'styles.showcase.background' => [
                'type' => 'input.colorpicker',
                'label' => 'Background',
                'default' => '#354D59',
                'name' => 'styles.showcase.background'
            ],
            'styles.showcase.image' => [
                'type' => 'input.imagepicker',
                'label' => 'Image',
                'default' => '',
                'name' => 'styles.showcase.image'
            ],
            'styles.showcase.text-color' => [
                'type' => 'input.colorpicker',
                'label' => 'Text',
                'default' => '#ffffff',
                'name' => 'styles.showcase.text-color'
            ],
            'styles.subfeature' => [
                'type' => '_parent',
                'name' => 'styles.subfeature'
            ],
            'styles.subfeature.background' => [
                'type' => 'input.colorpicker',
                'label' => 'Background',
                'default' => '#f0f0f0',
                'name' => 'styles.subfeature.background'
            ],
            'styles.subfeature.text-color' => [
                'type' => 'input.colorpicker',
                'label' => 'Text',
                'default' => '#666666',
                'name' => 'styles.subfeature.text-color'
            ],
            'particles' => [
                'type' => '_parent',
                'name' => 'particles'
            ],
            'particles.analytics' => [
                'type' => '_parent',
                'name' => 'particles.analytics'
            ],
            'particles.analytics.enabled' => [
                'type' => 'input.checkbox',
                'label' => 'Enabled',
                'description' => 'Globally enable analytic particles.',
                'default' => true,
                'name' => 'particles.analytics.enabled'
            ],
            'particles.analytics.ua' => [
                'type' => '_parent',
                'name' => 'particles.analytics.ua'
            ],
            'particles.analytics.ua.code' => [
                'type' => 'input.text',
                'description' => 'Enter the Google UA tracking code for analytics.',
                'label' => 'UA Code',
                'name' => 'particles.analytics.ua.code'
            ],
            'particles.analytics.ua.anonym' => [
                'type' => 'input.checkbox',
                'description' => 'Send only Anonymous IP Addresses (mandatory in Europe)',
                'label' => 'Anonym Statistics',
                'default' => false,
                'name' => 'particles.analytics.ua.anonym'
            ],
            'particles.analytics.ua.ssl' => [
                'type' => 'input.checkbox',
                'description' => 'Send all data using SSL, even from insecure (HTTP) pages.',
                'label' => 'Force SSL use',
                'default' => false,
                'name' => 'particles.analytics.ua.ssl'
            ],
            'particles.analytics.ua.debug' => [
                'type' => 'input.checkbox',
                'description' => 'Enable the debug version of analytics.js - DON\'T USE ON PRODUCTION!',
                'label' => 'Use Debug Mode',
                'default' => false,
                'name' => 'particles.analytics.ua.debug'
            ],
            'particles.assets' => [
                'type' => '_parent',
                'name' => 'particles.assets'
            ],
            'particles.assets.enabled' => [
                'type' => 'input.checkbox',
                'label' => 'Enabled',
                'description' => 'Globally enable CSS/JS particles.',
                'default' => true,
                'name' => 'particles.assets.enabled'
            ],
            'particles.assets.css' => [
                'type' => '_parent',
                'name' => 'particles.assets.css'
            ],
            'particles.assets.css.*' => [
                'type' => '_parent',
                'name' => 'particles.assets.css.*'
            ],
            'particles.assets.css.*.name' => [
                'type' => 'input.text',
                'label' => 'Name',
                'skip' => true,
                'name' => 'particles.assets.css.*.name'
            ],
            'particles.assets.css.*.location' => [
                'type' => 'input.filepicker',
                'label' => 'File Location',
                'icon' => 'fa-file-code-o',
                'placeholder' => 'http://cdn1.remote/file.css',
                'filter' => '\\.(css|less|scss|sass)$',
                'root' => 'gantry-assets://',
                'name' => 'particles.assets.css.*.location'
            ],
            'particles.assets.css.*.inline' => [
                'type' => 'textarea.textarea',
                'label' => 'Inline CSS',
                'description' => 'Adds inline CSS for quick snippets.',
                'name' => 'particles.assets.css.*.inline'
            ],
            'particles.assets._info' => [
                'type' => 'separator.note',
                'class' => 'alert alert-info',
                'content' => 'Please note that inline JavaScript code should be stripped out of &lt;script&gt;&lt;/script&gt; tags as Atom is automatically adding them.',
                'name' => 'particles.assets._info'
            ],
            'particles.assets.extra' => [
                'type' => 'collection.keyvalue',
                'label' => 'Tag attributes',
                'exclude' => [
                    0 => 'src',
                    1 => 'type'
                ],
                'name' => 'particles.assets.extra'
            ],
            'particles.assets.javascript' => [
                'type' => '_parent',
                'name' => 'particles.assets.javascript'
            ],
            'particles.assets.javascript.*' => [
                'type' => '_parent',
                'name' => 'particles.assets.javascript.*'
            ],
            'particles.assets.javascript.*.name' => [
                'type' => 'input.text',
                'label' => 'Name',
                'skip' => true,
                'name' => 'particles.assets.javascript.*.name'
            ],
            'particles.assets.javascript.*.location' => [
                'type' => 'input.filepicker',
                'label' => 'File Location',
                'icon' => 'fa-file-code-o',
                'placeholder' => 'http://cdn1.remote/file.js',
                'filter' => '\\.(jsx?|coffee)$',
                'root' => 'gantry-assets://',
                'name' => 'particles.assets.javascript.*.location'
            ],
            'particles.assets.javascript.*.inline' => [
                'type' => 'textarea.textarea',
                'label' => 'Inline JavaScript',
                'description' => 'Adds inline JavaScript for quick snippets.',
                'name' => 'particles.assets.javascript.*.inline'
            ],
            'particles.assets.in_footer' => [
                'type' => 'input.checkbox',
                'label' => 'Before </body>',
                'description' => 'Whether you want the script to load at the end of the body tag or inside head',
                'default' => false,
                'name' => 'particles.assets.in_footer'
            ],
            'particles.branding' => [
                'type' => '_parent',
                'name' => 'particles.branding'
            ],
            'particles.branding.enabled' => [
                'type' => 'input.checkbox',
                'label' => 'Enabled',
                'description' => 'Globally enable to the particles.',
                'default' => true,
                'name' => 'particles.branding.enabled'
            ],
            'particles.branding.content' => [
                'type' => 'textarea.textarea',
                'label' => 'Content',
                'description' => 'Create or modify custom branding content.',
                'default' => 'Powered by <a href="http://www.gantry.org/" title="Gantry Framework" class="g-powered-by">Gantry Framework</a>',
                'name' => 'particles.branding.content'
            ],
            'particles.branding.css' => [
                'type' => '_parent',
                'name' => 'particles.branding.css'
            ],
            'particles.branding.css.class' => [
                'type' => 'input.selectize',
                'label' => 'CSS Classes',
                'description' => 'CSS class name for the particle.',
                'default' => 'branding',
                'name' => 'particles.branding.css.class'
            ],
            'particles.copyright' => [
                'type' => '_parent',
                'name' => 'particles.copyright'
            ],
            'particles.copyright.enabled' => [
                'type' => 'input.checkbox',
                'label' => 'Enabled',
                'description' => 'Globally enable the particle.',
                'default' => true,
                'name' => 'particles.copyright.enabled'
            ],
            'particles.copyright.date' => [
                'type' => '_parent',
                'name' => 'particles.copyright.date'
            ],
            'particles.copyright.date.start' => [
                'type' => 'input.text',
                'label' => 'Start Year',
                'description' => 'Select the copyright start year.',
                'default' => 'now',
                'name' => 'particles.copyright.date.start'
            ],
            'particles.copyright.date.end' => [
                'type' => 'input.text',
                'label' => 'End Year',
                'description' => 'Select the copyright end year.',
                'default' => 'now',
                'name' => 'particles.copyright.date.end'
            ],
            'particles.copyright.owner' => [
                'type' => 'input.text',
                'label' => 'Copyright owner',
                'description' => 'Add copyright owner name.',
                'name' => 'particles.copyright.owner'
            ],
            'particles.custom' => [
                'type' => '_parent',
                'name' => 'particles.custom'
            ],
            'particles.custom.enabled' => [
                'type' => 'input.checkbox',
                'label' => 'Enabled',
                'description' => 'Globally enable the particle.',
                'default' => true,
                'name' => 'particles.custom.enabled'
            ],
            'particles.custom.html' => [
                'type' => 'textarea.textarea',
                'label' => 'Custom HTML',
                'description' => 'Enter custom HTML into here.',
                'name' => 'particles.custom.html'
            ],
            'particles.custom.filter' => [
                'type' => 'input.checkbox',
                'label' => 'Process shortcodes',
                'description' => 'Enable shortcode processing / filtering in the content.',
                'name' => 'particles.custom.filter'
            ],
            'particles.date' => [
                'type' => '_parent',
                'name' => 'particles.date'
            ],
            'particles.date.enabled' => [
                'type' => 'input.checkbox',
                'label' => 'Enabled',
                'description' => 'Globally enable date particles.',
                'default' => true,
                'name' => 'particles.date.enabled'
            ],
            'particles.date.css' => [
                'type' => '_parent',
                'name' => 'particles.date.css'
            ],
            'particles.date.css.class' => [
                'type' => 'input.selectize',
                'label' => 'CSS Classes',
                'description' => 'CSS class name for the particle.',
                'default' => 'date',
                'name' => 'particles.date.css.class'
            ],
            'particles.date.date' => [
                'type' => '_parent',
                'name' => 'particles.date.date'
            ],
            'particles.date.date.formats' => [
                'type' => 'select.date',
                'label' => 'Format',
                'description' => 'Select preferred date format.',
                'default' => 'l, F d, Y',
                'placeholder' => 'Select...',
                'selectize' => [
                    'allowEmptyOption' => true
                ],
                'options' => [
                    'l, F d, Y' => 'Date1',
                    'l, d F' => 'Date2',
                    'D, d F' => 'Date3',
                    'F d' => 'Date4',
                    'd F' => 'Date5',
                    'd M' => 'Date6',
                    'D, M d, Y' => 'Date7',
                    'D, M d, y' => 'Date8',
                    'l' => 'Date9',
                    'l j F Y' => 'Date10',
                    'j F Y' => 'Date11'
                ],
                'name' => 'particles.date.date.formats'
            ],
            'particles.logo' => [
                'type' => '_parent',
                'name' => 'particles.logo'
            ],
            'particles.logo.enabled' => [
                'type' => 'input.checkbox',
                'label' => 'Enabled',
                'description' => 'Globally enable logo particles.',
                'default' => true,
                'name' => 'particles.logo.enabled'
            ],
            'particles.logo.url' => [
                'type' => 'input.text',
                'label' => 'Url',
                'description' => 'Url for the image. Leave empty to go to home page.',
                'name' => 'particles.logo.url'
            ],
            'particles.logo.image' => [
                'type' => 'input.imagepicker',
                'label' => 'Image',
                'description' => 'Select desired logo image.',
                'name' => 'particles.logo.image'
            ],
            'particles.logo.text' => [
                'type' => 'input.text',
                'label' => 'Text',
                'description' => 'Input logo description text.',
                'name' => 'particles.logo.text'
            ],
            'particles.logo.class' => [
                'type' => 'input.selectize',
                'label' => 'CSS Classes',
                'description' => 'Set a specific CSS class for custom styling.',
                'name' => 'particles.logo.class'
            ],
            'particles.menu' => [
                'type' => '_parent',
                'name' => 'particles.menu'
            ],
            'particles.menu.enabled' => [
                'type' => 'input.checkbox',
                'label' => 'Enabled',
                'description' => 'Globally enable the menu particle.',
                'default' => true,
                'name' => 'particles.menu.enabled'
            ],
            'particles.menu._info' => [
                'type' => 'separator.note',
                'class' => 'alert alert-info',
                'content' => 'GANTRY5_PARTICLE_MENU_INFO',
                'name' => 'particles.menu._info'
            ],
            'particles.menu.menu' => [
                'type' => 'menu.list',
                'label' => 'Menu',
                'description' => 'Select menu to be used with the particle.',
                'default' => '',
                'selectize' => [
                    'allowEmptyOption' => true
                ],
                'options' => [
                    '' => 'Use Default Menu',
                    '-active-' => 'Use Active Menu'
                ],
                'name' => 'particles.menu.menu'
            ],
            'particles.menu.base' => [
                'type' => 'menu.item',
                'label' => 'Base Item',
                'description' => 'Select a menu item to always be used as the base for the menu display.',
                'default' => '/',
                'options' => [
                    '/' => 'Active'
                ],
                'name' => 'particles.menu.base'
            ],
            'particles.menu.startLevel' => [
                'type' => 'input.text',
                'label' => 'Start Level',
                'description' => 'Set the start level of the menu.',
                'default' => 1,
                'name' => 'particles.menu.startLevel'
            ],
            'particles.menu.maxLevels' => [
                'type' => 'input.text',
                'label' => 'Max Levels',
                'description' => 'Set the maximum number of menu levels to display.',
                'default' => 0,
                'name' => 'particles.menu.maxLevels'
            ],
            'particles.menu.renderTitles' => [
                'type' => 'input.checkbox',
                'label' => 'Render Titles',
                'description' => 'Renders the titles/tooltips of the Menu Items for accessibility.',
                'default' => 0,
                'name' => 'particles.menu.renderTitles'
            ],
            'particles.menu.mobileTarget' => [
                'type' => 'input.checkbox',
                'label' => 'Mobile Target',
                'description' => 'Check this field if you want this menu to become the target for Mobile Menu and to appear in Offcanvas',
                'default' => 0,
                'name' => 'particles.menu.mobileTarget'
            ],
            'particles.mobile-menu' => [
                'type' => '_parent',
                'name' => 'particles.mobile-menu'
            ],
            'particles.mobile-menu.enabled' => [
                'type' => 'input.checkbox',
                'label' => 'Enabled',
                'description' => 'Globally enable spacer.',
                'default' => true,
                'name' => 'particles.mobile-menu.enabled'
            ],
            'particles.mobile-menu._note' => [
                'type' => 'separator.note',
                'class' => 'alert alert-info',
                'content' => '<p>This Particle is the container target where, on Mobile, the Menu will be injected.</p><p>Please note that this Particle <strong>must</strong> be unique in the Layout and positioned in the Offcanvas section. You will also need a Menu present in the Layout.</p>',
                'name' => 'particles.mobile-menu._note'
            ],
            'particles.module' => [
                'type' => '_parent',
                'name' => 'particles.module'
            ],
            'particles.module.enabled' => [
                'type' => 'input.checkbox',
                'label' => 'Enabled',
                'description' => 'Globally enable module positions.',
                'default' => true,
                'name' => 'particles.module.enabled'
            ],
            'particles.module._info' => [
                'type' => 'separator.note',
                'class' => 'alert alert-info',
                'content' => 'To edit the Module please use the <a href="index.php?option=com_modules" target="_blank" data-g-urltemplate="index.php?option=com_modules&view=module&layout=edit&id=#ID#" href="#">Joomla\'s Module Manager <i class="fa fa-fw fa-external-link"></i></a>',
                'name' => 'particles.module._info'
            ],
            'particles.module.module_id' => [
                'type' => 'gantry.module',
                'label' => 'Module Id',
                'class' => 'g-urltemplate input-small',
                'picker_label' => 'Pick a Module',
                'description' => 'Enter module Id.',
                'pattern' => '\\d+',
                'overridable' => false,
                'name' => 'particles.module.module_id'
            ],
            'particles.module.chrome' => [
                'type' => 'input.text',
                'label' => 'Chrome',
                'description' => 'Module chrome.',
                'placeholder' => 'gantry',
                'name' => 'particles.module.chrome'
            ],
            'particles.pagecontent' => [
                'type' => '_parent',
                'name' => 'particles.pagecontent'
            ],
            'particles.pagecontent.enabled' => [
                'type' => 'input.checkbox',
                'label' => 'Enabled',
                'description' => 'Globally enable page content.',
                'default' => true,
                'name' => 'particles.pagecontent.enabled'
            ],
            'particles.pagecontent._info' => [
                'type' => 'separator.note',
                'class' => 'alert alert-info',
                'content' => 'Displays the main page content in your layout.',
                'name' => 'particles.pagecontent._info'
            ],
            'particles.pagecontent._alert' => [
                'type' => 'separator.note',
                'class' => 'alert alert-warning',
                'content' => 'This particle is needed to display the main page content, though it may be disabled from a few selected pages like your front page.',
                'name' => 'particles.pagecontent._alert'
            ],
            'particles.position' => [
                'type' => '_parent',
                'name' => 'particles.position'
            ],
            'particles.position.enabled' => [
                'type' => 'input.checkbox',
                'label' => 'Enabled',
                'description' => 'Globally enable module positions.',
                'default' => true,
                'name' => 'particles.position.enabled'
            ],
            'particles.position.key' => [
                'type' => 'input.text',
                'label' => 'Key',
                'description' => 'Position name.',
                'overridable' => false,
                'name' => 'particles.position.key'
            ],
            'particles.position.chrome' => [
                'type' => 'input.text',
                'label' => 'Chrome',
                'description' => 'Module chrome in this position.',
                'placeholder' => 'gantry',
                'name' => 'particles.position.chrome'
            ],
            'particles.social' => [
                'type' => '_parent',
                'name' => 'particles.social'
            ],
            'particles.social.enabled' => [
                'type' => 'input.checkbox',
                'label' => 'Enabled',
                'description' => 'Globally enable social particles.',
                'default' => true,
                'name' => 'particles.social.enabled'
            ],
            'particles.social.css' => [
                'type' => '_parent',
                'name' => 'particles.social.css'
            ],
            'particles.social.css.class' => [
                'type' => 'input.selectize',
                'label' => 'CSS Classes',
                'description' => 'CSS class name for the particle.',
                'default' => 'social',
                'name' => 'particles.social.css.class'
            ],
            'particles.social.title' => [
                'type' => 'input.text',
                'label' => 'Title',
                'description' => 'Customize the title text.',
                'placeholder' => 'Enter title',
                'name' => 'particles.social.title'
            ],
            'particles.social.target' => [
                'type' => 'select.selectize',
                'label' => 'Target',
                'description' => 'Target browser window when item is clicked.',
                'placeholder' => 'Select...',
                'default' => '_blank',
                'options' => [
                    '_parent' => 'Self',
                    '_blank' => 'New Window'
                ],
                'name' => 'particles.social.target'
            ],
            'particles.social.items' => [
                'type' => '_parent',
                'name' => 'particles.social.items'
            ],
            'particles.social.items.*' => [
                'type' => '_parent',
                'name' => 'particles.social.items.*'
            ],
            'particles.social.items.*.name' => [
                'type' => 'input.text',
                'label' => 'Name',
                'skip' => true,
                'name' => 'particles.social.items.*.name'
            ],
            'particles.social.items.*.icon' => [
                'type' => 'input.icon',
                'label' => 'Icon',
                'name' => 'particles.social.items.*.icon'
            ],
            'particles.social.items.*.text' => [
                'type' => 'input.text',
                'label' => 'Text',
                'name' => 'particles.social.items.*.text'
            ],
            'particles.social.items.*.link' => [
                'type' => 'input.text',
                'label' => 'Link',
                'name' => 'particles.social.items.*.link'
            ],
            'particles.spacer' => [
                'type' => '_parent',
                'name' => 'particles.spacer'
            ],
            'particles.spacer.enabled' => [
                'type' => 'input.checkbox',
                'label' => 'Enabled',
                'description' => 'Globally enable spacer.',
                'default' => true,
                'name' => 'particles.spacer.enabled'
            ],
            'particles.spacer._info' => [
                'type' => 'separator.note',
                'class' => 'alert alert-info',
                'content' => 'Add empty spacer column to the row. Shows up as an empty space in your layout.',
                'name' => 'particles.spacer._info'
            ],
            'particles.system-messages' => [
                'type' => '_parent',
                'name' => 'particles.system-messages'
            ],
            'particles.system-messages.enabled' => [
                'type' => 'input.checkbox',
                'label' => 'Enabled',
                'description' => 'Globally enable system messages.',
                'default' => true,
                'name' => 'particles.system-messages.enabled'
            ],
            'particles.system-messages._info' => [
                'type' => 'separator.note',
                'class' => 'alert alert-info',
                'content' => 'Displays system messages in your layout.',
                'name' => 'particles.system-messages._info'
            ],
            'particles.system-messages._alert' => [
                'type' => 'separator.note',
                'class' => 'alert alert-warning',
                'content' => 'Always include this particle to all of your layouts. Otherwise users will not see important system messages like login failures.',
                'name' => 'particles.system-messages._alert'
            ],
            'particles.totop' => [
                'type' => '_parent',
                'name' => 'particles.totop'
            ],
            'particles.totop.enabled' => [
                'type' => 'checkbox',
                'label' => 'Enabled',
                'description' => 'Globally enable to top particles.',
                'default' => true,
                'name' => 'particles.totop.enabled'
            ],
            'particles.totop.css' => [
                'type' => '_parent',
                'name' => 'particles.totop.css'
            ],
            'particles.totop.css.class' => [
                'type' => 'input.selectize',
                'label' => 'CSS Classes',
                'description' => 'CSS class name for the particle.',
                'default' => 'totop',
                'name' => 'particles.totop.css.class'
            ],
            'particles.totop.icon' => [
                'type' => 'input.icon',
                'label' => 'Icon',
                'description' => 'A Font Awesome icon to be displayed for the link.',
                'name' => 'particles.totop.icon'
            ],
            'particles.totop.content' => [
                'type' => 'input.text',
                'label' => 'Text',
                'description' => 'The text to be displayed for the link. HTML is allowed.',
                'placeholder' => 'To Top',
                'name' => 'particles.totop.content'
            ],
            'particles.sample' => [
                'type' => '_parent',
                'name' => 'particles.sample'
            ],
            'particles.sample.enabled' => [
                'type' => 'input.checkbox',
                'label' => 'Enabled',
                'description' => 'Globally enable the particle.',
                'default' => true,
                'name' => 'particles.sample.enabled'
            ],
            'particles.sample.image' => [
                'type' => 'input.imagepicker',
                'label' => 'Image',
                'description' => 'Select the main image.',
                'name' => 'particles.sample.image'
            ],
            'particles.sample.headline' => [
                'type' => 'input.text',
                'label' => 'Headline',
                'description' => 'Customize the headline text.',
                'placeholder' => 'Enter headline',
                'name' => 'particles.sample.headline'
            ],
            'particles.sample.description' => [
                'type' => 'textarea.textarea',
                'label' => 'Description',
                'description' => 'Customize the description.',
                'placeholder' => 'Enter short description',
                'name' => 'particles.sample.description'
            ],
            'particles.sample.link' => [
                'type' => 'input.text',
                'label' => 'Link',
                'description' => 'Specify the link address.',
                'name' => 'particles.sample.link'
            ],
            'particles.sample.linktext' => [
                'type' => 'input.text',
                'label' => 'Link Text',
                'description' => 'Customize the link text.',
                'name' => 'particles.sample.linktext'
            ],
            'particles.sample.samples' => [
                'type' => '_parent',
                'name' => 'particles.sample.samples'
            ],
            'particles.sample.samples.*' => [
                'type' => '_parent',
                'name' => 'particles.sample.samples.*'
            ],
            'particles.sample.samples.*.icon' => [
                'type' => 'input.icon',
                'label' => 'Icon',
                'name' => 'particles.sample.samples.*.icon'
            ],
            'particles.sample.samples.*.title' => [
                'type' => 'input.text',
                'label' => 'Title',
                'name' => 'particles.sample.samples.*.title'
            ],
            'particles.sample.samples.*.subtitle' => [
                'type' => 'input.text',
                'label' => 'Sub Title',
                'name' => 'particles.sample.samples.*.subtitle'
            ],
            'particles.sample.samples.*.description' => [
                'type' => 'textarea.textarea',
                'label' => 'Description',
                'name' => 'particles.sample.samples.*.description'
            ],
            'particles.sample.samples.*.class' => [
                'type' => 'input.block-variations',
                'label' => 'Variations',
                'name' => 'particles.sample.samples.*.class'
            ]
        ],
        'rules' => [
            
        ],
        'nested' => [
            'page' => [
                'doctype' => 'page.doctype',
                'body' => [
                    'class' => 'page.body.class'
                ]
            ],
            'styles' => [
                'accent' => [
                    'color-1' => 'styles.accent.color-1',
                    'color-2' => 'styles.accent.color-2'
                ],
                'base' => [
                    'background' => 'styles.base.background',
                    'text-color' => 'styles.base.text-color',
                    'body-font' => 'styles.base.body-font',
                    'heading-font' => 'styles.base.heading-font',
                    'favicon' => 'styles.base.favicon'
                ],
                'breakpoints' => [
                    'large-desktop-container' => 'styles.breakpoints.large-desktop-container',
                    'desktop-container' => 'styles.breakpoints.desktop-container',
                    'tablet-container' => 'styles.breakpoints.tablet-container',
                    'large-mobile-container' => 'styles.breakpoints.large-mobile-container',
                    'mobile-menu-breakpoint' => 'styles.breakpoints.mobile-menu-breakpoint'
                ],
                'feature' => [
                    'background' => 'styles.feature.background',
                    'text-color' => 'styles.feature.text-color'
                ],
                'footer' => [
                    'background' => 'styles.footer.background',
                    'text-color' => 'styles.footer.text-color'
                ],
                'header' => [
                    'background' => 'styles.header.background',
                    'text-color' => 'styles.header.text-color'
                ],
                'main' => [
                    'background' => 'styles.main.background',
                    'text-color' => 'styles.main.text-color'
                ],
                'menu' => [
                    'col-width' => 'styles.menu.col-width',
                    'animation' => 'styles.menu.animation'
                ],
                'navigation' => [
                    'background' => 'styles.navigation.background',
                    'text-color' => 'styles.navigation.text-color',
                    'overlay' => 'styles.navigation.overlay'
                ],
                'offcanvas' => [
                    'background' => 'styles.offcanvas.background',
                    'text-color' => 'styles.offcanvas.text-color',
                    'width' => 'styles.offcanvas.width',
                    'toggle-color' => 'styles.offcanvas.toggle-color'
                ],
                'showcase' => [
                    'background' => 'styles.showcase.background',
                    'image' => 'styles.showcase.image',
                    'text-color' => 'styles.showcase.text-color'
                ],
                'subfeature' => [
                    'background' => 'styles.subfeature.background',
                    'text-color' => 'styles.subfeature.text-color'
                ]
            ],
            'particles' => [
                'analytics' => [
                    'enabled' => 'particles.analytics.enabled',
                    'ua' => [
                        'code' => 'particles.analytics.ua.code',
                        'anonym' => 'particles.analytics.ua.anonym',
                        'ssl' => 'particles.analytics.ua.ssl',
                        'debug' => 'particles.analytics.ua.debug'
                    ]
                ],
                'assets' => [
                    'enabled' => 'particles.assets.enabled',
                    'css' => [
                        '*' => [
                            'name' => 'particles.assets.css.*.name',
                            'location' => 'particles.assets.css.*.location',
                            'inline' => 'particles.assets.css.*.inline'
                        ]
                    ],
                    '_info' => 'particles.assets._info',
                    'extra' => 'particles.assets.extra',
                    'javascript' => [
                        '*' => [
                            'name' => 'particles.assets.javascript.*.name',
                            'location' => 'particles.assets.javascript.*.location',
                            'inline' => 'particles.assets.javascript.*.inline'
                        ]
                    ],
                    'in_footer' => 'particles.assets.in_footer'
                ],
                'branding' => [
                    'enabled' => 'particles.branding.enabled',
                    'content' => 'particles.branding.content',
                    'css' => [
                        'class' => 'particles.branding.css.class'
                    ]
                ],
                'copyright' => [
                    'enabled' => 'particles.copyright.enabled',
                    'date' => [
                        'start' => 'particles.copyright.date.start',
                        'end' => 'particles.copyright.date.end'
                    ],
                    'owner' => 'particles.copyright.owner'
                ],
                'custom' => [
                    'enabled' => 'particles.custom.enabled',
                    'html' => 'particles.custom.html',
                    'filter' => 'particles.custom.filter'
                ],
                'date' => [
                    'enabled' => 'particles.date.enabled',
                    'css' => [
                        'class' => 'particles.date.css.class'
                    ],
                    'date' => [
                        'formats' => 'particles.date.date.formats'
                    ]
                ],
                'logo' => [
                    'enabled' => 'particles.logo.enabled',
                    'url' => 'particles.logo.url',
                    'image' => 'particles.logo.image',
                    'text' => 'particles.logo.text',
                    'class' => 'particles.logo.class'
                ],
                'menu' => [
                    'enabled' => 'particles.menu.enabled',
                    '_info' => 'particles.menu._info',
                    'menu' => 'particles.menu.menu',
                    'base' => 'particles.menu.base',
                    'startLevel' => 'particles.menu.startLevel',
                    'maxLevels' => 'particles.menu.maxLevels',
                    'renderTitles' => 'particles.menu.renderTitles',
                    'mobileTarget' => 'particles.menu.mobileTarget'
                ],
                'mobile-menu' => [
                    'enabled' => 'particles.mobile-menu.enabled',
                    '_note' => 'particles.mobile-menu._note'
                ],
                'module' => [
                    'enabled' => 'particles.module.enabled',
                    '_info' => 'particles.module._info',
                    'module_id' => 'particles.module.module_id',
                    'chrome' => 'particles.module.chrome'
                ],
                'pagecontent' => [
                    'enabled' => 'particles.pagecontent.enabled',
                    '_info' => 'particles.pagecontent._info',
                    '_alert' => 'particles.pagecontent._alert'
                ],
                'position' => [
                    'enabled' => 'particles.position.enabled',
                    'key' => 'particles.position.key',
                    'chrome' => 'particles.position.chrome'
                ],
                'social' => [
                    'enabled' => 'particles.social.enabled',
                    'css' => [
                        'class' => 'particles.social.css.class'
                    ],
                    'title' => 'particles.social.title',
                    'target' => 'particles.social.target',
                    'items' => [
                        '*' => [
                            'name' => 'particles.social.items.*.name',
                            'icon' => 'particles.social.items.*.icon',
                            'text' => 'particles.social.items.*.text',
                            'link' => 'particles.social.items.*.link'
                        ]
                    ]
                ],
                'spacer' => [
                    'enabled' => 'particles.spacer.enabled',
                    '_info' => 'particles.spacer._info'
                ],
                'system-messages' => [
                    'enabled' => 'particles.system-messages.enabled',
                    '_info' => 'particles.system-messages._info',
                    '_alert' => 'particles.system-messages._alert'
                ],
                'totop' => [
                    'enabled' => 'particles.totop.enabled',
                    'css' => [
                        'class' => 'particles.totop.css.class'
                    ],
                    'icon' => 'particles.totop.icon',
                    'content' => 'particles.totop.content'
                ],
                'sample' => [
                    'enabled' => 'particles.sample.enabled',
                    'image' => 'particles.sample.image',
                    'headline' => 'particles.sample.headline',
                    'description' => 'particles.sample.description',
                    'link' => 'particles.sample.link',
                    'linktext' => 'particles.sample.linktext',
                    'samples' => [
                        '*' => [
                            'icon' => 'particles.sample.samples.*.icon',
                            'title' => 'particles.sample.samples.*.title',
                            'subtitle' => 'particles.sample.samples.*.subtitle',
                            'description' => 'particles.sample.samples.*.description',
                            'class' => 'particles.sample.samples.*.class'
                        ]
                    ]
                ]
            ]
        ],
        'filter' => [
            'validation' => true
        ]
    ]
];
