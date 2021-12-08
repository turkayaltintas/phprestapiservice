<?php

class methods
{
    public $method;
    
    public function methodControl($method)
    {
        if($_SERVER["REQUEST_METHOD"] === $method){
            return true;
        }else{
            http_response_code(404);
            echo json_encode(
                array("message" => "REQUEST METHOD FAIL - Try: $method ")
            );
            die();
        }
        
    }

}