<?php
require('koneksi.php');
session_start();
// Client ID of Imgur App 
print_r($_POST);
echo "<br>";

if(isset($_POST['btnEdit'])){
    $txtDeskripsi = $_POST['txt_deksripsi'];
    $sqlQueryInsert = "UPDATE `informasi` SET `informasi` = '" . $txtDeskripsi . "';";
    $res = mysqli_query($konek, $sqlQueryInsert);
    echo "<script>
alert (' Informasi Berhasil Di Simpan');
eval(\"parent.location='informasi.php'\");
</script>";

} else{
    echo "erorr";
}
?>
