<?php

session_start();
$link = mysqli_connect('localhost','root','','easyfy');
//echo $_POST['residence'];
$imageName = mysqli_real_escape_string($link,$_FILES["customer-image"]["name"]);
	$imageData = mysqli_real_escape_string($link,file_get_contents($_FILES["customer-image"]["tmp_name"]));
switch($_POST['residence'])
{
	case 'Building':
	$id=rand(pow(10, 7), pow(10, 8)-1);
	$_SESSION['customer-id'] = $id;
	$query1 = "INSERT INTO `customer_building` (`c_id`, `c_name`, `c_flat_no`, `c_wing`, `c_building_name`, `c_area`, `c_city`, `c_state`, `c_pincode`, `c_phone`, `c_image`) VALUES ('".$id."','".$_POST['c-name']."','".$_POST['cb-flat']."','".$_POST['cb-wing']."','".$_POST['cb-bname']."','".$_POST['cb-area']."','".$_POST['cb-city']."','".$_POST['cb-state']."','".$_POST['cb-pincode']."','".$_SESSION['c-phone']."','".$imageData."')";
	$query2 = "INSERT INTO `customer_residence` (`c_id`, `residence_type`, `subscription`,`c_phone`,`c_register_date`) VALUES ('".$id."', 'Building', '0','".$_SESSION['c-phone']."','".date('Y-m-d')."')";
	$result2 = mysqli_query($link,$query2);
	$result1 = mysqli_query($link,$query1);
	header("Location: ../customer-connect-vendor.php");
	break;

	case 'Bungalow':
	$id=rand(pow(10, 7), pow(10, 8)-1);
	$_SESSION['customer-id'] = $id;
	$query1 = "INSERT INTO `customer_bungalow` (`c_id`, `c_name`, `c_bungalow_no`, `c_bungalow_name`, `c_area`, `c_city`, `c_state`, `c_pincode`, `c_phone`, `c_image`) VALUES ('".$id."', '".$_POST['c-name']."', '".$_POST['cbb-bbno']."', '".$_POST['cbb-bbname']."', '".$_POST['cbb-area']."', '".$_POST['cbb-city']."', '".$_POST['cbb-state']."', '".$_POST['cbb-pincode']."', '".$_SESSION['c-phone']."','".$imageData."')";
	$result1 = mysqli_query($link,$query1);
	$query2 = "INSERT INTO `customer_residence` (`c_id`, `residence_type`, `subscription`,`c_phone`,`c_register_date`) VALUES ('".$id."', 'Bungalow', '0','".$_SESSION['c-phone']."','".date('Y-m-d')."')";
	$result2 = mysqli_query($link,$query2);
	header("Location: ../customer-connect-vendor.php");
	break;

	case 'Chawl':
	$id=rand(pow(10, 7), pow(10, 8)-1);
	$_SESSION['customer-id'] = $id;
	$query1 = "INSERT INTO `customer_chawl` (`c_id`, `c_name`, `c_room_no`, `c_chawl_name`, `c_area`, `c_city`, `c_state`, `c_pincode`, `c_phone`,`c_image`) VALUES ('".$id."', '".$_POST['c-name']."', '".$_POST['cc-room']."', '".$_POST['cc-cname']."', '".$_POST['cc-area']."', '".$_POST['cc-city']."', '".$_POST['cc-state']."', '".$_POST['cc-pincode']."', '".$_SESSION['c-phone']."','".$imageData."')";
	$result1 = mysqli_query($link,$query1);
	$query2 = "INSERT INTO `customer_residence` (`c_id`, `residence_type`, `subscription`,`c_phone`,`c_register_date`) VALUES ('".$id."', 'Chawl', '0','".$_SESSION['c-phone']."','".date('Y-m-d')."')";
	$result2 = mysqli_query($link,$query2);
	header("Location: ../customer-connect-vendor.php");
	break;

	case 'Shop':
	$id=rand(pow(10, 7), pow(10, 8)-1);
	$_SESSION['customer-id'] = $id;
	$query1 = "INSERT INTO `customer_shop` (`c_id`, `c_name`, `c_shop_no`, `c_shop_name`, `c_area`, `c_city`, `c_state`, `c_pincode`, `c_phone`,`c_image`) VALUES ('".$id."', '".$_POST['c-name']."', '".$_POST['cs-sno']."', '".$_POST['cs-sname']."', '".$_POST['cs-area']."', '".$_POST['cs-city']."', '".$_POST['cs-state']."', '".$_POST['cs-pincode']."', '".$_SESSION['c-phone']."','".$imageData."')";
	$result1 = mysqli_query($link,$query1);
	$query2 = "INSERT INTO `customer_residence` (`c_id`, `residence_type`, `subscription`,`c_phone`,`c_register_date`) VALUES ('".$id."', 'Shop', '0','".$_SESSION['c-phone']."','".date('Y-m-d')."')";
	$result2 = mysqli_query($link,$query2);
	header("Location: ../customer-connect-vendor.php");
	break;
}

?>