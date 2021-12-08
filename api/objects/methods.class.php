<?php

class methods
{
    public $method;
    
    public function methodControl($method)
    {
        if($_SERVER["REQUEST_METHOD"] !== $method){
            http_response_code(405);
            echo json_encode(
                array("message" => "Method Not Allowed - Try: $method ")
            );
            die();
        }
        
    }

}