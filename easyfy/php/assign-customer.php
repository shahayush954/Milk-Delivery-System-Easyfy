<?php

$link = mysqli_connect('localhost','root','','easyfy');

$cid = $_GET['cid'];
$did = $_GET['did'];

$query1 = "INSERT INTO `customer_deliveryboy` (`c_id`,`db_id`) VALUES ('".$cid."','".$did."')";
$result1 = mysqli_query($link,$query1);

if($result1){
	header("Location: ../vendor-notif.html");
}

?>