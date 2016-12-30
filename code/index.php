<?php
# silex micro framework basic entry script

// web/index.php
require_once __DIR__.'/vendor/autoload.php';
require_once __DIR__.'/common/env.php';

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

$app = new Silex\Application();
$app['debug'] = true;

$app->register(new Silex\Provider\DoctrineServiceProvider(), [
    'db.options' => [
        'driver' => getenv('DB_DRIV'),
        'dbname' => getenv('DB_NAME'),
        'host' => getenv('DB_HOST'),
        'user' => getenv('DB_USER'),
        'password' => getenv('DB_PASS'),
        'charset' => getenv('DB_CHAR'),
        'port' => getenv('DB_PORT'),
    ]
]);

$app->register(new Silex\Provider\SerializerServiceProvider());

// only accept content types supported by the serializer via the assert method.
$app->get("/{id}.{_format}", function (Request $request, $id) use ($app) {

    $data = $app['db']->fetchAssoc(
        'SELECT * FROM test WHERE id = ?',
        [
            $app->escape($id)
        ]
    );

    //$format = $request->getRequestFormat();
    $format = $request->getRequestFormat();

    return new Response($app['serializer']->serialize($data, $format), 200, array(
        "Content-Type" => $request->getMimeType($format)
    ));
})->assert("_format", "xml|json")
    ->assert("id", "\d+");


$app->run();
