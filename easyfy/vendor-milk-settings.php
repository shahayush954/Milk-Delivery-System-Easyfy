<?php 

$vid = $_GET['vid'];
$link = mysqli_connect('localhost','root','','easyfy');

$query1 = "SELECT * FROM `vendor` WHERE `v_id` = '".$vid."'";

$result1 = mysqli_query($link,$query1);

$row1 = mysqli_fetch_assoc($result1);

?>


<!DOCTYPE html>
<html>
<head>
	<title>Eezyfy</title>
	<link rel="stylesheet" type="text/css" href="vendor-milk-settings-styles.css">
</head>
<body>
	<a href="vendor-settings.php"><img src="back.png" width="60" height="60" style=" position:fixed;left: 15px;
		top: 25px;"></a>
	<div class = "heading">
		Milk Delivery
	<button style="position: absolute; right: 11%; top: 6%; background: transparent; border: none" onclick="edit()">
		<img src="edit.png" width="50" height="50">
	</button>
	</div>
	<form method="POST" action="php/change-vendor-milk-details.php?vid=<?php echo $vid; ?>">
	<div class = "details">
		<div class = "milk card">
			<p class = "title">Milk Agency</p>
			<input type="text" name="vendor-milk-agency" placeholder="Name" value="<?php echo $row1['v_milk_brand']; ?>" id = "vendor-milk-agency">
			<p class = "title">Cost</p>
			<input type="text" name="vendor-milk-cost" placeholder="Cost in Rs." value="<?php echo $row1['v_milk_charge']; ?>" id = "vendor-milk-cost">
			<p class = "title">Delivery Charges</p>
			<input type="text" name="vendor-delivery-charges" placeholder="Delivery Charges in Rs." value="<?php echo $row1['v_delivery_charge']; ?>" id = "vendor-delivery-charges">
		</div>
		<div class = "card">
			<p class = "title">Subscription</p>
			<div class = "subs">
		  	<input type="radio" name="vendor-subscription" value="Prepaid"><label for="sub-type">Prepaid </label> <br>
		  	<input type="radio" name="vendor-subscription" value="Postpaid"><label for="sub-type">Postpaid </label> <br>
		  	<input type="radio" name="vendor-subscription" value="Both"><label for="sub-type">Both </label> <br>
			</div>
		</div>
		<div class = "cutoff card">
			<p class = "title">Cutoff Time</p>
			<input type="text" name="hour" maxlength="2" size="2" placeholder="hh">
			<p style="display: inline;">:</p>
			<input type="text" name="min" maxlength="2" size="2" placeholder="mm">
			<select name="ampm">
				<option>PM</option>
				<option>AM</option>
			</select>			
		</div>
	</div>
	<button class = "submit" onclick="submit()">
		Submit
	</button>
	</form>
	<script type="text/javascript">
		window.onload = function() {
			var inputs = document.getElementsByTagName("input");
			for(var i = 0; i < inputs.length; i++) {
				inputs[i].disabled = true;
				inputs[i].setAttribute("onkeypress","editted()");
				inputs[i].setAttribute("onkeydown","editted()");
				inputs[i].setAttribute("onpaste","editted()");
				inputs[i].setAttribute("oninput","editted()");
			}
		}

		edit = () => {
			var inputs = document.getElementsByTagName("input");
			for(var i = 0; i < inputs.length; i++) {
				inputs[i].disabled = false;
			}
		}

		editted = () => {
			var btnArr = document.getElementsByClassName("submit");
			btnArr[0].style.display = "block";
		}

		submit = () => {
			var btnArr = document.getElementsByClassName("submit");
			btnArr[0].style.display = "none";
			var inputs = document.getElementsByTagName("input");
			for(var i = 0; i < inputs.length; i++) {
				inputs[i].disabled = true;
			}
		}
	</script>
</body>
</html>