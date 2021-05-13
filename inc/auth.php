<?php 
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Главная страница</title>
</head>
<body>
    <div class="container">
        <p>Привет <?= $_SESSION['username']?></p><br>
        <p>Чтобы изменить пароль нажми <a href="change_password_form.php">здесь</a></p><br>
        <p>Чтобы выйти нажми <a href="out.php">здесь</a></p>
    </div>
</body>