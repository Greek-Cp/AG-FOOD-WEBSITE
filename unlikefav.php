<?php 
    require('koneksi.php');
    
    if($_SERVER['REQUEST_METHOD']=='POST'){
        $id_akun = $_POST['id_akun'];
        $id_barang = $_POST['id_barang'];
        $query_delete = "DELETE FROM `favorit_akun` WHERE `id_barang` = '" . $id_barang . "' AND `id_akun` = '" . $id_akun . "';";
        $eksekusi_1 = mysqli_query($konek,$insert_fav);
        $cek = mysqli_affected_rows($konek);
        $response["pesan"] = "User Sedang Like";
    $response["kode"] = 1;
    } else{
     
    }  
    echo json_encode($response);
?>