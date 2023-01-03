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
    <title>Informasi</title>
    <link rel="icon" href="logo.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
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
        <!-- Navbar-->
       
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
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Informasi</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item">Tambahkan informasi untuk Customer</li>
                    </ol>
                    <!-- <div class="informasi" data-bs-toggle="modal" data-bs-target="#myModal">
                        <ion-icon name="pencil-outline"></ion-icon> Tambahkan Informasi
                    </div> -->

                    <?php 
                    $getInformasi = mysqli_query($konek,"SELECT * FROM `informasi`;");
                    $row = mysqli_num_rows($getInformasi);
                    if($row == 0){
                        echo ' <div class="informasi" data-bs-toggle="modal" data-bs-target="#myModal">                    
                    <ion-icon name="pencil-outline"></ion-icon> Tambahkan Informasi
                </div>';
                    }
                    ?>

                    <div class="modal" id="myModal">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Tuliskan Informasi</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="buat_informasi.php" method="POST" enctype="multipart/form-data">
                                        <div class="mb-3">
                                            <label class="form-label required">Informasi</label>
                                            <textarea name="txt_deksripsi" class="form-control"></textarea>
                                        </div>
                                        <div class="modal-footer">

                                            <button name="btnTambahkan" type="submit"
                                                class="btn btn-primary">Tambahkan</button>
                                            <button name="btnBatal" type="submit" class="btn btn-danger">Batal</button>


                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>

                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"></li>
                    </ol>
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                            Informasi Hari ini
                        </div>
                        <div class="card-body">
                            <ol class="breadcrumb mb-4">
                                <li class="breadcrumb-item"><?php 
                                $getInformasiString= mysqli_query($konek,"SELECT * FROM `informasi`;");
                    while ($ambils = mysqli_fetch_object($getInformasiString)) {
                                    echo $ambils->informasi;
                    }
                                ?></li>
                            </ol>
                            <div class="modal-footer">

                                <button name="btnTambahkan" type="submit" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#myModalEdit">Edit</button>




                            </div>
                            <div class="modal" id="myModalEdit">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Edit Informasi</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="edit_informasi.php" method="POST"
                                                enctype="multipart/form-data">
                                                <div class="mb-3">
                                                    <label class="form-label required">Informasi</label>

                                                    <?php 
                                                     $getInformasiString= mysqli_query($konek,"SELECT * FROM `informasi`;");
                                                     while ($ambils = mysqli_fetch_object($getInformasiString)) {                                                                                                                                                                      
                                                    ?>
                                                    <textarea name="txt_deksripsi" class="form-control"><?php echo "".$ambils->informasi . "";
                                                    ?></textarea>
                                                </div>
                                                <?php 
                                                 }?>
                                                <div class="modal-footer">

                                                    <button name="btnEdit" type="submit"
                                                        class="btn btn-primary">Simpan</button>
                                                    
                                                </div>
                                            </form>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>

                </div>
            </main>

        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/chart-area-demo.js"></script>
    <script src="assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
    <script src="js/datatables-simple-demo.js"></script>
</body>

</html>