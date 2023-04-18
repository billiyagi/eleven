<?php

// App
define('APP_NAME', 'eleven');
define('APP_VERSION', '0.1.0');

$dir = __DIR__;
$dir = explode('/', $dir);
array_pop($dir);
$dir = implode('/', $dir);
define('APP_PATH', $dir);


// Database
define('DB_NAME', 'eleven');
define('DB_USER', 'billy');
define('DB_PASSWORD', 'root');
