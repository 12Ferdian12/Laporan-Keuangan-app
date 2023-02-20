<?php
    function connectToDb(){
        $host = "localhost"; // 127.0.0.1
        $username = "root";
        $password = "";
        $dbName = "laporan-keuangan";

        $conn = mysqli_connect($host, $username, $password, $dbName);
        if(!$conn){
            http_response_code(500);
            echo json_encode(["error" => "Failed to connect to the database: " . mysqli_connect_error() ]);
            exit;
        }
        return $conn;
    }

    function closeDb($conn){
        mysqli_close($conn);
    }

?>