<?php

namespace PH7\Boilerplate;

// Home page
$app->get('/', 'PH7\Boilerplate\Controller\MainController::indexAction')->bind('home');
