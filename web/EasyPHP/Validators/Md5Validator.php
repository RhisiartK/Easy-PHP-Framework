<?php

declare(strict_types=1);
/**
 * Md5.php class file.
 *
 * @author Richard Keki <kricsi14@gmail.com>
 *
 * @link https://github.com/RhisiartK/Easy-PHP-Framework
 *
 * @license https://github.com/RhisiartK/Easy-PHP-Framework/blob/master/LICENSE
 */

namespace EasyPHP\Validators;

use EasyPHP\Interfaces\IStringValidator;

/**
 * Class Md5.
 */
class Md5Validator implements IStringValidator
{
    /**
     *  Check md5 is valid.
     *
     * @param $value
     *
     * @return bool
     */
    public function isValid(string $value): bool
    {
        $options = [
            'options' => [
                'default' => null,
                'regexp'  => '/^[a-f0-9]{32}$/',
            ],
        ];

        return filter_var($value, FILTER_VALIDATE_REGEXP, $options) !== null;
    }
}
