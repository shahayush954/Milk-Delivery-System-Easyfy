<?php
session_start();
$link = mysqli_connect('localhost','root','','easyfy');

$vid = $_GET['vid'];


$query3 = "SELECT * FROM `vendor` WHERE `v_id` = '".$vid."'";

$result3 = mysqli_query($link,$query3);

$row3 = mysqli_fetch_assoc($result3);


?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="customer-prepaid.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<style type="text/css">

.display-img {
	border: 3px solid #ff7878;
}

	</style>
</head>

<script type="text/javascript">
	function increment(){
		var value = parseFloat(document.getElementById('number').value);
      value+=1;
      document.getElementById('number').value = value;
	}

    function decrement()
{
      var value = parseFloat(document.getElementById('number').value);
      if (value>0){
        value-=1;
      }
      document.getElementById('number').value = value;

}
</script>

<body style="margin-top: 100px;">
	<div class="back-button">
		<a href="customer-1st-page.html">
		<img src="back.png" alt="image?" width="60" height="60" style="position: fixed;left: 15px;top: 25px;">
	    </a>
	</div>
	<div class="profile-pic">
		<?php 
			echo "<img class = 'display-img' src='data:image/jpeg;base64,".base64_encode($row3['v_image'])."' height='350' width='350'>";
		 ?>

		 <h1 style="font-weight: normal; margin-bottom: 25px; margin-top: 18px;">Milk Brand :  <?php echo $row3['v_milk_brand']; ?></h1>

		<h1 style="font-weight: normal; margin-bottom: 29px; margin-top: -20px;">Rs. <?php echo $row3['v_milk_charge']; ?>/litre</h1>
	</div>
	<form action="php/change-customer-milk-details-prepaid.php" method="POST">
	<div class="paid">
		<!--<div style="margin-right: 80px; margin-top: 120px;">
			<a href="#" onclick="prepaid()" >Prepaid</a>-->
			<!--<input type="radio" name="payment" ><label style="font-size: 50px;">Prepaid</label>-->
			<input type="radio" name="payment" style="display: none;"><p style="margin: 3% 0; border: 2px solid #ff7878; color: #fff; border-radius: 50px; background: #ff7878; padding: 1.5% 3%; width: 20%; text-align: center;">Prepaid</p>
		</div>

	<div class="paid">
		<p style="font-size: 45px; width: 50%; margin: 5% 3%;">Milk Quantity</p>
		<div>
			<!--<img src="settings.png" width="50" height="50">-->
			<img src="decrement.png" style="width: 50px; background: transparent; border: none;margin-bottom: -10px;"onclick="decrement()">
			<input type="number" name="no" id="number" value="1" style="font-size: 40px; width: 20%; border: 3px solid #ff7878; border-radius:20px; text-align: center; color: #ff7878; padding: 2%; margin: 3% 0">
			<img src="increment.png" style="width: 50px; background: transparent; border: none;margin-bottom: -10px;"onclick="increment()">
		</div>
	</div>
	<div class="paid start-date">
		<p style="font-size: 45px; width: 60%; margin: 5% 3%;margin-top: 38px;">Start Date</p>
		<div class = "date-choser" style = "margin-top: 3.5%;">
			<input type="text" name="date">
			<select name = "month" style="font-size: 45px; color: #ff7878; border-radius: 20px;padding:1%;border: 3px solid #ff7878;">
				<option value="january" style="font-size:15px; color: #ff7878;">January</option>
				<option value="february" style="font-size:15px; color: #ff7878;">February</option>
				<option value="march" style="font-size:15px; color: #ff7878;">March</option>	
				<option value="april" style="font-size:15px; color: #ff7878;">April</option>
				<option value="may" style="font-size:15px; color: #ff7878;">May</option>
				<option value="june" style="font-size:15px; color: #ff7878;">June</option>
				<option value="july" style="font-size:15px; color: #ff7878;">July</option>
				<option value="august" style="font-size:15px; color: #ff7878;">August</option>
				<option value="september" style="font-size:15px; color: #ff7878;">September</option>
				<option value="october" style="font-size:15px; color: #ff7878;">October</option>
				<option value="november" style="font-size:15px; color: #ff7878;">November</option>
				<option value="december" style="font-size:15px; color: #ff7878;">December</option>
			</select>
			<input type="text" name="year">
		</div>
	</div>


	<div class="paid">
		<p style="font-size: 45px; width: 20%; margin: 4% 3%;">Delivery</p>
		<div style="flex-basis: 100%; margin-top: 2.5%;margin-left: 60px;">
			<input type="radio" name="day" checked value="Daily" style="width: 32px;height: 32px;"><label >Daily</label>
			<input type="radio" name="day" value="WeekDays"style="width: 32px;height: 32px;"><label>Weekdays</label>
			<input type="radio" name="day" value="Weekends"style="width: 32px;height: 32px;"><label>Weekends</label>
		</div>
	</div>
	<div class="paid1">

		<div>
			<label >Door Bell<input type="radio" name="days" checked value="Door Bell"><img src="bell-alarm-symbol.png" width="50" height="50" style="border-radius: 25px;"></label>
		</div>
		<div>
			<label>Basket<input type="radio" name="days" value="Basket"><img src="shopping-basket.png" width="50" height="50" style="border-radius: 25px;"></label>
		</div>
		<div>
			<label>None<input type="radio" name="days" value="None"><img src="forbidden-sign-icon.png" width="50" height="50"
				style="border-radius: 25px;"></label>
		</div>
	</div>
	<div class="paid1" style="padding: 20px;">
	
		<input type="submit" name="postpaid" value="Submit" style="font-size: 50px; border: 3px solid #ff7878; background: transparent; border-radius: 50px; padding: 2% 6%; color: #ff7878;margin-top: 15px;">
		
	</div>

</form>


</body>
</html>