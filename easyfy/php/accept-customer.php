<?php
session_start();
$link = mysqli_connect('localhost','root','','easyfy');

$cid = $_GET['cid'];
$vid = $_GET['vid'];

$query = "SELECT * FROM `requests` WHERE `from_id` = '".$cid."' AND `to_id` = '".$vid."'";
$result = mysqli_query($link,$query);
$row = mysqli_fetch_assoc($result);

switch($row['sent_by']){
	case 'customer':
	$query1 = "DELETE FROM `requests` WHERE `from_id` = '".$cid."' AND `to_id` = '".$vid."'";
	$result1 = mysqli_query($link,$query1);

	$query2 = "INSERT INTO `vendor_customer` (`v_id`,`c_id`) VALUES ('".$vid."','".$cid."')";
	$result2 = mysqli_query($link,$query2);

	$query3 = "SELECT * FROM `vendor` WHERE `v_id` = '".$vid."'";
	$result3 = mysqli_query($link,$query3);
	$row3 = mysqli_fetch_assoc($result3);
	switch($row3['v_subscription']){
		case 'Prepaid':
		$query4 = "UPDATE `customer_residence` SET `subscription` = 'Prepaid' WHERE `c_id` = '".$cid."'";
		$result4 = mysqli_query($link,$query4);
		break;

		case 'Postpaid':
		$query4 = "UPDATE `customer_residence` SET `subscription` = 'Postpaid' WHERE `c_id` = '".$cid."'";
		$result4 = mysqli_query($link,$query4);
		break;

	}
	if($result1 AND $result2){
		header("Location: ../vendor-assign-delivery-boys.php?cid=".$cid);
	}
	break;

	case 'deliveryboy':
	$query1 = "DELETE FROM `requests` WHERE `from_id` = '".$cid."' AND `to_id` = '".$vid."'";
	$result1 = mysqli_query($link,$query1);
	$query2 = "INSERT INTO `vendor_deliveryboy` (`v_id`,`db_id`) VALUES ('".$vid."','".$cid."')";
	$result2 = mysqli_query($link,$query2);
	if($result1 AND $result2){
		header("Location: ../vendor-notif.html");
	}
	break;
}

?>