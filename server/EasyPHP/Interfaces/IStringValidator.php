<?php

declare(strict_types=1);
/**
 * IStringValidator.php class file.
 *
 * @author Richard Keki <kricsi14@gmail.com>
 *
 * @link https://github.com/RhisiartK/Easy-PHP-Framework
 *
 * @license https://github.com/RhisiartK/Easy-PHP-Framework/blob/master/LICENSE
 */

namespace EasyPHP\Interfaces;

/**
 * Interface IStringValidator.
 *
 * Interface for all value object validator
 */
interface IStringValidator
{
    /**
     * Validate $value.
     *
     * @param string $value
     *
     * @return bool
     */
    public function isValid(string $value): bool;
}
