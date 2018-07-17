<?php

declare(strict_types=1);

namespace Test;

use EasyPHP\Core\ErrorCodes;
use EasyPHP\Core\ValueObject;
use EasyPHP\ValueObjects\IpAddress;
use PHPUnit\Framework\TestCase;

/**
 * IpAddressValueObjectTes.php class file.
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
final class IpAddressValueObjectTest extends TestCase
{
    public function testInheritFromValueObject(): void
    {
        $this->assertInstanceOf(
            ValueObject::class,
            new IpAddress('')
        );
    }

    public function testSetMethodExist(): void
    {
        $this->assertTrue(method_exists(\EasyPHP\ValueObjects\IpAddress::class, 'set'));
    }

    public function testGetMethodExist(): void
    {
        $this->assertTrue(method_exists(\EasyPHP\ValueObjects\IpAddress::class, 'get'));
    }

    public function testSetErrorCodeMethodExist(): void
    {
        $this->assertTrue(method_exists(\EasyPHP\ValueObjects\IpAddress::class, 'setErrorCode'));
    }

    public function testGetErrorCodeMethodExist(): void
    {
        $this->assertTrue(method_exists(\EasyPHP\ValueObjects\IpAddress::class, 'getErrorCode'));
    }

    public function testEmptyStringInput(): void
    {
        $valueObject = new IpAddress('');
        $this->assertNull($valueObject->get());
        $this->assertEquals(ErrorCodes::VALUE_OBJECT_NOT_VALID, $valueObject->getErrorCode());
    }

    public function testIpv4StringInput(): void
    {
        $valueObject = new IpAddress('172.16.254.1');
        $this->assertEquals('172.16.254.1', $valueObject->get());
        $this->assertEquals(ErrorCodes::NO_ERROR, $valueObject->getErrorCode());
    }

    public function testIpv6StringInput(): void
    {
        $valueObject = new IpAddress('2001:0db8:85a3:0000:0000:8a2e:0370:7334');
        $this->assertEquals('2001:0db8:85a3:0000:0000:8a2e:0370:7334', $valueObject->get());
        $this->assertEquals(ErrorCodes::NO_ERROR, $valueObject->getErrorCode());
    }

    public function testInvalidIpv4StringInput(): void
    {
        $valueObject = new IpAddress('172.16.254.');
        $this->assertNull($valueObject->get());
        $this->assertEquals(ErrorCodes::VALUE_OBJECT_NOT_VALID, $valueObject->getErrorCode());
    }

    public function testInvalidStringIntInput(): void
    {
        $valueObject = new IpAddress('172162541');
        $this->assertNull($valueObject->get());
        $this->assertEquals(ErrorCodes::VALUE_OBJECT_NOT_VALID, $valueObject->getErrorCode());
    }

    public function testInvalidIpv6StringInput(): void
    {
        $valueObject = new IpAddress('2001:0db8:85a3:0000:0000:8a2e:0370');
        $this->assertNull($valueObject->get());
        $this->assertEquals(ErrorCodes::VALUE_OBJECT_NOT_VALID, $valueObject->getErrorCode());
    }

    public function testInvalidIpv6StringInputNoHypen(): void
    {
        $valueObject = new IpAddress('20010db885a3000000008a2e03707334');
        $this->assertNull($valueObject->get());
        $this->assertEquals(ErrorCodes::VALUE_OBJECT_NOT_VALID, $valueObject->getErrorCode());
    }

    public function testInvalidStringInput(): void
    {
        $valueObject = new IpAddress('IpAddress');
        $this->assertNull($valueObject->get());
        $this->assertEquals(ErrorCodes::VALUE_OBJECT_NOT_VALID, $valueObject->getErrorCode());
    }
}
