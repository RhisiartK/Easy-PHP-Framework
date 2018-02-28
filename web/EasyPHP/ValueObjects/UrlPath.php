<?php
declare(strict_types=1);
/**
 * UrlPath.php class file.
 *
 * @author Richard Keki <kricsi14@gmail.com>
 * @link https://github.com/RhisiartK/Easy-PHP-Framework
 * @license https://github.com/RhisiartK/Easy-PHP-Framework/blob/master/LICENSE
 */

namespace EasyPHP\ValueObjects;

use EasyPHP\Core\ValueObject;
use EasyPHP\Interfaces\IValidator;
use EasyPHP\Validators\UrlPath as UrlPathValidator;

class UrlPath extends ValueObject
{
    /**
     * @param string $value
     * @param IValidator|null $validator
     */
    protected function set(string $value, IValidator $validator = null): void
    {
        $this->_validator = $validator ?? new UrlPathValidator();

        $this->_value = $this->_validator->validate($value) === true ?
            rtrim(str_replace('-', '', $value), '/') : null;
    }
}
