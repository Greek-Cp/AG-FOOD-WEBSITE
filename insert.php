<?php
require('koneksi.php');
session_start();
$IMGUR_CLIENT_ID = "76ca4c2e630c19f"; 
echo isset($_POST['btnTambahkan']) . " test ";
print_r($_POST);
echo "<br>";
if(isset($_POST['btnTambahkan'])){
    $queryGetIdBarang = "SELECT * FROM `barang` ORDER BY `id_barang` ASC;";
    $result = mysqli_query($konek,$queryGetIdBarang);
    $no = 0;
    while($row = mysqli_fetch_array($result)){
        $idBarang = $row['id_barang'];
        echo "ID BARANG = " . $idBarang . "<BR>";
        $no++;
    }
    $no += 1;
    $idBarang = "BRG" . $no;
    $txtJenisMenu = $_POST['name_dropdown'];
    $namaMenu = $_POST['txt_namamenu'];
    $txtHarga = $_POST['txt_harga'];
    $txtDeskripsi = $_POST['txt_deksripsi'];
    $nameImage = $_FILES['formfilesfoto']['name'];
    $type = $_FILES['formfilesfoto']['type'];
    $imgProp = getimagesize($_FILES['formfilesfoto']['tmp_name']);
    $data = file_get_contents($_FILES['formfilesfoto']['tmp_name']);
    $ch = curl_init(); 
    curl_setopt($ch, CURLOPT_URL, 'https://api.imgur.com/3/image'); 
    curl_setopt($ch, CURLOPT_POST, TRUE); 
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE); 
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: Client-ID ' . $IMGUR_CLIENT_ID)); 
    curl_setopt($ch, CURLOPT_POSTFIELDS, array('image' => base64_encode($data))); 
    $response = curl_exec($ch); 
    curl_close($ch); 
    $responseArr = json_decode($response); 
    echo " test = " . $responseArr -> data -> link;
    print '<pre>'; print_r($responseArr); print '</pre>'; 
    printf('<img height="180" src="%s" >', $responseArr->data->link);
    $dataURIImage = $responseArr->data->link;
    $query = "INSERT INTO `barang`(`id_barang`,`nama_barang`,`rating`,`jenis_barang`,`harga`,
    `gambar_barang`,`deskripsi_barang`,`imageType`) 
    VALUES('$idBarang','$namaMenu','0','$txtJenisMenu','$txtHarga','$dataURIImage','$txtDeskripsi',
    '{$imgProp['mime']}');";
    $eksekusi_1 = mysqli_query($konek,$query);
    echo "<br>";
    echo $query;
    echo "<br>";
    echo $txtJenisMenu;
    echo "<br>";
    echo $namaMenu;
    echo "<br>";
    echo $txtHarga;
    echo "<br>";
    echo $txtDeskripsi;
    echo "<br>";
    echo "<SCRIPT> //not showing me this
    alert('Menambahkan Data Berhasil')
    </SCRIPT>";
    header('Location: index.php');
} else{
    echo "erorr";
}
?>
