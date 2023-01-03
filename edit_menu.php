<?php
require('koneksi.php');
print_r($_POST);
if(isset($_POST['btnEdit'])){
    $idBarang = $_POST['txt_id_barang'];
    $namaMenu = $_POST['txt_nama_menumakanan'];
    $txtHarga = $_POST['txt_harga'];
    $txtDeskripsi = $_POST['txt_deksripsi'];
    $query = "UPDATE barang SET nama_barang = '$namaMenu', harga = 
     '$txtHarga', deskripsi_barang='$txtDeskripsi' WHERE id_barang='$idBarang';";
    $eksekusi_1 = mysqli_query($konek,$query);
    header('Location: index.php');
}
?>
