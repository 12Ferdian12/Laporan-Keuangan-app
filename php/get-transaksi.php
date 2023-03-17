<?php
header("Access-Control-Allow-Origin: *");
require_once 'Transaksi.php';

$conn = connectToDb();
$data = getTransaksi($conn);
closeDb($conn);
http_response_code(200);
echo json_encode($data);
