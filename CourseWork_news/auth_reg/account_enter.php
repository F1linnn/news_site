<?php
session_start();
if(!isset($_SESSION['user']) && !isset($_COOKIE[$_SESSION['user']['login']]))
    header('Location: ../index.php');
?>

<!doctype html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <title>Тестовое задание</title>
    <link rel="stylesheet" href="../css/main.css">
</head>
<body>

<div>
    <h1>
        <?php echo "Приветствуем ".$_SESSION['user']['name']."!"; ?>
    </h1>
    <button class="out">Выход</button>

    <script src = ../js/jquery-3.6.3.js></script>
    <script src = ../js/main.js></script>

</div>
</body>
</html>
