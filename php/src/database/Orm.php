<?php

/**
 * Crea una classe per ogni tabella del database
 * 
 * Questo script va eseguito da terminale >php Orm.php
 */
$db_name = "";

require __DIR__ . '/../../vendor/autoload.php';

function autoloader($class_name)
{
    $directories = [
        '/src/database',
        '/src/classes'
    ];

    foreach ($directories as $dir) {
        $file = __DIR__ . "/../../" . $dir . '/' . $class_name . '.php';
        if (file_exists($file)) {
            require $file;
            return;
        }
    }
}
spl_autoload_register('autoloader');


$sql = "SHOW TABLES FROM $db_name";

$db = Database::getInstance();

$result = $db->query($sql);
$tables = [];
while ($data = $result->fetch_assoc()) {
    $tables[] = $data["Tables_in_" . $db_name];
}

//loop sulle tabelle
$engine = new Mustache_Engine();
foreach ($tables as $table) {
    $sql = "describe $table";
    $result = $db->query($sql);

    $data = [];
    $data['classname'] = ucfirst($table);
    $data['table'] = $table;
    $data['datetime'] == date("Y-m-d H:i:s");
    while ($field = $result->fetch_assoc()) {
        $data['attributes'][] = $field['Field'];
    }

    $filename = $data['classname'] . ".php";
    $template = file_get_contents(__DIR__ . '/Pojo.mst');
    $phpclass = $engine->render($template, $data);

    file_put_contents(__DIR__ . '/../classes/' . $filename, $phpclass);
}
