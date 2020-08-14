<?php

session_start();
$link = mysqli_connect('localhost','root','','easyfy');

$query1 = "SELECT * FROM customer_deliveryboy WHERE db_id = '".$_SESSION['deliveryboy-id']."' AND c_id = '".$_GET['cid']."'";

$result1 = mysqli_query($link,$query1);

$row1 = mysqli_fetch_assoc($result1);

$query2 = "SELECT * FROM vendor_deliveryboy WHERE db_id = '".$_SESSION['deliveryboy-id']."'";

$result2 = mysqli_query($link,$query2);

$row2 = mysqli_fetch_assoc($result2);

$msg1 = $_SESSION['deliveryboy-id']." has collected a payment of Rs.".$_GET['amount']." from customer ".$row1['c_id'];

$msg2 = "Your payment amount of Rs.".$_GET['amount']." has been successfully received by ".$_SESSION['deliveryboy-id'];

$query3 = "INSERT INTO notifications (from_id,to_id,comments,comment_status) VALUES ('".$_SESSION['deliveryboy-id']."','".$row2['v_id']."','".$msg1."','1')";

$query4 = "INSERT INTO notifications (from_id,to_id,comments,comment_status) VALUES ('".$_SESSION['deliveryboy-id']."','".$row1['c_id']."','".$msg2."','1')";

$result3 = mysqli_query($link,$query3);

$result4 = mysqli_query($link,$query4);

$query5 = "DELETE FROM payment_request WHERE from_id = '".$_GET['cid']."' AND to_id = '".$_SESSION['deliveryboy-id']."'";

$result5 = mysqli_query($link,$query5);

$query6 = "SELECT * FROM customer_residence WHERE c_id = '".$row1['c_id']."'";

$result6 = mysqli_query($link,$query6);

$row6 = mysqli_fetch_assoc($result6);

switch($row6['subscription']){
	case 'Prepaid':
	$query7 = "INSERT INTO customer_payment (c_id, subscription, payment_status, start_date) VALUES ('".$row1['c_id']."','Prepaid','Paid','".date('Y-m-d',strtotime('tomorrow'))."')";
	$result7 = mysqli_query($link,$query7);
	break;

	case 'Postpaid':
	$query7 = "INSERT INTO customer_payment (c_id, subscription, payment_status, start_date) VALUES ('".$row1['c_id']."','Postpaid','Paid','".date('Y-m-d',strtotime('tomorrow'))."')";
	$result7 = mysqli_query($link,$query7);
	break;
}


$query8 = "UPDATE customer_residence SET c_start_date = '".date('Y-m-d',strtotime('tomorrow'))."' WHERE c_id = '".$row1['c_id']."'";

$result8 = mysqli_query($link,$query8);


if($result1 AND $result2 AND $result3 AND $result4 AND $result5 AND $result6 AND $result7 AND $result8){
	header("Location: ../deliveryboys-notif.html");
}

?>

