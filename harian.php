<?php 

require ('koneksi.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>History Harian</title>
    <link rel="icon" href="logo.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
    
    
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">
<div class='detail-nav'>
        <a class='button' href='dash.php'><button class='close'>
                Close
            </button>
        </a>
    </div>
    <div id="layoutSidenav_content">
        <main>
        <div class="container-fluid px-4">
                <center>
                    <h1 class="mt-4">Harian</h1>
                </center>
                <div class="card-body">
                    <table id="datatablesSimple">
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
                            $data_barang = mysqli_query($konek,"SELECT transaksi_pending.id_keranjang, 
                            transaksi_pending.waktu_transaksi,transaksi_pending.alamat_user, 
                            transaksi_pending.jumlah_item, transaksi_pending.total_harga, akun.username, 
                            barang.nama_barang FROM transaksi_pending JOIN akun 
                            ON transaksi_pending.id_akun = akun.id_akun JOIN barang ON 
                            transaksi_pending.id_barang = barang.id_barang ");
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
                            <?php } ?>

                    </table>
                </div>

            </div>
        </main>
        <div class="modal-footer">
            <a class="btn btn-danger" href='cetak_harian.php'>
                <ion-icon name="document-outline"></ion-icon> Print Pdf
            </a>
                    </div>
        <!-- <div class='detail-nav'>
        <a class='button' href='cetak.php'><button class='cetak'>
                Cetak
            </button>
        </a>
        </div> -->
        <!-- <div class="tak">
        <a href="cetak.php">
            <button class="btn btn-primary">Cetak</button>  
        </a>
        </div> -->
    </div>
    


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="js/scripts.js"></script>
    <script src="scripts.js"></script>
    <script>
        function getPaperCode(paperCode) {
            alert(paperCode);
        }
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/chart-area-demo.js"></script>
    <script src="assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
    <script src="js/datatables-simple-demo.js"></script>
    </body>
</html>