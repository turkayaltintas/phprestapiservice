<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once '../objects/allClass.php';


$methods = new methods();
print_r($methods->methodControl("POST"));

$database = new Database();
$db = $database->getConnection();

$product = new Product($db);
$login = new Login($db);

$data = json_decode(file_get_contents("php://input"),true);
@$login->tokenControle($_POST['token']);

$fileName = $_FILES['sendimage']['name'];
$tempPath = $_FILES['sendimage']['tmp_name'];
$fileSize = $_FILES['sendimage']['size'];

if (empty($fileName)) {
    http_response_code(503);
    echo json_encode(array("message" => "please select image", "status" => false));
} else {
    $upload_path = '../upload/';
    $fileExt = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
    $valid_extensions = array('jpeg', 'jpg', 'png', 'gif');
    if (in_array($fileExt, $valid_extensions)) {
        if (!file_exists($upload_path . $fileName)) {
            if ($fileSize < 5000000) {
                move_uploaded_file($tempPath, $upload_path . $fileName);
            } else {
                echo json_encode(array("message" => "Sorry, your file is too large, please upload 5 MB size", "status" => false));
            }
        } else {
            echo json_encode(array("message" => "Sorry, file already exists check upload folder", "status" => false));
        }
    } else {
        echo json_encode(array("message" => "Sorry, only JPG, JPEG, PNG & GIF files are allowed", "status" => false));
    }
}