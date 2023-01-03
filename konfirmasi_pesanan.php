<?php
require ('koneksi.php');
    // menangkap data id yang di kirim dari url
$idKrj = $_GET['id_keranjang'];
// menghapus data dari database
$res = mysqli_query($konek,"UPDATE `transaksi_pending` SET `status_bayar` = 'sudah_bayar' 
WHERE `id_keranjang` = '$idKrj';");
// mengalihkan halaman kembali ke index.php
echo "<script>
alert (' Pesananan Berhasil Di Konfirmasi !');
eval(\"parent.location='order.php'\");

</script>";
?>  