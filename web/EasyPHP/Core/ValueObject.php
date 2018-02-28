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

class ValueObject
{
    protected $_value;
    /**
     * @var $_errorCode int
     */
    protected $_errorCode = 0;
    protected $_validator;
    /**
     * @var string
     */
    protected $_tmpFileName;

    /**
     * ValueObject constructor.
     *
     * @param null $value
     */
    public function __construct($value = NULL)
    {
        $this->set($value);
    }

    public function getValue()
    {
        return $this->_value;
    }

    /**
     * @param int $errorCode
     */
    public function setErrorCode(int $errorCode): void
    {
        $this->_errorCode = $errorCode;
    }

    /**
     * @return int
     */
    public function getErrorCode(): int
    {
        return $this->_errorCode;
    }

    /**
     * @return string
     */
    public function getTmpFileName(): string
    {
        return $this->_tmpFileName;
    }
}
