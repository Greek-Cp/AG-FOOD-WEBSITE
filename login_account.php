<?php 
    require('koneksi.php');
    $response = array();
    if($_SERVER['REQUEST_METHOD']=='POST'){
        $email = $_POST['email'];
        $password = $_POST['password'];
        $query = "SELECT * FROM `akun` JOIN `detail_akun` WHERE `akun`.`email` = '" . $email . "';";
        $eksekusi_2 = mysqli_query($konek,$query);
        $cek = mysqli_fetch_array($eksekusi_2);  

        if($cek == 0){
            $response["kode"] = 5;
            $response["pesan"] = "Akun Tidak Terdaftar";
        } else {
            $passwordDB = $cek['password'];
            $statusVerify = $cek['status_verif'];
            $statusLogin = $cek['status_login'];
            $verify = password_verify($password, $passwordDB);
            if($verify){
                if($statusVerify == 0){
                    $response["kode"] = 3;
                    $response["pesan"] = "Harap Verifikasi Akun Anda !";
                    $response["detail_account"] = array();
                    $query_detail_akun = "SELECT * FROM `akun` JOIN `detail_akun` WHERE `akun`.`id_akun` = `detail_akun`.`id_akun` AND `akun`.`email` ='" . $cek["email"] ."';";
                    $eksekusi_get_detail_akun = mysqli_query($konek,$query_detail_akun);
                    $cekdetail_akun = mysqli_fetch_array($eksekusi_get_detail_akun);
                    $fp["id_akun"] = $cekdetail_akun["id_akun"];
                    $fp["username"] = $cek["username"];
                    $fp["password"] = $cek["password"];
                    $fp["kedudukan"] = $cek["kedudukan"];
                    $fp["email"] = $cek["email"];
                    $fp["verify_number"] = $cek["verify_number"];
                    $fp["status_verif"] = $cek["status_verif"];
                    $fp["alamat"] = $cekdetail_akun["alamat"];
                    $fp["nama_user"] = $cekdetail_akun["nama_user"];
                    $fp["noHp"] = $cekdetail_akun["noHp"];
                    array_push($response["detail_account"],$fp);
                } else if($statusVerify == 1 && $statusLogin == 0){
                    $response["kode"] = 1;
                    $response["pesan"] = "Login Berhasil";
                    $response["detail_account"] = array();
                    $query_detail_akun = "SELECT * FROM `akun` JOIN `detail_akun` WHERE `akun`.`id_akun` = `detail_akun`.`id_akun` AND `akun`.`email` ='" . $cek["email"] ."';";
                    $eksekusi_get_detail_akun = mysqli_query($konek,$query_detail_akun);
                    $cekdetail_akun = mysqli_fetch_array($eksekusi_get_detail_akun);
                    $queryUpdate = "UPDATE `akun` SET `status_login` = 1 WHERE `email` = '" . $email . "';";
                    $result = mysqli_query($konek,$queryUpdate); 
                    $rowsRes = mysqli_affected_rows($konek);
                    $fp["id_akun"] = $cekdetail_akun["id_akun"];
                    $fp["username"] = $cek["username"];
                    $fp["password"] = $cek["password"];
                    $fp["kedudukan"] = $cek["kedudukan"];
                    $fp["email"] = $cek["email"];
                    $fp["verify_number"] = $cek["verify_number"];
                    $fp["status_verif"] = $cek["status_verif"];
                    $fp["alamat"] = $cekdetail_akun["alamat"];
                    $fp["nama_user"] = $cekdetail_akun["nama_user"];
                    $fp["noHp"] = $cekdetail_akun["noHp"]; 
                    array_push($response["detail_account"],$fp);
                } else if($statusLogin == 1){
                    $response["kode"] = 4;
                    $response["pesan"] = "Login Gagal Karena Akun Anda Berada Di Device Lain !";
                }
            } else{
                $response["kode"] = 0;
                $response["pesan"] = "Login Gagal";
            }   
        }
               
    
    } else{
        $response["kode"] = 0;
        $response["pesan"] = "Tidak Ada Post Data";
    }  
    echo json_encode($response);
?>