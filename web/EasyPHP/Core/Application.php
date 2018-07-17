<?php

declare(strict_types=1);
/**
 * Application.php class file.
 *
 * @author Richard Keki <kricsi14@gmail.com>
 *
 * @link https://github.com/RhisiartK/Easy-PHP-Framework
 *
 * @license https://github.com/RhisiartK/Easy-PHP-Framework/blob/master/LICENSE
 */

namespace EasyPHP\Core;

/**
 * Class Application.
 */
class Application
{
    public $sessionManager;

    /**
     * Application constructor.
     */
    public function __construct()
    {
        spl_autoload_register('self::autoLoadCallBack');

        register_shutdown_function([$this, 'errorHandler']);

        error_reporting(Settings::ERROR_REPORTING);

        $router = new Router();

        // Session and analytics begin
        $this->sessionManager = new SessionManager();
        // Session and analytics end

        if ($router->getRequestedPage() !== null) {
            $controllerName = $router->getRequestedPage() . '\\Controller';
            $methodName     = $router->getRequestedMethod();

            $_controller = new $controllerName($router->getRequestedPage());
            $_controller->$methodName($router->getRequestedParameters());
        } else {
            Log::message('The requested page not found!');
        }
    }

    /**
     * Auto class loader.
     *
     * @param string $className
     *
     * @return bool
     */
    private static function autoLoadCallBack(string $className): bool
    {
        $filename = Settings::WEB_PATH . str_replace(
            '\\',
            DIRECTORY_SEPARATOR,
            $className
        ) . '.php';
        if (file_exists($filename)) {
            require $filename;

            return true;
        }

        return false;
    }

    /**
     * Handling all error.
     */
    public static function errorHandler(): void
    {
        $error = error_get_last();
        if ($error !== null) {
            switch ($error['type']) {
                case E_ERROR:
                    $name = 'Fatal error';
                    Log::error($name, $error);
                    include Settings::WEB_PATH . str_replace(
                        '/',
                        DIRECTORY_SEPARATOR,
                        'Public/error/500.html'
                    );
                    break;
                case E_WARNING:
                    $name = 'Warning: ';
                    Log::error($name, $error);
                    break;
                default:
                    $name = $error;
                    Log::error($name, $error);
                    break;
            }
        }
    }
}
