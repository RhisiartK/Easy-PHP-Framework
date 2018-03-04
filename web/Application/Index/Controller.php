<?php
declare(strict_types=1);
/**
 * Controller.php class file.
 *
 * @author Richard Keki <kricsi14@gmail.com>
 * @link https://github.com/RhisiartK/Easy-PHP-Framework
 * @license https://github.com/RhisiartK/Easy-PHP-Framework/blob/master/LICENSE
 */

namespace Application\Index;

class Controller
{

    public function get()
    {
        echo '<pre>';
        print_r('Index page (GET)');
        echo '</pre>';
    }
}
