<?php

session_start();

$link = mysqli_connect('localhost','root','','easyfy');

$output = "";

$count = 0;

if(isset($_POST['view'])){
	$query1 = "SELECT * FROM payment_request WHERE to_id = '".$_SESSION['deliveryboy-id']."'";

	$result1 = mysqli_query($link,$query1);

	while($row1 = mysqli_fetch_assoc($result1)){
		$output .= "
			<li>".$row1['from_id']." has made a payment of Rs.".$row1['amount']." <a href='php/accept-payment.php?amount=".$row1['amount']."&cid=".$row1['from_id']."'><button type='button'style='fontsize:20px'>Accept</button></a>
			<a href='php/decline-payment.phpphp?amount=".$row1['amount']."&cid=".$row1['from_id']."'><button type='button'>Decline</button></a>
			</li>
		";
		$count++;
	}

}


if(isset($_POST['change'])){
	$query2 = "SELECT * FROM milk_change_request WHERE db_id = '".$_SESSION['deliveryboy-id']."'";

	$result2 = mysqli_query($link,$query2);

	while($row2 = mysqli_fetch_assoc($result2)){
		$output .= "
			<li>".$row2['c_id']." wants ".$row2['litres']." litres of milk 
			<a href='php/milkchangeaccept.php?cid=".$row2['c_id']."&litres=".$row2['litres']."'><button type='button'>Accept</button></a>
			<a href='php/milkchangedecline.php?cid=".$row2['c_id']."&litres=".$row2['litres']."'><button type='button'>Decline</button></a>
		";
		$count++;
	}
}

$data = array(
		'req' => $output,
		'count' => $count
	);

	echo json_encode($data);

?>