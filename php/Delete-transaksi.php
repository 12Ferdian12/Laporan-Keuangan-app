<?php
header("Access-Control-Allow-Origin: *");
require_once 'Transaksi.php';

function requestTransaksi(){
    $input = file_get_contents("php://input");
    $data = json_decode($input,true);
    if(!isset($data["TransaksiID"])){
        http_response_code(400);
        echo json_encode(["error" => "TransaksiID is required"]);
        exit;
    }

    return $data["TransaksiID"];
}

$conn = connectToDb();
$data = deleteTransaksiById($conn, requestTransaksi());
closeDb($conn);
http_response_code(200);
echo json_encode($data);

