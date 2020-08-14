<?php

session_start();
$host = "localhost";
$user = "root";
$pass = "";
$name = "easyfy";

$brand = $_POST['vendor-brand'];
$charge = $_POST['vendor-milk-charge'];
$deliveryCharge = $_POST['vendor-delivery-charge'];
$subscription = $_POST['vendor-subscription'];
//$accname = $_POST['vendor-acc-name'];
//$bankname = $_POST['vendor-bank-name'];
//$accno = $_POST['vendor-acc-no'];
//$ifsc = $_POST['vendor-ifsc'];
$cutofftime = $_POST['hour'].":".$_POST['min']." ".$_POST['ampm'];

$link = mysqli_connect($host,$user,$pass,$name);

$query1 = "UPDATE `vendor` SET `v_milk_brand`='".$brand."',`v_milk_charge`='".$charge."',`v_delivery_charge`='".$deliveryCharge."',`v_cut_off_time`='".$cutofftime."',`v_subscription`='".$subscription."' WHERE `v_no` = '".$_SESSION['v-no']."'";

$result1 = mysqli_query($link,$query1);

if($result1){
	header("Location: ../vendor-main-page.php");
}
else{
	echo mysqli_error($link);
}

?>