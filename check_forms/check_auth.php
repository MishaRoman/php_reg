<?php
    // Запуск сессии
    session_start();
    // Подключение файла с настройками БД
    require_once '../connect.php';

    // Присвоение данных из формы в переменные
    $login = $_POST['email'];
    $password = $_POST['pass'];
    // $password = password_hash($_POST['pass'], PASSWORD_DEFAULT);

    $check_user = $pdo->query("SELECT * FROM `users` WHERE `email` = '$login'");
    $result = $check_user->fetch(PDO::FETCH_ASSOC);
    // Если пользователь найден
    if ($result) {
        echo 'Hello';
    }
    // Если пользователь не найден
    else {
        $_SESSION['error'] = 'Неверный логин или пароль';
        header('Location: ../vendor/signin.php');
    }