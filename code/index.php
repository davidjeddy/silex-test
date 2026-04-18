<?php
# silex micro framework basic entry script

# core dependencies
require_once __DIR__.'/vendor/autoload.php';
require_once __DIR__.'/common/env.php';

# app configuration
$app = new Silex\Application();
$app['debug'] = getenv('DEBUG');

# server static content using php builtin server
if (php_sapi_name() === 'cli-server'
    && is_file(
        __DIR__.preg_replace('#(\?.*)$#', '', $_SERVER['REQUEST_URI'])
    )
) {
    return false;
}

$app->register(new Silex\Provider\DoctrineServiceProvider(), [
    'db.options' => [
        'driver'    => getenv('DB_DRIV'),
        'dbname'    => getenv('DB_NAME'),
        'host'      => getenv('DB_HOST'),
        'user'      => getenv('DB_USER'),
        'password'  => getenv('DB_PASS'),
        'charset'   => getenv('DB_CHAR'),
        'port'      => getenv('DB_PORT'),
    ]
]);

$app['controllers']
    //->value('id', '1')
    ->assert('id', '\d+')
    //->requireHttps()
    ->method('get')
    ->convert('id', function () use ($id) { return (int)$id; })
    //->before(function () { /* ... */ })
    //->when('request.isSecure() == true')
;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
$app->error(function (\Exception $e, Request $request, $code) {
    switch ($code) {
        case 404:
            $message = 'The requested page could not be found.';
            break;
        default:
            $message = 'We are sorry, but something went terribly wrong.';
    }
    return new Response($message);
});

$app->get('/cntlConf', function() use ($app) {
    return $app->json(['message' => 'CNTL conf example.']);
});

$app->get('/assert/{id}', function ($id) use ($app) {
    $sql = 'SELECT * FROM test WHERE id = ?';
    $data = $app['db']->fetchAssoc($sql, [$app->escape($id)]);
    return $app->json($data);
})->assert('id', '\d+');

$app->get('/abort/{id}', function ($id) use ($app) {
    if (!isset($blogPosts[$id])) {
        $app->abort(404, "Post $id does not exist.");
    }

    return $app->json(['message' => 'Should have aborted.']);
});

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
    return $app->json(['message' => 'Hello World!']);
});

$app->run();
