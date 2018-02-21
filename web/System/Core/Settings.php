<?php
/**
 * Settings class file.
 *
 * @author Richard Keki <kricsi14@gmail.com>
 * @link https://github.com/RhisiartK/Easy-PHP-Framework
 * @license https://github.com/RhisiartK/Easy-PHP-Framework/blob/master/LICENSE
 */
declare(strict_types=1);

namespace EasyPHP\System\Core;

/**
 * Settings of web page and framework
 *
 * @package System\Core
 */
class Settings
{

    /**
     * The Data Source Name, or DSN, contains the information required to connect to the database.
     */
    const DB_DSN      = 'mysql:host=localhost;dbname=DATABASE_NAME;charset=utf8_bin';
    /**
     * The user name for the DSN string.
     */
    const DB_USERNAME = 'DATABASE_USER';
    /**
     * The password for the DSN string
     */
    const DB_PASSWORD = 'DATABASE_PASSWORD';
}
