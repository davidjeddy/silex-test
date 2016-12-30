<?php
$filename = __DIR__.preg_replace('#(\?.*)$#', '', $_SERVER['REQUEST_URI']);
if (php_sapi_name() === 'cli-server' && is_file($filename)) {
    return false;
}

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

# TODO find out why 'test' does not work as a route - DJE
$app->get('/testing/{id}', function ($id) use ($app) {
    $sql = 'SELECT * FROM test WHERE id = ?';
    $data = $app['db']->fetchAssoc($sql, [$app->escape($id)]);
    return $app->json($data);
});

$app->get('/hello/{name}', function ($name) use ($app) {
    return 'Hello '.$app->escape($name);
});

$app->get('/', function () use ($app) {
    $sql = 'SELECT * FROM test WHERE id = 1';
    $data = $app['db']->fetchAssoc($sql);
    return $app->json($data);
});

$app->run();
