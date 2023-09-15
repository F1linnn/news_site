<?php
if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
}else{
    header("Location: ../index.php");
    die();
}

    session_start();
    require_once 'json_crud.php';
    require_once 'validation.php';
//    $database = new Json();
    $database = new mysqli('localhost','root','','news_web');
    $validation = new Validation();
    $name = $_POST["your_name"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $conf_pass = $_POST["confirm_pass"];
    $errors = [];

    $response = $validation->check_empty($name,$email, $password, $conf_pass);
    if(!empty($response))
    {
        echo json_encode($response);
        die();
    }

    $response = $validation ->check_email($email);
    if(!empty($response))
    {
        echo json_encode($response);
        die();
    }

    $response = $validation ->check_individual_email($email, $database);
    if(!empty($response))
    {
        echo json_encode($response);
        die();
    }

    $response = $validation->check_len($password,6, 'password');
    if(!empty($response))
    {
        echo json_encode($response);
        die();
    }

    $response = $validation->check_len($name,2, 'your_name');
    if(!empty($response))
    {
        echo json_encode($response);
        die();
    }

    $response = $validation->check_name($name);
    if(!empty($response))
    {
        echo json_encode($response);
        die();
    }

    $response = $validation->check_pass($password);
    if(!empty($response))
    {
        echo json_encode($response);
        die();
    }

    $response = $validation->equal_passwords($password,$conf_pass);
    if(!empty($response))
    {
        echo json_encode($response);
        die();
    }

    $password= sha1($password);
    $database->query("INSERT INTO accounts1(`name`, `email`, `password`) VALUES ('$name', '$email', '$password')");
    $_SESSION['user'] = ["name"=>$name, "email"=>$email];
    setcookie($name,time()+3600);
    echo json_encode(['status' => true]);

?>