<?php
//.atoum.php

use mageekguy\atoum;
use mageekguy\atoum\reports;

$coveralls = new reports\asynchronous\coveralls('web\\EasyPHP', 'ksFHJXooSeFvM2zxjhqVsjxYkVPMLfOhX');
$coveralls->addWriter();
$runner->addReport($coveralls);

$script->addDefaultReport();
