<?php

declare(strict_types=1);
/**
 * UserAgent.php class file.
 *
 * @author  Richard Keki <kricsi14@gmail.com>
 *
 * @link    https://github.com/RhisiartK/Easy-PHP-Framework
 *
 * @license https://github.com/RhisiartK/Easy-PHP-Framework/blob/master/LICENSE
 */

namespace EasyPHP\ValueObjects;

use EasyPHP\Core\ErrorCodes;
use EasyPHP\Core\ValueObject;
use EasyPHP\Interfaces\IStringValidator;
use EasyPHP\Validators\UserAgentValidator;

class UserAgent extends ValueObject
{
    /**
     * @var ?string
     */
    private $value;

    /**
     * UserAgent constructor.
     *
     * @param string|null           $value
     * @param IStringValidator|null $validator
     */
    public function __construct(?string $value, IStringValidator $validator = null)
    {
        if ($value !== null) {
            $this->validator = $validator ?? new UserAgentValidator();
            $this->set($value);
        } else {
            $this->errorCode = ErrorCodes::VALUE_OBJECT_NOT_VALID;
        }
    }

    /**
     * @param string $value
     */
    private function set(string $value): void
    {
        if ($this->validator->isValid($value) === true) {
            $this->value = $value;

            return;
        }

        $this->value     = null;
        $this->errorCode = ErrorCodes::VALUE_OBJECT_NOT_VALID;
    }

    public function get(): ?string
    {
        return $this->value;
    }
}
