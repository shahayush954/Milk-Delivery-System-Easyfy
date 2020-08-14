<?php 

session_start();

$link = mysqli_connect('localhost','root','','easyfy');

$query2 = "SELECT * FROM `vendor_deliveryboy` WHERE `v_id` = '".$_SESSION['vendor-id']."'";
$result2 = mysqli_query($link,$query2);
$numdelboys = mysqli_num_rows($result2);

$query1 = "SELECT * FROM `vendor_customer` WHERE `v_id` = '".$_SESSION['vendor-id']."'";
$result1 = mysqli_query($link,$query1);
$numcustomers = 0;
while($row2 = mysqli_fetch_assoc($result1)){
	$numcustomers++;
}

$litres = 0;
while($row1 = mysqli_fetch_assoc($result1)){
	$query2 = "SELECT * FROM customer_milk_details WHERE c_id = '".$row1['c_id']."' AND `date` = '".date('Y-m-d')."'";

	$result2 = mysqli_query($link,$query2);

	$query3 = "SELECT * FROM customer_residence WHERE c_id = '".$row1['c_id']."'";

	$result3 = mysqli_query($link,$query3);

	$row3 = mysqli_fetch_assoc($result3);

	if(mysqli_num_rows($result2) > 0){
		$row2 = mysqli_fetch_assoc($result2);
		$litres = $litres + $row2['litres'];
		if($row2['litres'] == 0){
			$numcustomers = $numcustomers - 1;
		}
	}
	else{
		$litres = $litres + $row3['c_litres'];
	}
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Eezyfy</title>
	<link rel="stylesheet" type="text/css" href="vendor-currentday-del-boys-styles.css">
</head>
<body>
	<a href="vendor-main-page.php"><img src="back.png" width="60" height="60" style=" z-index: 999; position:fixed;left: 10px; top: 20px;"></a>
	<div id = "totals">
		<div id = "totals-child-db">
			<img src="delivery-boy-icon.png">
			<p>Total Del Boys</p>
			<p id = "db-count"><?php echo $numdelboys; ?></p>
		</div>
		<div id = "totals-child-cust">
			<img src="total-customers.png">
			<p>Total Customers</p>
			<p id = "cust-count"><?php echo $numcustomers; ?></p>
		</div>
		<div id = "totals-child-litres">
			<img src="milk-bottle.png">
			<p>Total Litres</p>
			<p id = "litre-count"><?php echo $litres; ?></p>
		</div>
	</div>
	<div id = "db-container">
		<ul id = "list">
		<?php
		while($row1 = mysqli_fetch_assoc($result2)){

			$query3 = "SELECT * FROM `phone_no_db` WHERE `db_id` = '".$row1['db_id']."'";
			$result3 = mysqli_query($link,$query3);
			$row3 = mysqli_fetch_assoc($result3);

			$query4 = "SELECT * FROM customer_deliveryboy WHERE db_id = '".$row1['db_id']."'";
			$result4 = mysqli_query($link,$query4);
			$delcus = mysqli_num_rows($result4);
			$dellitres = 0;
			while($row4 = mysqli_fetch_assoc($result4)){
				$query5 = "SELECT * FROM customer_milk_details WHERE c_id = '".$row4['c_id']."' AND `date` = '".date("Y-m-d", strtotime('tomorrow'))."'";

			$result5 = mysqli_query($link,$query5);

			$query6 = "SELECT * FROM customer_residence WHERE c_id = '".$row4['c_id']."'";

			$result6 = mysqli_query($link,$query6);

			$row6 = mysqli_fetch_assoc($result6);

			if(mysqli_num_rows($result5) > 0){
				$row5 = mysqli_fetch_assoc($result5);
				$litres = $litres + $row5['litres'];
				if($row5['litres'] == 0){
					$delcus = $delcus - 1;
				}
			}
			else{
				$dellitres = $dellitres + $row6['c_litres'];
				}
			}


			echo "
			<a href = 'vendor-deliveryboys-currentcustomer.php?dbid=".$row1['db_id']."' style='text-decoration:none;color:#ff7878;'>
			<li class = 'flex-parent'>
				<div class = 'flex-child-img'>
					<img src='data:image/jpeg;base64,".base64_encode($row3['image'])."'>
				</div>
				<div class = 'flex-child-details'>
					<p class = 'id'>ID: ".$row3['db_id']."</p>
					<p class = 'name'>".$row3['name']."</p>
				</div>
				<div class = 'flex-child-cust-no'>
				<p class = 'id'>".$delcus." </p>
				<p class = 'id'>".$dellitres." L </p>
				</div>
			</li>
			</a>";
		}
		?>
		</ul>
	</div>

</body>
</html>