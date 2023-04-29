<?php

function redirectTo($path)
{
    return header('Location:' . APP_PATH . $path);
}

function notFound($message = 'Halaman yang anda cari tidak ditemukan.')
{
    return require_once(APP_PATH . '/pages/error/404.php');
}

function assets($path)
{
    return BASE_URL_ASSETS . "$path";
}

function active($page)
{
    return ($_SERVER['PHP_SELF'] == '/eleven/admin/' . $page) ? 'menu-active' : '';
}
