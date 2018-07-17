<?php

declare(strict_types=1);

namespace Test;

use EasyPHP\Core\ErrorCodes;
use EasyPHP\Core\ValueObject;
use EasyPHP\ValueObjects\UnixTimeStamp;
use PHPUnit\Framework\TestCase;

/**
 * UnixTimeStampValueObjectTest.php class file.
 *
 * 1. Test the class inherited from ValueObject
 * 2. Test methods exist
 * 3. Test valid and invalid input types: int, empty string, string, arrays (empty, int, string, string int),
 *    null, bool, empty input
 * 3.1. Test all method with the inputs
 *
 * @author Richard Keki <kricsi14@gmail.com>
 *
 * @link https://github.com/RhisiartK/Easy-PHP-Framework
 *
 * @license https://github.com/RhisiartK/Easy-PHP-Framework/blob/master/LICENSE
 */
final class UnixTimeStampValueObjectTest extends TestCase
{
    public function testInheritFromValueObject(): void
    {
        $this->assertInstanceOf(
            ValueObject::class,
            new UnixTimeStamp('')
        );
    }

    public function testSetMethodExist(): void
    {
        $this->assertTrue(method_exists(\EasyPHP\ValueObjects\Identity::class, 'set'));
    }

    public function testGetMethodExist(): void
    {
        $this->assertTrue(method_exists(\EasyPHP\ValueObjects\Identity::class, 'get'));
    }

    public function testSetErrorCodeMethodExist(): void
    {
        $this->assertTrue(method_exists(\EasyPHP\ValueObjects\Identity::class, 'setErrorCode'));
    }

    public function testGetErrorCodeMethodExist(): void
    {
        $this->assertTrue(method_exists(\EasyPHP\ValueObjects\Identity::class, 'getErrorCode'));
    }

    public function testIntInput(): void
    {
        $valueObject = new UnixTimeStamp(1);
        $this->assertEquals(1, $valueObject->get());
        $this->assertEquals(ErrorCodes::NO_ERROR, $valueObject->getErrorCode());
    }

    public function testStringIntInput(): void
    {
        $valueObject = new UnixTimeStamp('1');
        $this->assertEquals(1, $valueObject->get());
        $this->assertEquals(ErrorCodes::NO_ERROR, $valueObject->getErrorCode());
    }

    public function testMaxIntInput(): void
    {
        $valueObject = new UnixTimeStamp(PHP_INT_MAX);
        $this->assertEquals(PHP_INT_MAX, $valueObject->get());
        $this->assertEquals(ErrorCodes::NO_ERROR, $valueObject->getErrorCode());
    }

    public function testEmptyStringInput(): void
    {
        $valueObject = new UnixTimeStamp('');
        $this->assertNull($valueObject->get());
        $this->assertEquals(ErrorCodes::VALUE_OBJECT_NOT_VALID, $valueObject->getErrorCode());
    }

    public function testInvalidIntInput(): void
    {
        $valueObject = new UnixTimeStamp(0);
        $this->assertEquals(0, $valueObject->get());
        $this->assertEquals(ErrorCodes::NO_ERROR, $valueObject->getErrorCode());
    }

    public function testStringInput(): void
    {
        $valueObject = new UnixTimeStamp('identity');
        $this->assertNull($valueObject->get());
        $this->assertEquals(ErrorCodes::VALUE_OBJECT_NOT_VALID, $valueObject->getErrorCode());
    }

    public function testInvalidStringIntInput(): void
    {
        $valueObject = new UnixTimeStamp('0');
        $this->assertEquals(0, $valueObject->get());
        $this->assertEquals(ErrorCodes::NO_ERROR, $valueObject->getErrorCode());
    }

    public function testNullInput(): void
    {
        $valueObject = new UnixTimeStamp(null);
        $this->assertNull($valueObject->get());
        $this->assertEquals(ErrorCodes::VALUE_OBJECT_NOT_VALID, $valueObject->getErrorCode());
    }

    public function testTrueInput(): void
    {
        $valueObject = new UnixTimeStamp(true);
        $this->assertNull($valueObject->get());
        $this->assertEquals(ErrorCodes::VALUE_OBJECT_NOT_VALID, $valueObject->getErrorCode());
    }

    public function testFalseInput(): void
    {
        $valueObject = new UnixTimeStamp(false);
        $this->assertNull($valueObject->get());
        $this->assertEquals(ErrorCodes::VALUE_OBJECT_NOT_VALID, $valueObject->getErrorCode());
    }

    public function testMaxPlusOneIntInput(): void
    {
        $valueObject = new UnixTimeStamp(PHP_INT_MAX + 1);
        $this->assertNull($valueObject->get());
        $this->assertEquals(ErrorCodes::VALUE_OBJECT_NOT_VALID, $valueObject->getErrorCode());
    }

    public function testFloatInput(): void
    {
        $valueObject = new UnixTimeStamp(1.1);
        $this->assertNull($valueObject->get());
        $this->assertEquals(ErrorCodes::VALUE_OBJECT_NOT_VALID, $valueObject->getErrorCode());
    }

    public function testEmptyArrayInput(): void
    {
        $valueObject = new UnixTimeStamp([]);
        $this->assertNull($valueObject->get());
        $this->assertEquals(ErrorCodes::VALUE_OBJECT_NOT_VALID, $valueObject->getErrorCode());
    }

    public function testStringArrayInput(): void
    {
        $valueObject = new UnixTimeStamp(['identity']);
        $this->assertNull($valueObject->get());
        $this->assertEquals(ErrorCodes::VALUE_OBJECT_NOT_VALID, $valueObject->getErrorCode());
    }

    public function testIntArrayInput(): void
    {
        $valueObject = new UnixTimeStamp([1]);
        $this->assertNull($valueObject->get());
        $this->assertEquals(ErrorCodes::VALUE_OBJECT_NOT_VALID, $valueObject->getErrorCode());
    }

    public function testStringIntArrayInput(): void
    {
        $valueObject = new UnixTimeStamp(['1']);
        $this->assertNull($valueObject->get());
        $this->assertEquals(ErrorCodes::VALUE_OBJECT_NOT_VALID, $valueObject->getErrorCode());
    }
}
