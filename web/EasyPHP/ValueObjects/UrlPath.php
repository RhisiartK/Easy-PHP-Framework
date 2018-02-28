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
use EasyPHP\Core\ErrorCodes;

class UrlPath extends ValueObject
{
    /**
     * UrlPath constructor.
     * @param string $value
     * @param IValidator|null $validator
     */
    public function __construct(string $value, IValidator $validator = null)
    {
        $this->validator = $validator ?? new UrlPathValidator();

        $this->set($value);
    }

    /**
     * @param string $value
     * @return bool
     */
    private function set(string $value): void
    {
        if ($this->validator->isValid($value) === true)
        {
            $this->value = rtrim(str_replace('-', '', $value), '/');
            return;
        }

        $this->value = '';
        $this->errorCode = ErrorCodes::VALUE_OBJECT_NOT_VALID;
    }

    public function getValue(): string
    {
        return $this->value;
    }
}
