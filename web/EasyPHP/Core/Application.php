<?php

declare(strict_types=1);
/**
 * Application.php class file.
 *
 * @author  Richard Keki <kricsi14@gmail.com>
 *
 * @link    https://github.com/RhisiartK/Easy-PHP-Framework
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
        spl_autoload_register('self::customAutoLoad');

        register_shutdown_function([$this, 'errorHandler']);

        error_reporting(Settings::ERROR_REPORTING);

        // Start route handling
        $router = new Router();

        // Session and analytics begin
        $this->sessionManager = new SessionManager();
        // Session and analytics end

        switch ($router->getRequestErrorCode()) {
            case ErrorCodes::NO_ERROR:
                $controllerName = $router->getRequestUrl() . '\\Controller';
                $methodName     = $router->getRequestMethod();

                $_controller = new $controllerName($router->getRequestUrl());
                $_controller->$methodName($router->getRequestParameters());
                break;
            case ErrorCodes::PAGE_NOT_FOUND:
                Log::message('The requested page not found!');
                break;
            case ErrorCodes::INVALID_PAGE_REQUEST:
            default:
                Log::message('The page request is invalid!');
                break;
        }
    }

    /**
     * Auto class loader.
     *
     * @param string $className
     *
     * @return bool
     */
    private static function customAutoLoad(string $className): bool
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
                    $name = $error['message'];
                    Log::error($name, $error);
                    break;
            }
        }
    }
}
