<?php

declare(strict_types=1);

/*
 * index.php file.
 *
 * @author Richard Keki <kricsi14@gmail.com>
 * @link https://github.com/RhisiartK/Easy-PHP-Framework
 * @license https://github.com/RhisiartK/Easy-PHP-Framework/blob/master/LICENSE
 */

use EasyPHP\Core\ExecutionTime;
use EasyPHP\Core\Log;
use EasyPHP\Core\Settings;

// Include settings of framework
require __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'EasyPHP' . DIRECTORY_SEPARATOR . 'Core' .
    DIRECTORY_SEPARATOR . 'Settings.php';
// Include the framework
require __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'EasyPHP' . DIRECTORY_SEPARATOR . 'Core' .
    DIRECTORY_SEPARATOR . 'Application.php';

if (Settings::PERFORMANCE_STATUS) {
    require __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'EasyPHP' . DIRECTORY_SEPARATOR . 'Core' .
        DIRECTORY_SEPARATOR . 'ExecutionTime.php';
    $executionTime = new ExecutionTime();
    $executionTime->start();
}

// start the application
new EasyPHP\Core\Application();

if (Settings::PERFORMANCE_STATUS) {
    $executionTime->end();
    Log::message($executionTime->toString());
}
