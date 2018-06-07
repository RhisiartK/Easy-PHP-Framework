<?php
/**
 * Database class file.
 *
 * @author Richard Keki <kricsi14@gmail.com>
 * @link https://github.com/RhisiartK/Easy-PHP-Framework
 * @license https://github.com/RhisiartK/Easy-PHP-Framework/blob/master/LICENSE
 */

namespace EasyPHP\Core;

use \PDO;

/**
 * Class Database
 * @package System\Core
 */
class Database extends PDO
{
    /**
     * @var Database Database singleton instance
     */
    private static $instance;

    /**
     * Get database singleton
     *
     * @return Database
     */
    public static function instance(): Database
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    /**
     * Database constructor
     *
     * Creating PDO database connection using Settings::DB_DSN,
     * Settings::DB_USERNAME, Settings::DB_PASSWORD with
     * PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'",
     * PDO::MYSQL_ATTR_FOUND_ROWS => true, PDO::ATTR_ERRMODE =>
     * PDO::ERRMODE_EXCEPTION
     */
    public function __construct()
    {
        parent::__construct(
            Settings::DB_DSN,
            Settings::DB_USERNAME,
            Settings::DB_PASSWORD,
            [
                PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8mb4'",
                PDO::MYSQL_ATTR_FOUND_ROWS => true,
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_PERSISTENT => false,
                PDO::ATTR_EMULATE_PREPARES => false
            ]
        );
    }
}
