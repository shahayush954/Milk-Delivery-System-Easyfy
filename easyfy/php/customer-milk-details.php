<?php

session_start();
$link = mysqli_connect('localhost','root','','easyfy');

$query1 = "SELECT * FROM `vendor_customer` WHERE `c_id` = '".$_SESSION['customer-id']."'";

$result1 = mysqli_query($link,$query1);

$row1 = mysqli_fetch_assoc($result1);

echo $row1['v_id'];

echo $_SESSION['customer-id'];

$query2 = "SELECT * FROM `vendor` WHERE `v_id` = '".$row1['v_id']."'";

$result2 = mysqli_query($link,$query2);

$row2 = mysqli_fetch_assoc($result2);

echo $row2['v_subscription'];

switch($row2['v_subscription']){

	case 'Prepaid':
	header("Location: ../customer-prepaid.php?vid=".$row1['v_id']);
	break;

	case 'Postpaid':
	header("Location: ../customer-postpaid.php?vid=".$row1['v_id']);
	break;

	case 'Both':
	header("Location: ../customer-both.php?vid=".$row1['v_id']);
	break;
}

?>