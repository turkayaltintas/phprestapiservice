<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once '../config/core.php';
include_once '../shared/utilities.php';
include_once '../config/database.php';
include_once '../objects/allClass.php';

$utilities = new Utilities();
$database = new Database();
$db = $database->getConnection();

$product = new Product($db);
$login = new Login($db);
$login->tokenControle(@$_GET['token']);

$stmt = $product->readPaging($from_record_num, $records_per_page);
$num = $stmt->rowCount();

if ($num > 0) {

    $products_arr = array();
    $products_arr["records"] = array();
    $products_arr["paging"] = array();

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
    $total_rows = $product->count();
    $page_url = "{$home_url}product/read_paging.php?";
    $paging = $utilities->getPaging($page, $total_rows, $records_per_page, $page_url);

    $products_arr["paging"] = $paging;

    http_response_code(200);
    echo json_encode($products_arr);
} else {
    http_response_code(404);
    echo json_encode(
        array("message" => "No products found.")
    );
}
?>