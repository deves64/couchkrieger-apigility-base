<?php
return [
    'zf-content-negotiation' => [
        'selectors' => [],
    ],
    'db' => [
        'adapters' => [],
    ],
    'doctrine' => [
        'connection' => [
            'orm_default' => [
                'driverClass' => \Doctrine\DBAL\Driver\PDOMySql\Driver::class,
                'params' => [
                    'host' => 'localhost',
                    'port' => '3306',
                    'user' => 'username',
                    'password' => 'password',
                    'dbname' => 'database',
                ],
            ],
        ],
        'driver' => [
            'default_annotation_driver' => [
                'class' => \Doctrine\ORM\Mapping\Driver\AnnotationDriver::class,
                'cache' => 'array',
                'paths' => [
                    0 => '/var/www/config/autoload/../../module/Application/src/Entity',
                ],
            ],
            'orm_default' => [
                'drivers' => [
                    'Application\\Entity' => 'default_annotation_driver',
                ],
            ],
        ],
    ],
    'zf-mvc-auth' => [
        'authentication' => [
            'map' => [
                //'Test\\V1\\Rest\\User\\Controller' => 'oauth2_doctrine',
                'Test\\V1' => 'oauth2_doctrine',
            ],
        ],
    ],
];
