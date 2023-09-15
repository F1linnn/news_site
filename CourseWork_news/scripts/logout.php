<?php
//    Проверка ajax
    if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
    }else{
        header("Location: index.php");
        die();
    }

    session_start();
//    setcookie($_SESSION['name'],"");
    unset($_SESSION['user']);
    $response = ['status' => true];
    echo json_encode($response);
    die();
?>