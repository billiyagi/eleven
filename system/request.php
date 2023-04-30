<?php

/** 
 * All request Routes
 * * Menerima semua request untuk diteruskan ke model
 */
require_once('bootstrap.php');

if (empty($_REQUEST)) {
    header('Location:' . BASE_URL_LANDING);
} elseif (empty($_POST) && !isset($_SESSION['userEleven'])) {
    header('Location:' . BASE_URL_LANDING);
}


/** 
 * Utility Instance
 */
$request = new Request();
$auth = new Authentication();





/** 
 * Users Model
 */
$request->onSubmit('user_signup', function () {
    echo $GLOBALS['userModel']->create($_POST, true);
});

$request->onSubmit('user_create', function () {
    return $GLOBALS['userModel']->create($_POST);
});

$request->onSubmit('user_update', function () {
    return $GLOBALS['userModel']->update($_POST, true);
});

$request->onSubmit('costumer_update', function () {
    return $GLOBALS['userModel']->update($_POST, false, true);
});

$request->onSubmit('user_delete', function () {
    return $GLOBALS['userModel']->destroy($_POST['id']);
});

$request->onSubmit('user_active', function () {
    return $GLOBALS['userModel']->userSetActive($_POST['id']);
});

$request->onSubmit('user_nonactive', function () {
    return $GLOBALS['userModel']->userSetNonactive($_POST['id']);
});


$request->onSubmit('user_login', function () {
    echo $GLOBALS['auth']->login($_POST);
});

$request->onSubmit('user_logout', function () {
    return $GLOBALS['auth']->logout($_POST);
});


$request->onSubmit('save_costumer_address', function () {
    if ($GLOBALS['costumerAddressModel']->isUserHaveAddress($_POST['id'])) {
        return $GLOBALS['costumerAddressModel']->update($_POST);
    } else {
        return $GLOBALS['costumerAddressModel']->create($_POST);
    }
});

$request->onSubmit('save_cart', function () {
    $GLOBALS['costumerCartModel']->create($_POST);
});
$request->onSubmit('remove_cart', function () {
    $GLOBALS['costumerCartModel']->destroy($_POST);
});


/** 
 * Products Model
 */
$request->onSubmit('create_product', function () {
    return $GLOBALS['productsModel']->create($_POST, $_FILES);
});

$request->onSubmit('update_product', function () {
    return $GLOBALS['productsModel']->update($_POST, $_FILES);
});

$request->onSubmit('product_delete', function () {
    return $GLOBALS['productsModel']->destroy($_POST);
});


/** 
 * Type Model
 */
$request->onSubmit('type_create', function () {
    return $GLOBALS['typesProductModel']->create($_POST);
});
$request->onSubmit('type_update', function () {
    return $GLOBALS['typesProductModel']->update($_POST);
});
$request->onSubmit('type_delete', function () {
    return $GLOBALS['typesProductModel']->destroy($_POST['id']);
});


/** 
 * Order Models
 */
$request->onSubmit('order_create', function () {
    return $GLOBALS['orderModel']->create($_POST);
});
