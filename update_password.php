<?php
require('koneksi.php');
$response = array();
if($_SERVER['REQUEST_METHOD']=='POST'){
    $emailVerif = $_POST["email"];
    $passwordBaru = $_POST["password"];
    $hashPassword = password_hash($passwordBaru,PASSWORD_DEFAULT);
    $queryUpdate = "UPDATE `akun` SET `password` = '" . $hashPassword . "' WHERE `email` = '" . $emailVerif . "';";
    $result = mysqli_query($konek,$queryUpdate); 
    $rowsRes = mysqli_affected_rows($konek);
    if($rowsRes > 0){
        $response["kode"] = 1;
        $response["pesan"] = "Password Berhasil Di Ganti";
    } else{
        $response["kode"] = 0;
        $response["pesan"] = "Verifikasi Akun Gagal";    
    }
    
}    else{
    $response["kode"] = 0;
    $response["pesan"] = "Tidak Ada Post Data Update Password";
}

echo json_encode($response);
?>