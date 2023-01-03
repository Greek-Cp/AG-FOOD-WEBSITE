<?php 
    require('koneksi.php');
    $response = array();
    if($_SERVER['REQUEST_METHOD']=='POST'){
        $id_akun = $_POST['id_akun'];
        $response ["alamat_saya"] = array();
     
        $queryGetBarang = "SELECT * FROM `alamat_user` WHERE `id_akun` = '" . $id_akun . "';";
        $eksekusiDisplayBarang = mysqli_query($konek, $queryGetBarang);
                $cek = mysqli_affected_rows($konek);
                while($ambil_barang = mysqli_fetch_object($eksekusiDisplayBarang)){
                    $F["alamat"] = $ambil_barang -> alamat;
                    array_push($response["alamat_saya"],$F);
                }
        } else{
            $response["kode"] = 0;
            $response["pesan"] = "Tidak Ada Post Data";
        }  

    echo json_encode($response);
?>