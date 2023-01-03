<?php
 require('koneksi.php');
 $response = array();
 if($_SERVER['REQUEST_METHOD']=='POST'){
    $id_akun = $_POST['id_akun'];
    $query = "SELECT `id_barang`,  SUM(`total_harga`) AS `total_harga`, `jumlah_item` FROM `keranjang_user` WHERE id_akun = '" . $id_akun . "' GROUP BY `id_barang`;";
    $query = "SELECT DISTINCT `id_barang`,  SUM(`total_harga`) AS `total_harga`, SUM(`jumlah_item`) AS `total_item_order` FROM `keranjang_user` WHERE id_akun = '" . $id_akun . "' GROUP BY `id_barang`;";

    $eksekusi = mysqli_query($konek,$query);
    $cek = mysqli_affected_rows($konek);
    $response["request_type"] = "keranjang_user";
    $response["id_akun"] = $id_akun;
    if($cek > 0){
    $response["kode"] = 1;
    $response["pesan"] = "Data Tersedia";
    $response ["dataBarang"] = array();
    while($ambil = mysqli_fetch_object($eksekusi)){
        $queryGetBarang = "SELECT * FROM `barang` WHERE `id_barang` = '". $ambil -> id_barang . "';";
            $eksekusiDisplayBarang = mysqli_query($konek, $queryGetBarang);
                $cek = mysqli_affected_rows($konek);
            while($ambil_barang = mysqli_fetch_object($eksekusiDisplayBarang)){ 
                $F["total_item_keranjang"] = $ambil->total_item_order;
                $F["id_barang"] = $ambil_barang -> id_barang;
                $F["nama_barang"] = $ambil_barang -> nama_barang;
                $F["rating"] = $ambil_barang -> rating;
                $F['jenis_barang'] = $ambil_barang -> jenis_barang;
                $F['harga_total'] = $ambil->total_harga;    
                $F['harga_original'] = $ambil_barang -> harga;
                $F['gambar_barang'] = $ambil_barang -> gambar_barang;
                $F['deskripsi_barang'] = $ambil_barang -> deskripsi_barang;
                $F['imageType'] = $ambil_barang -> imageType;
                array_push($response["dataBarang"],$F);
            }
      
    }
}else {
    $response["kode"] = 0;
    $response["pesan"] = "Data Tidak Tersedia";
}


} else{
    $response["kode"] = 0;
    $response["pesan"] = "Tidak Ada Post Data";
}  

echo json_encode($response);
?>