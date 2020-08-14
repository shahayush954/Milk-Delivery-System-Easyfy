<?php 

session_start();

$link = mysqli_connect('localhost','root','','easyfy');

$query1 = "SELECT * FROM `customer_deliveryboy` WHERE `c_id` = '".$_SESSION['customer-id']."'";

$result1 = mysqli_query($link,$query1);

$row1 = mysqli_fetch_assoc($result1);

$query2 = "INSERT INTO `payment_request`(`from_id`,`to_id`,`amount`) VALUES ('".$_SESSION['customer-id']."','".$row1['db_id']."','".$_GET['amount']."')";

$result2 = mysqli_query($link,$query2);

if($result1 AND $result2){
	header("Location: ../customer-after-ordering.php");
}
else{
	echo mysqli_error($link);
}


?>