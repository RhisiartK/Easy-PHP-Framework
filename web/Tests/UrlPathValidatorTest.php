<?php
declare(strict_types=1);

include __DIR__ . './../EasyPHP/Interfaces/IValidator.php';
include __DIR__ . './../EasyPHP/Validators/UrlPath.php';

use EasyPHP\Validators\UrlPath;
use phpDocumentor\Reflection\Types\Void_;
use PHPUnit\Framework\TestCase;

/**
 * UrlPathValidatorTest.php class file.
 *
 * @author Richard Keki <kricsi14@gmail.com>
 * @link https://github.com/RhisiartK/Easy-PHP-Framework
 * @license https://github.com/RhisiartK/Easy-PHP-Framework/blob/master/LICENSE
 */
final class UrlPathValidatorTest extends TestCase
{
    public function testCanBeCreated(): void
    {
        $this->assertInstanceOf(
            UrlPath::class,
            new UrlPath()
        );
    }

    public function testIsValidMethodExist(): void
    {
        $validator = new UrlPath();

        $this->assertTrue(method_exists($validator, 'isValid'));
    }

    public function testValidUrlPaths(): void
    {
        $validator = new UrlPath();

        $this->assertTrue($validator->isValid('Test/User/12'));
    }

    public function testInvalidUrlPaths(): void
    {
        $validator = new UrlPath();

        $this->assertFalse($validator->isValid('Test?var=12'));
    }

    public function testNullUrlPath(): void
    {
        $validator = new UrlPath();

        $this->assertFalse($validator->isValid(null));
    }

    public function testEmptyUrlPath(): void
    {
        $validator = new UrlPath();

        $this->assertTrue($validator->isValid(''));
    }

    public function testFalseUrlPath(): void
    {
        $validator = new UrlPath();

        $this->assertFalse($validator->isValid(false));
    }

    public function testTooLongUrlPath(): void
    {
        $validator = new UrlPath();

        $this->assertFalse($validator->isValid('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam viverra augue sit amet ante vestibulum gravida. Pellentesque condimentum dolor ut enim mollis hendrerit.'));
    }

}
