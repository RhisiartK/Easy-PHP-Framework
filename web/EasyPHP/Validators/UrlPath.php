<?php
declare(strict_types=1);
/**
 * UrlPath.php class file.
 *
 * @author Richard Keki <kricsi14@gmail.com>
 * @link https://github.com/RhisiartK/Easy-PHP-Framework
 * @license https://github.com/RhisiartK/Easy-PHP-Framework/blob/master/LICENSE
 */

namespace EasyPHP\Validators;

use EasyPHP\Interfaces\IStringValidator;
use EasyPHP\Interfaces\IValidator;

/**
 * Class UrlPath
 * @package EasyPHP\Validators
 */
class UrlPath implements IStringValidator
{

    /**
     *  Check url path is valid
     *
     * @param string $value
     * @return bool
     */
    public function isValid(string $value): bool
    {
        $options = [
            'options' => [
                'default' => null,
                'regexp'  => '/^[0-9a-zA-Z\-_\/]{0,128}$/'
            ]
        ];

        return filter_var($value, FILTER_VALIDATE_REGEXP, $options) !== null;
    }
}
