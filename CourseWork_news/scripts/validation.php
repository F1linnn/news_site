<?php
require_once "json_crud.php";
class Validation
{
    public function check_len($str,$amount,$name_str)
    {
        $dict = ["login"=>"Логин", "password"=>"Пароль", "your_name"=>"Имя"];
        $responce = [];
        $len = strlen($str) ;
        if($len >= $amount)
        {
            return [];
        }
        else
        {
           return $response = [
                    'status' => false,
                    'type'=> 3,
                    'message' => $dict[$name_str].": "."минимальное кол-во символов - ".$amount,
                    'errors' =>[$name_str]
                ];
        }
    }
    public function check_name($str)
    {
        if(ctype_alpha($str))
            return $response=[];
        else return $response =
            [
                'status' => false,
                'type'=> 4,
                'message' => "Имя должно состоять только из букв",
                'errors' =>['your_name']
            ];
    }

    public function check_pass($str)
    {
        if(ctype_alpha($str) || ctype_digit($str))
        {
            return $response =
            [
                'status' => false,
                'type'=> 5,
                'message' => "Пароль обязательно должен состоять только из букв и цифр",
                'errors' =>['password']
            ];}

        if(ctype_alnum($str))
            return $response=[];

        else return $response =
            [
                'status' => false,
                'type'=> 5,
                'message' => "Пароль обязательно должен состоять только из букв и цифр",
                'errors' =>['password']
            ];
    }

    public function check_login($str)
    {
        if(!ctype_graph($str))
            return $response =
                [
                    'status' => false,
                    'type'=> 6,
                    'message' => "Логин не должен содержать пробелы.",
                    'errors' =>['login']
                ];
        else return $response=[];
    }

    public function check_email($str)
    {
        if(!filter_var($str,FILTER_VALIDATE_EMAIL))
            return $response =
                [
                    'status' => false,
                    'type'=> 6,
                    'message' => "Неккоректный email!",
                    'errors' =>['email']
                ];
        else return $response=[];
    }
    public function check_empty($name, $email, $password, $conf_pass)
    {
        if(empty($name))
            $errors[]='your_name';
        if(empty($email))
            $errors[]='email';
        if(empty($password))
            $errors[]='password';
        if(empty($conf_pass))
            $errors[]='confirm_pass';

        $response = [];
        if(!empty($errors))
        {
            $response =
                [
                    'status' => false,
                    'type'=> 1,
                    'message' => "Заполните поля!",
                    'errors' =>$errors
                ];
            return $response;
        }
        else return $response;
    }
    public function equal_passwords($pass,$conf_pass)
    {
        $response = [];
        if($pass != $conf_pass)
        {
            $errors[]='confirm_pass';
            $response =
                [
                    'status' => false,
                    'type'=> 2,
                    'message' => "Пароли не совпадают!",
                    'errors' =>$errors
                ];
            return $response;
        }
        else return $response;
    }

    public function check_individual_login($login,$db)
    {
        $checkuser = $db->get_user_by_login($login);
        if(!empty($checkuser))
        {
            $errors[]='login';
            $response =
                [
                    'status' => false,
                    'type'=> 2,
                    'message' => "Данный логин уже используется",
                    'errors' =>$errors
                ];
            return $response;
        }
        else return [];
    }

    public function check_individual_email($email,$db)
    {
        $checkuser = $db->query("SELECT `email` FROM `accounts1` WHERE `email`='$email'");
        if($checkuser->num_rows >0)
        {
            $errors[]='email';
            $response =
                [
                    'status' => false,
                    'type'=> 2,
                    'message' => "Данный email уже используется",
                    'errors' =>$errors,
                    "user" =>$checkuser
                ];
            return $response;
        }
        else return [];
    }
}
?>