<?php
setlocale(LC_ALL, 'id_ID.utf8');

// General App Configuration
define('APP_NAME', 'eleven');
define('APP_VERSION', '0.1.0');
define('PROTOCOL', $protocol = isset($_SERVER['HTTPS']) ? 'https://' : 'http://');
define('APP_HOST', PROTOCOL . 'billiyagi.test');

// APP URL Configuration
define('BASE_URL_LANDING', APP_HOST . '/eleven/');
define('BASE_URL_ADMIN', APP_HOST . '/eleven/admin/');

define('BASE_URL_CLIENT', APP_HOST . '/eleven/client/');
define('BASE_URL_ASSETS', APP_HOST . '/eleven/assets/');
define('BASE_URL_SYSTEM', APP_HOST . '/eleven/system/');

define('URL_CLIENT', '/eleven/client/');
define('URL_ADMIN', '/eleven/admin/');

$uploaded_dir = explode('/', __DIR__);
array_pop($uploaded_dir);
array_pop($uploaded_dir);

define('URL_UPLOADED_FILE', $uploaded_dir);

// Directory PATH
$dir = __DIR__;
$dir = explode('/', $dir);
array_pop($dir);
$dir = implode('/', $dir);
define('APP_PATH', $dir);


// Database
define('DB_NAME', 'eleven');
define('DB_USER', 'billy');
define('DB_PASSWORD', 'root');
define('DB_HOST', 'localhost');
define('DB_DSN', "mysql:dbname=" . DB_NAME . ";host=" . DB_HOST);
