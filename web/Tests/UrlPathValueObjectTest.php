<?php
declare(strict_types=1);

include __DIR__ . './../EasyPHP/Core/ValueObject.php';
include __DIR__ . './../EasyPHP/Core/ErrorCodes.php';
include __DIR__ . './../EasyPHP/ValueObjects/UrlPath.php';

use EasyPHP\ValueObjects\UrlPath;
use EasyPHP\Core\ErrorCodes;
use PHPUnit\Framework\TestCase;

/**
 * UrlPathValueObjectTest.php class file.
 *
 * @author Richard Keki <kricsi14@gmail.com>
 * @link https://github.com/RhisiartK/Easy-PHP-Framework
 * @license https://github.com/RhisiartK/Easy-PHP-Framework/blob/master/LICENSE
 */
class UrlPathValueObjectTest extends TestCase
{
    public function testCanBeCreatedFromEmptyString(): void
    {
        $this->assertInstanceOf(
            UrlPath::class,
            new UrlPath('')
        );
    }

    public function testCanBeCreatedFromValidString(): void
    {
        $this->assertInstanceOf(
            UrlPath::class,
            new UrlPath('Test/User/12')
        );
    }

    public function testCanBeCreatedFromInvalidString(): void
    {
        $this->assertInstanceOf(
            UrlPath::class,
            new UrlPath('Test?var=12')
        );
    }

    public function testCanBeCreatedFromTooLongUrlPath(): void
    {
        $this->assertInstanceOf(
            UrlPath::class,
            new UrlPath('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam viverra augue sit amet ante vestibulum gravida. Pellentesque condimentum dolor ut enim mollis hendrerit.')
        );
    }

    public function testValidStringCreatedFromValidUrlPath(): void
    {
        $this->assertEquals(
            'TestCase/12/NewTest',
            (new UrlPath('Test-Case/12/New-Test'))->getValue()
        );
    }

    public function testEmptyStringCreatedFromInvalidUrlPath(): void
    {
        $this->assertEmpty(
            (new UrlPath('Test-Case/12/New-Test\\'))->getValue()
        );
    }

    public function testErrorCodeFromInvalidUrlPath(): void
    {
        $this->assertEquals(
            ErrorCodes::VALUE_OBJECT_NOT_VALID,
            (new UrlPath('Test-Case/12/New-Test\\'))->getErrorCode()
        );
    }

    public function testErrorCodeFromValidUrlPath(): void
    {
        $this->assertEquals(
            ErrorCodes::NO_ERROR,
            (new UrlPath('Test-Case/12/New-Test'))->getErrorCode()
        );
    }

    public function testCannotBeCreatedFromInvalidUrlPath(): void
    {
        $this->assertEmpty(
            (new UrlPath('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam viverra augue sit amet ante vestibulum gravida. Pellentesque condimentum dolor ut enim mollis hendrerit.'))->getValue()
        );
    }
}
