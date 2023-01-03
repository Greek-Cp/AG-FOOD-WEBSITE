<?php 
require('koneksi.php');
$query = "SELECT * FROM `informasi`;";
$eksekusi = mysqli_query($konek,$query);
$cek = mysqli_affected_rows($konek);
if($cek > 0){
    $response["kode"] = 1;
    $response["pesan"] = "Informasi Tersedia";
    
    while($ambil = mysqli_fetch_object($eksekusi)){
        $response["informasi"] = $ambil->informasi;
    }
}else {
    $response["kode"] = 0;
    $response["pesan"] = "IInformasi Tidak Tersedia";
}

echo json_encode($response);

?>