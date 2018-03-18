<?php
declare(strict_types=1);
/**
 * IpAddress.php class file.
 *
 * @author Richard Keki <kricsi14@gmail.com>
 * @link https://github.com/RhisiartK/Easy-PHP-Framework
 * @license https://github.com/RhisiartK/Easy-PHP-Framework/blob/master/LICENSE
 */

namespace EasyPHP\Validators;

use EasyPHP\Interfaces\IValidator;

/**
 * Class IpAddress
 * @package EasyPHP\Validators
 */
class IpAddress implements IValidator
{
    /**
     *  Check ip address is valid
     *
     * @param $value
     * @return bool
     */
    public function isValid($value): bool
    {
        $options = [
            'options' => [
                'default' => null,
            ],
        ];

        return \is_string($value) && filter_var($value, FILTER_VALIDATE_IP, $options) !== null;
    }
}
