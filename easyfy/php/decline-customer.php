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
	if($result1){
		header("Location: ../vendor-notif.html");
	}
	break;

	case 'deliveryboy':
	$query1 = "DELETE FROM `requests` WHERE `from_id` = '".$cid."' AND `to_id` = '".$vid."'";
	$result1 = mysqli_query($link,$query1);
	if($result1){
		header("Location: ../vendor-notif.html");
	}
	break;
}

?>