<?php
session_start();
$link = mysqli_connect('localhost','root','','easyfy');
$flag = 0;

if(isset($_POST['v_code_submit'])){
$query1 = "SELECT * FROM `vendor` WHERE `v_id` = '".$_POST['v_code']."'";

$result1 = mysqli_query($link,$query1);


if(mysqli_num_rows($result1)>0){
	$flag=1;
}
}


$query2 = "SELECT * FROM `vendor_deliveryboy` WHERE `db_id` = '".$_SESSION['deliveryboy-id']."'";
$result2 = mysqli_query($link,$query2);

?>


<!DOCTYPE html>
<html>
<head>
	<title>Eezyfy</title>
	<link rel="stylesheet" type="text/css" href="vendor-main-page-style(UPDATED).css">
</head>
<body>


<?php
	if(mysqli_num_rows($result2) == 0){
	if($flag == 1){
		
		$row1 = mysqli_fetch_assoc($result1);
	?>
<div class="flex-box">
	<div class="flex1">
		<?php echo"<img src='data:image/jpeg;base64,".base64_encode($row1['v_image'])."' width='240' height='240'>";?>
	</div>
	<div class="flex2">
		<p>Id :<?php echo $row1['v_id']; ?></p>
		<p>Name :<?php echo $row1['v_name']; ?> </p>
		<p style="margin-bottom: 20px;">Brand:<?php echo $row1['v_milk_brand'] ?></p>
		<?php
		echo "<a href='php/send-request-db.php?dbid=".$_SESSION['deliveryboy-id']."&vid=".$_POST['v_code']."' style='margin-left: 20px;'>Send</a>
		<a href='connect-to-vendor.php' style='margin-left: 50px;'>Back</a>";
		?>
	</div>
	<?php 
}
}
?>
</div>


<div id = "bottom-navbar">
	<a href="deliveryboys-home.html"  style="font-size:40px;"class = "child" href="deliveryboys-home.php">
		<img src="home.png"width="65" height="65" style="align-self: center; margin-bottom: 5px;">
		<label style="    font-family: Segoe UI,Frutiger,Frutiger Linotype,Dejavu Sans,Helvetica Neue,Arial,sans-serif;">Home</label>
	</a>
	<a  href="deliveryboys-notif.html" style="font-size:40px;"class = "child" href="vendor-notif.html">
		<img src="notification.png"width="65" height="65" style="align-self: center;margin-bottom: 5px;">
		<label style="    font-family: Segoe UI,Frutiger,Frutiger Linotype,Dejavu Sans,Helvetica Neue,Arial,sans-serif;">Notifs</label>
	</a>
	<a href="deliveryboys-customer-page.php"style="font-size:40px;"class = "child" href="vendor-del-boys.html">
		<img src="delivery-boy-icon.png"width="65" height="65" style="align-self: center;margin-bottom: 5px;">
		<label style="    font-family: Segoe UI,Frutiger,Frutiger Linotype,Dejavu Sans,Helvetica Neue,Arial,sans-serif;">Customers</label>
	</a>
	<a href="deliveryboys-settings.php" style="font-size:40px;"class = "child" href="vendor-settings.html">
		<img src="settings.png"width="65" height="65" style="align-self: center;margin-bottom: 5px;">
		<label style="    font-family: Segoe UI,Frutiger,Frutiger Linotype,Dejavu Sans,Helvetica Neue,Arial,sans-serif;">Settings</label>
	</a>
</div>

</body>
</html>