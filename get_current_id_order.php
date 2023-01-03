<?php 
require('koneksi.php');
$query = "SELECT DISTINCT `id_keranjang` FROM `transaksi_pending` ORDER BY `id_keranjang` DESC;";
$eksekusi = mysqli_query($konek,$query);
$cek = mysqli_affected_rows($konek);

$currentIndex = 0;
if($cek > 0){
    $response["kode"] = 1;
    $response["pesan"] = "Data Keranjang Lebih Dari 1";
    $index = 0;
    while($row = mysqli_fetch_array($eksekusi)){
        $idBarang = $row['id_keranjang'];
        $rep = str_replace("KRJ", "", $idBarang);
        $rep++;
        $index++;
    }
    $index += 1;
    $response["id_keranjang"] = $index;
}else {
    $response["kode"] = 0;
    $response["pesan"] = "Data Keranjang Kosong";
    $response["id_keranjang"] = "1";
}
echo json_encode($response);
?>