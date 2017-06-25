<?php

declare(strict_types = 1);

namespace PH7\Boilerplate;

use Symfony\Component\Debug\ErrorHandler;
use Symfony\Component\Debug\ExceptionHandler;
use Symfony\Component\HttpFoundation\Request;
use Silex\Provider\DoctrineServiceProvider;
use Silex\Provider\TwigServiceProvider;
use Silex\Provider\AssetServiceProvider;
use Twig_Environment;
use Twig_Extensions_Extension_Text;
use Exception;

ErrorHandler::register();
ExceptionHandler::register();

$app->register(new DoctrineServiceProvider());

$app->register(new TwigServiceProvider(), array(
    'twig.path' => dirname(__DIR__) . '/views',
    'twig.options'    => array(
        'cache' => dirname(__DIR__) . '/var/cache/twig',
    )
));

$app['twig'] = $app->extend('twig', function(Twig_Environment $twig, $app) {
    $twig->addExtension(new Twig_Extensions_Extension_Text());

    return $twig;
});

$app->register(new AssetServiceProvider(), array(
    'assets.version' => 'v1'
));

// Register Error Handler
$app->error(function (Exception $except, Request $request, int $code) use ($app) {
    switch ($code) {
        case 403:
            $message = 'Access denied.';
            break;
        case 404:
            $message = 'The requested resource could not be found.';
            break;
        default:
            $message = "Something went wrong.";
    }
    return $app['twig']->render('error.html.twig', array('message' => $message));
});

