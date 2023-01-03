<?php 
require('koneksi.php');
$query = "SELECT * FROM `akun` JOIN `detail_akun` WHERE `akun`.`id_akun` = `detail_akun`.`id_akun`;";
$eksekusi = mysqli_query($konek,$query);
$cek = mysqli_affected_rows($konek);
if($cek > 0){
    $response["kode"] = 1;
    $response["pesan"] = "Data Tersedia";
    $response ["data"] = array();
        while($ambil = mysqli_fetch_object($eksekusi)){
        $F["id_akun"] = $ambil -> id_akun;
        $F["username"] = $ambil -> username;
        $F["password_akun"] = $ambil -> password;
        $F['kedudukan'] = $ambil -> kedudukan;
        $F['email'] = $ambil -> email;    
        $DETAIL_ACCOUNT['id_akun'] = $ambil -> id_akun;
        $DETAIL_ACCOUNT['alamat'] = $ambil -> alamat;
        $DETAIL_ACCOUNT['nama_user'] = $ambil -> nama_user;
        $DETAIL_ACCOUNT['noHp'] = $ambil -> noHp;
         $F["detail_akun"] = $DETAIL_ACCOUNT;
        array_push($response["data"],$F);
    }
}else {
    $response["kode"] = 0;
    $response["pesan"] = "Data Tidak Tersedia";
}

echo json_encode($response);

?>