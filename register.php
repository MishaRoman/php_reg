<?php
    require_once 'connect.php';

    $name = $_POST['username'];
    $email = $_POST['email'];
    $password = md5($_POST['pass']);
    $password_confirm = md5($_POST['pass-confirm']);

    if ($password != $password_confirm) {
        echo 'Пароли не совпадают';
    }
    else if (strlen(trim($name)) < 2 || strlen($name) > 60) {
        echo 'Недопустимая длина имени';
    }
    else if (strlen(trim($password)) < 8) {
        echo 'Пароль должен содержать минимум 8 символов';
    }
    else {
        $sql = $pdo->query("INSERT INTO `users`(`fullname`, `email`, `password`) VALUES('$name', '$email', '$password')");
        header('Location: /');
    }