<?php

declare(strict_types=1);
/**
 * UnixTimeStamp.php class file.
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
use EasyPHP\Interfaces\IValidator;
use EasyPHP\Validators\UnixTimeStamp as UnixTimeStampValidator;

class UnixTimeStamp extends ValueObject
{
    /**
     * @var ?int
     */
    private $value;

    /**
     * UnixTimeStamp constructor.
     *
     * @param string|int|null $value
     * @param IValidator|null $validator
     */
    public function __construct($value, IValidator $validator = null)
    {
        if ($value !== null) {
            $this->validator = $validator ?? new UnixTimeStampValidator();
            $this->set($value);
        } else {
            $this->errorCode = ErrorCodes::VALUE_OBJECT_NOT_VALID;
        }
    }

    /**
     * @param string|int $value
     */
    private function set($value): void
    {
        if ($this->validator->isValid($value) === true) {
            $this->value = (int) $value;

            return;
        }

        $this->value     = null;
        $this->errorCode = ErrorCodes::VALUE_OBJECT_NOT_VALID;
    }

    public function get(): ?int
    {
        return $this->value;
    }
}
