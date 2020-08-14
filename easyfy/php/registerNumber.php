<?php
session_start();
$host = "localhost";
$user = "root";
$pass = "";
$db = "easyfy";

$link = mysqli_connect($host,$user,$pass,$db);

$num = $_POST['number'];

switch($_SESSION['user']){
	case 'vendor':
	$query2 = "SELECT * FROM `vendor_contact` WHERE `phone` = '".$num."'";

	$result2 = mysqli_query($link,$query2);

	if(mysqli_num_rows($result2)!=NULL){
		$query3 = "SELECT * FROM `vendor` WHERE `v_phone` = '".$num."'";
		$result3 = mysqli_query($link,$query3);
		$row3 = mysqli_fetch_assoc($result3);
		$_SESSION['vendor-id'] = $row3['v_id'];
		header("Location: ../vendor-main-page.php");
	}
	else{
		$query1 = "INSERT INTO `vendor_contact` (`id`,`phone`) VALUES(NULL,'".$num."')";
		$result1 = mysqli_query($link,$query1);
		$result3 = mysqli_query($link,$query2);
		$row = mysqli_fetch_assoc($result3);
		$_SESSION['v-no'] = $row['id'];
		$_SESSION['v-phone'] = $row['phone'];

		header("Location: ../otpPage.html");
	}
	break;

	case 'customer':
	$query2 = "SELECT * FROM `customer_contact` WHERE `phone` = '".$num."'";

	$result2 = mysqli_query($link,$query2);

	if(mysqli_num_rows($result2)!=NULL){
		$query3 = "SELECT * FROM `customer_residence` WHERE `c_phone` = '".$num."'";
		$result3 = mysqli_query($link,$query3);
		$row3 = mysqli_fetch_assoc($result3);
		$_SESSION['customer-id'] = $row3['c_id'];
		//echo $_SESSION['customer-id'];
		header("Location: ../customer-after-ordering.php");
	}
	else{
		$query1 = "INSERT INTO `customer_contact` (`id`,`phone`) VALUES(NULL,'".$num."')";
		$result1 = mysqli_query($link,$query1);
		$result3 = mysqli_query($link,$query2);
		$row = mysqli_fetch_assoc($result3);
		$_SESSION['c-no'] = $row['id'];
		$_SESSION['c-phone'] = $row['phone'];

		header("Location: ../otpPage.html");
	}
	break;

	case 'deliveryboy':
	$query2 = "SELECT * FROM `delivery_boy_contact` WHERE `phone` = '".$num."'";

	$result2 = mysqli_query($link,$query2);

	if(mysqli_num_rows($result2)!=NULL){
		$query3 = "SELECT * FROM `phone_no_db` WHERE `phone_no` = '".$num."'";
		$result3 = mysqli_query($link,$query3);
		$row3 = mysqli_fetch_assoc($result3);
		$_SESSION['deliveryboy-id'] = $row3['db_id'];
		header("Location: ../deliveryboys-home.php");
	}
	else{
		$query1 = "INSERT INTO `delivery_boy_contact` (`id`,`phone`) VALUES(NULL,'".$num."')";
		$result1 = mysqli_query($link,$query1);
		$result3 = mysqli_query($link,$query2);
		$row = mysqli_fetch_assoc($result3);
		$_SESSION['d-no'] = $row['id'];
		$_SESSION['d-phone'] = $row['phone'];

		header("Location: ../otpPage.html");
	}
	break;

}

	


?>