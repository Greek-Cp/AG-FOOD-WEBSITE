<?php 
 require('koneksi.php');
 $response = array();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_akun = $_POST['id_akun'];
    $image_link = $_POST['nama_lengkap'];
    $queryUpdate = "UPDATE `detail_akun` SET `nama_user` = '" . $image_link ."' WHERE `id_akun` = '" . $id_akun . "';";
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