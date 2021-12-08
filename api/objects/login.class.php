<?php

class Login{
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

    public function count(){
        $query = "SELECT COUNT(*) as total_rows FROM " . $this->table_name . " ";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam('email', $this->email);
        $stmt->bindParam('password', $this->password);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        return $row['total_rows'];
    }

    function readOne(){
        $query = "
            SELECT id,email,password,token,token_expire
            FROM " . $this->table_name . "
            WHERE email=:email AND password=:password 
            LIMIT 1";

        $stmt = $this->conn->prepare($query);

        $this->email=htmlspecialchars(strip_tags($this->email));
        $this->password=htmlspecialchars(strip_tags($this->password));
        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':password', $this->password);
        $stmt->execute();

        if($stmt->rowCount() > 0){
            $Token = $this->generateToken($this->email);
            $this->token = $Token;
            $this->count = 1;
        }else{
            $this->token = null;
            $this->count = 0;
        }
    }

    function generateToken($email){
        $tokentime	= date("Y-m-d- H:i:s", strtotime("+30minutes"));
        $tokenstring = rand().time();
        $token = (uniqid($tokenstring, true));
        $this->token = $token;
        $query = "UPDATE
                " . $this->table_name . "
            SET
                token=:token,token_expire=:token_expire
            WHERE
                email=:email";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':token', $token);
        $stmt->bindParam(':token_expire', $tokentime);
        $stmt->execute();
        return $token;
    }

    function tokenControle($token){
        if(empty($token)){
            echo json_encode(array("message" => "Pls, add Token"));
            die();
        }

        $query = "
            SELECT token
            FROM " . $this->table_name . "
            WHERE token=:token 
            LIMIT 1";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':token', $token);
        $stmt->execute();
        if($stmt->rowCount() > 0){
            return true;
        }else{
            http_response_code(503);
            echo json_encode(array("message" => "Token expire"));
            die();
        }

    }

}