<?php
    // Запуск сессии
    session_start();
    // Подключение файла с настройками БД
    require_once '../connect.php';

    // Функция которая перенаправляет пользователя
    function redirect() {
        header('Location: ../index.php');
    }

    // Присваиваем данные из формы в соответствующие переменные
    $name = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['pass'];
    $password_confirm = $_POST['pass-confirm'];

    // Проверяем существует ли пользователь с таким email
    $check_email = $pdo->query("SELECT * FROM `users` WHERE `email` = '$email'");
    $result = $check_email->fetch(PDO::FETCH_ASSOC);

    // Проверяем совпадают ли пароли
    if ($password != $password_confirm) {
        $_SESSION['error'] = 'Пароли не совпадают';
        redirect();
    }
    // Проверка длины имени
    else if (strlen(trim($name)) < 2 || strlen($name) > 60) {
        $_SESSION['error'] = 'Недопустимая длина имени';
        redirect();
    }
    // Проверка длины пароля
    else if (strlen(trim($password)) < 8) {
        $_SESSION['error'] = 'Пароль должен содержать минимум 8 символов';
        redirect();
    }
    else if ($result) {
        $_SESSION['error'] = 'Пользователь с таким электронным адресом уже существует';
        redirect();
    }
    // Если все проверки пройдены
    else {
        // Хешируем пароль функцией password_hash()
        $password = password_hash($password, PASSWORD_DEFAULT);
        // Подготавливаем SQL запрос на добавление данных пользователя в БД
        $sql = $pdo->prepare("INSERT INTO `users`(`username`, `email`, `password`) VALUES('$name', '$email', '$password')");
        // Выполняем SQL запрос
        $sql->execute();
        // Перенаправляем пользователя на страницу авторизации
        header('Location: ../inc/signin.php');
    }