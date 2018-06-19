<?php
declare(strict_types=1);
/**
 * GetSessionService.php class file.
 *
 * @author Richard Keki <kricsi14@gmail.com>
 * @link https://github.com/RhisiartK/Easy-PHP-Framework
 * @license https://github.com/RhisiartK/Easy-PHP-Framework/blob/master/LICENSE
 */

namespace EasyPHP\Services\Sessions;

use EasyPHP\Core\ErrorCodes;
use EasyPHP\Entities\Session;
use EasyPHP\RepositoryInterfaces\ISessionRepository;
use EasyPHP\ValueObjects\IpAddress;
use EasyPHP\ValueObjects\UserAgent;

class GetSessionByIpAddressAndUserAgentService
{
    private static $repository;

    public static function execute(ISessionRepository $repository, IpAddress $ipAddress, UserAgent $userAgent): ?Session
    {
        self::$repository = $repository;
        if ($ipAddress->getErrorCode() === ErrorCodes::NO_ERROR && $userAgent->getErrorCode() ===
            ErrorCodes::NO_ERROR) {
            return self::$repository->getSessionByIpAddressAndUserAgent($ipAddress, $userAgent);
        }

        return null;
    }
}
