<?php
return [
    '@class' => 'Gantry\\Component\\File\\CompiledYamlFile',
    'filename' => '/var/www/jmg/public/media/gantry5/engines/nucleus/particles/position.yaml',
    'modified' => 1443837725,
    'data' => [
        'name' => 'Module Position',
        'description' => 'Display a module position.',
        'type' => 'position',
        'hidden' => false,
        'form' => [
            'fields' => [
                'enabled' => [
                    'type' => 'input.checkbox',
                    'label' => 'Enabled',
                    'description' => 'Globally enable module positions.',
                    'default' => true
                ],
                'key' => [
                    'type' => 'input.text',
                    'label' => 'Key',
                    'description' => 'Position name.',
                    'overridable' => false
                ],
                'chrome' => [
                    'type' => 'input.text',
                    'label' => 'Chrome',
                    'description' => 'Module chrome in this position.',
                    'placeholder' => 'gantry'
                ]
            ]
        ]
    ]
];
