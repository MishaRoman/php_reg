<?php
// Попытка подключится к базе данных
try {
    // Создание экземпляра класса PDO через который происходит взаимодействие с БД
    $pdo = new PDO('mysql:host=localhost;dbname=register-db', 'root', 'root');
} catch (PDOException $e) {
    // Если есть ошибка выводим её на экран
    print "Error!: " . $e->getMessage();
    // Отменяем подальшее выполнение кода
    die();
  }
