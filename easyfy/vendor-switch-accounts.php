<?php
	ob_start();
	session_start();
	$db=mysqli_connect("localhost","root","","easyfy");
//	$phone=9769765491;
//	echo $_SESSION['v-phone'];
//	echo $_SESSION['vendor-id'];
	
	$q="select v_phone from vendor where v_id=".$_SESSION['vendor-id']." ";
	$r=mysqli_query($db,$q);
	while ($row100=mysqli_fetch_assoc($r)) {
		$phone01=$row100['v_phone'];
	}

	$sql = "select * from phone_no_db where phone_no=".$phone01." ";
	$sth = $db->query($sql);
	$result=mysqli_fetch_array($sth);
	
	$query03="select db_id from phone_no_db where phone_no=".$phone01." ";
		$result03=mysqli_query($db,$query03);
		while ($row03=mysqli_fetch_assoc($result03)) {
			$dbid01=$row03['db_id'];
		}

	
//	echo $phone01;
		if (isset($_POST['switch_same_profile'])) {
		$query03="select db_id from phone_no_db where phone_no=".$phone01." ";
		$result03=mysqli_query($db,$query03);
		while ($row03=mysqli_fetch_assoc($result03)) {
			$dbid=$row03['db_id'];
		}
		$record="same";
		$_SESSION['rec']=$record;
		$_SESSION['same_db_id']=$dbid;
		header('location:deliveryboys-home.php');
	}
	
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
	body{
		font-family: Segoe UI,Frutiger,Frutiger Linotype,Dejavu Sans,Helvetica Neue,Arial,sans-serif;
	}
		.dp{
			display: block;
			margin-left:350px; 
			margin-top: 130px;

		}
		.dp img{
			border:2px solid #ff7878;
			border-radius: 50%;
		}
		.dp h3{
			margin-left: 0px;
			font-size: 40px;
			opacity: 0.5;
			position: relative;
			right: 25px;
		}
		.dp input[type='submit']{
			border:2px solid #ff7878;
			border-radius: 25px;
			padding:5%;
			font-size: 35px;
			background-color: #ff7878;
			color: white;
			margin-top: 80px;
			position: relative;
			right: 25px;

		}
	</style>
</head>
<body>
	<a href="vendor-settings.php"><img src="back.png" style=" width: 70px; height: 70px;" ></a>
	<div class="dp">
		<?php echo '<img style="width:230px;height:230px" src="data:image/jpeg;base64,'.base64_encode( $result['image'] ).'"/>'; ?>
		<h3>Delivery boy Id <?php echo $dbid01 ; ?></h3>
	<form method="post" action="">	
		<input type="submit" name="switch_same_profile" value="Switch Account">
	</form>
	</div>
</body>
</html>
