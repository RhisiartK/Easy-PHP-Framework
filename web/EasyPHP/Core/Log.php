<?php

declare(strict_types=1);
/**
 * Log.php class file.
 *
 * @author Richard Keki <kricsi14@gmail.com>
 *
 * @link https://github.com/RhisiartK/Easy-PHP-Framework
 *
 * @license https://github.com/RhisiartK/Easy-PHP-Framework/blob/master/LICENSE
 */

namespace EasyPHP\Core;

/**
 * Class Log.
 */
class Log
{
    /**
     * Logging an exception.
     *
     * @param $ex
     */
    public static function exception($ex): void
    {
        if (Settings::ENVIRONMENT === Settings::DEBUG) {
            echo '<pre>';
            print_r($ex);
            echo '</pre>';
        }

        if (Settings::LOG_TO_FILE) {
            self::LogToFile($ex);
        }
        if (Settings::LOG_TO_EMAIL) {
            $result = mail(
                Settings::LOG_TO_EMAIL_ADDRESS,
                Settings::LOG_EMAIL_SUBJECT,
                print_r($ex, true),
                'From: '.Settings::LOG_FROM_EMAIL_ADDRESS."\r\n".
                'Reply-To: '.Settings::LOG_FROM_EMAIL_ADDRESS."\r\n".
                'X-Mailer: PHP/'.PHP_VERSION
            );
        }
    }

    /**
     * Logging an error.
     *
     * @param $msg
     * @param $ex
     */
    public static function error($msg, $ex): void
    {
        if (Settings::ENVIRONMENT === Settings::DEBUG) {
            echo '<pre>';
            print_r($msg);
            print_r($ex);
            echo '</pre>';
        }

        if (Settings::LOG_TO_FILE) {
            self::LogToFile($ex, $msg);
        }
    }

    /**
     * Logging a message.
     *
     * @param $message
     */
    public static function message($message): void
    {
        if (Settings::ENVIRONMENT === Settings::DEBUG) {
            echo '<pre>';
            print_r($message);
            echo '</pre>';
        }

        if (Settings::LOG_TO_FILE) {
            self::LogToFile($message);
        }
        if (Settings::LOG_TO_EMAIL) {
            $result = mail(
                Settings::LOG_TO_EMAIL_ADDRESS,
                Settings::LOG_EMAIL_SUBJECT,
                print_r($message, true),
                'From: '.Settings::LOG_FROM_EMAIL_ADDRESS."\r\n".
                'Reply-To: '.Settings::LOG_FROM_EMAIL_ADDRESS."\r\n".
                'X-Mailer: PHP/'.PHP_VERSION
            );
        }
    }

    private static function LogToFile($ex = '', $msg = null)
    {
        if (! file_exists(\dirname(Settings::WEB_PATH.'Logs'))) {
            if (mkdir($concurrentDirectory = \dirname(Settings::WEB_PATH.'Logs'), 0777,
                    true) || is_dir($concurrentDirectory)) {
                $fp = fopen(
                    Settings::WEB_PATH.'Logs'.DIRECTORY_SEPARATOR.'log'.date('_Y_m_d').'.txt',
                    'ab+'
                );
                if ($fp !== false) {
                    fwrite($fp, date('Y-m-d H:i:s')."\n");
                    fwrite($fp, 'exception caught: '.($msg !== null ? ($msg."\n") : '').print_r($ex, true)."\n");
                    fwrite($fp, "\n");
                    fclose($fp);
                }
            }
        }
    }
}
