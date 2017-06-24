<?php

declare(strict_types = 1);

namespace PH7\Boilerplate\Tests\Controller;

use Mockery;
use PH7\Boilerplate\Controller\MainController;
use PHPUnit\Framework\TestCase;
use Twig_Environment;

class MainControllerTest extends TestCase
{
    public function testIndexAction(): void
    {
        $mainController = Mockery::mock(MainController::class);

        $this->assertInstanceOf(Twig_Environment::class, $mainController->indexAction());
    }

    protected function tearDown()
    {
        /**
         * Reset the mock container to null. For integration with PHPUnit and others.
         */
        Mockery::close();
    }
}