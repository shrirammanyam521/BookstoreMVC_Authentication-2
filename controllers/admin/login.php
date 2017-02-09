<?php

$loginSubmitted = isset($_POST['login_submitted']);
if ($loginSubmitted) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    if (is_valid_admin_login($email, $password)) {
        $_SESSION['is_valid_admin'] = true;
        $action = 'list_books';
        $content = include_once "controllers/admin/list_books.php";
        return $content;
    } else {
        $login_message = 'Your email address / password may be invalid.';
    }
} else {
    $email = '';
    $login_message = 'You must login to view this page.';
}
return 'views/login_view.php';
