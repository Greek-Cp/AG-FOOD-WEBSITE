<?php 
    require('koneksi.php');
    $response = array();
    if($_SERVER['REQUEST_METHOD']=='POST'){
        $id_akun = $_POST['id_akun'];
        $id_barang = $_POST['id_barang'];
        $total_harga = $_POST['total_harga'];
        $totalItem = $_POST['total_item'];
        $pesanUser = $_POST['pesan_user'];
        $insertTambahKeranjang = "INSERT INTO `keranjang_user`( `id_akun` , `id_barang` , `total_harga`,`jumlah_item`,`status_selected`,`pesan_user`) VALUES('" . $id_akun . "','" . $id_barang . "','" . $total_harga . "','". $totalItem . "','0','" .  $pesanUser ."');";
    
    
        $checkEmail = mysqli_query($konek, $insertTambahKeranjang);
        $rowsEmail = mysqli_affected_rows($konek);
        if($rowsEmail > 0){
                $response["kode"] = 1;
                $response["pesan"] = "Simpan Data Keranjang Berhasil";
            
        } else {
            $response["kode"] = 0;
            $response["pesan"] = "Simpan Data Keranjang Gagal";   
        }


    } else{
        $response["kode"] = 0;
        $response["pesan"] = "Tidak Ada Post Data";
    }  

    echo json_encode($response);
?>