<?php

declare(strict_types=1);
/**
 * Entity.php class file.
 *
 * @author Richard Keki <kricsi14@gmail.com>
 *
 * @link https://github.com/RhisiartK/Easy-PHP-Framework
 *
 * @license https://github.com/RhisiartK/Easy-PHP-Framework/blob/master/LICENSE
 */

namespace EasyPHP\Core;

class Entity
{
    public function print()
    {
        echo '<pre>';
        print_r(get_class($this)." {\n");
        foreach (get_object_vars($this) as $key => $getObjectVar) {
            print_r("\t".$key.' => '.($getObjectVar->get() ?? 'NULL')."\n");
        }
        echo '}</pre>';
    }
}
