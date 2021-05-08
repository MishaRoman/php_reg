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
    $password = password_hash($_POST['pass'], PASSWORD_DEFAULT);
    $password_confirm = password_hash($_POST['pass-confirm'], PASSWORD_DEFAULT);
 
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
    // Если данные прошли все проверки
    else {
        // Записываем данные из переменных в базу данных
        $sql = $pdo->query("INSERT INTO `users`(`username`, `email`, `password`) VALUES('$name', '$email', '$password')");
        // Перенаправление пользователя на страницу с формой авторизации
        header('Location: ../vendor/signin.php');
    }