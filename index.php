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
    <title>Menu</title>
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
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="">AG FOOD</a>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i
                class="fas fa-bars"></i></button>
        <!-- Navbar Search-->
        <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
            <div class="input-group">
                <!-- <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                     -->
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
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Daftar Menu</h1>

                    <div class="">

                        <button type="button" class="btn2" data-bs-toggle="modal" data-bs-target="#myModal"><i
                                class="fa-solid fa-file-circle-plus"></i>
                            <div class="ti">Tambah Menu</div>
                        </button>
                        <div class="modal" id="myModal">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Tambahkan Menu</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="insert.php" method="POST" enctype="multipart/form-data">
                                            <div class="mb-3">
                                                <label id="test" class="form-label required">Kategori</label>
                                                <br>
                                                <button name="btnKategoryName" id="btnKategoryMenu"
                                                    class="btn btn-secondary dropdown-toggle" type="button"
                                                    id="dropdownMenuButton1" data-bs-toggle="dropdown"
                                                    aria-expanded="false">
                                                    Pilih Kategori
                                                </button>
                                                <ul id="tableMenu" class="dropdown-menu"
                                                    aria-labelledby="dropdownMenuButton1">
                                                    <li><a class="dropdown-item" href="#">Menu Cemilan</a></li>
                                                    <li><a class="dropdown-item" href="#">Menu Large</a></li>
                                                    <li><a class="dropdown-item" href="#">Menu Makanan Medium</a></li>
                                                    <li><a class="dropdown-item" href="#">Menu Reguler</a></li>
                                                    <li><a class="dropdown-item" href="#">Menu Tambahan</a></li>
                                                    <li><a class="dropdown-item" href="#">Mie Ngocor</a></li>
                                                    <li><a class="dropdown-item" href="#">Seblak Ngocor</a></li>
                                                    <li><a class="dropdown-item" href="#">Menu Minum</a></li>
                                                </ul>
                                            </div>
                                            <div class="mb-3">
                                                <input style="display: none;" class="form-control" name="name_dropdown"
                                                    id="id_tmp_name"> </label>
                                                <label class="form-label required">Nama Menu</label>
                                                <input name="txt_namamenu" type="text" class="form-control">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label required">Harga</label>
                                                <input name="txt_harga" type="number" class="form-control">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label required">Deskripsi</label>
                                                <textarea name="txt_deksripsi" class="form-control"></textarea>
                                            </div>

                                            <figure class="image-container">
                                                <img id="chosen-image"
                                                    src="https://cdn.jpegmini.com/user/images/slider_puffin_before_mobile.jpg">
                                                <figcaption id="file-name"></figcaption>
                                            </figure>
                                            <div class="mb-3">
                                                <label for="formFile" class="form-label">Gambar Menu </label>
                                                <input class="form-control" type="file" id="formFile"
                                                    name="formfilesfoto" required>
                                            </div>
                                            <div class="modal-footer">

                                                <button name="btnTambahkan" type="submit"
                                                    class="btn btn-primary">Tambahkan</button>



                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>


                    <div class="card-body">
                        <table id="datatablesSimple">
                            <thead>
                                <tr>
                                    <th>Id Barang</th>
                                    <th>Nama Barang</th>
                                    <th>Kategori</th>
                                    <th>Harga </th>
                                    <th>Gambar Barang</th>
                                    <th>Deskripsi Barang</th>
                                    <th>Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                            include 'koneksi.php';
                            
                            $employee = mysqli_query($konek,"SELECT * FROM `barang`;");
                            $numNo = 1;
                            while($row = mysqli_fetch_array($employee))
                            {
                                echo "<tr>";
                                echo "<td>" . $row['id_barang'] . "</td>";
                                echo "<td>" . $row['nama_barang'] . "</td>";
                                echo "<td>" . $row['jenis_barang'] . "</td>";
                                echo "<td>" . $row['harga'] . "</td>";
                                echo "<td class='w-2'>" . "<img  style= 'width:60%;height:60%' class = 
                                'img-fluid img-thumbnail'src=" . 
                                '"'.$row['gambar_barang'] . '"' . "</tr>";
                                echo "<td> " . $row['deskripsi_barang'] . "</td>";
                                echo "<td> <button id =".'"edit' . $numNo . '"'." href='index.php?mode=update&id_barang=" . 
                                $row['id_barang'] . "' class='btn btn-primary' name='btn_edit_data' data-bs-toggle='modal'                   
                                data-bs-target='#myModalEdit" . $numNo."'><ion-icon name=create-outline></ion-icon></button> 
                                <a href='hapus.php?id_barang=" .$row['id_barang']."'>
                                <button id=". '"delete' . $numNo . '"' . 
                                "class='btn btn-danger btn-user btn-block' name ='delete' type='submit' >  
                                <ion-icon name=trash-outline></ion-icon></button> </td> </a></td>";
                                echo "<tr>"; 
                                echo '
                                ';
                                echo '<div class="modal"' .  'id="myModalEdit' . $numNo.'"' . '>
                    <div class="modal-dialog">   
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Edit Menu</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>
                            <div class="modal-body">
                                <form action="edit_menu.php" method="POST" enctype="multipart/form-data" >
                                <div class="mb-3">
                                        <input style="display: none;" class="form-control"  name="name_dropdown" 
                                        id="id_tmp_name"> </label>
                                        <label class="form-label required">Id Menu</label>
                                        <input name="txt_id_barang"  type="text" class="form-control" value='.'"' 
                                        . $row['id_barang'].'"'. '  readonly >
                                    </div>
                                <div class="mb-3">
                                <label class="form-label required">Kategori Menu</label>
                                    <input  value='.'"'.$row['jenis_barang']. '"'. ' name="txt_namamenu" type="text" 
                                    class="form-control" readonly>
                                </div>
                                    <div class="mb-3">
                                        <input style="display: none;" class="form-control"  name="name_dropdown" 
                                        id="id_tmp_name"> </label>
                                        <label class="form-label required">Nama Menu</label>
                                        <input value='.'"'.$row['nama_barang']. '"'. ' name="txt_nama_menumakanan" type="text" 
                                        class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label required">Harga</label>
                                        <input value='.'"'.$row['harga']. '"'. ' name="txt_harga" type="number" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label required">Deskripsi</label>
                                        <textarea name="txt_deksripsi" type="number" class="form-control">' 
                                        . $row['deskripsi_barang']. '</textarea>
                                    </div>
            
                                    <figure class="image-container">
                                        <img id="chosen-image" src="' . $row['gambar_barang'] . '">
                                        <figcaption id="file-name"></figcaption>
                                    </figure>
                                    <div class="modal-footer">
                                        
                                <button name ="btnEdit" type="submit" class="btn btn-primary">Edit</button>
                                            
                            </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>';
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