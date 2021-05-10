<?php
    session_start();
    require_once '../connect.php';

    function redirect() {
        header('Location: ../index.php');
    }

    $name = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['pass'];
    $password_confirm = $_POST['pass-confirm'];

    $check_email = $pdo->query("SELECT * FROM `users` WHERE `email` = '$email'");
    $result = $check_email->fetch(PDO::FETCH_ASSOC);

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
    else if ($result) {
        $_SESSION['error'] = 'Пользователь с таким электронным адресом уже существует';
        redirect();
    }
    else {
        $password = password_hash($password, PASSWORD_DEFAULT);
        $sql = $pdo->prepare("INSERT INTO `users`(`username`, `email`, `password`) VALUES('$name', '$email', '$password')");
        $sql->execute();
        header('Location: ../vendor/signin.php');
    }