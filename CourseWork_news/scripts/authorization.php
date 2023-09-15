<?php
if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
}else{
    header("Location: ../start.php");
    die();
}
    session_start();
    $_SESSION['message'] = "";
    require_once "json_crud.php";
    $database = new mysqli('localhost','root','','news_web');
    $login = $_POST["login"];
    $password = $_POST["password"];
    $errors=[];
    if(empty($login))
        $errors[]='login';
    if(empty($password))
        $errors[]='password';

    if(!empty($errors))
    {
        $response =
            [
                'status' => false,
                'type'=> 1,
                'message' => "Вы что-то не ввели!",
                'errors' =>$errors
            ];
        echo json_encode($response);
        die();
    }


    $user = $database->query("SELECT * FROM `accounts1` WHERE `email`='$login'");
    $user = $user->fetch_assoc();
    if (empty($user) || $user['password'] != sha1($password))
    {
        $response = ['status' => false,'type'=> 1, 'message' => "Неверный логин или пароль!",'errors' =>['password','login']];
    } else {
        $_SESSION['user'] = ['name' => $user['name'], 'email' => $user['email']];
        setcookie($user['name'],time()+3600);
        $response = ['status' => true];
    }

    echo json_encode($response);
?>