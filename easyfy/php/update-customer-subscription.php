<?php

$link = mysqli_connect('localhost','root','','easyfy');

$cid = $_GET['cid'];

$query = "UPDATE customer_residence SET subscription = '".$_POST['subscription']."' WHERE c_id = '".$cid."'";

$result = mysqli_query($link,$query);

if($result){
	header("Location: ../customer-details.php?cid=".$cid);
}

?>