<?php
declare(strict_types=1);
/**
 * Md5.php class file.
 *
 * @author Richard Keki <kricsi14@gmail.com>
 * @link https://github.com/RhisiartK/Easy-PHP-Framework
 * @license https://github.com/RhisiartK/Easy-PHP-Framework/blob/master/LICENSE
 */

namespace EasyPHP\ValueObjects;

use EasyPHP\Core\ValueObject;
use EasyPHP\Interfaces\IValidator;
use EasyPHP\Validators\Md5 as Md5Validator;
use EasyPHP\Core\ErrorCodes;

class Md5 extends ValueObject
{
    /**
     * @var ?string
     */
    private $value;

    /**
     * Md5 constructor.
     * @param string $value
     * @param IValidator|null $validator
     */
    public function __construct(string $value, IValidator $validator = null)
    {
        $this->validator = $validator ?? new Md5Validator();

        if ($value !== null) {
            $this->set($value);
        } else {
            $this->errorCode = ErrorCodes::VALUE_OBJECT_NOT_VALID;
        }
    }

    /**
     * @param string $value
     * @return void
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