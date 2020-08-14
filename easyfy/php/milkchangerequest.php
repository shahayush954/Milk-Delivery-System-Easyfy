<?php

session_start();

$link = mysqli_connect('localhost','root','','easyfy');


$datedata = strtotime($_POST['datedata']);
$date = date('Y-m-d',$datedata);

switch($_GET['change']){

case 'request':
$query2 = "SELECT * FROM customer_deliveryboy WHERE c_id = '".$_SESSION['customer-id']."'";

$result2 = mysqli_query($link,$query2);

$row2 = mysqli_fetch_assoc($result2);


$query1 = "INSERT INTO `milk_change_request` (`c_id`,`db_id`,`litres`,`date`) VALUES ('".$_SESSION['customer-id']."','".$row2['db_id']."','".$_POST['litres']."','".$date."')";

$result1 = mysqli_query($link,$query1);

$query3 = "INSERT INTO notifications (from_id,to_id,comments,comment_status) VALUES ('".$row2['db_id']."','".$_SESSION['customer-id']."','Your milk change request has been sent successfully','1')";

$result3 = mysqli_query($link,$query3);
echo json_encode($result3);
break;

case 'update':
$litres = $_POST['litres'];
$cid = $_SESSION['customer-id'];
$tomorrow = date("Y-m-d", strtotime('tomorrow'));

$query5 = "SELECT * FROM `customer_milk_details` WHERE `c_id` = '".$cid."' AND `date` = '".$tomorrow."'";

$result5 = mysqli_query($link,$query5);

if(mysqli_num_rows($result5)>0){
	$query2 = "UPDATE `customer_milk_details` SET `litres` = '".$litres."' WHERE `c_id` = '".$cid."' AND `date` = '".$tomorrow."'";
	$result2 = mysqli_query($link,$query2); 
	header("Location: ../customer-after-ordering.php");

}
else{
	$query2 = "INSERT INTO `customer_milk_details` (`c_id`,`litres`,`date`) VALUES ('".$cid."','".$litres."','".$tomorrow."')";
	$result2 = mysqli_query($link,$query2);
	header("Location: ../customer-after-ordering.php");
}
break;
}

?>