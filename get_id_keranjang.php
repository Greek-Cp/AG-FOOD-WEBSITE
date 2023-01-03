<?php
require('koneksi.php');
$id_akun = $_POST['id_akun'];
$query = "SELECT DISTINCT `id_keranjang` FROM `transaksi_pending` WHERE `id_akun` = '" . $id_akun . "';";
$eksekusi = mysqli_query($konek,$query);
$cek = mysqli_affected_rows($konek);
$currentIndex = 0;
if($cek > 0){
    $response["kode"] = 1;
    $response["pesan"] = "Id Keranjang Berhasil Di Dapatkan";
    $response["dataKeranjang"] = array();
    while($row = mysqli_fetch_object($eksekusi)){
        $F['id_keranjang'] = $row ->id_keranjang;
        array_push($response["dataKeranjang"], $F);
    }
}else {
    $response["kode"] = 0;
    $response["pesan"] = "Data Keranjang Kosong";
}
echo json_encode($response);
?>