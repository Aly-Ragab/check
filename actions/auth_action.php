<?php


require_once '../config/messages.php';
require_once '../controllers/LoginController.php';
use Controllers\LoginController;

session_start();
$user_login = new LoginController();
if (isset($_GET['logout'])) {
    /* execute logOut method from admin controller */
    $user_login->logOut();
    header('Location: ../login.php');
    exit();
}


/* call login method from user controller with sent data to check login */
$login_try = $user_login->login($_POST['username'], $_POST['password']);

/* redirect to index page if login success , print login failed error otherwise */
if ($login_try) {
    header('Location: ../home.php');
    exit();
} else {
    echo $errors['login_failed'];
}
