<?php

$link = mysqli_connect('localhost','root','','easyfy');

$cid = $_GET['cid'];

$litres = $_GET['litres'];

$query3 = "DELETE FROM `milk_change_request` WHERE `c_id` = '".$cid."'";
$result3 = mysqli_query($link,$query3);

$query4 = "INSERT INTO notifications (from_id,to_id,comments,comment_status) VALUES ('".$_SESSION['deliveryboy-id']."','".$cid."','Your milk change request has been rejected','1')";

$result4 = mysqli_query($link,$query4);


if($result3 AND $result4){
	header("Location: ../deliveryboys-notif.html");
}

?>