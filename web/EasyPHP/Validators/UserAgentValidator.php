<?php

declare(strict_types=1);
/**
 * UserAgent.php class file.
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
 * Class UserAgent.
 */
class UserAgentValidator implements IStringValidator
{
    /**
     *  Check user agent is valid.
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
            ],
        ];

        return filter_var($value, FILTER_SANITIZE_STRING, $options) !== null;
    }
}
