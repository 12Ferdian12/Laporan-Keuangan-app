<?php
header("Access-Control-Allow-Origin: *");
require_once 'Kategori.php';

$conn = connectToDb();
$data = getKategori($conn);
closeDb($conn);
http_response_code(200);
echo json_encode($data);
