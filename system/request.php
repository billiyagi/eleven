<?php
require_once('bootstrap.php');

if (empty($_REQUEST)) {
    header('Location:' . BASE_URL_LANDING);
}

$request = new Request();

/** 
 * Models Instance
 */
$userModel = new UsersModel();
$auth = new Authentication();


/** 
 * All request Routes
 */
$request->onSubmit('user_signup', function () {
    echo $GLOBALS['userModel']->insertUser($_POST, true);
});

$request->onSubmit('user_login', function () {
    echo $GLOBALS['auth']->login($_POST);
});

$request->onSubmit('user_logout', function () {
    return $GLOBALS['auth']->logout($_POST);
});

$request->onSubmit('create_product', function () {
    return $GLOBALS['productsModel']->create($_POST, $_FILES);
});

$request->onSubmit('update_product', function () {
    return $GLOBALS['productsModel']->update($_POST, $_FILES);
});

$request->onSubmit('product_delete', function () {
    return $GLOBALS['productsModel']->destroy($_POST);
});


$request->onSubmit('type_create', function () {
    return $GLOBALS['typesProductModel']->create($_POST);
});
$request->onSubmit('type_update', function () {
    return $GLOBALS['typesProductModel']->update($_POST);
});
$request->onSubmit('type_delete', function () {
    return $GLOBALS['typesProductModel']->destroy($_POST['id']);
});
