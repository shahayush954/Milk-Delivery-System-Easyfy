<?php
	ob_start();
	session_start();
	$db=mysqli_connect("localhost","root","","easyfy");
//	$db_phone=$_SESSION['phone'];
	$dbid=$_SESSION['same_db_id'];
	$record=$_SESSION['rec'];

	$q="select phone_no from phone_no_db where db_id=".$dbid." ";
			$r3=mysqli_query($db,$q);
			while ($row100=mysqli_fetch_assoc($r3)) {
			$phone011=$row100['phone_no'];
			}

	$query013="select v_id from vendor where v_phone=".$phone011." ";
				$result013=mysqli_query($db,$query013);
				while ($row013=mysqli_fetch_assoc($result013)) {
					$vid01=$row013['v_id'];
			}

	switch ($record) {
		case 'same':
			$q="select phone_no from phone_no_db where db_id=".$dbid." ";
			$r3=mysqli_query($db,$q);
			while ($row100=mysqli_fetch_assoc($r3)) {
			$phone011=$row100['phone_no'];
			}
			$sql = "select * from vendor where v_phone=".$phone011." ";
			$sth = $db->query($sql);
			$result=mysqli_fetch_array($sth);
			
			if (isset($_POST['switch_same_profile'])) {
				$query013="select v_id from vendor where v_phone=".$phone011." ";
				$result013=mysqli_query($db,$query013);
				while ($row013=mysqli_fetch_assoc($result013)) {
					$vid=$row013['v_id'];
			}
		//	$record="same";
		//	$_SESSION['rec']=$record;
			$_SESSION['vid']=$vid;
			header('location:vendor-main-page.php');
	}

			break;
		case 'different':
	//		echo "hey ! Now I'am a delivery boy and my phone number is ".$db_phone;
			break;
		
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
	<a href="deliveryboys-settings.php"><img src="back.png" style=" width: 70px; height: 70px;" ></a>
	<div class="dp">
		<?php echo '<img style="width:230px;height:230px" src="data:image/jpeg;base64,'.base64_encode( $result['v_image'] ).'"/>';  ?>
		<h3>Vendor Id <?php echo $vid01; ?></h3>
	<form method="post" action="">	
		<input type="submit" name="switch_same_profile" value="Switch Account">
	</form>
	</div>
</body>
</html>