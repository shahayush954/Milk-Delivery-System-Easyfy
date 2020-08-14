<?php

session_start();
$host = "localhost";
$user = "root";
$pass = "";
$name = "easyfy";

$link = mysqli_connect($host,$user,$pass,$name);

$vname = $_POST['vendor-name'];
$vplot = $_POST['vendor-plot'];
$varea = $_POST['vendor-area'];
$vcity = $_POST['vendor-city'];
$vstate = $_POST['vendor-state'];
$vid = rand(pow(10, 3), pow(10, 4)-1);
$_SESSION['vendor-id'] = $vid;
//echo $vname;
//echo $_SESSION['v-nphone'];

$imageName = mysqli_real_escape_string($link,$_FILES["vendor-image"]["name"]);
$vimageData = mysqli_real_escape_string($link,file_get_contents($_FILES["vendor-image"]["tmp_name"]));
//echo $vimageData;

$query1 = "INSERT INTO `vendor` (`v_no`, `v_phone`, `v_name`, `v_plot`, `v_area`, `v_city`, `v_state`, `v_id`, `v_milk_brand`, `v_milk_charge`, `v_delivery_charge`, `v_cut_off_time`, `v_subscription`, `v_acc_name`, `v_acc_no`, `v_bank_name`, `v_IFSC_code`, `v_image`, `v_start_date`) VALUES ('".$_SESSION['v-no']."', '".$_SESSION['v-phone']."', '".$vname."', '".$vplot."', '".$varea."', '".$vcity."', '".$vstate."', '".$vid."', '0', '0', '0','0', '0', '0', '0', '0', '0','".$vimageData."','".date('Y-m-d')."')";

	$result1 = mysqli_query($link,$query1);
	if($result1){
		header("Location: ../milk-details.html");
	}
	else{
		echo mysqli_error($link);
	}

?>