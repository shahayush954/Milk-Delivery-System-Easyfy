<?php

session_start();

$link = mysqli_connect('localhost','root','','easyfy');

$output = "";

$count = 0;

if(isset($_POST['view'])){
	$query1 = "SELECT * FROM notifications WHERE to_id = '".$_SESSION['customer-id']."'";

	$result1 = mysqli_query($link,$query1);

	while($row1 = mysqli_fetch_assoc($result1)){
		$output .= "
			<li>".$row1['comments']."</li>
		";
		$count++;
	}
	$data = array(
		'req' => $output,
		'count' => $count
	);

	echo json_encode($data);
}

?>