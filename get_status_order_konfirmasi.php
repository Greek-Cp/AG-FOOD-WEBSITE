<?php
require('koneksi.php');
$response = array();
if($_SERVER['REQUEST_METHOD']=='POST'){
    $id_keranjang = $_POST['id_keranjang'];
    $queryGetStatus = "SELECT `status_bayar` FROM `transaksi_pending` WHERE `id_keranjang` = '" . $id_keranjang . "';";
    $result = mysqli_query($konek,$queryGetStatus); 
    while($ambil = mysqli_fetch_object($result)){
        $response['status_order'] = $ambil->status_bayar;
    } 
}  else{
    $response["kode"] = 0;
    $response["pesan"] = "Tidak Ada Post Data Verfikasi";
}

echo json_encode($response);
?>