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
    <link rel="stylesheet" href="../css/style.css">
    <title>Смена пароля</title>
</head>
<body>
    <div class="container">
        <form action="../check_forms/change_password.php" method="post" class="mt-5">
            <h1>Смена пароля</h1>        
            <input type="password" name="old_pass" placeholder="Старый пароль" class="form-control"><br>
            <input type="password" name="new_pass" placeholder="Новый пароль" class="form-control"><br>
            <input type="password" name="new_pass_confirm" placeholder="Подтвердите пароль" class="form-control"><br>
            <div class="text-danger">
                <?php echo $_SESSION['error_pass'];
                $_SESSION['error_pass'] = '';
                ?>
            </div>
            <button type="submit" class="btn btn-danger mt-2">Принять</button>
        </form>
    </div>
</body>
</html>