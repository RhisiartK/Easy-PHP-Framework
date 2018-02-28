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
     * The application's path
     */
    const APPLICATION_PATH = __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR;
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

    /*
        public const DefaultPage                    = 'Index';
        public const MaxProcessablePathLength       = 3;
        public const UrlPathVariableName            = 'url';
        public const HeaderPath                     = self::APPLICATION_PATH . 'Application/Views/Header.php';
        public const EndHtmlPath                    = self::APPLICATION_PATH . 'Application/Views/EndHtml.php';
        public const AngularJsPath                  = self::APPLICATION_PATH . 'Application/Views/Angular.php';
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
        public const MenuPath                       = self::APPLICATION_PATH . '/Application/Views/Menu.php';
        public const AdminMenuPath                  = self::APPLICATION_PATH . '/Application/Views/AdminMenu.php';
        public const FooterPath                     = self::APPLICATION_PATH . '/Application/Views/Footer.php';
        public const AngularJS                      = FALSE;
        public const DefaultFormLabelVisibility     = FALSE;
    */
}
