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

    public function testValidUrlPaths(): void
    {
        $validator = new UrlPath();

        $this->assertEquals(
            true,
            $validator->isValid('Test/User/12')
        );
    }

    public function testInvalidUrlPaths(): void
    {
        $validator = new UrlPath();

        $this->assertEquals(
            false,
            $validator->isValid('Test?var=12')
        );
    }

    public function testNullUrlPath(): void
    {
        $validator = new UrlPath();

        $this->assertEquals(
            true,
            $validator->isValid(null)
        );
    }

    public function testEmptyUrlPath(): void
    {
        $validator = new UrlPath();

        $this->assertEquals(
            true,
            $validator->isValid('')
        );
    }

}
