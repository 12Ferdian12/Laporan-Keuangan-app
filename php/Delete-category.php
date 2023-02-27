<?php
header("Access-Control-Allow-Origin: *");
require_once 'Kategori.php';

function requestCategory(){
    $input = file_get_contents("php://input");
    $data = json_decode($input,true);
    if(!isset($data["KategoriID"])){
        http_response_code(400);
        echo json_encode(["error" => "KategoriID is required"]);
        exit;
    }

    return $data["KategoriID"];
}

$conn = connectToDb();
$data = deleteCategoryById($conn, requestCategory());
closeDb($conn);
http_response_code(200);
echo json_encode($data);

