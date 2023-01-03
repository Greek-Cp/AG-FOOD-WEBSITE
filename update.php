<?php
include('koneksi.php');

echo $emailCurrent . "<br>"; 
    if(isset($_POST['submit_update'])){
        $emailCurrent = $_POST['txt_email_lama'];
        $password_baru = $_POST['txt_passbaru'];
        $queryGetEmail = "SELECT * FROM `akun` WHERE `email` = '$emailCurrent'";
        echo $queryGetEmail;
        $result = mysqli_query($konek,$queryGetEmail);
        $num = mysqli_num_rows($result);
    
        echo $num;
        while($row = mysqli_fetch_array($result)){
            $emaild = $row['email'];
            echo $emaild;
            if($emaild == $emailCurrent){
                echo "Succes ";
                $queryUpdate = " UPDATE `akun` SET `password` = '$password_baru' WHERE `email`= '$emailCurrent';";
                echo "query update = " . $queryUpdate . "<br>";
                $result = mysqli_query($konek , $queryUpdate);
                echo $result . "<br>";        
                
        header('Location: login.html');
            } else {
                echo "GAGAL ";
                echo "<SCRIPT> //not showing me this
                alert('Update Gagal karena email kamu tidak terdaftar didalam database')
                </SCRIPT>";
        
            }
        }

    } else{
    }


?>