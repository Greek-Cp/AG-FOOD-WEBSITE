<?php  
$target_dir = "image_profile/";
$IMGUR_CLIENT_ID = "76ca4c2e630c19f"; 
$target_file_name = $target_dir;
// Check if image file is an actual image or fake image  
$responseImg = array();
if (isset($_FILES["file"])){
    $nameImage = $_FILES['file']['tmp_name'];
    $type = $_FILES['file']['type'];
    $imgProp = getimagesize($_FILES['file']['tmp_name']);
    $data = file_get_contents($_FILES['file']['tmp_name']);
    $ch = curl_init(); 
    curl_setopt($ch, CURLOPT_URL, 'https://api.imgur.com/3/image'); 
    curl_setopt($ch, CURLOPT_POST, TRUE); 
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE); 
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: Client-ID ' . $IMGUR_CLIENT_ID)); 
    curl_setopt($ch, CURLOPT_POSTFIELDS, array('image' => base64_encode($data))); 
    $response = curl_exec($ch); 
    curl_close($ch); 
    $responseArr = json_decode($response); 
    $responseImg["message"] = "sukses";  
    $responseImg["link"] = $responseArr->data->link;
    echo json_encode($responseImg);  
}
  
?>  