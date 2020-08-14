<?php

$link = mysqli_connect('localhost','root','','easyfy');

$hour = $_POST['hour'];
$min = $_POST['min'];
$ampm = $_POST['ampm'];

$time = $hour.":".$min.":".$ampm;

$vid = $_GET['vid'];

$query = "UPDATE `vendor` SET `v_milk_brand` = '".$_POST['vendor-milk-agency']."', `v_milk_charge` = '".$_POST['vendor-milk-cost']."', `v_delivery_charge` = '".$_POST['vendor-delivery-charges']."', `v_subscription` = '".$_POST['vendor-subscription']."', `v_cut_off_time` = '".$time."' WHERE `v_id` = '".$vid."'";

$result = mysqli_query($link,$query);

if($result){
	header("Location: ../vendor-milk-settings.php?vid=".$vid);
}

?>