<?php
return [
    '@class' => 'Gantry\\Component\\Config\\CompiledConfig',
    'timestamp' => 1443838038,
    'checksum' => '1629f78f3d829c862809456b2bc3b483',
    'files' => [
        'templates/g5_hydrogen/custom/config/_offline' => [
            'index' => [
                'file' => 'templates/g5_hydrogen/custom/config/_offline/index.yaml',
                'modified' => 1443837785
            ]
        ],
        'templates/g5_hydrogen/config/_offline' => [
            'page' => [
                'file' => 'templates/g5_hydrogen/config/_offline/page.yaml',
                'modified' => 1443837785
            ]
        ],
        'templates/g5_hydrogen/custom/config/default' => [
            'index' => [
                'file' => 'templates/g5_hydrogen/custom/config/default/index.yaml',
                'modified' => 1443837785
            ],
            'styles' => [
                'file' => 'templates/g5_hydrogen/custom/config/default/styles.yaml',
                'modified' => 1443838037
            ]
        ],
        'templates/g5_hydrogen/config/default' => [
            'page' => [
                'file' => 'templates/g5_hydrogen/config/default/page.yaml',
                'modified' => 1443837785
            ],
            'particles/logo' => [
                'file' => 'templates/g5_hydrogen/config/default/particles/logo.yaml',
                'modified' => 1443837785
            ]
        ]
    ],
    'data' => [
        'page' => [
            'doctype' => 'html',
            'body' => [
                'class' => 'gantry offline'
            ]
        ],
        'styles' => [
            'accent' => [
                'color-1' => '#3180c2',
                'color-2' => '#ef6c00'
            ],
            'base' => [
                'background' => '#ffffff',
                'text-color' => '#666666',
                'body-font' => 'roboto, sans-serif',
                'heading-font' => 'roboto, sans-serif',
                'favicon' => ''
            ],
            'breakpoints' => [
                'large-desktop-container' => '75rem',
                'desktop-container' => '60rem',
                'tablet-container' => '48rem',
                'large-mobile-container' => '30rem',
                'mobile-menu-breakpoint' => '48rem'
            ],
            'feature' => [
                'background' => '#ffffff',
                'text-color' => '#666666'
            ],
            'footer' => [
                'background' => '#ffffff',
                'text-color' => '#666666'
            ],
            'header' => [
                'background' => '#1867a9',
                'text-color' => '#ffffff'
            ],
            'main' => [
                'background' => '#ffffff',
                'text-color' => '#666666'
            ],
            'menu' => [
                'col-width' => '180px',
                'animation' => 'g-fade'
            ],
            'navigation' => [
                'background' => '#3180c2',
                'text-color' => '#ffffff',
                'overlay' => 'rgba(0, 0, 0, 0.4)'
            ],
            'offcanvas' => [
                'background' => '#142d53',
                'text-color' => '#ffffff',
                'width' => '17rem',
                'toggle-color' => '#ffffff'
            ],
            'showcase' => [
                'background' => '#142d53',
                'image' => '',
                'text-color' => '#ffffff'
            ],
            'subfeature' => [
                'background' => '#f0f0f0',
                'text-color' => '#666666'
            ],
            'preset' => 'preset2'
        ],
        'particles' => [
            'analytics' => [
                'enabled' => true,
                'ua' => [
                    'anonym' => false,
                    'ssl' => false,
                    'debug' => false
                ]
            ],
            'assets' => [
                'enabled' => true,
                'in_footer' => false
            ],
            'branding' => [
                'enabled' => true,
                'content' => 'Powered by <a href="http://www.gantry.org/" title="Gantry Framework" class="g-powered-by">Gantry Framework</a>',
                'css' => [
                    'class' => 'branding'
                ]
            ],
            'copyright' => [
                'enabled' => true,
                'date' => [
                    'start' => 'now',
                    'end' => 'now'
                ]
            ],
            'custom' => [
                'enabled' => true
            ],
            'date' => [
                'enabled' => true,
                'css' => [
                    'class' => 'date'
                ],
                'date' => [
                    'formats' => 'l, F d, Y'
                ]
            ],
            'logo' => [
                'enabled' => '1',
                'url' => '',
                'image' => 'gantry-assets://images/gantry5-logo.png',
                'text' => 'Gantry 5',
                'class' => 'gantry-logo'
            ],
            'menu' => [
                'enabled' => true,
                'menu' => '',
                'base' => '/',
                'startLevel' => 1,
                'maxLevels' => 0,
                'renderTitles' => 0,
                'mobileTarget' => 0
            ],
            'mobile-menu' => [
                'enabled' => true
            ],
            'module' => [
                'enabled' => true
            ],
            'pagecontent' => [
                'enabled' => true
            ],
            'position' => [
                'enabled' => true
            ],
            'social' => [
                'enabled' => true,
                'css' => [
                    'class' => 'social'
                ],
                'target' => '_blank'
            ],
            'spacer' => [
                'enabled' => true
            ],
            'system-messages' => [
                'enabled' => true
            ],
            'totop' => [
                'enabled' => true,
                'css' => [
                    'class' => 'totop'
                ]
            ],
            'sample' => [
                'enabled' => true
            ]
        ],
        'index' => [
            'name' => '_offline',
            'timestamp' => 1443837785,
            'preset' => [
                'image' => 'gantry-admin://images/layouts/offline.png',
                'name' => '_offline',
                'timestamp' => 1443837785
            ],
            'positions' => [
                'footer' => 'Footer'
            ]
        ]
    ]
];
