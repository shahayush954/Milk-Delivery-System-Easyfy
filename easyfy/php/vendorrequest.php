<?php

$link = mysqli_connect('localhost','root','','easyfy');
if(isset($_POST['submit']) OR isset($_GET['action'])){
	
	if(isset($_GET['action'])){
		$action = $_GET['action'];
	}
	else{
		$action = 'display';
	}
	switch($_GET['action']){
		case 'display':
		$query1 = "SELECT * FROM `vendor_customer_request` WHERE `v_id` = '".$_POST['vid']."'";
		$result1 = mysqli_query($link,$query1);
		while($row1=mysqli_fetch_assoc($result1)){
			echo $row1['c_id']." has requested to connect <a href='vendorrequest.php?action=accept&cid=".$row1['c_id']."&vid=".$row1['v_id']."'><button>Accept</button></a><a href='vendorrequest.php?action=decline&cid=".$row1['c_id']."&vid=".$row1['v_id']."'><button>Decline</button></a><br>";
		}
		break;

		case 'accept':
		$query2 = "INSERT INTO `vendor_customer`(`v_id`,`c_id`) VALUES('".$_GET['vid']."','".$_GET['cid']."')";
		$query3 = "DELETE FROM `vendor_customer_request` WHERE `c_id` = ".$_GET['cid'];
		$result2 = mysqli_query($link,$query2);
		$result3 = mysqli_query($link,$query3);
		//header("Location: vendorrequest.php?action=display&vid=".$_GET['vid']);
		break;

		case 'decline':
		$query3 = "DELETE FROM `vendor_customer_request` WHERE `c_id` = ".$_GET['cid'];
		$result3 = mysqli_query($link,$query3);
		//header("Location: vendorrequest.php?action=display".$_GET['vid']);
		break;

	}
}

?>