<?php
return [
    'propel' => [
        'generator' => [
            'schema' => [
                'autoPackage' => true
            ]
        ],
        'database' => [
            'connections' => [
                'default' => [
                    'adapter' => 'mysql',
                    'dsn' => 'mysql:host=stirhack.ccgjwgngik5x.eu-west-1.rds.amazonaws.com;port=3306;dbname=stirhack',
                    'user' => 'stirhack',
                    'password' => 'stirhack',
                    'settings' => [
                        'charset' => 'utf8'
                    ]
                ]
            ]
        ]
    ]
];
