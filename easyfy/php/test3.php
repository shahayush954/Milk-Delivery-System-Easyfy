<?php

$host = "localhost";
$user = "root";
$pass = "";
$name = "easyfy";

$link = mysqli_connect($host,$user,$pass,$name);

$query = "SELECT * FROM `vendor` WHERE `v_id` = '3978'";
$result = mysqli_query($link,$query);
if($result){
	echo "done";
}
$row = mysqli_fetch_assoc($result);

echo "<img src='data:image/jpeg;base64,".base64_encode($row["v_image"])."'>";

?>