<?php 
session_start();


$link = mysqli_connect('localhost','root','','easyfy');

$query1 = "SELECT * FROM `customer_deliveryboy` WHERE `db_id` = '".$_SESSION['deliveryboy-id']."'";

$result1 = mysqli_query($link,$query1);

$numcus = mysqli_num_rows($result1);

$numcusbuilding = 0;
$numcusbungalow = 0;
$numcuschawl = 0;
$numcusshop = 0;

while($row1 = mysqli_fetch_assoc($result1)){
	$query2 = "SELECT * FROM `customer_residence` WHERE `c_id` = '".$row1['c_id']."'";
	$result2 = mysqli_query($link,$query2);
	$row2 = mysqli_fetch_assoc($result2);
	switch($row2['residence_type']){
		case 'Building':
			$numcusbuilding++;
			break;
		case 'Bungalow':
			$numcusbungalow++;
			break;

		case 'Chawl':
			$numcuschawl++;
			break;

		case 'Shop':
			$numcusshop++;
			break;
	}
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>deliveryboys-customer-page</title>
	<link rel="stylesheet" type="text/css" href="deliveryboys-customer-page.css">
	
	<script type="text/javascript">
	function myFunction() {
  document.getElementById("myDropdown").classList.toggle("show");
}

// Close the dropdown if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {
    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}
</script>
</head>

<body>
	
	<div class="flex-container">
		<img src="users1.png" width="100" height="100">
		<p style="text-align: center; font-size: 35px; margin-bottom: 5px;"> Total Customers <?php echo $numcus ?></p>
	 <div class="drop">
		<div id="myDropdown" class="dropdown-content">
			<a href="">Select</a>
			<a href="">Select all</a>
			<a href="">Sort</a>
			<a href="">Rename</a>
		</div>
			<button onclick="myFunction()" class="dropbtn" />
		</div>
</div>



<div id = "top-navbar">
	<a class = "child" href="" style="padding: 10px;">
		<img src="three-buildings.png" width="90" height="90"style="align-self: center; ">
		<label style="font-size: 40px;"><label style="font-size: 35px; ">Building:</label><?php echo $numcusbuilding; ?></label>
	</a>
	<a class = "child" href="" style="padding: 10px;">
		<img src="bungalow-2.png" width="90" height="90" style="align-self: center;">
		<label style="font-size: 40px;"><label style="font-size: 35px;">Bunglow:</label><?php echo $numcusbungalow; ?></label>
	</a>
	<a class = "child" href="" style="padding: 10px;">
		<img src="store.png" width="90" height="90"style="align-self: center;">
		<label style="font-size: 40px;"><label style="font-size: 35px;">Shop:</label><?php echo $numcusshop ?></label>
	</a>
	<a class = "child" href="" style="padding: 10px;">
		<img src="houses.png" width="90" height="90"style="align-self: center;">
		<label style="font-size: 40px;"><label style="font-size: 35px;">Chawl:</label><?php echo $numcuschawl; ?></label>
	</a>
</div>

<?php

$query1 = "SELECT * FROM `customer_deliveryboy` WHERE `db_id` = '".$_SESSION['deliveryboy-id']."'";

$result1 = mysqli_query($link,$query1);

while($row1 = mysqli_fetch_assoc($result1)){
	$query2 = "SELECT * FROM `customer_residence` WHERE `c_id` = '".$row1['c_id']."'";
	$result2 = mysqli_query($link,$query2);
	$row2 = mysqli_fetch_assoc($result2);
	switch($row2['residence_type']){
		case 'Building':
			$query3 = "SELECT * FROM customer_building WHERE c_id = '".$row1['c_id']."'";
			$result3 = mysqli_query($link,$query3);

			$row3 = mysqli_fetch_assoc($result3);
			echo "
				<div class='building-name'>
				<p>".$row3['c_flat_no'].", ".$row3['c_building_name'].", ".$row3['c_area']." </p>
				</div>
			";

			break;
		case 'Bungalow':
			$query3 = "SELECT * FROM customer_bungalow WHERE c_id = '".$row1['c_id']."'";
			$result3 = mysqli_query($link,$query3);

			$row3 = mysqli_fetch_assoc($result3);
			echo "
				<div class='building-name'>
				<p>".$row3['c_bungalow_no'].", ".$row3['c_bungalow_name'].", ".$row3['c_area']." </p>
				</div>
			";

			break;

		case 'Chawl':
			$query3 = "SELECT * FROM customer_chawl WHERE c_id = '".$row1['c_id']."'";
			$result3 = mysqli_query($link,$query3);

			$row3 = mysqli_fetch_assoc($result3);
			echo "
				<div class='building-name'>
				<p>".$row3['c_room_no'].", ".$row3['c_chawl_name'].", ".$row3['c_area']." </p>
				</div>
			";

			break;

		case 'Shop':
			$query3 = "SELECT * FROM customer_shop WHERE c_id = '".$row1['c_id']."'";
			$result3 = mysqli_query($link,$query3);

			$row3 = mysqli_fetch_assoc($result3);
			echo "
				<div class='building-name'>
				<p>".$row3['c_shop_no'].", ".$row3['c_shop_name'].", ".$row3['c_area']." </p>
				</div>
			";

			break;
	}
}

?>


<div class="address">
	
</div>

<div id = "bottom-navbar">
	<a style="font-size:35px;"class = "child" href="deliveryboys-home.php">
		<img src="home.png"width="65" height="65" style="align-self: center; margin-bottom: 5px;">
		<label style="    font-family: Segoe UI,Frutiger,Frutiger Linotype,Dejavu Sans,Helvetica Neue,Arial,sans-serif;">Home</label>
	</a>
	<a  href="deliveryboys-notif.html" style="font-size:35px;"class = "child">
		<img src="notification.png"width="65" height="65" style="align-self: center;margin-bottom: 5px;">
		<label style="    font-family: Segoe UI,Frutiger,Frutiger Linotype,Dejavu Sans,Helvetica Neue,Arial,sans-serif;">Notificaions</label>
	</a>
	<a href="deliveryboys-customer-page.php"style="font-size:35px;background-color: #ff7878; color: #fff;"class = "child">
		<img src="users.png"width="65" height="65" style="align-self: center;margin-bottom: 5px;">
		<label style="    font-family: Segoe UI,Frutiger,Frutiger Linotype,Dejavu Sans,Helvetica Neue,Arial,sans-serif;">Customers</label>
	</a>
	<a href="deliveryboys-settings.php" style="font-size:35px;"class = "child">
		<img src="settings.png"width="65" height="65" style="align-self: center;margin-bottom: 5px;">
		<label style="    font-family: Segoe UI,Frutiger,Frutiger Linotype,Dejavu Sans,Helvetica Neue,Arial,sans-serif;">Settings</label>
	</a>
</div>



</body>
</html>