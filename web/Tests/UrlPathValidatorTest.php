<?php
declare(strict_types=1);

namespace Test;

use EasyPHP\Interfaces\IStringValidator;
use EasyPHP\Interfaces\IValidator;
use EasyPHP\Validators\UrlPath;
use PHPUnit\Framework\TestCase;

/**
 * UrlPathValidatorTest.php class file.
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
final class UrlPathValidatorTest extends TestCase
{
    public function testInheritFromValueObject(): void
    {
        $this->assertInstanceOf(
            IStringValidator::class,
            new UrlPath()
        );
    }

    public function testIsValidMethodExist(): void
    {
        $this->assertTrue(method_exists(\EasyPHP\Validators\UrlPath::class, 'isValid'));
    }

    public function testEmptyString(): void
    {
        $validator = new UrlPath();
        $this->assertTrue($validator->isValid(''));
    }

    public function testValidString(): void
    {
        $validator = new UrlPath();
        $this->assertTrue($validator->isValid('Test/User/12'));
    }

    public function testInvalidStringQuery(): void
    {
        $validator = new UrlPath();
        $this->assertFalse($validator->isValid('Test?var=12'));
    }

    public function testInvalidStringInputInvalidCharacter(): void
    {
        $validator = new UrlPath();
        $this->assertFalse($validator->isValid('Test-Case/12/New-Test\\'));
    }

    public function testInvalidStringTooLong(): void
    {
        $validator = new UrlPath();
        $this->assertFalse($validator->isValid('Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
            Aliquam viverra augue sit amet ante vestibulum gravida. 
            Pellentesque condimentum dolor ut enim mollis hendrerit.'));
    }

    public function testEmpty(): void
    {
        $validator = new UrlPath();
        $this->assertTrue($validator->isValid(''));
    }
}
