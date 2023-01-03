<?php 
    require('koneksi.php');
    $response = array();
    if($_SERVER['REQUEST_METHOD']=='POST'){
        $id_akun = $_POST['id_akun'];
        $id_alamat = $_POST['alamat'];
        $insert_alamat = "INSERT INTO `alamat_user`( `id_akun`,`alamat`) VALUES('$id_akun', '$id_alamat')";
        $response ["alamat_saya"] = array();
        $checkEmail = mysqli_query($konek, $insert_alamat);
        $rowsEmail = mysqli_affected_rows($konek);
        if($rowsEmail > 0){
            $response["kode"] = 1;
            $response["pesan"] = "Simpan Data Berhasil";   
            $queryGetBarang = "SELECT * FROM `alamat_user` WHERE `id_akun` = '" . $id_akun . "';";
                $eksekusiDisplayBarang = mysqli_query($konek, $queryGetBarang);
                $cek = mysqli_affected_rows($konek);
                while($ambil_barang = mysqli_fetch_object($eksekusiDisplayBarang)){
                    $F["alamat"] = $ambil_barang -> alamat;
                    array_push($response["alamat_saya"],$F);
                }
            } else {
                $response["kode"] = 0;
                $response["pesan"] = "Simpan Data Alamat Gagal";   
            }
        } else{
            $response["kode"] = 0;
            $response["pesan"] = "Tidak Ada Post Data";
        }  

    echo json_encode($response);
?>