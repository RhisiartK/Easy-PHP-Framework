<?php

declare(strict_types=1);
/**
 * Session.php class file.
 *
 * @author Richard Keki <kricsi14@gmail.com>
 *
 * @link https://github.com/RhisiartK/Easy-PHP-Framework
 *
 * @license https://github.com/RhisiartK/Easy-PHP-Framework/blob/master/LICENSE
 */

namespace EasyPHP\Entities;

use EasyPHP\Core\Entity;
use EasyPHP\ValueObjects\Identity;
use EasyPHP\ValueObjects\IpAddress;
use EasyPHP\ValueObjects\Language;
use EasyPHP\ValueObjects\Md5;
use EasyPHP\ValueObjects\PoliciesAccepted;
use EasyPHP\ValueObjects\UnixTimeStamp;
use EasyPHP\ValueObjects\UserAgent;

class Session extends Entity
{
    /**
     * @var Identity
     */
    protected $id;

    /**
     * @var Identity
     */
    protected $userId;

    /**
     * @var IpAddress
     */
    protected $ipAddress;

    /**
     * @var UserAgent
     */
    protected $userAgent;

    /**
     * @var UnixTimeStamp
     */
    protected $expiration;

    /**
     * @var Md5
     */
    protected $token;

    /**
     * @var Language
     */
    protected $language;

    /**
     * @var PoliciesAccepted
     */
    protected $policiesAccepted;

    /**
     * Session constructor.
     *
     * @param int|null $_id
     * @param int|null $_userId
     * @param string   $_ipAddress
     * @param string   $_userAgent
     * @param int      $_expiration
     * @param string   $_token
     * @param string   $_language
     * @param bool     $_policiesAccepted
     */
    public function __construct(
        ?int $_id,
        ?int $_userId,
        string $_ipAddress,
        string $_userAgent,
        ?int $_expiration,
        ?string $_token,
        string $_language,
        bool $_policiesAccepted
    ) {
        $this->id               = new Identity($_id);
        $this->userId           = new Identity($_userId);
        $this->ipAddress        = new IpAddress($_ipAddress);
        $this->userAgent        = new UserAgent($_userAgent);
        $this->expiration       = new UnixTimeStamp($_expiration);
        $this->token            = new Md5($_token);
        $this->language         = new Language($_language);
        $this->policiesAccepted = new PoliciesAccepted($_policiesAccepted);
    }

    public function isValid(): bool
    {
        return $this->ipAddress->get() != null && $this->userAgent->get() !== null;
    }

    /**
     * @return Identity
     */
    public function getId(): Identity
    {
        return $this->id;
    }

    /**
     * @return Identity
     */
    public function getUserId(): Identity
    {
        return $this->userId;
    }

    /**
     * @return IpAddress
     */
    public function getIpAddress(): IpAddress
    {
        return $this->ipAddress;
    }

    /**
     * @return UserAgent
     */
    public function getUserAgent(): UserAgent
    {
        return $this->userAgent;
    }

    /**
     * @return UnixTimeStamp
     */
    public function getExpiration(): UnixTimeStamp
    {
        return $this->expiration;
    }

    /**
     * @return Md5
     */
    public function getToken(): Md5
    {
        return $this->token;
    }

    /**
     * @return Language
     */
    public function getLanguage(): Language
    {
        return $this->language;
    }

    /**
     * @return PoliciesAccepted
     */
    public function getPoliciesAccepted(): PoliciesAccepted
    {
        return $this->policiesAccepted;
    }
}
