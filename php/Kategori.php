<?php
    require_once 'database.php';

    function createKategori($conn, $data){
        $NamaKategori = mysqli_real_escape_string($conn,$data["NamaKategori"]);
        $sql = "INSERT INTO kategori (namaKategori) VALUES ('$NamaKategori')";
        if(!mysqli_query($conn, $sql)){
            http_response_code(500);
            echo json_encode(["error" => "Failed to create the ketegori: ".mysqli_error($conn)]);
            exit;
        }
        $data["ketegoriID"] = mysqli_insert_id($conn);
        return $data;
    }

    function getKategori($conn){
        $sql = "SELECT * FROM kategori;";
        $result = mysqli_query($conn, $sql);
        if(!$result){
            http_response_code(500);
            echo json_encode(["error" => "Failed to get the ketegori: ".mysqli_error($conn)]);
            exit;
        }
        $data = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }

        return $data;
    }
?>