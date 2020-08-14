<?php

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
	if($result1 AND $result2){
		header("Location: ../vendor-notif.html");
	}
	break;

	case 'deliveryboy':
	break;
}

?>