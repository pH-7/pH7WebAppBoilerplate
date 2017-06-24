<?php

namespace PH7\Boilerplate;

use Silex\Application;

require dirname(__DIR__) . '/vendor/autoload.php';

$app = new Application();

require dirname(__DIR__) . '/app/config/dev.php';
require dirname(__DIR__) . '/app/bootstrap.php';
require dirname(__DIR__) . '/app/routes.php';

$app->run();