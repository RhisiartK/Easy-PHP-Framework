<?php
declare(strict_types=1);

namespace Test;

include_once __DIR__ . './../EasyPHP/Core/ValueObject.php';
include_once __DIR__ . './../EasyPHP/Core/ErrorCodes.php';
include_once __DIR__ . './../EasyPHP/ValueObjects/UrlPath.php';

use EasyPHP\Core\ValueObject;
use EasyPHP\ValueObjects\UrlPath;
use EasyPHP\Core\ErrorCodes;
use PHPUnit\Framework\TestCase;

/**
 * UrlPathValueObjectTest.php class file.
 *
 * 1. Test the class inherited from ValueObject
 * 2. Test methods exist
 * 3. Test valid and invalid input types: int, empty string, string, arrays (empty, int, string, string int), null,
 * bool, empty input
 * 3.1. Test all method with the inputs
 *
 * @author Richard Keki <kricsi14@gmail.com>
 * @link https://github.com/RhisiartK/Easy-PHP-Framework
 * @license https://github.com/RhisiartK/Easy-PHP-Framework/blob/master/LICENSE
 */
final class UrlPathValueObjectTest extends TestCase
{
    public function testInheritFromValueObject(): void
    {
        $this->assertInstanceOf(ValueObject::class, new UrlPath(''));
    }

    public function testSetMethodExist(): void
    {
        $this->assertTrue(method_exists(\EasyPHP\ValueObjects\UrlPath::class, 'set'));
    }

    public function testGetMethodExist(): void
    {
        $this->assertTrue(method_exists(\EasyPHP\ValueObjects\UrlPath::class, 'get'));
    }

    public function testSetErrorCodeMethodExist(): void
    {
        $this->assertTrue(method_exists(\EasyPHP\ValueObjects\UrlPath::class, 'setErrorCode'));
    }

    public function testGetErrorCodeMethodExist(): void
    {
        $this->assertTrue(method_exists(\EasyPHP\ValueObjects\UrlPath::class, 'getErrorCode'));
    }

    public function testEmptyStringInput(): void
    {
        $valueObject = new UrlPath('');
        $this->assertEmpty($valueObject->get());
        $this->assertEquals(ErrorCodes::NO_ERROR, $valueObject->getErrorCode());
    }

    public function testValidStringInput(): void
    {
        $valueObject = new UrlPath('Test/User/12');
        $this->assertEquals('Test/User/12', $valueObject->get());
        $this->assertEquals(ErrorCodes::NO_ERROR, $valueObject->getErrorCode());
    }

    public function testInvalidStringInputQuery(): void
    {
        $valueObject = new UrlPath('Test?var=12');
        $this->assertNull($valueObject->get());
        $this->assertEquals(ErrorCodes::VALUE_OBJECT_NOT_VALID, $valueObject->getErrorCode());
    }

    public function testInvalidStringInputInvalidCharacter(): void
    {
        $valueObject = new UrlPath('Test-Case/12/New-Test\\');
        $this->assertNull($valueObject->get());
        $this->assertEquals(ErrorCodes::VALUE_OBJECT_NOT_VALID, $valueObject->getErrorCode());
    }

    public function testInvalidStringTooLong(): void
    {
        $valueObject = new UrlPath('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam viverra 
        augue sit amet ante vestibulum gravida. Pellentesque condimentum dolor ut enim mollis hendrerit.');
        $this->assertNull($valueObject->get());
        $this->assertEquals(ErrorCodes::VALUE_OBJECT_NOT_VALID, $valueObject->getErrorCode());
    }
}
