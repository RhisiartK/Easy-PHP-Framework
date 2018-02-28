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
    protected $value;
    /**
     * @var $errorCode int
     */
    protected $errorCode = 0;
    /**
     * @var IValidator
     */
    protected $validator;
    /**
     * @var string
     */
    protected $_tmpFileName;

    /**
     * @param int $errorCode
     */
    public function setErrorCode(int $errorCode): void
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

    /**
     * @return string
     */
    public function getTmpFileName(): string
    {
        return $this->_tmpFileName;
    }
}
