<?php
  header("Access-Control-Allow-Origin: *");
  require_once 'Transaksi.php';
  
  $conn = connectToDb();
  $data["Spending"] = getSpending($conn);
  $data["Income"] = getIncome($conn);
  $data["Balance"] = $data["Income"] - $data["Spending"];
  closeDb($conn);
  http_response_code(200);
  echo json_encode($data);