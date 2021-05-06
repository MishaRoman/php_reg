<?php
    session_start();
    require_once '../connect.php';

    $login = $_POST['email'];
    $password = md5($_POST['pass']);

    $check_user = $pdo->query("SELECT * FROM `users` WHERE `email` = '$login' AND `password` = '$password'");
    $result = $check_user->fetch(PDO::FETCH_ASSOC);
    if ($result) {
        echo $_SESSION['username'];
    }
    else {
        $_SESSION['error'] = 'Неверный логин или пароль';
        header('Location: ../vendor/signin.php');
    }