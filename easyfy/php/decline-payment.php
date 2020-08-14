<?php

session_start();
$link = mysqli_connect('localhost','root','','easyfy');

$query1 = "SELECT * FROM customer_deliveryboy WHERE db_id = '".$_SESSION['deliveryboy-id']."' AND c_id = '".$_GET['cid']."'";

$result1 = mysqli_query($link,$query1);

$row1 = mysqli_fetch_assoc($result1);

$msg2 = $_SESSION['deliveryboy-id']." has declined your payment request";

$query4 = "INSERT INTO notifications (from_id,to_id,comments,comment_status) VALUES ('".$_SESSION['deliveryboy-id']."','".$row1['c_id']."','".$msg2."','1')";

$result4 = mysqli_query($link,$query4);

$query5 = "DELETE FROM payment_request WHERE from_id = '".$_GET['cid']."' AND to_id = '".$_SESSION['deliveryboy-id']."'";

$result5 = mysqli_query($link,$query5);

if($result1 AND $result4 AND $result5){
	header("Location: ../deliveryboys-notif.html");
}

?>