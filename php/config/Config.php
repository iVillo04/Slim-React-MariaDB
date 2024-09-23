<?php
//File di configurazione generale

class Config
{
    /**
     * Contiene tutte le path dove l'autoloader agisce
     * (L'ordine è rilevante)
     */
    static $dirs = [
        '',
        '/config',      //config
        '/controllers', //Controllers
        '/middleware',  //middleware
        '/routes',      //routes
        '/src',         //src
        '/src/database',//database
        '/views'        //views
    ];

    /**
     * Contiene tutti i nomi dei file .php contenenti le routes
     */
    static $routes = [
        'status',
        'home'
    ];

    /**
     * Configurazione di mustache
     */
    static $mustache = [
        'loader' => '/templates/',
        'partials_loader' => '/templates/partials/'
    ];

    /**
     * Credenziali del database
     */
    static $db = [
        'driver' => 'mysql',
        'host' => 'mariadb',
        'port' => 3306,
        'schema' => '',
        'username' => '',
        'password' => ''
    ];

    /**
     * Dominio cors
     */
    static $cors_domain = 'http://localhost:3000';
}
