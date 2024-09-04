<?php

class Config
{
    static $dirs = [
        '',
        '/controllers',
        //'/views',
        //'/templates',
        '/src',
        '/src/database',
        '/config'
    ];

    static $db = [
        'driver' => 'mysql',
        'host' => 'mariadb',
        'port' => 3306,
        'schema' => '',
        'username' => '',
        'password' => ''
    ];

    static $cors_domain = 'http://localhost:3000';
}
