<?php
    session_start();

    require_once '../connect.php';

    $old_password = $_POST['old_pass'];
    $new_password = $_POST['new_pass'];
    $new_password_confirm = $_POST['new_pass_confirm'];

    $email = $_SESSION['email'];

    $check_user = $pdo->query("SELECT * FROM `users` WHERE `email` = '$email'");
    $result = $check_user->fetch(PDO::FETCH_ASSOC);

    if (password_verify($old_password, $result['password'])){
        $hash_new_password = password_hash($new_password, PASSWORD_DEFAULT);
        $query = ("UPDATE `users` SET `password` = '$hash_new_password' WHERE `email` = '$email'");
        $sql = $pdo->prepare($query);
        $sql->execute();
    }
    else {
        $_SESSION['error_pass'] = 'No';
        header('Location: ../inc/change_password_form.php');
    }