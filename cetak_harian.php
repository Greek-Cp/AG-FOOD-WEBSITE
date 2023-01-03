<?php
include"koneksi.php";
?>
<!DOCTYPE html>
<html>
    <head>
    <link href="css/styles.css" rel="stylesheet" />
    <title>Cetak</title>
    <link rel="icon" href="logo.png" type="image/x-icon">
    </head>
<body>
    <h2 id="lap" align="center"> Laporan Penjualan Harian</h2>
    <div class='detail-nav'>
        <a class='button' href='dash.php'><button class='close'>
                Close
            </button>
        </a>
    </div>
    <div id="layoutSidenav_content">
        <main>
        <table class="table table-bordered">
        <thead>
        <tr>
            <th>
             no
            </th>
            <th>
             Id Keranjang
            </th>
            <th>
            Waktu Transaksi
            </th>
            <th>
            Alamat Pembeli
            </th>
            <th>
            Jumlah Item
            </th>
            <th>
            Total harga
            </th>
            <th>
            Nama Pembeli
            </th>
            <th>
             Nama Barang
            </th>
        
        </tr>
        </thead>
        <?php
        $no = 1;
        $data_barang = mysqli_query($konek,"SELECT transaksi_pending.id_keranjang, transaksi_pending.waktu_transaksi,transaksi_pending.alamat_user, 
            transaksi_pending.jumlah_item, transaksi_pending.total_harga, akun.username, barang.nama_barang FROM transaksi_pending JOIN akun 
            ON transaksi_pending.id_akun = akun.id_akun JOIN barang ON transaksi_pending.id_barang = barang.id_barang ");
        while ($tampil = mysqli_fetch_array($data_barang)){
            ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $tampil['id_keranjang']; ?></td>
                <td><?= $tampil['waktu_transaksi']; ?></td>
                <td><?= $tampil['alamat_user']; ?></td>
                <td><?= $tampil['jumlah_item']; ?></td>
                <td><?= $tampil['total_harga']; ?></td>
                <td><?= $tampil['username']; ?></td>
                <td><?= $tampil['nama_barang']; ?></td>
            </tr>
        <?php } 
        ?>
        </table>
    </div>
    <script>
        window.print();
    </script>
</body>
</html>