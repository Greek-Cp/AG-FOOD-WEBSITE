<?php 
 require('koneksi.php');
 $response = array();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_transaksi = $_POST['id_transaksi'];
    $image_link = $_POST['image_transaksi'];
    $queryUpdate = "UPDATE `transaksi_pending` SET `gambar_transaksi` = '" . $image_link ."' WHERE `id_keranjang` = '" . $id_transaksi . "';";
    $result = mysqli_query($konek, $queryUpdate);
    $rowsRes = mysqli_affected_rows($konek);
    if($rowsRes > 0){
        $response["kode"] = 1;
        $response["pesan"] = "Profile Berhasil Di Ganti";
    } else{
        $response["kode"] = 0;
        $response["pesan"] = "Profile Gagal Di Ganti";    
    }
}    else{
    $response["kode"] = 0;
    $response["pesan"] = "Tidak Ada Perubahan Data";
}

echo json_encode($response);

?>