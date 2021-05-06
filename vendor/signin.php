<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">

    <title>Авторизация</title>
  </head>

<body>
    <div class="container">
        <form action="../check_forms/check_auth.php" method="post" class="mt-5">
            <h1>Форма Авторизации</h1>
            <input type="email" name="email" placeholder="Введите ваш email" class="form-control"><br>
            <input type="password" name="pass" placeholder="Введите пароль" class="form-control">
            <div class="text-danger"><?=$_SESSION['error']?></div>
            <button type="submit" class="btn btn-danger mt-2">Войти</button>
        </form>
        <p class="mt-2">Нету аккаунта? - <a href="../index.php">Зарегистрируйтесь</a>
    </div>
</body>
</html>