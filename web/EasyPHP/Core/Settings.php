<?php
declare(strict_types=1);
/**
 * Settings class file.
 *
 * @author Richard Keki <kricsi14@gmail.com>
 * @link https://github.com/RhisiartK/Easy-PHP-Framework
 * @license https://github.com/RhisiartK/Easy-PHP-Framework/blob/master/LICENSE
 */

namespace EasyPHP\Core;

use phpDocumentor\Compiler\Pass\Debug;

/**
 * Settings of web page and framework
 *
 * @package System\Core
 */
class Settings
{

    /**
     * The Data Source Name, or DSN, contains the information required to
     * connect to the database.
     */
    const DB_DSN = 'mysql:host=localhost;dbname=DATABASE_NAME;charset=utf8_bin';
    /**
     * The user name for the DSN string.
     */
    const DB_USERNAME = 'DATABASE_USER';
    /**
     * The password for the DSN string
     */
    const DB_PASSWORD = 'DATABASE_PASSWORD';
    /**
     * The web directory's path
     */
    const WEB_PATH = __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR;
    /**
     * The application's path
     */
    const APPLICATION_PATH = self::WEB_PATH . 'Application' . DIRECTORY_SEPARATOR;
    /**
     * Application's environment value for debugging
     */
    const DEBUG = 0;
    /**
     * Application's environment value for production
     */
    const PRODUCTION = 1;
    /**
     * Application's environment: debug or production
     */
    const ENVIRONMENT = self::DEBUG;
    /**
     * Sets which PHP errors are reported. Valid constans:
     * http://php.net/manual/en/errorfunc.constants.php
     */
    const ERROR_REPORTING = E_ALL;
    /**
     * Logging to file
     */
    const LOG_TO_FILE = true;
    /**
     * Logging to email
     */
    const LOG_TO_EMAIL = false;
    /**
     * Recipient's email address for logging to email
     */
    const LOG_TO_EMAIL_ADDRESS = 'kricsi14@gmail.com';
    /**
     * Sender's email address
     */
    const LOG_FROM_EMAIL_ADDRESS = 'hiba@application.com';
    /**
     * Email subject  for logging to email
     */
    const LOG_EMAIL_SUBJECT = 'Easy PHP Log';
    /**
     * Path variable's name (if you change, change it in .htaccess too
     */
    const URL_PATH_VARIABLE_NAME = 'url';
    /**
     * Default page's relative path
     */
    const DEFAULT_PAGE = 'Index';
    /**
     * Maximum depths of valid path
     *
     * Example: If MAX_PROCESSABLE_PATH_DEPTHS is 3
     * The maximum accessible Controller is Depth_1/Depth_2/Depth_3/Controller
     */
    const MAX_PROCESSABLE_PATH_DEPTHS = 3;

    /*
        public const HeaderPath                     = self::WEB_PATH . 'Application/Views/Header.php';
        public const EndHtmlPath                    = self::WEB_PATH . 'Application/Views/EndHtml.php';
        public const AngularJsPath                  = self::WEB_PATH . 'Application/Views/Angular.php';
        public const DefaultLanguage                = 'en';
        public const SessionTokenCookieName         = '_qwerty';
        public const SessionTimeCookieName          = 'asdfg';
        public const SessionSalt                    = '7eTYk+Ke9ULe?%wqwm=vp68JYB$c^86m';
        public const SessionTimeOut                 = '1 hour';
        public const SessionQuickTimeOut            = '5 minutes';
        public const CookieDomain                   = 'example.hu';
        public const SecureConnection               = TRUE;
        public const SecureCookie                   = Settings::SecureConnection;
        public const AvailableLanguages             = ['en'];
        public const LanguageCookieName             = '_language';
        public const LocalizationDirectory          = 'L10n/';
        public const PasswordNeedSpecialCharacter   = FALSE;
        public const PasswordNeedUppercaseCharacter = TRUE;
        public const PasswordNeedLowercaseCharacter = TRUE;
        public const PasswordNeedNumericCharacter   = TRUE;
        public const FormFieldHelpTextAllowed       = FALSE;
        public const MenuPath                       = self::WEB_PATH . '/Application/Views/Menu.php';
        public const AdminMenuPath                  = self::WEB_PATH . '/Application/Views/AdminMenu.php';
        public const FooterPath                     = self::WEB_PATH . '/Application/Views/Footer.php';
        public const AngularJS                      = FALSE;
        public const DefaultFormLabelVisibility     = FALSE;
    */
}
