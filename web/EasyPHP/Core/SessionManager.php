<?php
declare(strict_types=1);
/**
 * SessionManager.php class file.
 *
 * GDPR updated usage:
 * 1. Checking in database for a session with permissionAccepted = true property
 *    based on ip address and user agent what we can not use to identify the person
 *     1.1. If session exist, we check normally
 *     1.2. If no session in database, we show a home screen with permissions accept and deny options
 *             1.2.1 If permissions accepted, save a session/cookies and go to the real home screen
 *             1.2.2 Is permissions denied, we show another page (eg.: thank you/close this site page)
 *                   because we need to use sessions for authorization and authentication
 *
 * @author Richard Keki <kricsi14@gmail.com>
 * @link https://github.com/RhisiartK/Easy-PHP-Framework
 * @license https://github.com/RhisiartK/Easy-PHP-Framework/blob/master/LICENSE
 */

namespace EasyPHP\Core;

use EasyPHP\MySQLRepositories\SessionRepository;
use EasyPHP\Services\Sessions\GetSessionByIpAddressAndUserAgentService;
use EasyPHP\ValueObjects\IpAddress;
use EasyPHP\ValueObjects\UserAgent;

class SessionManager
{
    private $session;
    private $sessionRepository;

    public function __construct()
    {
        $this->sessionRepository = new SessionRepository();

        $ipAddress = new IpAddress($_SERVER['REMOTE_ADDR']);
        $userAgent = new UserAgent($_SERVER['HTTP_USER_AGENT']);

        // 1. Checking for an exist session
        $this->session = GetSessionByIpAddressAndUserAgentService::execute(
            $this->sessionRepository,
            $ipAddress,
            $userAgent
        );

        // If session exist
        if ($this->session !== null) {
            // If cookie policy accepted we manage cookies
            if ($this->session->getPoliciesAccepted()) {
                $sessionTokenCookie = filter_input(
                    INPUT_COOKIE,
                    Settings::SESSION_TOKEN_COOKIE_NAME,
                    FILTER_SANITIZE_STRING,
                    ['options' => ['default' => null]]
                );
                $languageCookie     = filter_input(
                    INPUT_COOKIE,
                    Settings::SESSION_LANGUAGE_COOKIE_NAME,
                    FILTER_SANITIZE_STRING,
                    ['options' => ['default' => null]]
                );
                $formCookie         = filter_input(
                    INPUT_COOKIE,
                    Settings::SESSION_FORM_TOKEN_COOKIE_NAME,
                    FILTER_SANITIZE_STRING,
                    ['options' => ['default' => null]]
                );
            }
        }

        /*

        if ($sessionTokenCookie !== null && $languageCookie !== null) {

            $expiration = $_SERVER['REQUEST_TIME'];

            $stm = Database::Instance()->prepare(
                'SELECT id, user_id, language
                           FROM sessions
                           WHERE ip_address = :ip AND user_agent = :userAgent AND token = :token
                           AND expiration >= FROM_UNIXTIME(:expiration)'
            );
            $stm->bindParam(':ip', $ip);
            $stm->bindParam(':userAgent', $_SERVER['HTTP_USER_AGENT']);
            $stm->bindParam(':token', $sessionTokenCookie);
            $stm->bindParam(':expiration', $expiration, PDO::PARAM_INT);
            $stm->execute();

            if ($stm->rowCount() !== 1) {
                $ip         = inet_pton($_SERVER['REMOTE_ADDR']);
                $expiration = $_SERVER['REQUEST_TIME'];

                $stm = Database::Instance()->prepare(
                    'SELECT id, user_id, language
                               FROM sessions
                               WHERE ip_address = :ip AND user_agent = :userAgent
                               AND expiration >= FROM_UNIXTIME(:expiration)'
                );
                $stm->bindParam(':ip', $ip);
                $stm->bindParam(':userAgent', $_SERVER['HTTP_USER_AGENT']);
                $stm->bindParam(':expiration', $expiration, PDO::PARAM_INT);
                $stm->execute();

                if ($stm->rowCount() === 1) {
                    $this->SetSession($stm->fetchAll(PDO::FETCH_ASSOC));
                }
            } else {
                $this->SetSession($stm->fetchAll(PDO::FETCH_ASSOC));
            }
        }
        */
    }
}
