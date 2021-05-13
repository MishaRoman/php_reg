<?php
    session_start();

    require_once '../connect.php';

    $old_password = $_POST['old_pass'];
    $new_password = $_POST['new_pass'];
    $new_password_confirm = $_POST['new_pass_confirm'];

    $email = $_SESSION['email'];

    $check_user = $pdo->query("SELECT * FROM `users` WHERE `email` = '$email'");
    $result = $check_user->fetch(PDO::FETCH_ASSOC);

    if (!password_verify($old_password, $result['password'])){
        $_SESSION['error_pass'] = 'Неверный пароль';
        header('Location: ../inc/change_password_form.php');
    }
    else if ($new_password != $new_password_confirm){
        $_SESSION['error_pass'] = 'Пароли не совпадают';
        header('Location: ../inc/change_password_form.php');
    }
    else if (strlen(trim($new_password)) < 8) {
        $_SESSION['error_pass'] = 'Пароль должен содержать минимум 8 символов';
        header('Location: ../inc/change_password_form.php');
    }
    else if ($old_password === $new_password) {
        $_SESSION['error_pass'] = 'Новый пароль не должен совпадать со старым';
        header('Location: ../inc/change_password_form.php');
    }
    else {
        $hash_new_password = password_hash($new_password, PASSWORD_DEFAULT);
        $query = ("UPDATE `users` SET `password` = '$hash_new_password' WHERE `email` = '$email'");
        $sql = $pdo->prepare($query);
        $sql->execute();
        header('Location: ../inc/auth.php');
    }