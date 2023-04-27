<?php
require_once('bootstrap.php');
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
