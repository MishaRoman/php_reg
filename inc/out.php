<?php
    session_start();

    unset($_SESSION['email']);
    unset($_SESSION['username']);
    $_SESSION['error'] = '';

    header('Location: signin.php');