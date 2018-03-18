<?php
declare(strict_types=1);
/**
 * Session.php class file.
 *
 * @author Richard Keki <kricsi14@gmail.com>
 * @link https://github.com/RhisiartK/Easy-PHP-Framework
 * @license https://github.com/RhisiartK/Easy-PHP-Framework/blob/master/LICENSE
 */

namespace EasyPHP\Entities;

use EasyPHP\ValueObjects\Identity;
use EasyPHP\ValueObjects\IpAddress;
use EasyPHP\ValueObjects\Language;
use EasyPHP\ValueObjects\Md5;
use EasyPHP\ValueObjects\UnixTimeStamp;
use EasyPHP\ValueObjects\UserAgent;

class Session
{
    /**
     * @var $id Identity
     */
    private $id;
    /**
     * @var $userId Identity
     */
    private $userId;
    /**
     * @var $ipAddress IpAddress
     */
    private $ipAddress;
    /**
     * @var $userAgent UserAgent
     */
    private $userAgent;
    /**
     * @var $expiration UnixTimeStamp
     */
    private $expiration;
    /**
     * @var $token Md5
     */
    private $token;
    /**
     * @var Language
     */
    private $language;

    /**
     * Session constructor.
     *
     * @param int|null $_id
     * @param int $_userId
     * @param string $_ipAddress
     * @param string $_userAgent
     * @param int $_expiration
     * @param string $_token
     * @param string $_language
     */
    public function __construct(
        ?int $_id,
        int $_userId,
        string $_ipAddress,
        string $_userAgent,
        int $_expiration,
        string $_token,
        string $_language
    ) {
        if ($_id !== null) {
            $this->id = new Identity($_id);
        }
        $this->userId     = new Identity($_userId);
        $this->ipAddress  = new IpAddress($_ipAddress);
        $this->userAgent  = new UserAgent($_userAgent);
        $this->expiration = new UnixTimeStamp($_expiration);
        $this->token      = new Md5($_token);
        $this->language   = new Language($_language);
    }
}
