<?php 

session_start();
$cid = $_GET['cid'];
$link = mysqli_connect('localhost','root','','easyfy');

$query1 = "SELECT * FROM `vendor_deliveryboy` WHERE `v_id` = '".$_SESSION['vendor-id']."'";
$result1 = mysqli_query($link,$query1);
$numdelboys = mysqli_num_rows($result1);

$query2 = "SELECT * FROM `vendor_customer` WHERE `v_id` = '".$_SESSION['vendor-id']."'";
$result2 = mysqli_query($link,$query2);
$numcustomers = 0;
while($row2 = mysqli_fetch_assoc($result2)){
	$numcustomers++;
}


?>

<!DOCTYPE html>
<html>
<head>
	<title>Eezyfy</title>
	<link rel="stylesheet" type="text/css" href="vendor-assign-delivery-boys.css">
</head>
<body>
	<div id = "totals">

		<h1 style="font-size: 60px;margin: 25px;height:0px;font-family: Segoe UI,Frutiger,Frutiger Linotype,Dejavu Sans,Helvetica Neue,Arial,sans-serif;"><?php echo $numdelboys ?> Delivery Boys</h1>
		<!--<div id = "totals-child-cust">
			<img src="total-customers.png">
			<p>Total Customers</p>
			<p id = "cust-count"><?php echo $numcustomers; ?></p>
		</div>
		<div id = "totals-child-litres">
			<img src="milk-bottle.png">
			<p>Total Litres</p>
			<p id = "litre-count">100</p>
		</div>
		<div id = "totals-child-db">
			<img src="delivery-boy-icon.png">
			<p>Total Del Boys</p>
			<p id = "db-count"><?php echo $numdelboys; ?></p>
		</div>-->
	</div>
	<div id = "db-container">
		<ul id = "list">
		<?php
		while($row1 = mysqli_fetch_assoc($result1)){

			$query3 = "SELECT * FROM `phone_no_db` WHERE `db_id` = '".$row1['db_id']."'";
			$result3 = mysqli_query($link,$query3);
			$row3 = mysqli_fetch_assoc($result3);

			$query4 = "SELECT * FROM `customer_deliveryboy` WHERE `db_id` = '".$row1['db_id']."'";
			$result4 = mysqli_query($link,$query4);
			$delcus = mysqli_num_rows($result4);

			echo "
			<a href='php/assign-customer.php?cid=".$cid."&did=".$row1['db_id']."' style='text-decoration: none; color: #ff7878;'>
			<li class = 'flex-parent'>
				<div class = 'flex-child-img'>
					<img src='data:image/jpeg;base64,".base64_encode($row3['image'])."'>
				</div>
				<div class = 'flex-child-details'>
					<p class = 'id'>ID: ".$row3['db_id']."</p>
					<p class = 'name'>".$row3['name']."</p>
				</div>
				<div class = 'flex-child-cust-no'>
					<p class = 'cust-no'>".$delcus."</p>
				</div>
			</li>
			</a>";
		}
		?>
		</ul>
	</div>
	<!--<div id = "bottom-navbar">
		<a class = "child" href="vendor-main-page.html">
			<img src="home-icon.png" style="align-self: center;">
			Home
		</a>
		<a class = "child" href="vendor-notif.html">
			<img src="notif-icon.png" style="align-self: center;">
			Notifs
		</a>
		<a class = "child" href="vendor-del-boys.php">
			<img src="delivery-boy-icon.png" style="align-self: center;">
			Del Boys
		</a>
		<a class = "child" href="vendor-settings.php">
			<img src="settings-icon.png" style="align-self: center;">
			Settings
		</a>
	</div>-->

</body>
</html>