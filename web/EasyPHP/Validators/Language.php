<?php
declare(strict_types=1);
/**
 * Language.php class file.
 *
 * @author Richard Keki <kricsi14@gmail.com>
 * @link https://github.com/RhisiartK/Easy-PHP-Framework
 * @license https://github.com/RhisiartK/Easy-PHP-Framework/blob/master/LICENSE
 */

namespace EasyPHP\Validators;

use EasyPHP\Core\Settings;
use EasyPHP\Interfaces\IStringValidator;

class Language implements IStringValidator
{
    private $validLanguages = Settings::AVAILABLELANGUAGES;

    /**
     * Check language is valid
     *
     * @param $value
     * @return bool
     */
    public function isValid(string $value): bool
    {
        $options = [
            'options' => [
                'default' => null,
                'regexp'  => '/^[a-zA-Z-]{2,5}$/',
            ],
        ];

        return filter_var($value, FILTER_VALIDATE_REGEXP, $options) !== null
            && in_array($value, $this->validLanguages);
    }
}
