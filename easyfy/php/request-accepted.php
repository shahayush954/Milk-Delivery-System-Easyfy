<?php

$link = mysqli_connect('localhost','root','','easyfy');

$query1 = "SELECT * FROM `requests` WHERE `from_id` = '".$_GET['cid']."'";
$result1 = mysqli_query($link,$query1);

if(mysqli_num_rows($result1)){
	echo " ";
}

?>