<?php
declare(strict_types=1);
/**
 * ExecutionTime.php class file.
 *
 * @author  Richard Keki <kricsi14@gmail.com>
 * @link    https://github.com/RhisiartK/Easy-PHP-Framework
 * @license https://github.com/RhisiartK/Easy-PHP-Framework/blob/master/LICENSE
 */

namespace EasyPHP\Core;

class ExecutionTime
{
    private $startTime;
    private $endTime;

    public function start():void
    {
        $this->startTime = getrusage();
    }

    public function end(): void
    {
        $this->endTime = getrusage();
    }

    private function runTime($ru, $rus, $index): int
    {
        return ($ru["ru_$index.tv_sec"] * 1000 + (int)($ru["ru_$index.tv_usec"] / 1000))
            - ($rus["ru_$index.tv_sec"] * 1000 + (int)($rus["ru_$index.tv_usec"] / 1000));
    }

    public function toString(): string
    {
        return '<br>This process used ' . $this->runTime($this->endTime, $this->startTime, 'utime') .
            ' ms for its computations.<br>This process used ' . $this->runTime($this->endTime, $this->startTime, 'stime') .
            ' ms in system calls<br>';
    }
}
