<?php

session_start();

if(isset($_POST['datedata'])){
$a = explode(' GMT',$_POST['datedata']);
$datedata = strtotime($a[0]);
$date = date('Y-m-d',$datedata);

$link = mysqli_connect('localhost','root','','easyfy');

$query = "SELECT * FROM vendor WHERE v_id = '".$_SESSION['vendor-id']."'";

$result  = mysqli_query($link,$query);

$row = mysqli_fetch_assoc($result);

$query1 = "SELECT * FROM vendor_customer WHERE v_id = '".$_SESSION['vendor-id']."'";

$result1 = mysqli_query($link,$query1);

$nocus = mysqli_num_rows($result1);

$litres = 0;

while($row1 = mysqli_fetch_assoc($result1)){
	$query2 = "SELECT * FROM customer_milk_details WHERE c_id = '".$row1['c_id']."' AND `date` = '".$date."'";

	$result2 = mysqli_query($link,$query2);

	$query3 = "SELECT * FROM customer_residence WHERE c_id = '".$row1['c_id']."'";

	$result3 = mysqli_query($link,$query3);

	$row3 = mysqli_fetch_assoc($result3);

	if(mysqli_num_rows($result2) > 0){
		$row2 = mysqli_fetch_assoc($result2);
		$litres = $litres + $row2['litres'];
		if($row2['litres'] == 0){
			$nocus = $nocus - 1;
		}
	}
	else{
		$litres = $litres + $row3['c_litres'];
	}
}

	$data = array(
		'customers' => $nocus,
		'litres' => $litres
	);

	echo json_encode($data);
}

?>