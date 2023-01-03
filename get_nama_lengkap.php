<?php 
 require('koneksi.php');
 $response = array();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_akun = $_POST['id_akun'];
    $queryDisplayImage = "SELECT `nama_user` FROM `detail_akun` WHERE `id_akun`= '" . $id_akun . "';";
    $result = mysqli_query($konek, $queryDisplayImage);
    $rowsRes = mysqli_affected_rows($konek);
    while($row = mysqli_fetch_array($result)){
        $imglink = $row['nama_user'];
        $response['nama_lengkap'] = $imglink;
    }
}   else{
    $response["kode"] = 0;
    $response["pesan"] = "Tidak Ada Perubahan Data";
}

echo json_encode($response);

?>