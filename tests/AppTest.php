<?php

declare(strict_types = 1);

namespace PH7\Boilerplate\Tests;

use Silex\WebTestCase;
use Silex\Application;

class MainControllerTest extends WebTestCase
{
    /**
     * @dataProvider appUrls
     */
    public function testPageIsSuccessful(string $url): void
    {
        $client = $this->createClient();
        $client->request('GET', $url);
        $this->assertTrue($client->getResponse()->isSuccessful());
    }

    /**
     * {@inheritDoc}
     */
    public function createApplication()
    {
        $app = new Application();

        require dirname(__DIR__) . '/app/config/dev.php';
        require dirname(__DIR__) . '/app/bootstrap.php';
        require dirname(__DIR__) . '/app/routes.php';

        // Generate raw exceptions instead of HTML pages if errors occur
        unset($app['exception_handler']);

        // Simulate the sessions
        $app['session.test'] = true;

        // Enable anonymous access to the whole app
        $app['security.access_rules'] = [];

        return $app;
    }

    public function appUrls(): array
    {
        return [
            ['/'] // Homepage
            // Add other paths when more in routes.php
        ];
    }
}