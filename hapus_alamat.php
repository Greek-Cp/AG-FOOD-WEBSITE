<?php
require('koneksi.php');
$response = array();
if($_SERVER['REQUEST_METHOD']=='POST'){
    $id_akun = $_POST['id_akun'];
    $alamat = $_POST['alamat'];
    $queryDelete = "DELETE FROM `alamat_user` WHERE `id_akun` = '" . $id_akun ."' AND `alamat` = '" . $alamat ."';";
    $rowsRes = mysqli_affected_rows($konek);
        $result = mysqli_query($konek,$queryDelete); 
        $rowsRes = mysqli_affected_rows($konek);
        if ($rowsRes > 0) {
        $response["kode"] = 1;
        $response["pesan"] = "Hapus Alamat Berhasil";
        } else{
        $response["kode"] = 1;
        $response["pesan"] = "Hapus Alamat Gagal"; 
        }
    } else{
        $response["kode"] = 0;
        $response["pesan"] = "Tidak Ada Post Data Alamat";    
    }

echo json_encode($response);
?>