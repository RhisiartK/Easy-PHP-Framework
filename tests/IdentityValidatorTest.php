<?php

declare(strict_types=1);

namespace Test;

use EasyPHP\Interfaces\IValidator;
use EasyPHP\Validators\IdentityValidator;
use PHPUnit\Framework\TestCase;

/**
 * IdentityValidatorTest.php class file.
 *
 * 1. Test the class inherited from IValidator
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
final class IdentityValidatorTest extends TestCase
{
    public function testInheritFromValueObject(): void
    {
        $this->assertInstanceOf(
            IValidator::class,
            new IdentityValidator()
        );
    }

    public function testIsValidMethodExist(): void
    {
        $this->assertTrue(method_exists(\EasyPHP\Validators\IdentityValidator::class, 'isValid'));
    }

    public function testEmptyString(): void
    {
        $validator = new IdentityValidator();
        $this->assertFalse($validator->isValid(''));
    }

    public function testValidInt(): void
    {
        $validator = new IdentityValidator();
        $this->assertTrue($validator->isValid(1));
    }

    public function testValidStringInt(): void
    {
        $validator = new IdentityValidator();
        $this->assertTrue($validator->isValid('1'));
    }

    public function testValidMaxInt(): void
    {
        $validator = new IdentityValidator();
        $this->assertTrue($validator->isValid(PHP_INT_MAX));
    }

    public function testInvalidInt(): void
    {
        $validator = new IdentityValidator();
        $this->assertFalse($validator->isValid(0));
    }

    public function testInvalidStringInt(): void
    {
        $validator = new IdentityValidator();
        $this->assertFalse($validator->isValid('0'));
    }

    public function testInvalidStringNotIpv6(): void
    {
        $validator = new IdentityValidator();
        $this->assertFalse($validator->isValid('identity'));
    }

    public function testNull(): void
    {
        $validator = new IdentityValidator();
        $this->assertFalse($validator->isValid(null));
    }

    public function testEmptyArray(): void
    {
        $validator = new IdentityValidator();
        $this->assertFalse($validator->isValid([]));
    }

    public function testStringIntArray(): void
    {
        $validator = new IdentityValidator();
        $this->assertFalse($validator->isValid(['1']));
    }

    public function testIntArray(): void
    {
        $validator = new IdentityValidator();
        $this->assertFalse($validator->isValid([1]));
    }

    public function testFloat(): void
    {
        $validator = new IdentityValidator();
        $this->assertFalse($validator->isValid(1.1));
    }

    public function testTrue(): void
    {
        $validator = new IdentityValidator();
        $this->assertFalse($validator->isValid(true));
    }

    public function testFalse(): void
    {
        $validator = new IdentityValidator();
        $this->assertFalse($validator->isValid(false));
    }

    public function testEmpty(): void
    {
        $validator = new IdentityValidator();
        $this->assertFalse($validator->isValid(''));
    }

    public function testMaxPlusOne(): void
    {
        $validator = new IdentityValidator();
        $this->assertFalse($validator->isValid(PHP_INT_MAX + 1));
    }
}
