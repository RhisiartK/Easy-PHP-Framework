<?php

declare(strict_types=1);

namespace Test;

use EasyPHP\Core\ErrorCodes;
use EasyPHP\Core\Router;
use EasyPHP\Core\Settings;
use PHPUnit\Framework\TestCase;

/**
 * RouterTest.php class file.
 *
 * @author Richard Keki <kricsi14@gmail.com>
 *
 * @link https://github.com/RhisiartK/Easy-PHP-Framework
 *
 * @license https://github.com/RhisiartK/Easy-PHP-Framework/blob/master/LICENSE
 */
class RouterTest extends TestCase
{
    // TODO: rewrite
    public function setUp()
    {
        include_once __DIR__ . './../server/Application/' . Settings::DEFAULT_PAGE . '/Controller.php';
        parent::setUp();
    }

    public function testCanBeCreated(): void
    {
        $this->assertInstanceOf(
            Router::class,
            new Router()
        );
    }

//    public function testDefaultRouterExist()
//    {
//        $controllerClass = 'Application\\' . Settings::DEFAULT_PAGE . '\\Controller';
//        $this->assertTrue(class_exists($controllerClass)
//            && method_exists($controllerClass, 'GET'));
//    }
//
//    public function testProcessRequestMethodExist(): void
//    {
//        $router = new Router();
//
//        $this->assertTrue(method_exists($router, 'processRequest'));
//    }
//
//    public function testGetRequestedMethodExist(): void
//    {
//        $router = new Router();
//
//        $this->assertTrue(method_exists($router, 'getRequestMethod'));
//    }
//
//    public function testGetRequestedParametersMethodExist(): void
//    {
//        $router = new Router();
//
//        $this->assertTrue(method_exists($router, 'getRequestParameters'));
//    }
//
//    public function testGetRequestedPageMethodExist(): void
//    {
//        $router = new Router();
//
//        $this->assertTrue(method_exists($router, 'getRequestUrl'));
//    }
//
//    public function testEmptyRouterRequestedPage(): void
//    {
//        $router = new Router();
//
//        $this->assertNull($router->getRequestUrl());
//    }
//
//    public function testEmptyRouterRequestedParameters(): void
//    {
//        $router = new Router();
//
//        $this->assertNull($router->getRequestParameters());
//    }
//
//    public function testEmptyRouterRequestedMethod(): void
//    {
//        $router = new Router();
//
//        $this->assertNull($router->getRequestMethod());
//    }
//
//    public function testInvalidRouterRequestedPage(): void
//    {
//        $router = new Router('Test/Test/12/Test.php');
//
//        $this->assertNull($router->getRequestUrl());
//    }
//
//    public function testInvalidRouterRequestedParameters(): void
//    {
//        $router = new Router('Test/Test/12/Test.php');
//
//        $this->assertNull($router->getRequestParameters());
//    }
//
//    public function testInvalidRouterRequestedMethod(): void
//    {
//        $router = new Router('Test/Test/12/Test.php');
//
//        $this->assertNull($router->getRequestMethod());
//    }
//
//    public function testCreateRequestIndexGetWithoutParameters(): void
//    {
//        $path   = 'Index';
//        $method = 'GET';
//
//        $router = new Router();
//        $router->createRequest($path, $method);
//
//        $this->assertEmpty($router->getRequestParameters());
//        $this->assertTrue(
//            $router->getRequestMethod() === 'GET' && $router->getRequestUrl() === 'Application\\Index'
//            && $router->getRequestErrorCode() === ErrorCodes::NO_ERROR
//        );
//    }
//
//    public function testCreateRequestIndexGetWithParameters(): void
//    {
//        $path   = 'Index/12/23';
//        $method = 'GET';
//
//        $router = new Router();
//        $router->createRequest($path, $method);
//
//        $this->assertArraySubset(['12', '23'], $router->getRequestParameters());
//        $this->assertTrue(
//            $router->getRequestMethod() === 'GET' && $router->getRequestUrl() === 'Application\\Index'
//            && $router->getRequestErrorCode() === ErrorCodes::NO_ERROR
//        );
//    }
//
//    public function testCreateRequestInvalidGetRequest(): void
//    {
//        $path   = 'Index\Controller';
//        $method = 'GET';
//
//        $router = new Router();
//        $router->createRequest($path, $method);
//
//        $this->assertEmpty($router->getRequestParameters());
//        $this->assertTrue(
//            $router->getRequestMethod() === 'GET' && $router->getRequestUrl() === 'Application\\'
//            . Settings::DEFAULT_PAGE && $router->getRequestErrorCode() === ErrorCodes::VALUE_OBJECT_NOT_VALID
//        );
//    }
//
//    public function testCreateRequestInvalidRequest(): void
//    {
//        $path = 'Index\Controller';
//
//        $router = new Router();
//        $router->createRequest($path);
//
//        $this->assertEmpty($router->getRequestParameters());
//        $this->assertTrue(
//            $router->getRequestMethod() === 'GET' && $router->getRequestUrl() === 'Application\\'
//            . Settings::DEFAULT_PAGE && $router->getRequestErrorCode() === ErrorCodes::VALUE_OBJECT_NOT_VALID
//        );
//    }
//
//    public function testCreateRequestIndexPostWithoutParameters(): void
//    {
//        $path   = 'Index';
//        $method = 'POST';
//
//        $router = new Router();
//        $router->createRequest($path, $method);
//
//        $this->assertEmpty($router->getRequestParameters());
//        $this->assertTrue(
//            $router->getRequestMethod() === 'POST' && $router->getRequestUrl() === null
//            && $router->getRequestErrorCode() === ErrorCodes::NO_ERROR
//        );
//    }
}
