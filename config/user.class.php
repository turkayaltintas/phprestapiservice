<?php

class user
{
    private $conn;
    private $table_name = "user";

    public $id;
    public $email;
    public $password;
    public $token;
    public $count;

    public function __construct($db){
        $this->conn = $db;
    }

    function checkUser($email = 0){
        $query = "
            SELECT id,email,password,token,token_expire
            FROM " . $this->table_name . "
            WHERE email=:email 
            LIMIT 1";
        $user = $this->conn->prepare($query);
        $user->bindParam(':email', $email);
        $user->execute();
        if($user->rowCount() > 0){
            return true;
        }
        return false;
    }
    function logout(){
        session_destroy();
    }

}