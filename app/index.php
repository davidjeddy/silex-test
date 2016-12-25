<?php
echo 'asdf';
exit;

# silex micro framework basic entry script

// web/index.php
require_once __DIR__.'/vendor/autoload.php';

$app = new Silex\Application();

$app->get('/', function () use ($app) {
    return 'Hello World.';
});

$app->run();