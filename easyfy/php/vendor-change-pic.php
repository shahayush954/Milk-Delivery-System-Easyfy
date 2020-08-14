<?php

session_start();

$link = mysqli_connect('localhost','root','','easyfy');

$imageName = mysqli_real_escape_string($link,$_FILES["vendor-image"]["name"]);
$vimageData = mysqli_real_escape_string($link,file_get_contents($_FILES["vendor-image"]["tmp_name"]));

$query = "UPDATE `vendor` SET `v_image` = '".$vimageData."' WHERE `v_id` = '".$_SESSION['vendor-id']."'";

$result = mysqli_query($link,$query);

if($result){
	header("Location: ../vendor-settings.php");
}
else{
	echo "ERROR";
}


?>