<?php

session_start();
$link = mysqli_connect('localhost','root','','easyfy');

$query1 = "SELECT * FROM `vendor` WHERE `v_id` = '".$_SESSION['vendor-id']."'";

$result1 = mysqli_query($link,$query1);

$row1 = mysqli_fetch_assoc($result1);

?>

<!DOCTYPE html>
<html>
<head>
	<title>Eezyfy</title>
	<link rel="stylesheet" type="text/css" href="vendor-personal-settings-styles.css">
</head>
<body>
	<a href="vendor-settings.php"><img src="back.png" width="60" height="60" style=" position:fixed;left: 15px;
top: 25px;"></a>
	<div class = "heading">
		Settings
	<button style="position: absolute; right: 11%; top: 6%; background: transparent; border: none" onclick="edit()">
		<img src="edit.png" width="50" height="50">
	</button>
	</div>
	<div class = "details">
		<div class = "card">
		<form method="POST" action="php/change-vendor-details.php?vid=<?php echo $row1['v_id'] ?>">
			<p class = "title">Full Name</p>
			<input type="text" name="vendor-name" placeholder="Name" value="<?php echo $row1['v_name'] ?>" id = "vendor-name">
		</div>
		<div class = "card">
			<p class = "title">Phone Number</p>
			<input type="text" name="vendor-contact" placeholder="Contact Number" value="<?php echo $row1['v_phone'] ?>" id = "vendor-contact">
		</div>
		<div class = "address card">
			<p class = "title">Address</p>
			<input type="text" name="vendor-address-plot" placeholder="Plot No." value="<?php echo $row1['v_plot'] ?>" id = "vendor-address-plot">
			<input type="text" name="vendor-address-area" placeholder="Area" value="<?php echo $row1['v_area'] ?>" id = "vendor-address-area">
			<input type="text" name="vendor-address-city" placeholder="City" value="<?php echo $row1['v_city'] ?>" id = "vendor-address-city">
			<input type="text" name="vendor-address-state" placeholder="State" value="<?php echo $row1['v_state'] ?>" id = "vendor-address-state">			
			<!--<input type="text" name="vendor-address-pin" placeholder="Pin Code" value="<?php echo $row1['v_pincode'] ?>" id = "vendor-address-pin">-->
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