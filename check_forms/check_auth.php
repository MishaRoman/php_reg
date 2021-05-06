<?php
    session_start();
    require_once '../connect.php';

    $login = $_POST['email'];
    $password = md5($_POST['pass']);

    $check_user = $pdo->query("SELECT * FROM `users` WHERE `email` = '$login' AND `password` = '$password'");
    $result = $check_user->fetch(PDO::FETCH_ASSOC);
    if ($result) {
        print_r($_SESSION['username']);
    }
    else {
        echo 'Неверный логин или пароль';
    }