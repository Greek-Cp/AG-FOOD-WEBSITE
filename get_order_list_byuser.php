<?php
 require('koneksi.php');
 $response = array();
 if($_SERVER['REQUEST_METHOD']=='POST'){
    $id_akun = $_POST['id_akun'];
    $query = "SELECT * FROM `transaksi_pending` JOIN `barang` WHERE `transaksi_pending`.`id_barang` = `barang`.`id_barang` AND `transaksi_pending`.`id_akun` = '" . $id_akun . "';";
    $cek = mysqli_affected_rows($konek);
    $response["request_type"] = "orderan_user";
        $response["kode"] = 1;
        $response["pesan"] = "Data Tersedia";
        $response["dataBarang"] = array();
        $eksekusiDisplayBarang = mysqli_query($konek, $query);
        $cek = mysqli_affected_rows($konek);
        while ($ambil_barang = mysqli_fetch_object($eksekusiDisplayBarang)) {
            $F["id_keranjang"] = $ambil_barang->id_keranjang;
             $F["id_barang"] = $ambil_barang->id_barang;
            $F["nama_barang"] = $ambil_barang->nama_barang;
            $F["rating"] = $ambil_barang->rating;
            $F['jenis_barang'] = $ambil_barang->jenis_barang;
            $F['harga_total'] = $ambil_barang->total_harga;
            $F['harga_original'] = $ambil_barang->harga;
            $F['gambar_barang'] = $ambil_barang->gambar_barang;
            $F['deskripsi_barang'] = $ambil_barang->deskripsi_barang;
            $F['imageType'] = $ambil_barang->imageType;
            $F['total_item_keranjang'] = $ambil_barang->jumlah_item;
            $F["metode_pembayaran"] = $ambil_barang->metode_pembayaran;
            $F["no_akun"] = $ambil_barang->no_akun;
            $F['status_bayar'] = $ambil_barang->status_bayar;
            $F['alamat_pengiriman'] = $ambil_barang->alamat_user;

            array_push($response["dataBarang"], $F);
      
     }
} else{
    $response["kode"] = 0;
    $response["pesan"] = "Tidak Ada Post Data";
}  

echo json_encode($response);
?>