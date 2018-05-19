<?php
declare(strict_types=1);

namespace Test;

use EasyPHP\Interfaces\IStringValidator;
use EasyPHP\Validators\Language;
use PHPUnit\Framework\TestCase;

/**
 * LanguageValidatorTest.php class file.
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
final class LanguageValidatorTest extends TestCase
{
    public function testInheritFromValueObject(): void
    {
        $this->assertInstanceOf(
            IStringValidator::class,
            new Language()
        );
    }

    public function testIsValidMethodExist(): void
    {
        $this->assertTrue(method_exists(\EasyPHP\Validators\Language::class, 'isValid'));
    }

    public function testEmptyString(): void
    {
        $validator = new Language();
        $this->assertFalse($validator->isValid(''));
    }

    public function testValidStringShort(): void
    {
        $validator = new Language();
        $this->assertTrue($validator->isValid('en'));
    }

    public function testInvalidStringLong(): void
    {
        $validator = new Language();
        $this->assertTrue($validator->isValid('en-GB'));
    }

    public function testInvalidStringNotLanguage(): void
    {
        $validator = new Language();
        $this->assertFalse($validator->isValid('Language'));
    }

    public function testInvalidStringNotAllowed(): void
    {
        $validator = new Language();
        $this->assertFalse($validator->isValid('ru'));
    }

    public function testInvalidStringTooLong(): void
    {
        $validator = new Language();
        $this->assertFalse($validator->isValid('en-GB '));
    }

    public function testEmpty(): void
    {
        $validator = new Language();
        $this->assertFalse($validator->isValid(''));
    }
}
