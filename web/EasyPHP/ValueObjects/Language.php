<?php
declare(strict_types=1);
/**
 * Language.php class file.
 *
 * @author Richard Keki <kricsi14@gmail.com>
 * @link https://github.com/RhisiartK/Easy-PHP-Framework
 * @license https://github.com/RhisiartK/Easy-PHP-Framework/blob/master/LICENSE
 */

namespace EasyPHP\ValueObjects;

use EasyPHP\Core\ValueObject;
use EasyPHP\Interfaces\IValidator;
use EasyPHP\Validators\Language as LanguageValidator;
use EasyPHP\Core\ErrorCodes;

class Language extends ValueObject
{
    /**
     * @var ?string
     */
    private $value;

    /**
     * Language constructor.
     * @param string $value
     * @param IValidator|null $validator
     */
    public function __construct(string $value, IValidator $validator = null)
    {
        $this->validator = $validator ?? new LanguageValidator();

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