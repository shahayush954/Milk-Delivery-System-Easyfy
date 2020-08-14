<?php

$link = mysqli_connect('localhost','root','','easyfy');

$cid = $_GET['cid'];

$query1 = "SELECT * FROM customer_residence WHERE c_id = '".$cid."'";

$result1 = mysqli_query($link,$query1);

$row1 = mysqli_fetch_assoc($result1);

switch($row1['residence_type']){
		case 'Building':
			$query3 = "SELECT * FROM customer_building WHERE c_id = '".$row1['c_id']."'";
			$result3 = mysqli_query($link,$query3);

			$row3 = mysqli_fetch_assoc($result3);
			$name = $row3['c_name'];
			$phone = $row3['c_phone'];
			$address = $row3['c_flat_no'].", ".$row3['c_building_name'].", ".$row3['c_area'].", ".$row3['c_city'].", ".$row3['c_state'];

			break;

			case 'Bungalow':
			$query3 = "SELECT * FROM customer_bungalow WHERE c_id = '".$row1['c_id']."'";
			$result3 = mysqli_query($link,$query3);

			$row3 = mysqli_fetch_assoc($result3);
			$name = $row3['c_name'];
			$phone = $row3['c_phone'];
			$address = $row3['c_bungalow_no'].", ".$row3['c_bungalow_name'].", ".$row3['c_area'].", ".$row3['c_city'].", ".$row3['c_state'];
			break;

			case 'Chawl':
			$query3 = "SELECT * FROM customer_chawl WHERE c_id = '".$row1['c_id']."'";
			$result3 = mysqli_query($link,$query3);

			$row3 = mysqli_fetch_assoc($result3);
			$name = $row3['c_name'];
			$phone = $row3['c_phone'];
			$address = $row3['c_room_no'].", ".$row3['c_chawl_name'].", ".$row3['c_area'].", ".$row3['c_city'].", ".$row3['c_state'];
			break;

			case 'Shop':
			$query3 = "SELECT * FROM customer_shop WHERE c_id = '".$row1['c_id']."'";
			$result3 = mysqli_query($link,$query3);

			$row3 = mysqli_fetch_assoc($result3);
			$name = $row3['c_name'];
			$phone = $row3['c_phone'];
			$address = $row3['c_shop_no'].", ".$row3['c_shop_name'].", ".$row3['c_area'].", ".$row3['c_city'].", ".$row3['c_state'];
			break;
		}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Eezyfy</title>
	<link rel="stylesheet" type="text/css" href="customer-details-styles.css">
</head>
<body>
	<a href="vendor-del-boys-customer.php?dbid=<?php echo $_GET['dbid']; ?>"><img src="back.png" width="30" height="30" class = "back-button"></a>

	<div class = "cust-img">
		<a id = "imgHolder" onclick="openModal()"><?php echo "<img src='data:image/jpeg;base64,".base64_encode($row3['c_image'])."'>" ?></a>
	</div>

	<form method="POST" action="php/update-customer-subscription.php?cid=<?php echo $cid; ?>">
	<p id = "customer-id" style="text-align: center;"><?php echo $row1['c_id'] ?></p>
	
	<div class = "details">
		<p class = "heading">Personal Details</p>
		<div class = "space"></div>

		<p class = "qn">Name:</p>
		<p class = "ans"><?php echo $name; ?></p>
		<div class = "space"></div>

		<p class = "qn">Contact:</p>
		<p class = "ans"><?php echo $phone; ?></p>
		<div class = "space"></div>

		<p class = "qn">Address:</p>
		<p class = "ans"><?php echo $address; ?></p>
		<div class = "space"></div>

	</div>
	<div class = "details">
		<p class = "heading">Milk Details</p>
		<div class = "space"></div>

		<p class = "qn">Subscription:</p>
		<p class = "ans" id = "sub-type"><?php echo $row1['subscription']; ?></p>
		<img src="edit.png" style="width: 55px; height: 55px; position: absolute; right: 12%;" onclick = "openSubsChoices()">
		<div class = "space"></div>

		<p class = "qn">Quantity:</p>
		<p class = "ans"><?php echo $row1['c_litres']; ?> litres</p>
		<div class = "space"></div>

		<p class = "qn">Delivery:</p>
		<p class = "ans"><?php echo $row1['c_delivery_days']; ?>&nbsp;&nbsp;&nbsp;</p>
		<div class = "space"></div>


		<div class = "space"></div>

		<div style="display: flex; flex-direction: row; align-items: center;">
			<button id = "submit" onclick="submit()">Submit</button>
		</div>
	</div>
</form>

	<div id = "subscriptions">
		<p class = "choices" id = "PrePaid" onclick="changeSub(this.id)">PrePaid</p>
		<p class = "choices" id = "PostPaid" onclick="changeSub(this.id)">PostPaid</p>
	</div>

	<div id = "payments">
		<p class = "choices" id = "Paid" onclick="changePay(this.id)">Paid</p>
		<p class = "choices" id = "Unpaid" onclick="changePay(this.id)">Unpaid</p>
	</div>

	<script type="text/javascript">
		
		openSubsChoices = () => {
			document.getElementById("subscriptions").style.display = "block";
		}

		changeSub = (sub) => {
			document.getElementById("sub-type").innerHTML = sub;
			document.getElementById("subscriptions").style.display = "none";
			document.getElementById("submit").style.display = "block";
		}

		openPayChoices = () => {
			document.getElementById("payments").style.display = "block";
		}

		changePay = (pay) => {
			document.getElementById("pay-type").innerHTML = pay;
			document.getElementById("payments").style.display = "none";
			document.getElementById("submit").style.display = "block";
		}

		submit = () => {
			document.getElementById("submit").style.display = "none";
		}

	</script>

</body>
</html>