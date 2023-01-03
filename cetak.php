<?php
include"koneksi.php";
?>
<!DOCTYPE html>
<html>
    <head>
    <link href="css/styles.css" rel="stylesheet" />
    <link rel="icon" href="logo.png" type="image/x-icon">
    </head>
<body>
    <h2 id="lap" align="center"> Laporan Penjualan</h2>
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
                Tanggal Pembelian
            </th>
            <th>
                Id Transaksi
            </th>
            <th>
                Id Barang
            </th>
            <th>
                Nama Barang
            </th>
            <th>
                Quantity
            </th>
            <th>
                Total Harga
            </th>
            <th>
                Harga
            </th>
        
        </tr>
        </thead>
        <?php
        $no = 1;
        $data_barang = mysqli_query($konek, "SELECT transaksi_pending.waktu_transaksi, transaksi_pending.id_keranjang, transaksi_pending.id_barang, 
        barang.nama_barang, transaksi_pending.jumlah_item, transaksi_pending.total_harga, barang.harga FROM transaksi_pending JOIN barang 
        ON transaksi_pending.id_barang = transaksi_pending.id_barang");
        while ($tampil = mysqli_fetch_array($data_barang)){
            ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $tampil['waktu_transaksi']; ?></td>
                                <td><?= $tampil['id_keranjang']; ?></td>
                                <td><?= $tampil['id_barang']; ?></td>
                                <td><?= $tampil['nama_barang']; ?></td>
                                <td><?= $tampil['jumlah_item']; ?></td>
                                <td><?= $tampil['total_harga']; ?></td>
                                <td><?= $tampil['harga']; ?></td>
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