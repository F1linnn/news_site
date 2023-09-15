<?php
session_start();
if(isset($_SESSION['user']))
    header('Location: ../auth_reg/account_enter.php');
?>

<!doctype html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <title>Навiны BY</title>
    <link rel="stylesheet" href="../css/main.css">
</head>
<body>

<div>
    <form>
        <label>Имя</label>
        <input type= "text" class= "form-control" name= "your_name"
               id= "your_name" placeholder="Введите свое Имя">
        <label>Email</label>
        <input type= "text" class= "form-control" name= "email"
               id= "email" placeholder="Введите email">
        <label>Пароль</label>
        <input type= "password" class= "form-control" name= "password"
               id= "password" placeholder="Введите пароль">
        <label>Подтвердите пароль</label>
        <input type= "password" class= "form-control"  name= "confirm_pass"
               id= "confirm_pass" placeholder="Подтвердите пароль">
        <button type="submit" class="but_reg"> Зарегистрироваться</button>
        <p>
            Уже есть аккаунт? - <a href="enter.php"> авторизоваться</a>
        </p>

        <p class="msg nothing"> some text</p>

        <script src = ../js/jquery-3.6.3.js></script>
        <script src = ../js/main.js></script>
    </form>
</div>
</body>
</html>