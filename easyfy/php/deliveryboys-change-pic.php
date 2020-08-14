<?php

session_start();

$link = mysqli_connect('localhost','root','','easyfy');

$imageName = mysqli_real_escape_string($link,$_FILES["vendor-image"]["name"]);
$vimageData = mysqli_real_escape_string($link,file_get_contents($_FILES["vendor-image"]["tmp_name"]));

$query = "UPDATE `phone_no_db` SET `image` = '".$vimageData."' WHERE `db_id` = '".$_SESSION['deliveryboy-id']."'";

$result = mysqli_query($link,$query);

if($result){
	header("Location: ../deliveryboys-settings.php");
}
else{
	echo "ERROR";
}
