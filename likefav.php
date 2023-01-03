<?php 
    require('koneksi.php');
    
    if($_SERVER['REQUEST_METHOD']=='POST'){
        $id_akun = $_POST['id_akun'];
        $id_barang = $_POST['id_barang'];
        $status_fav = $_POST['status_fav'];
        $insert_fav = "INSERT INTO `favorit_akun`(`id_akun`,`id_barang`,`status_fav`) VALUES('$id_akun','$id_barang','$status_fav')";
        $eksekusi_1 = mysqli_query($konek,$insert_fav);
        $cek = mysqli_affected_rows($konek);
        $response["pesan"] = "User Sedang Like";
    $response["kode"] = 1;
    } else{
     
    }  
    echo json_encode($response);
?>