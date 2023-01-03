<?php 
require('koneksi.php');
$data = $_POST['id_akun'];

$query = "SELECT * FROM `favorit_akun` WHERE `id_akun` = '${data}';";
$eksekusi = mysqli_query($konek,$query);
$cek = mysqli_affected_rows($konek);
if($cek > 0){
    $response ["favorit_akun"] = array();
    while($ambil = mysqli_fetch_object($eksekusi)){
        $F["id_akun"] = $ambil -> id_akun;
        $F["id_barang"] = $ambil -> id_barang;
        $F["status_fav"] = $ambil -> status_fav;
        array_push($response['favorit_akun'],$F);
    }
}else {
    $response["kode"] = 0;
    $response["pesan"] = "Data Tidak Tersedia";
}

echo json_encode($response);

?>