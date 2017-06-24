<?php

declare(strict_types = 1);

namespace PH7\Boilerplate\Tests\Controller;

use Mockery;
use PH7\Boilerplate\Controller\MainController;
use PHPUnit\Framework\TestCase;
use Silex\Application;
use Symfony\Component\HttpFoundation\Request;

class MainControllerTest extends TestCase
{
    public function testIndexAction(): void
    {
        $request = Mockery::mock(Request::class)->makePartial();
        $app = Mockery::mock(Application::class)->makePartial();
        $mainController = Mockery::mock(MainController::class)->makePartial();

        // TODO Test it once your "MainController::indexAction()" is implemented
    }

    protected function tearDown(): void
    {
        /**
         * Reset the mock container to null. For integration with PHPUnit and others.
         */
        Mockery::close();
    }
}