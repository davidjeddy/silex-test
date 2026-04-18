<?php
# silex micro framework basic entry script

// web/index.php
require_once __DIR__.'/vendor/autoload.php';
require_once __DIR__.'/common/env.php';

use Symfony\Component\HttpFoundation\Request;

$app = new Silex\Application();
$app['debug'] = getenv('DEBUG');

Request::enableHttpMethodParameterOverride();

$app->register(new Silex\Provider\DoctrineServiceProvider(), [
    'db.options' => [
        'mysql' => [
            'driver' => getenv('DB_DRIVER'),
            'dbname' => getenv('DB_NAME'),
            'host' => getenv('DB_HOST'),
            'user' => getenv('DB_USER'),
            'password' => getenv('DB_PASS'),
            'charset' => getenv('DB_CHAR'),
            'port' => getenv('DB_PORT'),
        ]
    ]
]);

$app->match('/', function () use ($app) {
    return 'Hello World';
});

$app->get('/hello/', function ($id = 1) use ($app) {
    $sql = 'SELECT * FROM test WHERE id = ?';
    $data = $app['db']->fetchAssoc($sql, array((int) $id));
    return  json_encode($data);
});

$app->match('/hello/{name}', function($name) use($app) {
    return 'Hello '.$app->escape($name);
});

$app->run();
