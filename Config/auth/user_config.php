<?php

class UserConfig{

    private $localhost = "localhost";
    private $username = "root";
    private $password = "";
    private $database = "rnw";
    private $table = "user";
    private $create;

    public function __construct(){
        $this->create = mysqli_connect($this->localhost, $this->username, $this->password, $this->database);
    }

    function signUp($username, $email, $password)
    {
        $pwd = password_hash($password, PASSWORD_DEFAULT);
        $query = "INSERT INTO $this->table (username,email,password) VALUES ('$username','$email','$pwd')";
        $insertData = mysqli_query($this->create, $query);
        return $insertData;
    }

    public function signIn($email,$password)
    {
        $query = "SELECT * FROM $this->table WHERE email='$email'"; 
        
        $selectData = mysqli_query($this->create, $query);
        $data =mysqli_fetch_assoc($selectData);
        $defaultPassword = $data['password'];

        $res = password_verify($password, $defaultPassword);
        
        if ($res) {
            return true;
        } else {
            return false;
        }
    }

}