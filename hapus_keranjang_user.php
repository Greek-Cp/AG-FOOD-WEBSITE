<?php
require('koneksi.php');
$response = array();
if($_SERVER['REQUEST_METHOD']=='POST'){
    $id_akun = $_POST['id_akun'];
    $id_brg = $_POST['id_barang'];
    $queryDelete = "DELETE FROM `keranjang_user` WHERE `id_akun` = '" . $id_akun. "'AND `id_barang` = '" . $id_brg . "';";
  $rowsRes = mysqli_affected_rows($konek);
        $result = mysqli_query($konek,$queryDelete); 
        $rowsRes = mysqli_affected_rows($konek);
        if ($rowsRes > 0) {
        $response["kode"] = 1;
        $response["pesan"] = "Hapus Berhasil Dan Insert Ke Pending Berhasil";
        } else{
            $response["kode"] = 1;
        $response["pesan"] = "Hapus Gagal Dan Insert Ke Pending Gagal"; 
        }
    } else{
        $response["kode"] = 0;
        $response["pesan"] = "Hapus Gagal";    
    }

echo json_encode($response);
?>