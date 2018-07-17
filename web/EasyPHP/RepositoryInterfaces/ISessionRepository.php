<?php

declare(strict_types=1);
/**
 * ISessionRepository.php class file.
 *
 * @author Richard Keki <kricsi14@gmail.com>
 *
 * @link https://github.com/RhisiartK/Easy-PHP-Framework
 *
 * @license https://github.com/RhisiartK/Easy-PHP-Framework/blob/master/LICENSE
 */

namespace EasyPHP\RepositoryInterfaces;

use EasyPHP\Entities\Session;
use EasyPHP\ValueObjects\Identity;
use EasyPHP\ValueObjects\IpAddress;
use EasyPHP\ValueObjects\UserAgent;

interface ISessionRepository
{
    public function getSession(Identity $id): ?Session;

    public function getSessionByIpAddressAndUserAgent(IpAddress $ipAddress, UserAgent $userAgent): ?Session;
}
