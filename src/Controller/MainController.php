<?php

declare(strict_types = 1);

namespace PH7\Boilerplate\Controller;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;

class MainController
{
    public function indexAction(Request $request, Application $app)
    {
        return $app['twig']->render('index.twig', array());
    }
}