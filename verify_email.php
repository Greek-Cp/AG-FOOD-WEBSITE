<?php 
    require('koneksi.php');
    $response = array();
    if($_SERVER['REQUEST_METHOD']=='POST'){
        $email = $_POST['email'];
        $query = "SELECT * FROM `akun` JOIN `detail_akun` WHERE `akun`.`id_akun` = `detail_akun`.`id_akun` AND `akun`.`email` = '" . $email . "';";
        $eksekusi_2 = mysqli_query($konek,$query);
        $cek = mysqli_affected_rows($konek);    
        if($cek > 0){  
            $response["kode"] = 1;
            $response["pesan"] = "Akun Ditemukan";
            while($ambil = mysqli_fetch_object($eksekusi_2)){
              $response["otp"] =  $ambil -> verify_number;
              $response["nama_lengkap"] = $ambil -> nama_user;
              $response["email"] = $ambil -> email;
            }
        } else {
           $response["kode"] = 0;
           $response["pesan"] = "Akun Anda Tidak Ditemukan";       
        }
    } else{
        $response["kode"] = 0;
        $response["pesan"] = "Tidak Ada Post Data";
    }  
    echo json_encode($response);
?>