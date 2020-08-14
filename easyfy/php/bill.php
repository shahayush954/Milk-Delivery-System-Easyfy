<?php

$link = mysqli_connect('localhost','root','','easyfy');

$id = $_POST['id'];
$date = (int)$_POST['date'];

$today = date("d");

while($date<=$today){
	$query = "SELECT * FROM `customer_milk_details` WHERE `id`='".$id."' AND `date`= '2019-01-".$date."'";
	$result = mysqli_query($link,$query);
	//$row = mysqli_fetch_assoc($result);
		//echo date('y')."-".date('m')."-".$date."   ".$row['litres']."<br>";
	if(mysqli_num_rows($result) == 0){
		$query1 = "SELECT * FROM `customer` WHERE `id` = '".$id."'";
		$result1 = mysqli_query($link,$query1);
		$row1 = mysqli_fetch_assoc($result1);
		echo date('y')."-".date('m')."-".$date."   ".$row1['litres']."<br>";
	}
	else{
		$row = mysqli_fetch_assoc($result);
		echo date('y')."-".date('m')."-".$date."   ".$row['litres']."<br>";
	}
	$date = $date + 1;
}

?>