<?php 
require('koneksi.php');
$menuCari = $_POST["menu_cari"];
$query = "SELECT * FROM `barang` WHERE `nama_barang` LIKE '%". $menuCari."%';";
$eksekusi = mysqli_query($konek,$query);
$cek = mysqli_affected_rows($konek);
if($cek > 0){
    $response["kode"] = 1;
    $response["pesan"] = "Data Tersedia";
    $response ["dataBarang"] = array();
    while($ambil = mysqli_fetch_object($eksekusi)){
        $F["id_barang"] = $ambil -> id_barang;
        $F["nama_barang"] = $ambil -> nama_barang;
        $F["rating"] = $ambil -> rating;
        $F['jenis_barang'] = $ambil -> jenis_barang;
        $F['harga_original'] = $ambil -> harga;    
        $F['gambar_barang'] = $ambil -> gambar_barang;
        $F['deskripsi_barang'] = $ambil -> deskripsi_barang;
        $F['imageType'] = $ambil -> imageType;
        array_push($response["dataBarang"],$F);
    }
}else {
    $response["kode"] = 0;
    $response["pesan"] = "Data Tidak Tersedia";
}

echo json_encode($response);

?>