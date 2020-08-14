<?php  

session_start();

$link = mysqli_connect('localhost','root','','easyfy');

$name = $_POST['vendor-name'];
$phone = $_POST['vendor-contact'];
$no = $_POST['vendor-address-plot'];
$area = $_POST['vendor-address-area'];
$city = $_POST['vendor-address-city'];
$state = $_POST['vendor-address-state'];

$query3 = "SELECT * FROM `customer_residence` WHERE `c_id` = '".$_SESSION['customer-id']."'";
				$result3 = mysqli_query($link,$query3);
				$row3 = mysqli_fetch_assoc($result3);
				switch($row3['residence_type']){
					case 'Building':
					$query1 = "UPDATE `customer_building` SET `c_name` = '".$name."',`c_flat_no` = '".$no."',`c_area` = '".$area."', `c_city` = '".$city."',`c_state` = '".$state."',`c_phone` = '".$phone."' WHERE c_id = '".$_SESSION['customer-id']."'";

					break;

					case 'Bungalow':
					$query1 = "UPDATE `customer_bungalow` SET `c_name` = '".$name."',`c_bungalow_no` = '".$no."',`c_area` = '".$area."', `c_city` = '".$city."',`c_state` = '".$state."',`c_phone` = '".$phone."' WHERE c_id = '".$_SESSION['customer-id']."'";
					
					break;

					case 'Chawl':
					$query1 = "UPDATE `customer_chawl` SET `c_name` = '".$name."',`c_room_no` = '".$no."',`c_area` = '".$area."', `c_city` = '".$city."',`c_state` = '".$state."',`c_phone` = '".$phone."' WHERE c_id = '".$_SESSION['customer-id']."'";
					break;

					case 'Shop':
					$query1 = "UPDATE `customer_shop` SET `c_name` = '".$name."',`c_shop_no` = '".$no."',`c_area` = '".$area."', `c_city` = '".$city."',`c_state` = '".$state."',`c_phone` = '".$phone."' WHERE c_id = '".$_SESSION['customer-id']."'";
					break;
				}

	$result1 = mysqli_query($link,$query1);
	if($result1){
		header("Location: ../customer-personal-settings.php");
	}

?>
