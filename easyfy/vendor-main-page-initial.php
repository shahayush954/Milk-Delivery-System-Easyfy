<?php 

$link = mysqli_connect('localhost','root','','easyfy');
$query1 = "SELECT COUNT(*) FROM `customer`";
$result1 = mysqli_query($link,$query1);
$row1 = mysqli_fetch_assoc($result1);

$query2 = "SELECT * FROM `customer` WHERE 1";
$result2 = mysqli_query($link,$query2);
$tomorrow = date("Y-m-d", strtotime('tomorrow'));
$count=0;

while($row2 = mysqli_fetch_assoc($result2)){
	$query3 = "SELECT * FROM `customer_milk_details` WHERE `id`='".$row2['id']."' AND `date`='".$tomorrow."'";
	$result3 = mysqli_query($link,$query3);
	if(mysqli_num_rows($result3) == 0){
		$count = $count + $row2['litres'];
	}
	else{
		$row3=mysqli_fetch_assoc($result3);
		$count = $count + $row3['litres'];
	}
}

?>


<!DOCTYPE html>
<html>
<head>
	<title>Eezyfy</title>
	<link rel="stylesheet" type="text/css" href="vendor-main-page-style.css">
</head>
<body>

<div style="padding: 0.1% 2%;">
	<p id = "currmonth" onclick="cal()" style="margin-bottom: 30px; margin-left: 50px; margin-top: 45px; font-size: 45px;"></p>
	<div  id = "calendar_display_top">
		<ul>


			<li style="padding-top: 5px; padding-bottom: 10px;" id = "neg2">
<!--				<p id = "neg2num"></p>
				<p id = "neg2day"></p> -->
			</li>

			<li style="padding-top: 5px; padding-bottom: 10px;" id = "neg1">
<!--				<p id = "neg1num"></p>
				<p id = "neg1day"></p>-->
 			</li>

 			<a href="vendor-main-page.html"style="text-decoration: none; color: #ff7878;">
			<li style="padding-top: 5px; padding-bottom: 10px;" id = "today"></li></a>
				
			<a href="vendor-main-page-initial.php"style="text-decoration: none; color: #ff7878;"> <li style="padding-top: 5px; padding-bottom: 10px;" id = "pos1"></li></a>
		<!--		<p id = "pos1num"></p>
				<p id = "pos1day"></p>-->
				<a href="vendor-next-page.html"style="text-decoration: none; color: #ff7878;"> 
			<li style="padding-top: 5px; padding-bottom: 10px;" id = "pos2"></li></a>
			<!--	<p id = "pos2num"></p>
				<p id = "pos2day"></p>-->
		</ul>
	</div>
</div>


<div class = "card">
	<div class = "card-child-left">
		<div class = "img" style="float: left; width: 30%;">
			<img src="circled-chevron-right.png">
		</div>
		<div class = "text" style="float: right; width: 70%;">
			<h3 style="margin: 0"><?php echo $row1['COUNT(*)'];?></h3>
			<h4 style="margin: 0">Customers</h4>
		</div>
	</div>
	<div class = "card-child-right">
		<div class = "img" style="float: left; width: 30%;">
			<img src="circled-chevron-right.png">
		</div>
		<div class = "text" style="float: right; width: 70%;">
			<h3 style="margin: 0"><?php echo $count;?></h3>
			<h4 style="margin: 0">Required Litres</h4>
		</div>
	</div>
</div>

<div class = "card">
	<div class = "card-child-left">
		<div class = "img" style="float: left; width: 30%;">
			<img src="circled-chevron-right.png">
		</div>
		<div class = "text" style="float: right; width: 70%;">
			<h3 style="margin: 0">80</h3>
			<h4 style="margin: 0">Given Litres</h4>
		</div>
	</div>
	<div class = "card-child-right">
		<div class = "img" style="float: left; width: 30%;">
			<img src="circled-chevron-right.png">
		</div>
		<div class = "text" style="float: right; width: 70%;">
			<h3 style="margin: 0">3</h3>
			<h4 style="margin: 0">Remaining Litres</h4>
		</div>
	</div>
</div>

<table class = "bottom-navbar">
	
</table>
	<script type="text/javascript">
		var today = new Date();
		var dd = today.getDate();
		var mm = today.getMonth();
		var yyyy = today.getFullYear();
		var month = "null";

		switch(mm){
			case 0: month = "January";
					break;
			case 1: month = "February";
					break;
			case 2: month = "March";
					break;
			case 3: month = "April";
					break;
			case 4: month = "May";
					break;
			case 5: month = "June";
					break;
			case 6: month = "July";
					break;
			case 7: month = "August";
					break;
			case 8: month = "September";
					break;
			case 9: month = "October";
					break;
			case 10: month = "November";
					break;
			case 11: month = "December";
		}

		var yesterday = new Date();
		yesterday.setDate(yesterday.getDate() - 1);

		var before_yesterday = new Date();
		before_yesterday.setDate(before_yesterday.getDate() - 2);

		var tomorrow = new Date();
		tomorrow.setDate(tomorrow.getDate() + 1);

		var after_tomorrow = new Date();
		after_tomorrow.setDate(tomorrow.getDate() + 2);

		window.onload = function(){
		document.getElementById("currmonth").innerHTML = (month + ' ' + yyyy);
		document.getElementById("neg2").innerHTML = before_yesterday.getDate();
		document.getElementById("neg1").innerHTML = yesterday.getDate();
		document.getElementById("today").innerHTML = dd;
		document.getElementById("pos1").innerHTML = tomorrow.getDate();
		document.getElementById("pos2").innerHTML = dd + 2;
	}
	</script>
</body>
</html>