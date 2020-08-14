<?php
	session_start();
	$link=mysqli_connect('localhost','root','','easyfy');

	$query1 = "SELECT * FROM `vendor_customer` WHERE `c_id` = '".$_SESSION['customer-id']."'";

	$result1 = mysqli_query($link,$query1);

	$row1 = mysqli_fetch_assoc($result1);

	$query2 = "SELECT * FROM `vendor` WHERE `v_id` = '".$row1['v_id']."'";

	$result2 = mysqli_query($link,$query2);

	$row2 = mysqli_fetch_assoc($result2);


?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		.bill p{
			font-size: 55px;
			text-align: center;
			color: #ff7878;
		}
		.button{
			margin-left: -65px;
			margin-top: 30px;
			color: #fff;
			width: 215px;
			border-radius: 50px;
			background-color: #ff7878;
			height: 100px;
			font-size: 56px;
			border-color: #fff;
		}

	</style>
</head>
<body>
	<a href="customer-both.php?vid=<?php echo $row1['v_id']; ?>"><img src="back.png" width="60" height="60" style="left: 15px;top:25px;position: fixed;"></a>
	<form>
	<div class="bill" style="margin-top: 147px;">
	<p>Total milk Quantity is <?php echo $_SESSION['multiple_litres']; ?> </p> 
	<p>Price/ltr: <?php echo $row2['v_milk_charge']; ?></p>
		<p>Your Bill is <?php echo $row2['v_milk_charge']*$_SESSION['multiple_litres']; ?></p>
	</div>
	<div style="margin-left: 400px;">
	<a href="php/make-payment.php?amount=<?php echo $row2['v_milk_charge']*$_SESSION['multiple_litres']; ?>"><button class="button"style="position: center;">Pay</button></a>
</div>
</form>
</body>
</html>