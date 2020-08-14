<?php

session_start();

$link = mysqli_connect('localhost','root','','easyfy');

$litres = $_GET['litres'];
$cid = $_GET['cid'];
$tomorrow = date("Y-m-d");

$query = "SELECT * FROM vendor_deliveryboy WHERE db_id = '".$_SESSION['deliveryboy-id']."'";

$result = mysqli_query($link,$query);

$row = mysqli_fetch_assoc($result);

$query5 = "SELECT * FROM `customer_milk_details` WHERE `c_id` = '".$cid."' AND `date` = '".$tomorrow."'";

$result5 = mysqli_query($link,$query5);


$query1 = "INSERT INTO notifications (from_id,to_id,comments,comment_status) VALUES ('".$_SESSION['deliveryboy-id']."','".$row['v_id']."','The customer ".$cid." has changed their milk quantity to ".$litres."','1')";

$query4 = "INSERT INTO notifications (from_id,to_id,comments,comment_status) VALUES ('".$_SESSION['deliveryboy-id']."','".$cid."','Your milk change request has been accepted','1')";

$result1 = mysqli_query($link,$query1);

$result4 = mysqli_query($link,$query4);

if(mysqli_num_rows($result5)>0){
	$query2 = "UPDATE `customer_milk_details` SET `litres` = '".$litres."' WHERE `c_id` = '".$cid."' AND `date` = '".$tomorrow."'";
	$result2 = mysqli_query($link,$query2); 
}
else{
	$query2 = "INSERT INTO `customer_milk_details` (`c_id`,`litres`,`date`) VALUES ('".$cid."','".$litres."','".$tomorrow."')";
	$result2 = mysqli_query($link,$query2);
}
$query3 = "DELETE FROM `milk_change_request` WHERE `c_id` = '".$cid."'";
$result3 = mysqli_query($link,$query3);

if($result1 AND $result2 AND $result3 AND $result4){
	header("Location: ../deliveryboys-notif.html");
}

?>