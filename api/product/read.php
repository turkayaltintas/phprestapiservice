<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET");
header("Content-Type: application/json; charset=UTF-8");

include_once '../objects/allClass.php';


$methods = new methods();
print_r($methods->methodControl("GET"));

$database = new Database();
$db = $database->getConnection();

$product = new Product($db);
$login = new Login($db);
$login->tokenControle(@$_GET['token']);

$stmt = $product->read();
$num = $stmt->rowCount();

if ($num > 0) {
    $products_arr = array();
    $products_arr["records"] = array();
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        extract($row);
        $product_item = array(
            "id" => $id,
            "name" => $name,
            "description" => html_entity_decode($description),
            "price" => $price,
            "category_id" => $category_id,
            "category_name" => $category_name
        );
        array_push($products_arr["records"], $product_item);
    }
    http_response_code(200);
    echo json_encode($products_arr, JSON_FORCE_OBJECT);
} else {
    http_response_code(404);
    echo json_encode(
        array("message" => "No products found.")
    );
}