<?php
require ('koneksi.php');
    // menangkap data id yang di kirim dari url
$idBarang = $_GET['id_barang'];
// menghapus data dari database
$res = mysqli_query($konek,"DELETE FROM `barang` WHERE id_barang='$idBarang'");
// mengalihkan halaman kembali ke index.php
echo "<script>
eval(\"parent.location='index.php'\");
alert (' Data Berhasil Dihapus!');
</script>";


?>