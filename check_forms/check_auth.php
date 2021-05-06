<?php
    require_once '../connect.php';

    $login = $_POST['email'];
    $password = md5($_POST['pass']);

    $id = 1;

    $check_user = $pdo->query("SELECT * FROM `users` WHERE `email` = '$login' AND `password` = '$password'");
    $result = $check_user->fetch(PDO::FETCH_ASSOC);
    if ($result != 0) {
        echo 'Hello dear user';
    }
    else {
        echo 'Неверный логин или пароль';
    }