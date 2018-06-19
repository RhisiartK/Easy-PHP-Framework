<?php
declare(strict_types=1);
/**
 * SessionRepository.php class file.
 *
 * @author Richard Keki <kricsi14@gmail.com>
 * @link https://github.com/RhisiartK/Easy-PHP-Framework
 * @license https://github.com/RhisiartK/Easy-PHP-Framework/blob/master/LICENSE
 */

namespace EasyPHP\MySQLRepositories;

use EasyPHP\Core\Converter;
use EasyPHP\Core\Database;
use EasyPHP\Core\Log;
use EasyPHP\Core\Settings;
use EasyPHP\Entities\Session;
use EasyPHP\Factories\SessionFactory;
use EasyPHP\RepositoryInterfaces\ISessionRepository;
use EasyPHP\ValueObjects\Identity;
use EasyPHP\ValueObjects\IpAddress;
use EasyPHP\ValueObjects\UserAgent;
use PDO;

class SessionRepository implements ISessionRepository
{

    /**
     * @var Session[]
     */
    private $sessions = [];

    public function __construct()
    {
        //        $language = Settings::DEFAULT_LANGUAGE;
        //        $stm = Database::instance()->prepare('insert into sessions values (null, null, :ipAddress, :userAgent, null, null, :language, false)');
        //        $stm->bindParam(':ipAddress', $ip);
        //        $stm->bindParam(':userAgent', $user_agent);
        //        $stm->bindParam(':language', $language);
        //        $stm->execute();
    }

    // TODO getSessionById
    public function getSession(Identity $id): ?Session
    {
        if (isset($this->sessions[$id->get()])) {
            return $this->sessions[$id->get()];
        }

        $ip        = inet_pton($_SERVER['REMOTE_ADDR']);
        $userAgent = $_SERVER['HTTP_USER_AGENT'];

        $stm = Database::instance()->prepare(
            'SELECT * FROM sessions 
                      WHERE ip_address = :ipAddress AND user_agent = :userAgent LIMIT 1'
        );
        $stm->bindParam(':ip', $ip);
        $stm->bindParam(':userAgent', $userAgent);

        $stm->execute();

        if ($stm->rowCount() === 1) {
            $result = $stm->fetchAll(PDO::FETCH_ASSOC);

            $this->sessions[$result['id']] = new Session($result['id'], $result['user_id'],
                inet_ntop($result['ip_address']), $result['user_agent'], $result['expiration'], $result['token'],
                $result['language'], $result['policies_accepted']);

            $this->sessions[$result['id']];
        }

        return null;
    }

    public function getSessionByIpAddressAndUserAgent(IpAddress $ipAddress, UserAgent $userAgent): ?Session
    {
        foreach ($this->sessions as $session) {
            if ($session->getIpAddress()->get() === $ipAddress->get() && $session->getUserAgent()->get() ===
                $userAgent->get()) {
                return $session;
            }
        }

        $ip         = inet_pton($ipAddress->get());
        $user_agent = $userAgent->get();

        $stm = Database::instance()->prepare(
            'SELECT * FROM sessions 
                      WHERE ip_address = :ipAddress AND user_agent = :userAgent LIMIT 1'
        );
        $stm->bindParam(':ipAddress', $ip);
        $stm->bindParam(':userAgent', $user_agent);

        $stm->execute();

        if ($stm->rowCount() === 1) {
            $result = $stm->fetchAll(PDO::FETCH_ASSOC)[0];

            $factory = new SessionFactory();

            $session = $factory->create($result['id'], $result['user_id'],
                inet_ntop($result['ip_address']), $result['user_agent'], $result['expiration'], $result['token'],
                $result['language'], (bool)$result['policies_accepted']);
            if ($session !== null) {
                if (Settings::ENVIRONMENT === Settings::DEBUG) {
                    $session->print();
                }
                $this->sessions[$result['id']] = $session;

                return $this->sessions[$result['id']];
            }
        }

        return null;
    }
}
