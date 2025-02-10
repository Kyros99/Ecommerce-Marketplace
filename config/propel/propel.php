<?php

return [
    'propel' => [
        'database' => [
            'connections' => [
                'default' => [
                    'adapter'    => 'mysql',
                    'dsn'        => 'mysql:host=localhost;port=3306;dbname=cl_marketplace',
                    'user'       => 'root',
                    'password'   => '1111',
                    'settings' => [
                        'charset' => 'utf8',
                    ]
                ],
            ]
        ],
        'runtime' => [
            'defaultConnection' => 'default',
            'connections' => ['default']
        ],
        'generator' => [
            'defaultConnection' => 'default',
            'connections' => ['default']
        ]
    ]
];
