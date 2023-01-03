<?php
require('koneksi.php');
$response = array();
if($_SERVER['REQUEST_METHOD']=='POST'){
    $emailVerif = $_POST["email"];
    $queryUpdate = "UPDATE `akun` SET `status_verif` = 1 WHERE `email` = '" . $emailVerif . "';";
    $result = mysqli_query($konek,$queryUpdate); 
    $rowsRes = mysqli_affected_rows($konek);
    if($rowsRes > 0){
        $response["kode"] = 1;
        $response["pesan"] = "Verifikasi Akun Berhasil";
    } else{
        $response["kode"] = 0;
        $response["pesan"] = "Verifikasi Akun Gagal";    
    }

}    else{
    $response["kode"] = 0;
    $response["pesan"] = "Tidak Ada Post Data Verfikasi";
}

echo json_encode($response);
?>