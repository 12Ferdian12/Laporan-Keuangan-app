<?php
    require_once 'database.php';

    function createTransaksi($conn, $data){
        $Judul= mysqli_real_escape_string($conn,$data["Judul"]);
        $Nominal= mysqli_real_escape_string($conn,$data["Nominal"]);
        $Type = mysqli_real_escape_string($conn,$data["Type"]);
        $KategoriID = mysqli_real_escape_string($conn,$data["KategoriID"]);
        $Tanggal = mysqli_real_escape_string($conn,$data["Tanggal"]);
        $sql = "INSERT INTO transaksi (Judul,Jumlah,Tipe,Tanggal,KategoriID) VALUES ('$Judul','$Nominal','$Type','$Tanggal','$KategoriID' )";
        
        if(!mysqli_query($conn, $sql)){
            http_response_code(500);
            echo json_encode(["error" => "Failed to create the Transaksi: ".mysqli_error($conn)]);
            exit;
        }
        $data["TransaksiID"] = mysqli_insert_id($conn);
        return $data;
    }

    function getTransaksi($conn){
        $sql = "SELECT T.*, K.namaKategori FROM transaksi T INNER JOIN kategori K ON T.KategoriID = K.KategoriID ORDER BY T.Tanggal DESC";
        $result = mysqli_query($conn, $sql);
        if(!$result){
            http_response_code(500);
            echo json_encode(["error" => "Failed to get the Transaksi: ".mysqli_error($conn)]);
            exit;
        }
        $data = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }

        return $data;
    }

//     function getKategoriByID($conn, $KategoriID){
//         $sql = "SELECT * FROM kategori WHERE KategoriID = $KategoriID;";
//         $result = mysqli_query($conn, $sql);
//         if(!$result){
//             http_response_code(500);
//             echo json_encode(["error" => "Failed to get the ketegori: ".mysqli_error($conn)]);
//             exit;
//         }
//         $data = array();
//         while ($row = mysqli_fetch_assoc($result)) {
//             $data[] = $row;
//         }

//         return $data[0];
//     }

    
//     function deleteCategoryById($conn, $KategoriID){
//         $sql = "DELETE FROM kategori WHERE KategoriID = $KategoriID;";
//         if(!mysqli_query($conn, $sql)){
//             http_response_code(500);
//             echo json_encode(["error" => "Failed to delete the category: ".mysqli_error($conn)]);
//             exit;
//         }
//         return ["message" => "Category deleted successfully"];
//     }

//     function updateKategoriById($conn, $kategori){
//         $id = mysqli_real_escape_string($conn,$kategori["kategoriID"]);
//         $name = mysqli_real_escape_string($conn,$kategori["namaKategori"]);
//         $sql = "UPDATE kategori SET namaKategori = '$name' WHERE KategoriID = $id";
//         if(!mysqli_query($conn, $sql)){
//             http_response_code(500);
//             echo json_encode(["error" => "Failed to update the kategori: ".mysqli_error($conn)]);
//             exit;
//         }
//         $data["KategoriID"] = mysqli_insert_id($conn);
//         return $data;
//     }

?>