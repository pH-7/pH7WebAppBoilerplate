<?php

namespace PH7\Boilerplate;

use Silex\Application;

require_once dirname(__DIR__) . '/vendor/autoload.php';

$app = new Application();

require dirname(__DIR__) . '/src/config/prod.php';
require dirname(__DIR__) . '/src/bootstrap.php';
require dirname(__DIR__) . '/app/routes.php';

$app->run();