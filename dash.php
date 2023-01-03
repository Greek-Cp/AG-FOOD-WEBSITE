
<?php

require('koneksi.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Dashboard</title>
    <link rel="icon" href="logo.png" type="image/x-icon">
    <a class='button' href='harian.php' >
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
</head>

<body class="sb-nav-fixed">

    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="">AG FOOD</a>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i
                class="fas fa-bars"></i></button>
        <!-- Navbar Search-->
        <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
            <div class="input-group">
                <!-- <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..."
                    aria-describedby="btnNavbarSearch" /> -->

            </div>
        </form>

        
    </nav>


    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                <div class="nav">

<li class="spacer"></li>
<li class="title">
    <span class="menu-title"></span>
</li>
<div class="sb-sidenav-menu-heading">Utama</div>
<a class="nav-link" href="dash.php">
    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
    Dashboard
</a>

<li class="spacer"></li>
<a class="nav-link" href="index.php">
    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
    Menu
</a>

<li class="spacer"></li>
<a class="nav-link" href="informasi.php">
    <div class="sb-nav-link-icon"><i class="fa-solid fa-circle-info"></i></div>
    Informasi
</a>
<li class="spacer"></li>
<a class="nav-link" href="landingpage/index.html">
    <div class="sb-nav-link-icon"><i class="fa-solid fa-file"></i></div>
    Landing Page
</a>
<li class="spacer"></li>
<a class="nav-link" href="login.html">
    <div class="sb-nav-link-icon"><i class="fa-solid fa-arrow-right-from-bracket"></i></div>
    Log Out
</a>

</div>
                </div>
                <div class="sb-sidenav-footer">
                    <div class="small">Logged in as:</div>
                    Admin
                </div>
            </nav>
        </div>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

        <a href="https://api.whatsapp.com/send?phone=6285730040398&text=Hallo Saya Ada Kendala Saat Menggunakan Web Ini"
            class="float" target="_blank">
            <i class="fa fa-whatsapp my-float"></i>
        </a>
        <div id="layoutSidenav_content">

            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Dashboard</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item">Dashboard</li>

                    </ol>
                    <div class="row">
                        <div class="col-xl-3 col-md-6">
                               <div class="card 1 mb-3" style="max-width: 18rem;  border-radius: 5;">
                               <a class='button' href='order.php' >
                                    <div class="card-header"> Pesanan Masuk</div>
</a>
                                    <div class="card-body">

                                       
                                        <h5 class="card-title" >Total Pesanan Masuk : <?php 
                                            $query = "SELECT `id_keranjang` AS total_transaksi FROM `transaksi_pending` WHERE `status_bayar` = 'belum_bayar' GROUP BY `id_keranjang`;";
                                            $eksekusi = mysqli_query($konek,$query);
                                            $cek = mysqli_affected_rows($konek);
                                            if($cek > 0){
                                                $totalItem = 0;
                                                while($ambil = mysqli_fetch_object($eksekusi)){
                                                    $totalItem++;
                                                }
                                                echo $totalItem;
                                            }
                                            ?>
                                            </h5>
                                    

                                    </div>
                                    

                                </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                                <div class="card 1  mb-3" style="max-width: 18rem;">
                                <a class='button' href='selesai.php'>
                                <div class="card-header"> Pesanan Selesai</div>
                                </a>
                                    <div class="card-body">
                                        <h5 class="card-title">Total Pesanan Selesai :  <?php 
                                            $query = "SELECT `id_keranjang` AS total_transaksi FROM `transaksi_pending` WHERE `status_bayar` = 'sudah_bayar' GROUP BY `id_keranjang`;";
                                            $eksekusi = mysqli_query($konek,$query);
                                            $cek = mysqli_affected_rows($konek);
                                            if($cek > 0){
                                                $totalItem = 0;
                                                while($ambil = mysqli_fetch_object($eksekusi)){
                                                    $totalItem++;
                                                }
                                                echo $totalItem;
                                            }
                                            ?></h5>
                                    </div>
                                   
                                </div>
                                
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card 1 mb-3" style="max-width: 18rem;">
                            <a class='button' href='harian.php' >
                                <div class="card-header"> Total Pendapatan</div>
                                        </a>
                                
                                <div class="card-body">
                                    <h5 class="card-title">Pendapatan :  <?php 
                                    function rupiah($angka){
	
                                        $hasil_rupiah = "Rp " . number_format($angka,2,',','.');
                                        return $hasil_rupiah;
                                     
                                    }
                                            $query = "SELECT SUM(`total_harga`) as `total` FROM `transaksi_pending` WHERE `status_bayar` = 'sudah_bayar';";
                                            $eksekusi = mysqli_query($konek,$query);
                                            $cek = mysqli_affected_rows($konek);
                                            if($cek > 0){
                                                $totalItem = 0;
                                                while($ambil = mysqli_fetch_object($eksekusi)){
                                                
                                                    echo rupiah($ambil -> total);
                                                }
                                            }
                                            ?></h5>
                                </div>
                            </div>
                          
                            
                        </div>

                    </div>
                    <div class="card mb-4">
                    <a class='button' href='history.php' >
                        <div class="card-header">
                            <i class="fas fa-chart-area me-1"></i>
                            Grafik Penghasilan Toko AG-FOOD
                        </div>
                                        </a>
                        <div class="card-body"><canvas id="myAreaChart" width="100%" height="20%"></canvas></div>
                        <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
                    </div>

                </div>
            </main>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
   <script>
// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#292b2c';

// Area Chart Example
var ctx = document.getElementById("myAreaChart");
var myLineChart = new Chart(ctx, {
  type: 'line',
  data: {
    labels: [
        <?php
     $query_get_day = " SELECT DISTINCT DAY(`waktu_transaksi`) AS `waktu` ,MONTHNAME(`waktu_transaksi`) AS `bulan` FROM `transaksI_pending`";
     $eksekusi_day = mysqli_query($konek,$query_get_day);
     $cek = mysqli_affected_rows($konek);
     if($cek > 0){
         $totalItem = 0;
        $rowCount = mysqli_num_rows($eksekusi_day);
        $num = 1;
         while($ambild = mysqli_fetch_object($eksekusi_day)){
            if($num == $rowCount){
                echo  "'".$ambild->waktu . " ". $ambild -> bulan . "'";
            } else{
                echo  "'".$ambild->waktu . " ". $ambild -> bulan . "',";
            }
            $num++;

        }
     }
        ?>

   ],
    datasets: [{
      label: "Sessions",
      lineTension: 0.3,
      backgroundColor: "rgba(2,117,216,0.2)",
      borderColor: "rgba(2,117,216,1)",
      pointRadius: 5,
      pointBackgroundColor: "rgba(2,117,216,1)",
      pointBorderColor: "rgba(255,255,255,0.8)",
      pointHoverRadius: 5,
      pointHoverBackgroundColor: "rgba(2,117,216,1)",
      pointHitRadius: 50,
      pointBorderWidth: 2,
      data: [
        <?php 
       $query_get_harga = "SELECT DISTINCT DAY(`waktu_transaksi`)  AS `waktu` , SUM(`total_harga`) as total FROM `transaksi_pending` GROUP BY `waktu`;";
       $eksekusi_harga = mysqli_query($konek,$query_get_harga);
       $cek = mysqli_affected_rows($konek);
       if($cek > 0){
           $totalItem = 0;
          $rowCount = mysqli_num_rows($eksekusi_harga);
          $num = 1;
           while($ambild = mysqli_fetch_object($eksekusi_harga)){
              if($num == $rowCount){
                  echo  "".$ambild->total .  "";
              } else{
                  echo  "".$ambild->total. ",";
              }
              $num++;
  
          }
       }
    ?>   
    ],
    }],
  },
  options: {
    scales: {
      xAxes: [{
        time: {
          unit: 'date'
        },
        gridLines: {
          display: true
        },
        ticks: {
          maxTicksLimit: 7
        }
      }],
      yAxes: [{
        ticks: {
          min: 0,
          max: 1000000,
          maxTicksLimit: 5
        },
        gridLines: {
          color: "rgba(0, 0, 0, .125)",
        }
      }],
    },
    legend: {
      display: true
    }
  }
});
    </script>
    <script src="assets/demo/chart-bar-demo.js"></script>
    <script src="assets/demo/chart-pie-demo.js"></script>
</body>

</html>