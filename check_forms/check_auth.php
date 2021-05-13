<?php
    // Запуск сессии
    session_start();
    // Подключение файла с настройками БД
    require_once '../connect.php';

    // Присвоение данных из формы в переменные
    $login = $_POST['email'];
    $password = $_POST['pass'];

    // Проверяем существует ли пользователь с таким логином
    $check_user = $pdo->query("SELECT * FROM `users` WHERE `email` = '$login'");
    $result = $check_user->fetch(PDO::FETCH_ASSOC);

    // Если пользователь найден
    if ($result) {
        // Если пароль верный
        if (password_verify($password, $result['password'])){
            // Присваиваем в значения сессии значения из БД
            $_SESSION['username'] = $result['username'];
            $_SESSION['email'] = $result['email'];
            header('Location: ../inc/auth.php');
        }
        else{
            $_SESSION['error'] = 'Неверный пароль';
            header('Location: ../inc/signin.php');
        }
    }
    else {
        $_SESSION['error'] = 'Неверный логин';
        header('Location: ../inc/signin.php');
    }
