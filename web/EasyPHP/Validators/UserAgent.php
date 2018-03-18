<?php
declare(strict_types=1);
/**
 * UserAgent.php class file.
 *
 * @author Richard Keki <kricsi14@gmail.com>
 * @link https://github.com/RhisiartK/Easy-PHP-Framework
 * @license https://github.com/RhisiartK/Easy-PHP-Framework/blob/master/LICENSE
 */

namespace EasyPHP\Validators;

use EasyPHP\Interfaces\IValidator;

/**
 * Class UserAgent
 * @package EasyPHP\Validators
 */
class UserAgent implements IValidator
{

    /**
     *  Check user agent is valid
     *
     * @param $value
     * @return bool
     */
    public function isValid($value): bool
    {
        $options = [
            'options' => [
                'default' => null
            ]
        ];

        return \is_string($value) && filter_var($value, FILTER_SANITIZE_STRING, $options) !== null;
    }
}
