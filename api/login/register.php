<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: PUT");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once '../objects/allClass.php';
$methods = new methods();
print_r($methods->methodControl("PUT"));

$data = json_decode(file_get_contents("php://input"));
$database = new Database();
$db = $database->getConnection();
$login = new Login($db);

if(!empty($data->email) && !empty($data->password)){
    $login_arr = array();
    $login_arr["data"] = array();

    $login->email = $data->email;
    $login->password = $data->password;
    $login->Register();
    if($login->checkUser()){
        http_response_code(200);
        $login_item = array(
            "email" => $login->email
        );
        array_push($login_arr["data"], $login_item);
        echo json_encode($login_arr);
    }else{
        http_response_code(404);
        echo json_encode(array("message" => "Your E-Mail is already subscribed"));
    }
}else{
    http_response_code(404);
    echo json_encode(array("message" => "E-Mail and Password is not null"));
}
?>