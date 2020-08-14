<?php

session_start();
$link = mysqli_connect('localhost','root','','easyfy');

$imageName = mysqli_real_escape_string($link,$_FILES["file"]["name"]);
$imageData = mysqli_real_escape_string($link,file_get_contents($_FILES["file"]["tmp_name"]));

$id=rand(pow(10, 5), pow(10, 6)-1);
$_SESSION['deliveryboy-id'] = $id;

$dbno = $_SESSION['d-no'];
$dbphone = $_SESSION['d-phone'];
$name = $_POST['db_name'];

$date = date("Y-m-d");

$query = "INSERT INTO `phone_no_db` (`db_no`, `phone_no`, `name`, `image`, `db_id`, `date`) VALUES ('".$dbno."', '".$dbphone."', '".$name."', '".$imageData."', '".$id."', '".$date."')";

$result = mysqli_query($link,$query);

if($result){
	header("Location: ../connect-to-vendor.php");
}

?>