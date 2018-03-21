<?php
declare(strict_types=1);

namespace Test;

include_once __DIR__ . './../EasyPHP/Interfaces/IValidator.php';
include_once __DIR__ . './../EasyPHP/Validators/UnixTimeStamp.php';

use EasyPHP\Interfaces\IValidator;
use EasyPHP\Validators\UnixTimeStamp;
use PHPUnit\Framework\TestCase;

/**
 * UnixTimeStampTest.php class file.
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
final class UnixTimeStampTest extends TestCase
{
    public function testInheritFromValueObject(): void
    {
        $this->assertInstanceOf(
            IValidator::class,
            new UnixTimeStamp()
        );
    }

    public function testIsValidMethodExist(): void
    {
        $this->assertTrue(method_exists(\EasyPHP\Validators\UnixTimeStamp::class, 'isValid'));
    }

    public function testEmptyString(): void
    {
        $validator = new UnixTimeStamp();
        $this->assertFalse($validator->isValid(''));
    }

    public function testValidInt(): void
    {
        $validator = new UnixTimeStamp();
        $this->assertTrue($validator->isValid(1));
    }

    public function testValidStringInt(): void
    {
        $validator = new UnixTimeStamp();
        $this->assertTrue($validator->isValid('1'));
    }

    public function testValidMaxInt(): void
    {
        $validator = new UnixTimeStamp();
        $this->assertTrue($validator->isValid(PHP_INT_MAX));
    }

    public function testInvalidInt(): void
    {
        $validator = new UnixTimeStamp();
        $this->assertFalse($validator->isValid(0));
    }

    public function testInvalidStringInt(): void
    {
        $validator = new UnixTimeStamp();
        $this->assertFalse($validator->isValid('0'));
    }

    public function testNull(): void
    {
        $validator = new UnixTimeStamp();
        $this->assertFalse($validator->isValid(null));
    }

    public function testEmptyArray(): void
    {
        $validator = new UnixTimeStamp();
        $this->assertFalse($validator->isValid([]));
    }

    public function testStringIntArray(): void
    {
        $validator = new UnixTimeStamp();
        $this->assertFalse($validator->isValid(['1']));
    }

    public function testIntArray(): void
    {
        $validator = new UnixTimeStamp();
        $this->assertFalse($validator->isValid([1]));
    }

    public function testFloat(): void
    {
        $validator = new UnixTimeStamp();
        $this->assertFalse($validator->isValid(1.1));
    }

    public function testTrue(): void
    {
        $validator = new UnixTimeStamp();
        $this->assertFalse($validator->isValid(true));
    }

    public function testFalse(): void
    {
        $validator = new UnixTimeStamp();
        $this->assertFalse($validator->isValid(false));
    }

    public function testEmpty(): void
    {
        $validator = new UnixTimeStamp();
        $this->assertFalse($validator->isValid(''));
    }

    public function testMaxPlusOne(): void
    {
        $validator = new UnixTimeStamp();
        $this->assertFalse($validator->isValid(PHP_INT_MAX + 1));
    }

    public function testUnixTimeStamp(): void
    {
        $validator = new UnixTimeStamp();
        $this->assertTrue($validator->isValid(1521653259));
    }

}
