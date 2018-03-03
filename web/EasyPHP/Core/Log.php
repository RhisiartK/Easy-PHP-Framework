<?php
declare(strict_types=1);
/**
 * Log.php class file.
 *
 * @author Richard Keki <kricsi14@gmail.com>
 * @link https://github.com/RhisiartK/Easy-PHP-Framework
 * @license https://github.com/RhisiartK/Easy-PHP-Framework/blob/master/LICENSE
 */

namespace EasyPHP\Core;

class Log
{
    /**
     * @param $ex
     */
    public static function Exception($ex): void
    {
        if (Settings::ENVIRONMENT === Settings::DEBUG) {
            echo '<pre>';
            print_r($ex);
            echo '</pre>';
        }

        if (Settings::LOG_TO_FILE) {
            $fp = fopen(Settings::WEB_PATH . 'Logs' . DIRECTORY_SEPARATOR . 'log' . date('_Y_m_d') . '.txt',
                'ab+');
            if ($fp !== false) {
                fwrite($fp, date('Y-m-d H:i:s') . "\n");
                fwrite($fp, 'Exception caught: ' . print_r($ex, true) . "\n");
                fwrite($fp, "\n");
                fclose($fp);
            }
        }
        if (Settings::LOG_TO_EMAIL) {
            $result = mail(Settings::LOG_TO_EMAIL_ADDRESS,
                Settings::LOG_EMAIL_SUBJECT, print_r($ex, true),
                'From: ' . Settings::LOG_FROM_EMAIL_ADDRESS . "\r\n" .
                'Reply-To: ' . Settings::LOG_FROM_EMAIL_ADDRESS . "\r\n" .
                'X-Mailer: PHP/' . PHP_VERSION);
        }
    }

    /**
     * @param $msg
     * @param $ex
     */
    public static function Error($msg, $ex): void
    {
        if (Settings::ENVIRONMENT === Settings::DEBUG) {
            echo '<pre>';
            print_r($msg);
            print_r($ex);
            echo '</pre>';
        }

        if (Settings::LOG_TO_FILE) {
            $fp = fopen(Settings::WEB_PATH . 'Logs' . DIRECTORY_SEPARATOR . 'log' . date('_Y_m_d') . '.txt',
                'ab+');
            if ($fp !== false) {
                fwrite($fp, date('Y-m-d H:i:s') . "\n");
                fwrite($fp,
                    'Exception caught: ' . $msg . "\n" . print_r($ex,
                        true) . "\n");
                fwrite($fp, "\n");
                fclose($fp);
            }
        }
    }

    public static function Message(string $message): void
    {
        if (Settings::ENVIRONMENT === Settings::DEBUG) {
            echo '<pre>';
            print_r($message);
            echo '</pre>';
        }

        if (Settings::LOG_TO_FILE) {
            $fp = fopen(Settings::WEB_PATH . 'Logs' . DIRECTORY_SEPARATOR . 'log' . date('_Y_m_d') . '.txt',
                'ab+');
            if ($fp !== false) {
                fwrite($fp, date('Y-m-d H:i:s') . "\n");
                fwrite($fp, 'Exception caught: ' . print_r($message, true) . "\n");
                fwrite($fp, "\n");
                fclose($fp);
            }
        }
        if (Settings::LOG_TO_EMAIL) {
            $result = mail(Settings::LOG_TO_EMAIL_ADDRESS,
                Settings::LOG_EMAIL_SUBJECT, print_r($message, true),
                'From: ' . Settings::LOG_FROM_EMAIL_ADDRESS . "\r\n" .
                'Reply-To: ' . Settings::LOG_FROM_EMAIL_ADDRESS . "\r\n" .
                'X-Mailer: PHP/' . PHP_VERSION);
        }
    }
}
