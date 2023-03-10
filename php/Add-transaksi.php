<?php
header("Access-Control-Allow-Origin: *");
require_once 'Transaksi.php';

function postRequestTransaksi(){
    $input = file_get_contents("php://input");
    $data = json_decode($input, true);
    if(!isset($data["Judul"])){
        http_response_code(400);
        echo json_encode(["error" => "Judul Transaksi Dibutuhkan"]);
        exit;
    }
    if(strlen($data["Judul"]) < 3){
        http_response_code(400);
        echo json_encode(["error" => "Judul Transaksi harus lebih dari 3 huruf"]);
        exit;
    }
    if(!isset($data["Nominal"])){
        http_response_code(400);
        echo json_encode(["error" => "Nominal Dibutuhkan"]);
        exit;
    }
    if((int)$data["Nominal"] < 0){
        http_response_code(400);
        echo json_encode(["error" => "Nominal harus lebih dari 0 (nol)"]);
        exit;
    }
    if(!isset($data["Type"])){
        http_response_code(400);
        echo json_encode(["error" => "Tipe Dibutuhkan"]);
        exit;
    }
    if(!isset($data["KategoriID"])){
        http_response_code(400);
        echo json_encode(["error" => "KategoriID Dibutuhkan"]);
        exit;
    }
    if(!isset($data["Tanggal"])){
        http_response_code(400);
        echo json_encode(["error" => "Tanggal Dibutuhkan"]);
        exit;
    }
    $data["Tanggal"] = date("Y-m-d", strtotime($data["Tanggal"]));
    return $data;
}

$conn = connectToDb();
$data = createTransaksi($conn, postRequestTransaksi());
closeDb($conn);
http_response_code(200);
echo json_encode($data);
