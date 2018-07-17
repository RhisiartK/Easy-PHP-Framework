<?php

declare(strict_types=1);
/**
 * Identity.php class file.
 *
 * @author Richard Keki <kricsi14@gmail.com>
 *
 * @link https://github.com/RhisiartK/Easy-PHP-Framework
 *
 * @license https://github.com/RhisiartK/Easy-PHP-Framework/blob/master/LICENSE
 */

namespace EasyPHP\Validators;

use EasyPHP\Interfaces\IValidator;

/**
 * Class Identity.
 */
class Identity implements IValidator
{
    /**
     *  Check identity is valid.
     *
     * @param $value
     *
     * @return bool
     */
    public function isValid($value): bool
    {
        $options = [
            'options' => [
                'default'   => null,
                'min_range' => 1,
                'max_range' => PHP_INT_MAX,
            ],
        ];

        return (\is_int($value) || \is_string($value)) && filter_var($value, FILTER_VALIDATE_INT, $options) !== null;
    }
}
