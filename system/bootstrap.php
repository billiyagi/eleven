<?php
session_start();

// Core Configuration
require_once('core/config.php');
require_once('core/Database.php');

// Autoload Class
spl_autoload_register(function ($class) {
    require_once(__DIR__ . '/classes/' . $class . '.php');
});

require_once('helper/redirect.php');
require_once('helper/flash_message.php');

// Library
$dir = __DIR__;
$dir = explode('/', $dir);
array_pop($dir);
$dir = implode('/', $dir);

require_once($dir . '/vendor/autoload.php');


$productsModel = new ProductsModel();
$typesProductModel = new TypesProductModel();
$userModel = new UsersModel();
$orderModel = new OrdersModel();
$costumerAddressModel = new CostumersAddressModel();
$costumerCartModel = new CostumersCartModel();
