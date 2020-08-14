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
	<a href="deliveryboys-home.php"><img src="back.png" width="60" height="60" style=" z-index: 999; position:fixed;left: 10px; top: 20px;"></a>
	
	<div class="flex-container">
		<img src="users1.png" width="120" height="120">
		<p style="text-align: center; font-size: 35px; margin-bottom: 5px;"> Total Customers <?php echo $numcus ?></p>
	 
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

	$query4 = "SELECT * FROM customer_milk_details WHERE c_id = '".$row1['c_id']."' AND `date` = '".date("Y-m-d", strtotime('tomorrow'))."'";
	$result4 = mysqli_query($link,$query4);
	if(mysqli_num_rows($result4) > 0){
		$row4 = mysqli_fetch_assoc($result4);
		$litres = $row4['litres'];

	}
	else{
		$litres = $row2['c_litres'];
		$image = '';
		switch($row2['c_facility']){
			case 'Door Bell':
			$image = "<img src='bell-alarm-symbol.png' width='50' height='50' style='border-radius: 25px;'>";
			break;

			case 'Basket':
			$image = "<img src='shopping-basket.png' width='50' height='50' style='border-radius: 25px;'>";
			break;

			case 'None':
			$image = "<img src='forbidden-sign-icon.png' width='50' height='50' style='border-radius: 25px;'>";
			break;
		}

		switch($row2['residence_type']){
		case 'Building':
			$query3 = "SELECT * FROM customer_building WHERE c_id = '".$row1['c_id']."'";
			$result3 = mysqli_query($link,$query3);

			$row3 = mysqli_fetch_assoc($result3);
			echo "
				<div class='building-name'>
				<p>".$row3['c_flat_no'].", ".$row3['c_building_name'].", ".$row3['c_area'].",Litres:".$litres.",".$row2['c_facility']." ".$image."</p>
				</div>
			";

			break;
		case 'Bungalow':
			$query3 = "SELECT * FROM customer_bungalow WHERE c_id = '".$row1['c_id']."'";
			$result3 = mysqli_query($link,$query3);

			$row3 = mysqli_fetch_assoc($result3);
			echo "
				<div class='building-name'>
				<p>".$row3['c_bungalow_no'].", ".$row3['c_bungalow_name'].", ".$row3['c_area'].",Litres:".$litres.",".$row2['c_facility']." ".$image."</p>
				</div>
			";

			break;

		case 'Chawl':
			$query3 = "SELECT * FROM customer_chawl WHERE c_id = '".$row1['c_id']."'";
			$result3 = mysqli_query($link,$query3);

			$row3 = mysqli_fetch_assoc($result3);
			echo "
				<div class='building-name'>
				<p>".$row3['c_room_no'].", ".$row3['c_chawl_name'].", ".$row3['c_area'].",Litres:".$litres.",".$row2['c_facility']." ".$image."</p>
				</div>
			";

			break;

		case 'Shop':
			$query3 = "SELECT * FROM customer_shop WHERE c_id = '".$row1['c_id']."'";
			$result3 = mysqli_query($link,$query3);

			$row3 = mysqli_fetch_assoc($result3);
			echo "
				<div class='building-name'>
				<p>".$row3['c_shop_no'].", ".$row3['c_shop_name'].", ".$row3['c_area'].",Litres:".$litres.",".$row2['c_facility']." ".$image."</p>
				</div>
			";

			break;
	}
	}
	
}

?>


<div class="address">
	
</div>





</body>
</html>