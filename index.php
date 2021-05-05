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
        <form action="register.php" method="post" class="mt-5">
            <h1>Форма регистрации</h1>
            <input type="text" name="username" placeholder="Введите ваше имя" class="form-control"><br>
            <input type="email" name="email" placeholder="Введите ваш email" class="form-control"><br>
            <input type="password" name="pass" placeholder="Введите пароль" class="form-control"><br>
            <input type="password" name="pass-confirm" placeholder="Подтвердите пароль" class="form-control"><br>
            <button type="submit" class="btn btn-danger">Зарегистрироваться</button>
        </form>
    </div>
</body>
</html>