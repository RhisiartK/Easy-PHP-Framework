<?php
declare(strict_types=1);
/**
 * SessionFactory.php class file.
 *
 * @author Richard Keki <kricsi14@gmail.com>
 * @link https://github.com/RhisiartK/Easy-PHP-Framework
 * @license https://github.com/RhisiartK/Easy-PHP-Framework/blob/master/LICENSE
 */

namespace EasyPHP\Factories;

use EasyPHP\Entities\Session;

class SessionFactory
{
    public function create(
        ?int $_id,
        ?int $_userId,
        string $_ipAddress,
        string $_userAgent,
        ?int $_expiration,
        ?string $_token,
        string $_language,
        bool $_policiesAccepted
    ): ?Session {
        $session = new Session($_id, $_userId, $_ipAddress, $_userAgent, $_expiration, $_token, $_language,
            $_policiesAccepted);

        if ($session->isValid()) {
            return $session;
        }

        return null;
    }
}
