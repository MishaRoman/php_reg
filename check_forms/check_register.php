<?php
    session_start();
    require_once '../connect.php';

    function redirect() {
        header('Location: ../index.php');
    }

    $name = $_POST['username'];
    $email = $_POST['email'];
    $password = md5($_POST['pass']);
    $password_confirm = md5($_POST['pass-confirm']);

    unset($_SESSION['username']);
    $_SESSION['username'] = $name;

    if ($password != $password_confirm) {
        $_SESSION['error'] = 'Пароли не совпадают';
        redirect();
    }
    else if (strlen(trim($name)) < 2 || strlen($name) > 60) {
        $_SESSION['error'] = 'Недопустимая длина имени';
        redirect();
    }
    else if (strlen(trim($password)) < 8) {
        $_SESSION['error'] = 'Пароль должен содержать минимум 8 символов';
        redirect();
    }
    else {
        $sql = $pdo->query("INSERT INTO `users`(`username`, `email`, `password`) VALUES('$name', '$email', '$password')");
        header('Location: ../vendor/signin.php');
    }