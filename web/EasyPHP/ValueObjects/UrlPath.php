<?php

declare(strict_types=1);
/**
 * UrlPath.php class file.
 *
 * @author Richard Keki <kricsi14@gmail.com>
 *
 * @link https://github.com/RhisiartK/Easy-PHP-Framework
 *
 * @license https://github.com/RhisiartK/Easy-PHP-Framework/blob/master/LICENSE
 */

namespace EasyPHP\ValueObjects;

use EasyPHP\Core\ErrorCodes;
use EasyPHP\Core\ValueObject;
use EasyPHP\Interfaces\IStringValidator;
use EasyPHP\Validators\UrlPath as UrlPathValidator;

class UrlPath extends ValueObject
{
    /**
     * @var ?string
     */
    private $value;

    /**
     * UrlPath constructor.
     *
     * @param string                $value
     * @param IStringValidator|null $validator
     */
    public function __construct(string $value, IStringValidator $validator = null)
    {
        $this->validator = $validator ?? new UrlPathValidator();
        $this->set($value);
    }

    /**
     * @param string $value
     *
     * @return void
     */
    private function set(string $value): void
    {
        if ($this->validator->isValid($value) === true) {
            $this->value = rtrim(str_replace('-', '', $value), '/');

            return;
        }

        $this->value = null;
        $this->errorCode = ErrorCodes::VALUE_OBJECT_NOT_VALID;
    }

    public function get(): ?string
    {
        return $this->value;
    }
}
