<?php

$host = "localhost";
$user = "root";
$pass = "";
$name = "easyfy";

$link = mysqli_connect($host,$user,$pass,$name);

$tomorrow = date("Y-m-d", strtotime('tomorrow'));

$query1 = "SELECT * FROM `customer` WHERE 1";
$result1 = mysqli_query($link,$query1);

while($row1 = mysqli_fetch_assoc($result1)){
	$query2 = "SELECT * FROM `customer_milk_details` WHERE `id` = ".$row1['id']." AND date = '".$tomorrow."'";
	$result2 = mysqli_query($link,$query2);
	if(mysqli_num_rows($result2) == 0){
		$query3 = "INSERT INTO `customer_milk_details` (`id`,`litres`,`date`) VALUES ('".$row1['id']."','".$row1['litres']."','".$tomorrow."')";
		$result3 = mysqli_query($link,$query3);
		if($result3){
			echo "done";
		}
	}
}

?>