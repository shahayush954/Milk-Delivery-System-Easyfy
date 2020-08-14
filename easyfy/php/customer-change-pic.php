<?php

session_start();
$link = mysqli_connect('localhost','root','','easyfy');

$imageName = mysqli_real_escape_string($link,$_FILES["vendor-image"]["name"]);
$vimageData = mysqli_real_escape_string($link,file_get_contents($_FILES["vendor-image"]["tmp_name"]));

$query1 = "SELECT * FROM customer_residence WHERE c_id = '".$_SESSION['customer-id']."'";

$result1 = mysqli_query($link,$query1);

$row1 = mysqli_fetch_assoc($result1);

switch($row1['residence_type']){
	case 'Building':
	$query2 = "UPDATE customer_building SET c_image = '".$vimageData."' WHERE c_id = '".$_SESSION['customer-id']."'";
	$result2 = mysqli_query($link,$query2);
	break;

	case 'Bungalow':
	$query2 = "UPDATE customer_bungalow SET c_image = '".$vimageData."' WHERE c_id = '".$_SESSION['customer-id']."'";
	$result2 = mysqli_query($link,$query2);
	break;

	case 'Chawl':
	$query2 = "UPDATE customer_chawl SET c_image = '".$vimageData."' WHERE c_id = '".$_SESSION['customer-id']."'";
	$result2 = mysqli_query($link,$query2);
	break;

	case 'Shop':
	$query2 = "UPDATE customer_shop SET c_image = '".$vimageData."' WHERE c_id = '".$_SESSION['customer-id']."'";
	$result2 = mysqli_query($link,$query2);
	break;
}

if($result2){
	header("Location: ../customer-settings.php");
}
else{
	echo "ERROR";
}

?>