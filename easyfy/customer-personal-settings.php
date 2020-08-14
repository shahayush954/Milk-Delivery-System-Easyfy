<?php  

session_start();

$link = mysqli_connect('localhost','root','','easyfy');

$query3 = "SELECT * FROM `customer_residence` WHERE `c_id` = '".$_SESSION['customer-id']."'";
				$result3 = mysqli_query($link,$query3);
				$row3 = mysqli_fetch_assoc($result3);
				switch($row3['residence_type']){
					case 'Building':
					$query4 = "SELECT * FROM `customer_building` WHERE `c_id` = '".$row3['c_id']."'";
					$result4 = mysqli_query($link,$query4);
					$row4 = mysqli_fetch_assoc($result4);
					break;

					case 'Bungalow':
					$query4 = "SELECT * FROM `customer_bungalow` WHERE `c_id` = '".$row3['c_id']."'";
					$result4 = mysqli_query($link,$query4);
					$row4 = mysqli_fetch_assoc($result4);
					break;

					case 'Chawl':
					$query4 = "SELECT * FROM `customer_chawl` WHERE `c_id` = '".$row3['c_id']."'";
					$result4 = mysqli_query($link,$query4);
					$row4 = mysqli_fetch_assoc($result4);
					break;

					case 'Shop':
					$query4 = "SELECT * FROM `customer_shop` WHERE `c_id` = '".$row3['c_id']."'";
					$result4 = mysqli_query($link,$query4);
					$row4 = mysqli_fetch_assoc($result4);
					break;
				}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Eezyfy</title>
	<link rel="stylesheet" type="text/css" href="customer-personal-settings.css">
</head>
<body>
	<a href="customer-settings.php"><img src="back.png" width="60" height="60" style=" position:fixed;left: 15px;
top: 25px;"></a>
	<div class = "heading">
		Settings
	<button style="position: absolute; right: 11%; top: 6%; background: transparent; border: none" onclick="edit()">
		<img src="edit.png" width="50" height="50">
	</button>
	</div>
	<div class = "details">
		<div class = "card">
		<form method="POST" action='php/update-customer-personal-settings.php'>
			<p class = "title">Full Name</p>
			<input type="text" name="vendor-name" placeholder="Name" value="<?php echo $row4['c_name'] ?>" id = "vendor-name">
		</div>
		<div class = "card">
			<p class = "title">Phone Number</p>
			<input type="text" name="vendor-contact" placeholder="Contact Number" value="<?php echo $row4['c_phone'] ?>" id = "vendor-contact">
		</div>
		<div class = "address card">
			<p class = "title">Address</p>

			<?php 

			switch($row3['residence_type']){
					case 'Building':
					$query4 = "SELECT * FROM `customer_building` WHERE `c_id` = '".$row3['c_id']."'";
					$result4 = mysqli_query($link,$query4);
					$row4 = mysqli_fetch_assoc($result4);
					echo "
						<input type='text' name='vendor-address-plot' placeholder='Flat No.' value='".$row4['c_flat_no']."' id = 'vendor-address-plot'>
						<input type='text' name='vendor-address-area' placeholder='Area' value='".$row4['c_area']."' id = 'vendor-address-area'>
						<input type='text' name='vendor-address-city' placeholder='City' value='".$row4['c_city']."' id = 'vendor-address-city'>
						<input type='text' name='vendor-address-state' placeholder='State' value='".$row4['c_state']."' id = 'vendor-address-state'>
					";
					break;

					case 'Bungalow':
					$query4 = "SELECT * FROM `customer_bungalow` WHERE `c_id` = '".$row3['c_id']."'";
					$result4 = mysqli_query($link,$query4);
					$row4 = mysqli_fetch_assoc($result4);
					echo "
						<input type='text' name='vendor-address-plot' placeholder='Bungalow No.' value='".$row4['c_bungalow_no']."' id = 'vendor-address-plot'>
						<input type='text' name='vendor-address-area' placeholder='Area' value='".$row4['c_area']."' id = 'vendor-address-area'>
						<input type='text' name='vendor-address-city' placeholder='City' value='".$row4['c_city']."' id = 'vendor-address-city'>
						<input type='text' name='vendor-address-state' placeholder='State' value='".$row4['c_state']."' id = 'vendor-address-state'>
					";
					break;

					case 'Chawl':
					$query4 = "SELECT * FROM `customer_chawl` WHERE `c_id` = '".$row3['c_id']."'";
					$result4 = mysqli_query($link,$query4);
					$row4 = mysqli_fetch_assoc($result4);
					echo "
						<input type='text' name='vendor-address-plot' placeholder='Room No.' value='".$row4['c_room_no']."' id = 'vendor-address-plot'>
						<input type='text' name='vendor-address-area' placeholder='Area' value='".$row4['c_area']."' id = 'vendor-address-area'>
						<input type='text' name='vendor-address-city' placeholder='City' value='".$row4['c_city']."' id = 'vendor-address-city'>
						<input type='text' name='vendor-address-state' placeholder='State' value='".$row4['c_state']."' id = 'vendor-address-state'>
					";
					break;

					case 'Shop':
					$query4 = "SELECT * FROM `customer_shop` WHERE `c_id` = '".$row3['c_id']."'";
					$result4 = mysqli_query($link,$query4);
					$row4 = mysqli_fetch_assoc($result4);
					echo "
						<input type='text' name='vendor-address-plot' placeholder='Shop No.' value='".$row4['c_shop_no']."' id = 'vendor-address-plot'>
						<input type='text' name='vendor-address-area' placeholder='Area' value='".$row4['c_area']."' id = 'vendor-address-area'>
						<input type='text' name='vendor-address-city' placeholder='City' value='".$row4['c_city']."' id = 'vendor-address-city'>
						<input type='text' name='vendor-address-state' placeholder='State' value='".$row4['c_state']."' id = 'vendor-address-state'>
					";
					break;
				}

			?>
			
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