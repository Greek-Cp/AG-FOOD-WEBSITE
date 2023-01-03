<?php
 require('koneksi.php');
 $response = array();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $email = $_POST['email'];
    $queryUpdate = "UPDATE `akun` SET `status_login` = 0 WHERE `email` = '" . $email . "';";
    $result = mysqli_query($konek, $queryUpdate);
    $rowsRes = mysqli_affected_rows($konek);
    if($rowsRes > 0){
        $response["kode"] = 1;
        $response["pesan"] = "Session Login Telah Di Logout";
    } else{
        $response["kode"] = 0;
        $response["pesan"] = "Keluar Session Gagal";    
    }
}    else{
    $response["kode"] = 0;
    $response["pesan"] = "Tidak Ada Post Data Login";
}

echo json_encode($response);
?>
