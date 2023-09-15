<?php
class Json{
    private $file = "../files_json/data_accounts.json";

    public function get_user_by_login($login)
    {
        $data_json = file_get_contents($this->file);
        $data = json_decode($data_json,1);
        $user = array_filter($data, function($info) use ($login){return $info['login'] == $login;});
        return !empty($user)? array_values($user)[0]:false;
    }

    public function get_user_by_email($email)
    {
        $data_json = file_get_contents($this->file);
        $data = json_decode($data_json,1);
        $user = array_filter($data, function($info) use ($email){return $info['email'] == $email;});
        return !empty($user)? array_values($user)[0]:false;
    }

    public function add_new_user($new_user)
    {
        $data_json = file_get_contents($this->file);
        $data = json_decode($data_json,1);

        if(!empty($data)) $data[] = $new_user;
        else $data = [$new_user];

        $added = file_put_contents($this->file,json_encode($data));
        return $added? 1:0;
    }

    public function update_info($new_data, $login)
    {
        return 0;
    }

    public function delete_user($login)
    {
        $data_json = file_get_contents($this->file);
        $data = json_decode($data_json,1);
        $new_date = array_filter($data, function($user) use ($login){ return $user['login']!= $login;});
        $added = file_put_contents($this->file,json_encode($data));
        return $added? 1:0;

    }
}
?>