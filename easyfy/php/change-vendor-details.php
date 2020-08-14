<?php

$link = mysqli_connect('localhost','root','','easyfy');

$vid = $_GET['vid'];

$query1 = "UPDATE `vendor` SET `v_name` = '".$_POST['vendor-name']."', `v_phone` = '".$_POST['vendor-contact']."', `v_plot` = '".$_POST['vendor-plot']."', `v_area` = '".$_POST['vendor-area']."', `v_city` = '".$_POST['vendor-city']."', `v_state` = '".$_POST['vendor-state']."' WHERE `v_id` = '".$vid."'";

$result1 = mysqli_query($link,$query1);

if($result1){
	header("Location: ../vendor-personal-settings.php");
}

?>