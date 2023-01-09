<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "laporan-keuangan";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

  function fetchCategory(){
    global $conn;
    $sql = "SELECT * FROM kategori";
    $result = $conn->query($sql);
    $conn->close();
    
    if ($result->num_rows > 0) {
      // output data of each row
      // while($row = $result->fetch_assoc()) {
      //   echo "id: " . $row["KategoriID"]. " - Name: " . $row["namaKategori"]. "<br>";
      // }
      return $result;
    } else {
      return null;
    }
  }

?>