<?php 
 require('koneksi.php');
 $response = array();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $queryDisplayImage = "SELECT `gambar_profile` FROM `akun` WHERE `email`= '" . $email . "';";
    $result = mysqli_query($konek, $queryDisplayImage);
    $rowsRes = mysqli_affected_rows($konek);
    while($row = mysqli_fetch_array($result)){
        $imglink = $row['gambar_profile'];
        $response['gambar_profile'] = $imglink;
    }
}   else{
    $response["kode"] = 0;
    $response["pesan"] = "Tidak Ada Perubahan Data";
}

echo json_encode($response);

?>