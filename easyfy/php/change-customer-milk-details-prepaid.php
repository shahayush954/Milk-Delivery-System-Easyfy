
<?php
session_start();
$link = mysqli_connect('localhost','root','','easyfy');

$query1 = "UPDATE `customer_residence` SET `c_litres` = '".$_POST['no']."', `c_delivery_days` = '".$_POST['day']."', `c_facility` = '".$_POST['days']."' WHERE `c_id` = '".$_SESSION['customer-id']."'";

$result1 = mysqli_query($link,$query1);


	$changes=mysqli_real_escape_string($link,$_POST['no']);
	$_SESSION['multiple_litres']=$changes*30;


if($result1){
	header("Location: ../customer-after-ordering.php");
}

if (isset($_POST['postpaid'])) {
	header('location: ../customer-after-prepaid.php');
}


?>