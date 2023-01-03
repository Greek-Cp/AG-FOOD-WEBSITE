<?php
require ('koneksi.php');
    // menangkap data id yang di kirim dari url
$idKrj = $_GET['id_keranjang'];
// menghapus data dari database
$res = mysqli_query($konek,"DELETE FROM `transaksi_pending` WHERE `id_keranjang` = '$idKrj';");

echo $res;
// mengalihkan halaman kembali ke index.php
echo "<script>
alert (' Pesananan Berhasil Di Hapus !');
eval(\"parent.location='order.php'\");

</script>";
?>  