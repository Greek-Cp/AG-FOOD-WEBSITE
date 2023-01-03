<?php 
require('koneksi.php');
session_start();
if(isset($_POST['submit'])){
        $email = $_POST['txt_email'];
        $pass = $_POST['txt_pass'];
    if(!empty(trim($email)) && !empty(trim($pass))){
            $query = "SELECT * FROM `akun` JOIN `detail_akun` WHERE `akun`.`id_akun` = `detail_akun`.`id_akun`;";
            echo $query . "<br>";
            $result = mysqli_query($konek,$query);
            $num = mysqli_num_rows($result);
            while($row = mysqli_fetch_array($result)){
                $id = $row['id_akun'];
                $emaild = $row['email'];
                $password =$row['password'];
                $role = $row['kedudukan'];
                $nama = $row['username'];
                echo $emaild;
                echo $role;
                $_SESSION['myusername'] = $nama;
                $_SESSION['id_account'] = $row['id_akun'];
            }
           
            if($num != 0){
                if($emaild == $email && $password == $pass){
                    echo "<p>Login Berhasil</p>";
                    $error = 'Login Berhasil';
                    echo "<SCRIPT> //not showing me this
                    alert('$error')
                    window.location.replace('dash.php');
                    </SCRIPT>";
                    header('Location: dash.php');
                } else{
                    $error = 'Login Gagal';
                    echo "<SCRIPT> //not showing me this
                    alert('$error')
                    window.location.replace('login.html');
                    </SCRIPT>";
                }
            }
    } else {
        $error = 'Data tidak boleh kosong !!';
        echo "<SCRIPT> //not showing me this
        alert('$error')
        window.location.replace('login.html');
        </SCRIPT>";
    }
}

?>