<?php
declare(strict_types=1);
/**
 * ValueObject.php class file.
 *
 * @author Richard Keki <kricsi14@gmail.com>
 * @link https://github.com/RhisiartK/Easy-PHP-Framework
 * @license https://github.com/RhisiartK/Easy-PHP-Framework/blob/master/LICENSE
 */

namespace EasyPHP\Core;

use EasyPHP\Interfaces\IValidator;

class ValueObject
{
    /**
     * @var $errorCode int
     */
    protected $errorCode = ErrorCodes::NO_ERROR;
    /**
     * @var IValidator
     */
    protected $validator;

    /**
     * @param int $errorCode
     */
    protected function setErrorCode(int $errorCode): void
    {
        $this->errorCode = $errorCode;
    }

    /**
     * @return int
     */
    public function getErrorCode(): int
    {
        return $this->errorCode;
    }
}
