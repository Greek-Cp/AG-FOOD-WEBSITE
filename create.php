<?php 
    require('koneksi.php');
    $response = array();
    if($_SERVER['REQUEST_METHOD']=='POST'){
        $username = $_POST['username'];
        $email = $_POST['email'];
        $passwords = $_POST['password_akun'];
        $hashPassword = password_hash($passwords,PASSWORD_DEFAULT);
        $kedudukan = $_POST['kedudukan'];
        $namaLengkap = $_POST['namaLengkap'];
        $noHp = $_POST['noHp'];
        $alamat = $_POST['alamat'];
        $digits = 5;
        $verifNumber =  rand(pow(10, $digits - 1), pow(10, $digits) - 1);
        $insert_akun_query = "INSERT INTO `akun`(username,password,kedudukan,email,verify_number,status_verif) VALUES('$username','$hashPassword','$kedudukan','$email','$verifNumber' ,'0')";
 
        
        $insert_detaik_akun_query = "INSERT INTO `detail_akun` (alamat,nama_user,noHp) VALUES('$alamat','$namaLengkap','$noHp')";
   
        $queryCheck = "SELECT * FROM akun where email = '$email'";
        $checkEmail = mysqli_query($konek, $queryCheck);
        $rowsEmail = mysqli_affected_rows($konek);
        if($rowsEmail > 0){
            $response["kode"] = 2;
            $response["pesan"] = "Data Telah Ada";
        } else {
            $eksekusi_1 = mysqli_query($konek,$insert_akun_query);
            $eksekusi_2 = mysqli_query($konek,$insert_detaik_akun_query);
            $cek = mysqli_affected_rows($konek);    
            if($cek > 0){  
                $response["kode"] = 1;
                $response["pesan"] = "Simpan Data Berhasil";
            } else {
               $response["kode"] = 0;
                $response["pesan"] = "Simpan Data Gagal";       
            }
        }
    } else{
        $response["kode"] = 0;
        $response["pesan"] = "Tidak Ada Post Data";
    }  
    echo json_encode($response);
?>