<?php
require('koneksi.php');
session_start();
// Client ID of Imgur App 
print_r($_POST);
echo "<br>";

if(isset($_POST['btnTambahkan'])){
    $txtDeskripsi = $_POST['txt_deksripsi'];
    $sqlQueryInsert = "INSERT INTO `informasi` VALUES('" . $txtDeskripsi . "');";
    $res = mysqli_query($konek, $sqlQueryInsert);
    echo "<script>
alert (' Informasi Berhasil Di Tambahkan');
eval(\"parent.location='informasi.php'\");
</script>";

} else{
    echo "erorr";
}

?>
