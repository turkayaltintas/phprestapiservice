<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

// include database and object file
include_once '../config/database.php';
include_once '../objects/product.php';
include_once '../objects/login.php';

$database = new Database();
$db = $database->getConnection();

$product = new Product($db);
$login = new Login($db);

$data = json_decode(file_get_contents("php://input"));
$login->tokenControle(@$data->token);

$product->id = $data->id;

if($product->delete()){
    http_response_code(200);
    echo json_encode(array("message" => "Product was deleted."));
}else{
    http_response_code(503);
    echo json_encode(array("message" => "Unable to delete product."));
}

?>