<?php
header("Access-Control-Allow-Origin: *");
require_once 'Kategori.php';

function postRequestKategori(){
    $input = file_get_contents("php://input");
    $data = json_decode($input, true);
    if(!isset($data["NamaKategori"])){
        http_response_code(400);
        echo json_encode(["error" => "Nama Kategori Dibutuhkan"]);
        exit;
    }
    if(strlen($data["NamaKategori"]) < 3){
        http_response_code(400);
        echo json_encode(["error" => "Nama harus lebih dari 3 huruf"]);
        exit;
    }
    return $data;
}

$conn = connectToDb();
$data = createKategori($conn, postRequestKategori());
closeDb($conn);
http_response_code(200);
echo json_encode($data);
