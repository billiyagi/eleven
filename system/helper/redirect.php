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
    return "assets/$path";
}
