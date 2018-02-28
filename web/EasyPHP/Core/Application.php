<?php
declare(strict_types=1);
/**
 * Application.php class file.
 *
 * @author Richard Keki <kricsi14@gmail.com>
 * @link https://github.com/RhisiartK/Easy-PHP-Framework
 * @license https://github.com/RhisiartK/Easy-PHP-Framework/blob/master/LICENSE
 */

namespace EasyPHP\Core;

class Application
{

    /**
     * Application constructor.
     */
    public function __construct()
    {
        spl_autoload_register('self::autoLoadCallBack');

        register_shutdown_function([$this, 'ErrorHandler']);

        error_reporting(Settings::ERROR_REPORTING);

        //        $router = new Router();

        //        $controllerName = $router->getRequestedPage() . '\\Controller';
        //        $methodName     = $router->getRequestedMethod();

        //        $_controller = new $controllerName($router->getRequestedPage());
        //        $_controller->$methodName($router->getRequestedParameters());
    }

    /**
     * Auto class loader
     *
     * @param string $className
     * @return bool
     */
    private static function autoLoadCallBack(string $className): bool
    {
        $filename = Settings::APPLICATION_PATH . str_replace("\\", '/',
                str_replace('EasyPHP\\', '', $className)) . '.php';
        if (file_exists($filename)) {
            require $filename;
            return true;
        }
        return false;
    }

    /**
     *
     */
    public static function ErrorHandler(): void
    {
        $error = error_get_last();
        if ($error !== null) {
            switch ($error['type']) {
                case E_ERROR:
                    $name = 'Fatal error';
                    Log::Error($name, $error);
                    include Settings::APPLICATION_PATH . 'Public/error/500.html';
                    break;
                case E_WARNING:
                    $name = 'Warning: ';
                    Log::Error($name, $error);
                    break;
                default:
                    $name = $error;
                    Log::Error($name, $error);
                    break;
            }
        }
    }
}
