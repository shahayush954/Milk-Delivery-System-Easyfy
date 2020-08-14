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

$query2 = "SELECT * FROM `vendor_customer` WHERE `c_id` = '".$_SESSION['customer-id']."'";
$result2 = mysqli_query($link,$query2);


?>


<!DOCTYPE html>
<html>
<head>
	<title>Eezyfy</title>
	<link rel="stylesheet" type="text/css" href="vendor-main-page-style(UPDATED).css">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

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
		echo "<a href='php/send-request-customer.php?cid=".$_SESSION['customer-id']."&vid=".$_POST['v_code']."' style='margin-left: 20px;'>Send</a>
		<a href='customer-connect-vendor.php' style='margin-left: 50px;'>Back</a>";
		?>
	</div>
	<?php 
}
}
?>
</div>


<div id = "bottom-navbar">
	<a href="customer-after-ordering.html"  style="font-size:40px;"class = "child" >
		<img src="home.png"width="65" height="65" style="align-self: center; margin-bottom: 5px;">
		<label style="    font-family: Segoe UI,Frutiger,Frutiger Linotype,Dejavu Sans,Helvetica Neue,Arial,sans-serif;">Home</label>
	</a>
	<a  href="customer-notif.html" style="font-size:40px;"class = "child">
		<img src="notification.png"width="65" height="65" style="align-self: center;margin-bottom: 5px;">
		<label style="    font-family: Segoe UI,Frutiger,Frutiger Linotype,Dejavu Sans,Helvetica Neue,Arial,sans-serif;">Notifs</label>
	</a>
	<a href="bill.php"style="font-size:40px;"class = "child" >
		<img src="statement.png"width="65" height="65" style="align-self: center;margin-bottom: 5px;">
		<label style="    font-family: Segoe UI,Frutiger,Frutiger Linotype,Dejavu Sans,Helvetica Neue,Arial,sans-serif;">Bill</label>
	</a>
	<a href="customer-settings.html" style="font-size:40px;"class = "child" >
		<img src="settings.png"width="65" height="65" style="align-self: center;margin-bottom: 5px;">
		<label style="    font-family: Segoe UI,Frutiger,Frutiger Linotype,Dejavu Sans,Helvetica Neue,Arial,sans-serif;">Settings</label>
	</a>
</div>

	
</body>
</html>