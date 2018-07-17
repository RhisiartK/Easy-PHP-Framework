<?php
declare(strict_types=1);

namespace Test;

use EasyPHP\Interfaces\IStringValidator;
use EasyPHP\Interfaces\IValidator;
use EasyPHP\Validators\IpAddress;
use PHPUnit\Framework\TestCase;

/**
 * IpAddressValidatorTest.php class file.
 *
 * 1. Test the class inherited from IValidator
 * 2. Test methods exist
 * 3. Test valid and invalid input types: int, empty string, string, arrays (empty, int, string, string int),
 *    null, bool, empty input
 * 3.1. Test all method with the inputs
 *
 * @author Richard Keki <kricsi14@gmail.com>
 * @link https://github.com/RhisiartK/Easy-PHP-Framework
 * @license https://github.com/RhisiartK/Easy-PHP-Framework/blob/master/LICENSE
 */
final class IpAddressValidatorTest extends TestCase
{
    public function testInheritFromValueObject(): void
    {
        $this->assertInstanceOf(
            IStringValidator::class,
            new IpAddress()
        );
    }

    public function testIsValidMethodExist(): void
    {
        $this->assertTrue(method_exists(\EasyPHP\Validators\IpAddress::class, 'isValid'));
    }

    public function testEmptyString(): void
    {
        $validator = new IpAddress();
        $this->assertFalse($validator->isValid(''));
    }

    public function testValidStringIpv4(): void
    {
        $validator = new IpAddress();
        $this->assertTrue($validator->isValid('172.16.254.1'));
    }

    public function testValidStringIpv6(): void
    {
        $validator = new IpAddress();
        $this->assertTrue($validator->isValid('2001:0db8:85a3:0000:0000:8a2e:0370:7334'));
    }

    public function testInvalidStringNotIpv4(): void
    {
        $validator = new IpAddress();
        $this->assertFalse($validator->isValid('172.16.254.'));
    }

    public function testInvalidStringIpv4MissingDots(): void
    {
        $validator = new IpAddress();
        $this->assertFalse($validator->isValid('172162541'));
    }

    public function testInvalidStringNotIpv6(): void
    {
        $validator = new IpAddress();
        $this->assertFalse($validator->isValid('2001:0db8:85a3:0000:0000:8a2e:0370'));
    }

    public function testInvalidStringIpv6MissingDots(): void
    {
        $validator = new IpAddress();
        $this->assertFalse($validator->isValid('20010db885a3000000008a2e03707334'));
    }

    public function testInvalidStringNotIpAddress(): void
    {
        $validator = new IpAddress();
        $this->assertFalse($validator->isValid('IpAddress'));
    }

    public function testEmpty(): void
    {
        $validator = new IpAddress();
        $this->assertFalse($validator->isValid(''));
    }
}
