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
    <title>Регистрация</title>
</head>
<body>
    <div class="container">
        <form action="check_forms/check_register.php" method="post" class="mt-5">
            <h1>Форма регистрации</h1>
            <input type="text" name="username" placeholder="Введите ваше имя" class="form-control"><br>
            <input type="email" name="email" placeholder="Введите ваш email" class="form-control"><br>          
            <input type="password" name="pass" placeholder="Введите пароль" class="form-control"><br>
            <input type="password" name="pass-confirm" placeholder="Подтвердите пароль" class="form-control"><br>
            <div class="text-danger">
                <?php echo $_SESSION['error'];
                $_SESSION['error'] = '';
                ?>
            </div>
            <button type="submit" class="btn btn-danger mt-2">Зарегистрироваться</button>
        </form>
        <p class="mt-2">У вас уже есть аккаунт? - <a href="vendor/signin.php">Авторизируйтесь</a>
    </div>
</body>
</html>
<!-- Доделать авторизацию -->