    <?php
    require('koneksi.php');
    $response = array();
    if($_SERVER['REQUEST_METHOD']=='POST'){
        $id_akun = $_POST['id_akun'];
        $id_barang = $_POST['id_barang'];
        $total_harga = $_POST['total_harga'];
        $totalItem = $_POST['total_item'];
        $idOrderKeranjang = $_POST['id_keranjang'];
        $metodePembayaran = $_POST['metode_pembayaran'];
        $pesanDariUser = $_POST['pesan_user'];
        $alamatUser = $_POST['alamat_user'];
        $norek = $_POST['no_akun']; 
        $queryDelete = "DELETE FROM `keranjang_user` WHERE `id_barang` = '" . $id_barang . "' AND `id_akun` = '". $id_akun . "';";
        echo $queryDelete;
        $insertTambahKeranjang = "INSERT INTO `transaksi_pending`( `id_akun` , `id_barang` , `total_harga`,`jumlah_item`,`status_selected`,`id_keranjang`,`metode_pembayaran`,`no_akun`,`status_bayar`,`waktu_transaksi`,`pesan_dari_user`,`alamat_user`) VALUES('" . $id_akun . "','" . $id_barang . "','" . $total_harga . "','". $totalItem . "','0','" . $idOrderKeranjang . "','" . $metodePembayaran . "','" . $norek . "','belum_bayar',now(),'" . $pesanDariUser ."','" . $alamatUser . "');";
        echo $insertTambahKeranjang;
        
        $result = mysqli_query($konek,$insertTambahKeranjang); 
        $rowsRes = mysqli_affected_rows($konek);
        if($rowsRes > 0){
            $result = mysqli_query($konek,$queryDelete); 
            $rowsRes = mysqli_affected_rows($konek);
            if ($rowsRes > 0) {
            $response["kode"] = 1;
            $response["pesan"] = "Hapus Berhasil Dan Insert Ke Pending Berhasil";
            } else{
                $response["kode"] = 1;
            $response["pesan"] = "Hapus Gagal Dan Insert Ke Pending Gagal"; 
            }
        } else{
            $response["kode"] = 0;
            $response["pesan"] = "Hapus Gagal";    
        }
    }    else{
        $response["kode"] = 0;
        $response["pesan"] = "Tidak Ada Post Data Update Password";
    }
    echo json_encode($response);
    ?>