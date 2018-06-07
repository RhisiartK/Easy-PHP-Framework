<?php
declare(strict_types=1);
/**
 * PoliciesAccepted.php class file.
 *
 * @author Richard Keki <kricsi14@gmail.com>
 * @link https://github.com/RhisiartK/Easy-PHP-Framework
 * @license https://github.com/RhisiartK/Easy-PHP-Framework/blob/master/LICENSE
 */

namespace EasyPHP\ValueObjects;

use EasyPHP\Core\ErrorCodes;
use EasyPHP\Core\ValueObject;
use EasyPHP\Interfaces\IValidator;
use EasyPHP\Validators\PoliciesAccepted as PoliciesAcceptedValidator;

class PoliciesAccepted extends ValueObject
{
    /**
     * @var ?bool
     */
    private $value;

    /**
     * PoliciesAccepted constructor.
     * @param string|bool|int|null $value
     * @param IValidator|null $validator
     */
    public function __construct($value, IValidator $validator = null)
    {
        if ($value !== null) {
            $this->validator = $validator ?? new PoliciesAcceptedValidator();
            $this->set($value);
        } else {
            $this->errorCode = ErrorCodes::VALUE_OBJECT_NOT_VALID;
        }
    }

    /**
     * @param string|bool|int $value
     * @return void
     */
    private function set($value): void
    {
        if ($this->validator->isValid($value) === true) {
            $this->value = (bool)$value;
            return;
        }

        $this->value     = null;
        $this->errorCode = ErrorCodes::VALUE_OBJECT_NOT_VALID;
    }

    public function get(): ?bool
    {
        return $this->value;
    }
}
