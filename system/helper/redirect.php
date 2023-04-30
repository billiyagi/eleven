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
    return ($_SERVER['PHP_SELF'] == URL_ADMIN . $page) ? 'menu-active' : '';
}


function toNumeric($str)
{
    $result = explode(',', $str);
    return implode('', $result);
}

function toRupiah($numeric)
{
    return number_format($numeric, 0, ',');
}

function excerpt($string, $length = null)
{
    return substr($string, 0, $length);
}
