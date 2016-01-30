<?php
return [
    '@class' => 'Gantry\\Component\\File\\CompiledYamlFile',
    'filename' => '/var/www/jmg/public/media/gantry5/engines/nucleus/particles/analytics.yaml',
    'modified' => 1446823261,
    'data' => [
        'name' => 'Google Analytics',
        'description' => 'Configure Google Analytics.',
        'type' => 'atom',
        'form' => [
            'fields' => [
                'enabled' => [
                    'type' => 'input.checkbox',
                    'label' => 'Enabled',
                    'description' => 'Globally enable analytic particles.',
                    'default' => true
                ],
                'ua.code' => [
                    'type' => 'input.text',
                    'description' => 'Enter the Google UA tracking code for analytics.',
                    'label' => 'UA Code'
                ],
                'ua.anonym' => [
                    'type' => 'input.checkbox',
                    'description' => 'Send only Anonymous IP Addresses (mandatory in Europe)',
                    'label' => 'Anonym Statistics',
                    'default' => false
                ],
                'ua.ssl' => [
                    'type' => 'input.checkbox',
                    'description' => 'Send all data using SSL, even from insecure (HTTP) pages.',
                    'label' => 'Force SSL use',
                    'default' => false
                ],
                'ua.debug' => [
                    'type' => 'input.checkbox',
                    'description' => 'Enable the debug version of analytics.js - DON\'T USE ON PRODUCTION!',
                    'label' => 'Use Debug Mode',
                    'default' => false
                ]
            ]
        ]
    ]
];
