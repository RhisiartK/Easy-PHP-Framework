<?php

declare(strict_types=1);
/**
 * PoliciesAccepted.php class file.
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
 * Class PoliciesAccepted.
 */
class PoliciesAccepted implements IValidator
{
    /**
     *  Check policies accepted is valid (bool).
     *
     * @param $value
     *
     * @return bool
     */
    public function isValid($value): bool
    {
        $options = [
            'options' => [
                'default' => null,
            ],
            'flags'   => 'FILTER_NULL_ON_FAILURE',
        ];

        return (\is_bool($value) || \is_string($value) || \is_int($value))
            && filter_var($value, FILTER_VALIDATE_BOOLEAN, $options) !== null;
    }
}
