<?php 

require ('koneksi.php');

if(isset($_GET['mode'])){
    switch($_GET['mode']){
        case "update":
            echo "<script> alert('hello world');</script>";
            break;
        default:
        echo '<script>alert("Welcome to Geeks for Geeks")</script>';
        break;    
    }
}
if( isset($_POST ['btn_edit_data']) ) {
    echo '<script>alert("Welcome to Geeks for Geeks")</script>';
    echo "Yahaha workig lurrr";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Pesanan Selesai</title>
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
                    <h1 class="mt-4">Pesanan Selesai</h1>
                </center>


                <div class="card-body">
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>Id Keranjang</th>
                                <th>Waktu Transaksi</th>
                                <th>Nama Pembeli</th>
                                <th>Alamat</th>
                                <th>Nama Menu</th>
                                <th>Jumlah Barang</th>
                                <th>Harga </th>
                                <th>Bukti Transaksi</th>
                          
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                        include 'koneksi.php';
                        $employee = mysqli_query($konek,"SELECT  * FROM `transaksi_pending` WHERE `status_bayar` 
                        = 'sudah_bayar' GROUP by `id_keranjang`;");
                        $numNo = 1;
                        $totItem = 0;
                        $hrgaTotal = 0;
                        while($row = mysqli_fetch_array($employee))
                        {
                        echo "<tr>";
                        echo "<td>" . $row['id_keranjang'] . "</td>";
                        echo "<td>" . $row['waktu_transaksi'] . "</td>";
                        $getUser = "SELECT `detail_akun`.`nama_user` FROM `detail_akun` WHERE 
                        `id_akun` = '" . $row['id_akun'] . "';";
                        $accountUser = mysqli_query($konek,$getUser);
                        while($rowd = mysqli_fetch_array($accountUser)){
                            echo "<td>" . $rowd['nama_user'] . "</td>";
                        }
                        echo "<td>" . $row['alamat_user'] . "</td>";

                        ?>
                        <?php
                        echo "<td>";
                        $queryGetBarang =   "SELECT * FROM `transaksi_pending` JOIN `barang` WHERE 
                        `transaksi_pending`.`id_barang` = `barang`.`id_barang` AND `transaksi_pending`.
                        `id_keranjang` = '" .  $row['id_keranjang'] . "';";
                        $eksekusi_getBarang = mysqli_query($konek,$queryGetBarang);
                        $cekQuery = mysqli_affected_rows($konek);
                        if ($cekQuery > 0) {
                            echo "<ul>";
                            while ($ambils = mysqli_fetch_object($eksekusi_getBarang)) {
                                $test = $ambils->nama_barang;
                                $jumlh = $ambils-> jumlah_item;
                                $totItem += $jumlh;
                                $hrgaTotal += $ambils->total_harga;
                                echo "<li>" . $test . " " . $jumlh . "x" . "</li><br>";    
                        ?>
                        <?php
                        }
                            $rp = "Rp." . number_format($hrgaTotal,2,',','.');
                            echo "<td>" . $totItem . "</td>";
                            echo "<td>" . $rp . "</td>";
                            $hrgaTotal = 0;
                            $totItem = 0;
                            echo "<td class='w-2'>" . "<img  style= '' class = 'img-fluid img-thumbnail'src=" . '"'
                            .$row['gambar_transaksi'] . '"' . "</tr>";
                            echo "<tr>"; 
                        }
                        echo "<ul>";                                 
                            $numNo++;
                        }
                    ?>
                    <script>
                        function getId(id) {
                        const ids = id.split("-")
                        document.querySelector("#modaleditid").value = ids[1]
                            }
                    </script>
                        </tbody>
                    </table>
                </div>

            </div>
        </main>

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

</html>