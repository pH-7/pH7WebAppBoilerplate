<?php

namespace PH7\Boilerplate;

use Silex\Application;

require dirname(__DIR__) . '/vendor/autoload.php';

$app = new Application();

$app['env'] = !empty($_ENV['env']) ? 'dev' : 'prod'; // phpunit.xml will set it to true
require dirname(__DIR__) . '/app/config/' . $app['env']  . '.php';
require dirname(__DIR__) . '/app/bootstrap.php';
require dirname(__DIR__) . '/app/routes.php';

$app->run();