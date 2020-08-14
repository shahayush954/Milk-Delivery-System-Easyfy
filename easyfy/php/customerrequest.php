<?php

$link = mysqli_connect('localhost','root','','easyfy');
$query1 = "INSERT INTO `vendor_customer_request` (`c_id`,`v_id`) VALUES('".$_POST['cid']."','".$_POST['vid']."')";
$result1 = mysqli_query($link,$query1);
if($result1){
	echo "Request Sent";
}
else{
	echo "Not Sent";
}

?>