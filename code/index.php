<?php
# silex micro framework basic entry script

// web/index.php
require_once __DIR__.'/vendor/autoload.php';
require_once __DIR__.'/common/env.php';

$app = new Silex\Application();

$app->register(new Silex\Provider\DoctrineServiceProvider(), array(
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
    ],
));

$app->get('/', function () use ($app) {
    return 'Hello World.';
});

//$app->get('/{id}', function ($id) use ($app) {
//    $sql = 'SELECT * FROM users WHERE id = ?';
//    $post = $app['db']->fetchAssoc($sql, array((int) $id));
//
//    return  "<h1>{$post['title']}</h1>".
//        "<p>{$post['body']}</p>";
//});

$app->run();