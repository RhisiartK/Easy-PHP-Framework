<?php
declare(strict_types=1);

include __DIR__ . './../EasyPHP/Core/Log.php';
include __DIR__ . './../EasyPHP/Core/Settings.php';
include __DIR__ . './../EasyPHP/Core/Router.php';

use EasyPHP\Core\Router;
use EasyPHP\Core\Settings;
use PHPUnit\Framework\TestCase;

include __DIR__ . './../Application/' . Settings::DEFAULT_PAGE . '/Controller.php';

/**
 * RouterTest.php class file.
 *
 * @author Richard Keki <kricsi14@gmail.com>
 * @link https://github.com/RhisiartK/Easy-PHP-Framework
 * @license https://github.com/RhisiartK/Easy-PHP-Framework/blob/master/LICENSE
 */
class RouterTest extends TestCase
{
    public function testCanBeCreated(): void
    {
        $this->assertInstanceOf(
            Router::class,
            new Router()
        );
    }

    public function testDefaultRouterExist()
    {
        $controllerClass = 'Application\\' . Settings::DEFAULT_PAGE . '\\Controller';
        $this->assertTrue(class_exists($controllerClass) && method_exists($controllerClass, 'GET'));
    }

    public function testProcessRequestMethodExist(): void
    {
        $router = new Router();

        $this->assertTrue(method_exists($router, 'processRequest'));
    }

    public function testGetRequestedMethodExist(): void
    {
        $router = new Router();

        $this->assertTrue(method_exists($router, 'getRequestedMethod'));
    }

    public function testGetRequestedParametersMethodExist(): void
    {
        $router = new Router();

        $this->assertTrue(method_exists($router, 'getRequestedParameters'));
    }

    public function testGetRequestedPageMethodExist(): void
    {
        $router = new Router();

        $this->assertTrue(method_exists($router, 'getRequestedPage'));
    }

    public function testEmptyRouterRequestedPage(): void
    {
        $router = new Router();

        $this->assertNull($router->getRequestedPage());
    }

    public function testEmptyRouterRequestedParameters(): void
    {
        $router = new Router();

        $this->assertNull($router->getRequestedParameters());
    }

    public function testEmptyRouterRequestedMethod(): void
    {
        $router = new Router();

        $this->assertNull($router->getRequestedMethod());
    }

    public function testInvalidRouterRequestedPage(): void
    {
        $router = new Router('Test/Test/12/Test.php');

        $this->assertNull($router->getRequestedPage());
    }

    public function testInvalidRouterRequestedParameters(): void
    {
        $router = new Router('Test/Test/12/Test.php');

        $this->assertNull($router->getRequestedParameters());
    }

    public function testInvalidRouterRequestedMethod(): void
    {
        $router = new Router('Test/Test/12/Test.php');

        $this->assertNull($router->getRequestedMethod());
    }

    // TODO Test with valid url path (existed controllers)

}
