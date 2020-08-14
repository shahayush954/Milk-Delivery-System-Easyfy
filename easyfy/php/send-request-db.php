<?php

$link = mysqli_connect('localhost','root','','easyfy');

$query = "INSERT INTO `requests` (`from_id`, `to_id`, `sent_by`) VALUES ('".$_GET['dbid']."', '".$_GET['vid']."', 'deliveryboy')";
$result = mysqli_query($link,$query);

if($result){
	header("Location: ../deliveryboys-home.php");
}