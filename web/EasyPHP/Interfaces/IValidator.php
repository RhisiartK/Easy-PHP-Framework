<?php
declare(strict_types=1);
/**
 * IValidator.php class file.
 *
 * @author Richard Keki <kricsi14@gmail.com>
 * @link https://github.com/RhisiartK/Easy-PHP-Framework
 * @license https://github.com/RhisiartK/Easy-PHP-Framework/blob/master/LICENSE
 */

namespace EasyPHP\Interfaces;

/**
 * Interface IValidator
 *
 * Interface for all value object validator
 *
 * @package EasyPHP\Interfaces
 */
interface IValidator
{
    /**
     * Validate $value
     *
     * @param $value
     * @return bool
     */
    public function isValid($value): bool;
}
