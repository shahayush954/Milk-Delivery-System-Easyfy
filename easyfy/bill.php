<?php  

session_start();

$link = mysqli_connect('localhost','root','','easyfy');

$query1 = "SELECT * FROM customer_residence WHERE c_id = '".$_SESSION['customer-id']."'";

$result1 = mysqli_query($link,$query1);

$row1 = mysqli_fetch_assoc($result1);

$begin =  new DateTime(date('Y-m-d',strtotime($row1['c_start_date'])));

$end = new DateTime(date('Y-m-d'));

$interval = DateInterval::createFromDateString('1 day');

$period = new DatePeriod($begin,$interval,$end);

$query2 = "SELECT * FROM vendor_customer WHERE c_id = '".$_SESSION['customer-id']."'";

$result2 = mysqli_query($link,$query2);

$row2 = mysqli_fetch_assoc($result2);

$query3 = "SELECT * FROM vendor WHERE v_id = '".$row2['v_id']."'";

$result3 = mysqli_query($link,$query3);

$row3 = mysqli_fetch_assoc($result3);

$total = 0;

$quantity = 0;

foreach ($period as $dt){
		$query4 = "SELECT * FROM customer_milk_details WHERE c_id = '".$_SESSION['customer-id']."' AND `date` = '".$dt->format('Y-m-d')."'";

		$result4 = mysqli_query($link,$query4);

		if(mysqli_num_rows($result4) > 0){
			$row4 = mysqli_fetch_assoc($result4);

			$total = $total + $row4['litres'] * $row3['v_milk_charge'];
			$quantity = $quantity + $row4['litres'];
			
		}
		else{
		
			$total = $total + $row1['c_litres'] * $row3['v_milk_charge'];
			$quantity = $quantity + $row1['c_litres'];
		}
	 
}


?>


<html>
<head>
	<style type="text/css">
	.flex-box{
	  	display: flex;
  		background-color: #fff;
  		width: 90%;
  		margin-left: 2%;
  		margin-right: 4%;
  		border-radius: 50px;
  		border: 5px solid #ff7878;
  		z-index: 99;
  		position: fixed;
  		top: 0;
	margin-bottom: 0;
	margin-top: 0;
}
.flex-box .flex1{
	width: 40%;
	margin-top: 0;
	margin-bottom: 0;
}
.flex-box .flex1 img{
	border-radius: 50%;
	display: block;
	margin-left: auto;
	margin-right: auto;
	padding: 5%;
	width: 250px;
	height: 250px;

}
.flex-box .flex2{
	margin-top: 60px;
	margin-left: 15%;
	margin-top: 3%;

}
.flex-box .flex2 p{
	width: 100%;
	margin: auto;
	font-size: 40px;

	
}
.flex-box .flex2 a{
	background-color: #ff7878;
	color: #fff;
	text-decoration: none;
	border-radius: 25%;
	font-size: 50px;
	padding: 10px;
	margin-top: 15px;
}
.down-arrow{
	position: fixed;
	top:255px;
	width: 80%;
	border-radius: 25px;
	display: block;
	margin-left:6%;
	margin-right: 10%;
	border:5px solid #ff7878;
	padding-top: 2%;
	padding-bottom: 2%;
	border-top:0px ;
}
.down-arrow img{
	display: block;
	margin-right: auto;
	margin-left: auto;
}

.right{
	padding-bottom: 0;
}
#dett{
	position: relative;
	top: 515px;

	border-top: 0px;

	width: 80%;
	margin-right: 10%;
	margin-left: 7%;


}
#down1{
	background-color: #ff7878;
}
#payment{
	width:80%;
	height: 755px;
	margin-left:8%;
	margin-right: 1%;
	position: absolute;
	top: 712px; 
	overflow: scroll;
}
body{
font-family: Segoe UI,Frutiger,Frutiger Linotype,Dejavu Sans,Helvetica Neue,Arial,sans-serif;
color: #ff7878; 
}

#bottom-navbar{
	height:150px;
	width: 100%;
	border: 2px solid #ff7878;
	position: fixed;
	left:-2px;
	bottom: 0;
	z-index: 1px;
	margin: 0;
	display: flex;
	flex-direction: row;
	justify-content: center;
	align-items: stretch;
}

#bottom-navbar .child{
	padding: 2%;
	font-size: 50px;
	display: inline;
	flex-basis: 24%;
	margin: 0;
	text-align: center;
	text-decoration: none;
	color: #ff7878;
}

#bottom-navbar .child img{
	display: block;
	margin: 0 auto;
}


</style>
<script type="text/javascript">
	window.onload=function(){
		document.getElementById('dett').style.display='none';
		document.getElementById('down1').style.display='none';
		document.getElementById('payment').style.display='none';
	}
	function details() {
		// body...
		document.getElementById('dett').style.display='block';
		document.getElementById('down1').style.display='block';
		document.getElementById('payment').style.display='block';
		document.getElementById('down').style.display='none';
	}
		function no_details() {
		// body...
		document.getElementById('dett').style.display='none';
		document.getElementById('down1').style.display='none';
		document.getElementById('payment').style.display='none';
		document.getElementById('down').style.display='block';
	}
</script>
</head>

<?php 

if($row1['subscription'] == 'Prepaid'){

?>
<body>
<div class="flex-box">
	<div class="flex1">
		<?php
			echo "<img src='data:image/jpeg;base64,".base64_encode($row3['v_image'])."'>"; 
		 ?>
	</div>
	<div class="flex2">
		<p>Rs/ltr:<?php echo $row3['v_milk_charge']; ?></p>
		<p>Total value:<?php echo $total; ?>/-</p>
		<p>Total Order: <?php echo $row1['c_litres']*30; ?></p>
		<p>Rem Litres: <?php echo ($row1['c_litres']*30) - $quantity; ?></p>
		<input type="submit" name="" value="Pay Cash" style="font-size:40px;">
	</div>

</div>
  <div class="down-arrow" id="down">
	<div style="   ">
	<img src="down-collapsible1.png" width="100" height="100" onclick="details()">
	</div>
  </div>

  <div class="down-arrow" id="down1">
	<div style="   ">
	<img src="up-collapsible.png" width="100" height="100" onclick="no_details()">
	</div>
  </div>

 <div id="dett">
 	<div style="position: fixed;top:397px;border-radius: 25px;border-top: 5px solid#ff7878;border-left: 5px solid#ff7878;border-right: 5px solid#ff7878;width: 80%;margin-left: 0%;margin-right: 20%;z-index: 999999; ">
	<p style="text-align: center;font-size:40px;margin-bottom: 0;margin-top: 0; ">Agency Name: <?php echo $row3['v_milk_brand']; ?></p>
	<p style="text-align: center;font-size:40px;margin-top: 0;">Address:<?php echo $row3['v_plot'].", ".$row3['v_area'].", ".$row3['v_city'].", ".$row3['v_state']; ?></p>
	<div class="right">
	<p style="font-size: 35px; margin-bottom: 0;">Id: <?php echo $row3['v_id']; ?></p>
	<div style="border-bottom: 2px solid #ff7878;">
	<p style="font-size: 35px;margin-top:0;margin-bottom: 0;">Ph No:<?php echo $row3['v_phone'] ?></p>
	<p style="position: absolute; right: 1px;top: 150px; font-size: 35px;margin-bottom: 0;">Date:<?php echo date('d-m-Y') ?></p>
	</div>
	<div style="border-bottom: 2px solid #ff7878;">
	<p style="display: inline;font-size: 35px;">Date</p>
	<p style="display: inline;font-size: 35px; margin-left: 25%; margin-right: 25%;">Quantity</p>
	<p style="display: inline;font-size: 35px;">Price</p>
	</div>
	</div>
	</div>
	<div style="height: 100px; position: fixed;bottom: 150px; border:5px solid #ff7878;width: 80%; margin-right: 0;margin-left: 0;">
		<p style="display: inline;font-size: 40px;">Total Quantity:<?php echo $quantity; ?>L</p>
		<p style="display: inline;font-size: 40px; margin-left: 100px;">Total value:Rs <?php echo $total; ?>/-</p>
	 </div>
 </div>

<div id="payment">
	<!--
	
	<div style="border-bottom: 2px solid #ff7878;">
		<p style="display: inline;font-size: 35px;">13-5-2019</p>
		<p style="display: inline;font-size: 35px; margin-left: 25%; margin-right: 25%;">6</p>
		<p style="display: inline;font-size: 35px;">45</p>
	</div>
-->

	<?php 

	foreach ($period as $dt){
		$query4 = "SELECT * FROM customer_milk_details WHERE c_id = '".$_SESSION['customer-id']."' AND `date` = '".$dt->format('Y-m-d')."'";

		$result4 = mysqli_query($link,$query4);

		if(mysqli_num_rows($result4) > 0){
			$row4 = mysqli_fetch_assoc($result4);
			echo "<div style='border-bottom: 2px solid #ff7878;'>
			<p style='display: inline;font-size: 35px;'>".$dt->format('d-m-Y')."</p>
			<p style='display: inline;font-size: 35px; margin-left: 25%; margin-right: 25%;'>".$row4['litres']."</p>
			<p style='display: inline;font-size: 35px;'>".$row3['v_milk_charge'] * $row4['litres']."</p>
				</div>";
		}
		else{
			echo "<div style='border-bottom: 2px solid #ff7878;'>
			<p style='display: inline;font-size: 35px;'>".$dt->format('d-m-Y')."</p>
			<p style='display: inline;font-size: 35px; margin-left: 25%; margin-right: 25%;'>".$row1['c_litres']."</p>
			<p style='display: inline;font-size: 35px;'>".$row3['v_milk_charge'] * $row1['c_litres']."</p>
				</div>";
		}
	 
}
	?>
</div>
	</div>
 	
	<div id = "bottom-navbar">
		<a class = "child" href="customer-after-ordering.php">
		<img src="home.png" width="65" height="65"style="align-self: center; margin-bottom: 5px;">
		<label style="font-size: 35px;font-family: Segoe UI,Frutiger,Frutiger Linotype,Dejavu Sans,Helvetica Neue,Arial,sans-serif;">Home</label>
			
		</a>
		<a class = "child" href="customer-notif.html">
		<img src="notification.png" width="65" height="65"style="align-self: center;margin-bottom: 5px;">
		<label style="font-size: 35px; font-family: Segoe UI,Frutiger,Frutiger Linotype,Dejavu Sans,Helvetica Neue,Arial,sans-serif;">Notificaions</label>
		</a>
		<a class = "child" href="bill.php" style="background-color: #ff7878; color: #fff;">
		<img src="statement_white.png" width="65" height="65"style="align-self: center;margin-bottom: 5px;">
		<label style="font-size: 35px; font-family: Segoe UI,Frutiger,Frutiger Linotype,Dejavu Sans,Helvetica Neue,Arial,sans-serif;">Bill</label>
		</a>
		<a class = "child" href="customer-settings.php">
		<img src="settings.png" width="65" height="65"style="align-self: center;margin-bottom: 5px;">
		<label style="font-size: 35px; font-family: Segoe UI,Frutiger,Frutiger Linotype,Dejavu Sans,Helvetica Neue,Arial,sans-serif;">Settings</label>
		</a>
	</div>

</body>
<?php 
}
else{
?>
<body>
<div class="flex-box">
	<div class="flex1">
		<?php
			echo "<img src='data:image/jpeg;base64,".base64_encode($row3['v_image'])."'>"; 
		 ?>
	</div>
	<div class="flex2">
		<p>Rs/ltr:<?php echo $row3['v_milk_charge']; ?></p>
		<p>Total value:<?php echo $total; ?>/-</p>
		<input type="submit" name="" value="Pay Cash" style="font-size:40px;">
	</div>

</div>
  <div class="down-arrow" id="down">
	<div style="   ">
	<img src="down-collapsible1.png" width="100" height="100" onclick="details()">
	</div>
  </div>

  <div class="down-arrow" id="down1">
	<div style="   ">
	<img src="up-collapsible.png" width="100" height="100" onclick="no_details()">
	</div>
  </div>

 <div id="dett">
 	<div style="position: fixed;top:397px;border-radius: 25px;border-top: 5px solid#ff7878;border-left: 5px solid#ff7878;border-right: 5px solid#ff7878;width: 80%;margin-left: 0%;margin-right: 20%;z-index: 999999; ">
	<p style="text-align: center;font-size:40px;margin-bottom: 0;margin-top: 0; ">Agency Name: <?php echo $row3['v_milk_brand']; ?></p>
	<p style="text-align: center;font-size:40px;margin-top: 0;">Address:<?php echo $row3['v_plot'].", ".$row3['v_area'].", ".$row3['v_city'].", ".$row3['v_state']; ?></p>
	<div class="right">
	<p style="font-size: 35px; margin-bottom: 0;">Id: <?php echo $row3['v_id']; ?></p>
	<div style="border-bottom: 2px solid #ff7878;">
	<p style="font-size: 35px;margin-top:0;margin-bottom: 0;">Ph No:<?php echo $row3['v_phone'] ?></p>
	<p style="position: absolute; right: 1px;top: 150px; font-size: 35px;margin-bottom: 0;">Date:<?php echo date('d-m-Y') ?></p>
	</div>
	<div style="border-bottom: 2px solid #ff7878;">
	<p style="display: inline;font-size: 35px;">Date</p>
	<p style="display: inline;font-size: 35px; margin-left: 25%; margin-right: 25%;">Quantity</p>
	<p style="display: inline;font-size: 35px;">Price</p>
	</div>
	</div>
	</div>
	<div style="height: 100px; position: fixed;bottom:150px; border:3px solid #ff7878;width: 80%; margin-right: 0;margin-left: 0;">
		<p style="display: inline;font-size: 35px;">Total Quantity:<?php echo $quantity; ?>L</p>
		<p style="display: inline;font-size: 35px; margin-left: 100px;">Total value:Rs <?php echo $total; ?>/-</p>
	 </div>
 </div>

<div id="payment">
	<!--
	
	<div style="border-bottom: 2px solid #ff7878;">
		<p style="display: inline;font-size: 35px;">13-5-2019</p>
		<p style="display: inline;font-size: 35px; margin-left: 25%; margin-right: 25%;">6</p>
		<p style="display: inline;font-size: 35px;">45</p>
	</div>
-->

	<?php 

	foreach ($period as $dt){
		$query4 = "SELECT * FROM customer_milk_details WHERE c_id = '".$_SESSION['customer-id']."' AND `date` = '".$dt->format('Y-m-d')."'";

		$result4 = mysqli_query($link,$query4);

		if(mysqli_num_rows($result4) > 0){
			$row4 = mysqli_fetch_assoc($result4);
			echo "<div style='border-bottom: 2px solid #ff7878;'>
			<p style='display: inline;font-size: 35px;'>".$dt->format('d-m-Y')."</p>
			<p style='display: inline;font-size: 35px; margin-left: 25%; margin-right: 25%;'>".$row4['litres']."</p>
			<p style='display: inline;font-size: 35px;'>".$row3['v_milk_charge'] * $row4['litres']."</p>
				</div>";
		}
		else{
			echo "<div style='border-bottom: 2px solid #ff7878;'>
			<p style='display: inline;font-size: 35px;'>".$dt->format('d-m-Y')."</p>
			<p style='display: inline;font-size: 35px; margin-left: 25%; margin-right: 25%;'>".$row1['c_litres']."</p>
			<p style='display: inline;font-size: 35px;'>".$row3['v_milk_charge'] * $row1['c_litres']."</p>
				</div>";
		} 
}
	?>

</div>
	</div>
 
	<div id = "bottom-navbar">
		<a class = "child" href="customer-after-ordering.html">
		<img src="home.png" width="65" height="65"style="align-self: center; margin-bottom: 5px;">
		<label style="font-size: 35px;font-family: Segoe UI,Frutiger,Frutiger Linotype,Dejavu Sans,Helvetica Neue,Arial,sans-serif;">Home</label>
			
		</a>
		<a class = "child" href="customer-notif.html">
		<img src="notification.png" width="65" height="65"style="align-self: center;margin-bottom: 5px;">
		<label style="font-size: 35px; font-family: Segoe UI,Frutiger,Frutiger Linotype,Dejavu Sans,Helvetica Neue,Arial,sans-serif;">Notificaions</label>
		</a>
		<a class = "child" href="bill.php" style="background-color: #ff7878; color: #fff;">
		<img src="statement_white.png" width="65" height="65"style="align-self: center;margin-bottom: 5px;">
		<label style="font-size: 35px; font-family: Segoe UI,Frutiger,Frutiger Linotype,Dejavu Sans,Helvetica Neue,Arial,sans-serif;">Bill</label>
		</a>
		<a class = "child" href="customer-settings.php">
		<img src="settings.png" width="65" height="65"style="align-self: center;margin-bottom: 5px;">
		<label style="font-size: 35px; font-family: Segoe UI,Frutiger,Frutiger Linotype,Dejavu Sans,Helvetica Neue,Arial,sans-serif;">Settings</label>
		</a>
	</div>
</body>
<?php 
}
?>
</html>