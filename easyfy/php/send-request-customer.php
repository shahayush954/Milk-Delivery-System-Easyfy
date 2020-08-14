<?php

$link = mysqli_connect('localhost','root','','easyfy');

$query = "INSERT INTO `requests` (`from_id`, `to_id`, `sent_by`) VALUES ('".$_GET['cid']."', '".$_GET['vid']."', 'customer')";
$result = mysqli_query($link,$query);


if($result){
	header("Location: ../customer-1st-page.html");
}

?>