<?php
# silex micro framework basic entry script

// web/index.php
require_once __DIR__.'/vendor/autoload.php';
require_once __DIR__.'/common/env.php';

$app = new Silex\Application();
$app['debug'] = true;

$app->register(new Silex\Provider\DoctrineServiceProvider(), [
    'db.options' => [
        'driver' => 'pdo_mysql',
        'dbname' => 'app_db',
        'host' => '172.17.0.2',
        'user' => 'app_db_user',
        'password' => 'app_db_pass',
        'charset' => 'utf8mb4',
        'port' => '3306',
    ]
]);

$app->get('/', function () use ($app) {
    $sql = 'SELECT * FROM test WHERE id = 1';
    $data = $app['db']->fetchAssoc($sql);
    return  json_encode($data);
});

$app->run();
