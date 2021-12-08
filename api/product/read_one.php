<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Credentials: true");
header('Content-Type: application/json');

include_once '../objects/allClass.php';

$methods = new methods();
print_r($methods->methodControl("GET"));

$database = new Database();
$db = $database->getConnection();

$product = new Product($db);
$login = new Login($db);
$login->tokenControle(@$_GET['token']);

$product->id = isset($_GET['id']) ? $_GET['id'] : die();

$product->readOne();

if ($product->name != null) {
    $product_arr = array(
        "id" => $product->id,
        "name" => $product->name,
        "description" => $product->description,
        "price" => $product->price,
        "category_id" => $product->category_id,
        "category_name" => $product->category_name,
        "created" => $product->created,
        "modified" => $product->modified
    );
    http_response_code(200);
    echo json_encode($product_arr);
} else {
    http_response_code(404);
    echo json_encode(array("message" => "Product does not exist."));
}
?>