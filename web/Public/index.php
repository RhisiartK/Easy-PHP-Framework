<?php

declare(strict_types=1);

/*
 * index.php file.
 *
 * @author Richard Keki <kricsi14@gmail.com>
 * @link https://github.com/RhisiartK/Easy-PHP-Framework
 * @license https://github.com/RhisiartK/Easy-PHP-Framework/blob/master/LICENSE
 */

use EasyPHP\Core\Settings;

mb_internal_encoding('UTF-8');
mb_http_output('UTF-8');

include __DIR__ . str_replace('/', DIRECTORY_SEPARATOR, '/../EasyPHP/Core/Settings.php');
include Settings::WEB_PATH . str_replace('/', DIRECTORY_SEPARATOR, 'EasyPHP/Core/Application.php');

new EasyPHP\Core\Application();
