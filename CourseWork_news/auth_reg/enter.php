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
        <label>Адрес электронной почты</label>
        <input type= "text" class= "form-control" name="login"
               id="login" placeholder="Введите почту">
        <label>Пароль</label>
        <input type="password" class="form-control" name="password"
               id="password" placeholder="Введите пароль">
        <button type="submit" class="log_in">Войти</button>
        <p>
            Нет аккаунта? - <a href="registration.php"> зарегистрируйся</a>
        </p>
        <p class="msg nothing">some text</p>

        <script src = ../js/jquery-3.6.3.js></script>
        <script src = ../js/main.js></script>
    </form>
</div>
</body>
</html>