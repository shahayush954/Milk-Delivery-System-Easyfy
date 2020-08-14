<?php
session_start();
$link = mysqli_connect('localhost','root','','easyfy');

$query1 = "UPDATE `customer_residence` SET `c_litres` = '".$_POST['no']."', `c_delivery_days` = '".$_POST['day']."', `c_facility` = '".$_POST['days']."' WHERE `c_id` = '".$_SESSION['customer-id']."'";

$result1 = mysqli_query($link,$query1);

if($result1){
	header("Location: ../customer-1st-page.html");
}
