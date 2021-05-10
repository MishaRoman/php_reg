<?php
    session_start();
    require_once '../connect.php';

    $login = $_POST['email'];
    $password = $_POST['pass'];
    // $password = password_hash($_POST['pass'], PASSWORD_DEFAULT);

    $check_user = $pdo->query("SELECT * FROM `users` WHERE `email` = '$login'");
    $result = $check_user->fetch(PDO::FETCH_ASSOC);
    if ($result) {
        echo 'Hello';
    }
    else {
        echo 'Неверный логин или пароль';
    }