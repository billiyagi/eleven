<?php

$currentPageVisited = PROTOCOL . $_SERVER['SERVER_NAME'] . $_SERVER['PHP_SELF'];
/** 
 * Periksa Kondisi login pengguna
 */
$currentPageVisited = explode('/', $currentPageVisited);
array_pop($currentPageVisited);
$currentPageVisited = implode('/', $currentPageVisited)  . '/';
// var_dump(BASE_URL_ADMIN);

// Kondisi ketika belum login
if (!isset($_SESSION['userEleven']) && $currentPageVisited == BASE_URL_ADMIN) {
    header('Location: ' . BASE_URL_LANDING);

    // Kondisi ketika sudah login
} elseif (isset($_SESSION['userEleven'])) {
    if ($_SESSION['userEleven']['role'] == '2' && $currentPageVisited == BASE_URL_ADMIN) {
        header('Location: ' . BASE_URL_LANDING);
    } elseif ($_SESSION['userEleven']['role'] == '1' && $currentPageVisited == BASE_URL_CLIENT) {
        header('Location: ' . BASE_URL_ADMIN);
    }
}
