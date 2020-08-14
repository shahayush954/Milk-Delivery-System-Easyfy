<?php

session_start();

date_default_timezone_set("Asia/Kolkata");

$today = date('h:i A');


//$currentTime = DateTime($time);

$link = mysqli_connect('localhost','root','','easyfy');

$query = "SELECT * FROM vendor WHERE v_id = '".$_SESSION['vendor-id']."'";

$result  = mysqli_query($link,$query);

$row = mysqli_fetch_assoc($result);

$query1 = "SELECT * FROM vendor_customer WHERE c_id = '".$_SESSION['customer-id']."'";

$result1 = mysqli_query($link,$query1);

$row1 = mysqli_fetch_assoc($result1);

$query2 = "SELECT * FROM vendor WHERE v_id = '".$row1['v_id']."'";

$result2 = mysqli_query($link,$query2);

$row2 = mysqli_fetch_assoc($result2);

$query3 = "SELECT * FROM customer_residence WHERE c_id = '".$_SESSION['customer-id']."'";

$result3 = mysqli_query($link,$query3);

$row3 = mysqli_fetch_assoc($result3);

//$litres = $row3['c_litres'];

$tomorrow = date("Y-m-d", strtotime('tomorrow'));

$query5 = "SELECT * FROM customer_milk_details WHERE `date` = '".$tomorrow."'";

$result5 = mysqli_query($link,$query5);

//$row5 = mysqli_fetch_assoc($result5);

//echo $row5['litres'];

if(mysqli_num_rows($result5)>0){
	$row5 = mysqli_fetch_assoc($result5);
	$litres = $row5['litres'];
}
else{
	$litres = $row3['c_litres'];
}


$cutoff = $row2['v_cut_off_time'];
?>


<!DOCTYPE html>
<html>
<head>
	<title>Eezyfy</title>
	<link rel="stylesheet" type="text/css" href="customer-product-aftercutoff.css">
	<script
  src="https://code.jquery.com/jquery-3.3.1.js"
  integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
  crossorigin="anonymous"></script>

	<script type="text/javascript">

		function incrementValue(){
		var value = parseFloat(document.getElementById('number').value);
      value+=1;
      document.getElementById('number').value = value;
	}

    function decrementValue()
{
      var value = parseFloat(document.getElementById('number').value);
      if (value>0){
        value-=1;
      }
      document.getElementById('number').value = value;

}

		var x_date = '<?php echo $row['v_start_date']; ?>';

		x_date = parseInt(x_date.substring(x_date.length - 2));

		toWordsMonth = (month) => {
			switch(month){
				case 0: return "January";
						break;
				case 1: return "February";
						break;
				case 2: return "March";
						break;
				case 3: return "April";
						break;
				case 4: return "May";
						break;
				case 5: return "June";
						break;
				case 6: return "July";
						break;
				case 7: return "August";
						break;
				case 8: return "September";
						break;
				case 9: return "October";
						break;
				case 10: return "November";
						break;
				case 11: return "December";
			}
		}

		toWords = (day_num) => {
			switch(day_num){
				case 1: return "Mon";
						break;
				case 2: return "Tue";
						break;
				case 3: return "Wed";
						break;
				case 4: return "Thu";
						break;
				case 5: return "Fri";
						break;
				case 6: return "Sat";
						break;
				case 0: return "Sun";
						break;
			}
		}

		var today = new Date();

		var yesterday = new Date();
		yesterday.setDate(today.getDate() - 1);

		var before_yesterday = new Date();
		before_yesterday.setDate(today.getDate() - 2);

		var day_before_yesterday = new Date();
		day_before_yesterday.setDate(today.getDate() - 3);

		var tomorrow = new Date();
		tomorrow.setDate(today.getDate() + 1);

		var after_tomorrow = new Date();
		after_tomorrow.setDate(today.getDate() + 2);

		var day_after_tomorrow = new Date();
		day_after_tomorrow.setDate(today.getDate() + 3);


		setupTopCalendar = (x) => {

			if (x_date > x){
				console.log("Nonexistent");
				return;
			}

			today.setDate(x);

			yesterday.setDate(today.getDate() - 1);

			before_yesterday.setDate(today.getDate() - 2);

			tomorrow.setDate(today.getDate() + 1);

			after_tomorrow.setDate(today.getDate() + 2);
		

			document.getElementById("neg3").innerHTML = "<h3 style = 'margin: 0'>" + day_before_yesterday.getDate() + "</h3><h5 style = 'margin: 0'>" + toWords(day_before_yesterday.getDay()) + "</h5>";
			document.getElementById("neg2").innerHTML = "<h3 style = 'margin: 0'>" + before_yesterday.getDate() + "</h3><h5 style = 'margin: 0'>" + toWords(before_yesterday.getDay()) + "</h5>";
			document.getElementById("neg1").innerHTML = "<h3 style = 'margin: 0'>" + yesterday.getDate() + "</h3><h5 style = 'margin: 0'>" + toWords(yesterday.getDay()) + "</h5>";
			document.getElementById("today").innerHTML = "<h3 style = 'margin: 0'>" + today.getDate() + "</h3><h5 style = 'margin: 0'>" + toWords(today.getDay()) + "</h5>";
			document.getElementById("pos1").innerHTML = "<h3 style = 'margin: 0'>" + tomorrow.getDate() + "</h3><h5 style = 'margin: 0'>" + toWords(tomorrow.getDay()) + "</h5>";
			document.getElementById("pos2").innerHTML = "<h3 style = 'margin: 0'>" + after_tomorrow.getDate() + "</h3><h5 style = 'margin: 0'>" + toWords(after_tomorrow.getDay()) + "</h5>";
			document.getElementById("pos3").innerHTML = "<h3 style = 'margin: 0'>" + day_after_tomorrow.getDate() + "</h3><h5 style = 'margin: 0'>" + toWords(day_after_tomorrow.getDay()) + "</h5>";

			$("#calendar_display_top #today").click();
			var x = document.getElementById("bottom-calendar");
			x.style.display = "none";

		}

		window.onload = function(){
			document.getElementById('edit').style.display='none';
			document.getElementById('edit1').style.display='block';

		document.getElementById("currmonth").innerHTML = (toWordsMonth(today.getMonth()) + ' ' + today.getFullYear());
		document.getElementById("month").innerHTML = (toWordsMonth(today.getMonth()) + ' ' + today.getFullYear());
		setupTopCalendar(today.getDate());

		//Bottom Calendar!!

		var monthEnd = 0, monthBeg = 1;
		var monthEndDay = 0, monthBegDay = 0;

		var currentMonth = today.getMonth();
		monthEnd = today.getDate();

		while(currentMonth == today.getMonth())
		{
			monthEnd++;
			monthEndDay = today.getDay();
			today.setDate(today.getDate() + 1);
		}

		monthEnd--;

		today = new Date();

		while(currentMonth == today.getMonth())
		{
			monthBegDay = today.getDay();
			today.setDate(today.getDate() - 1);
		}

		today = new Date();

		for (var i = 0; i < monthBegDay; i++) {
			var entry = document.createElement('li');
			entry.style.cssText = "margin-right: 9px; margin-left: 9px; border: none";
			entry.appendChild(document.createTextNode(''));
			document.getElementById("dates").appendChild(entry);
		}

		for (var i = monthBeg; i <= monthEnd; i++) {
			var entry = document.createElement('li');
			entry.style.cssText = "margin-right: 9px; margin-left: 9px;";
			entry.setAttribute("value", monthBeg);
			entry.setAttribute("onclick", "setupTopCalendar(this.value)");
			entry.appendChild(document.createTextNode(monthBeg));
			document.getElementById("dates").appendChild(entry);
			monthBeg++;
		}

		for (var i = monthEndDay + 1; i <= 6 ; i++) {
			var entry = document.createElement('li');
			entry.style.cssText = "margin-right: 9px; margin-left: 9px; border: none";
			entry.appendChild(document.createTextNode(''));
			document.getElementById("dates").appendChild(entry);
		}

		cal = () => {
			var x = document.getElementById("bottom-calendar");
			x.style.display = "block";				
		}

		calClose = () => {
			var x = document.getElementById("bottom-calendar");
			x.style.display = "none";				
		}

		makechange = () => {
			$(".after-edit").hide();
			$(".before-edit").show();
		}
		}

		function makechange1(){
			document.getElementById('edit').style.display='block';
			document.getElementById('edit1').style.display='none';
		}

		function makechange2(){
			document.getElementById('edit2').style.display='block';
			document.getElementById('edit1').style.display='none';
		}



	</script>

</head>
<body>

<div style="padding: 0.1% 1%;">
	<p id = "currmonth" onclick="cal()" style="margin-bottom: 10px; margin-left: 12px; margin-top: 10px; font-size: 45px;font-family: Segoe UI,Frutiger,Frutiger Linotype,Dejavu Sans,Helvetica Neue,Arial,sans-serif;"></p>
	<div  id = "calendar_display_top">
		<ul style="font-family: Segoe UI,Frutiger,Frutiger Linotype,Dejavu Sans,Helvetica Neue,Arial,sans-serif;padding-top: 5px;margin-left: -65px;margin-right: -14px;font-size: 100px;">

			<li style="padding-top: 5px; padding-bottom: 10px;" id = "neg3"></li>
			<li style="padding-top: 5px; padding-bottom: 10px;" id = "neg2">
<!--				<p id = "neg2num"></p>
				<p id = "neg2day"></p> -->
			</li>

			
			<li style="padding-top: 5px; padding-bottom: 10px;" id = "neg1">
<!--				<p id = "neg1num"></p>
				<p id = "neg1day"></p>-->
 			</li>

 			
			<li style="padding-top: 5px; padding-bottom: 10px;background-color: #ff7878;color: #fff;border-radius: 25px;" id = "today"></li>
				
			<li style="padding-top: 5px; padding-bottom: 10px;" id = "pos1"></li>
		<!--		<p id = "pos1num"></p>
				<p id = "pos1day"></p>-->
				<!-- <a href="vendor-next-page.html"style="text-decoration: none; color: #ff7878;"> -->
			<li style="padding-top: 5px; padding-bottom: 10px;" id = "pos2"></li>
			<li style="padding-top: 5px; padding-bottom: 10px;" id = "pos3"></li>
			<!--	<p id = "pos2num"></p>
				<p id = "pos2day"></p>-->
		</ul>
	</div>
</div>

<?php 
if(strtotime($today) > strtotime($cutoff)){
	?>
	<form method="POST" action="php/milkchangerequest.php?change=request">
	<div style="width: 80%; padding-left: ">
	<p>Tomorrow</p>
</div>
<div class="detailss" id="edit1">
	<div style="">
	<p style="padding-left: 30px; margin-top: 0; display: inline;"><?php echo $litres; ?> litres</p>
	<img src="edit.png" height="50" width="50" style="display: inline; margin-left: 65%; " onclick="makechange1()">
	</div>
	<div class="inline">
	<img src="notif-icon.png" width="50" height="50" style="margin-left: 35px;">
	<!--<img src="houses.png" width="50" height="50" style="margin-left: 20px;">-->
	</div>
</div>



<div class="detailss1" id="edit">
	<div style="">
	<!--<p style="padding-left: 30px; margin-top: 0; display: inline;">1 litre</p>-->
	<button type="button" name="decrement" onclick="decrementValue()" style="width: 5% ; position: relative; right: 0; top: 30px; left: 20px;"><label style="font-size: 40px;">-</label></button> 
	<input type="number" id="number" value='<?php echo $litres; ?>' name='number' style="padding-left: 0px; margin-top: 0; display: inline; font-size: 50px; position: relative; left: 40px; top:30px;width: 10%;">
	<button type="button" name="increment" onclick="incrementValue()" style="width: 5% ; position: relative; right: 0; top: 30px; left: 50px;"><label style="font-size: 40px;">+</label></button> 
	<!--<img src="edit.png" height="50" width="50" style="display: inline; margin-left: 65%; " onclick="makechange()">-->
	</div>
	<div class="inline">
	<img src="notif-icon.png" width="50" height="50" style="margin-left: 35px;">
	<!--<img src="houses.png" width="50" height="50" style="margin-left: 20px;">-->
	</div>
	<!--<a href="customer-both.html"><img src="right-arrow.png"  style="width: 100px; height: 100px; margin-left: 0; padding-left: 45px; padding-bottom: auto;"></a>-->
	<input type="submit" name="submit" value="Send request" style="font-size: 40px;">
</div>
</form>
<?php
	
}
else{
?>
<form method="POST" action="php/milkchangerequest.php?change=update">
<div class="detailss" id="edit1">
	<div style="">
	<p style="padding-left: 30px; margin-top: 0; display: inline;">1 litre</p>
	<img src="edit.png" height="50" width="50" style="display: inline; margin-left: 65%; " onclick="makechange2()">
	</div>
	<div class="inline">
	<img src="notif-icon.png" width="50" height="50" style="margin-left: 35px;">
	<!--<img src="houses.png" width="50" height="50" style="margin-left: 20px;">-->
	</div>
	
</div>

<div class="detailss1" id="edit2">
	<div style="">
	<!--<p style="padding-left: 30px; margin-top: 0; display: inline;">1 litre</p>-->
	<button name="decrement" onclick="decrement()" style="width: 5% ; position: relative; right: 0; top: 30px; left: 20px;"><label style="font-size: 40px;">-</label></button> 
	<input type="number" id="number" value='1' style="padding-left: 0px; margin-top: 0; display: inline; font-size: 50px; position: relative; left: 40px; top:30px;width: 10%;">
	<button name="increment" onclick="increment()" style="width: 5% ; position: relative; right: 0; top: 30px; left: 50px;"><label style="font-size: 40px;">+</label></button> 
	<!--<img src="edit.png" height="50" width="50" style="display: inline; margin-left: 65%; " onclick="makechange()">-->
	</div>
	<div class="inline">
	<img src="notif-icon.png" width="50" height="50" style="margin-left: 35px;">
	<!--<img src="houses.png" width="50" height="50" style="margin-left: 20px;">-->
	</div>
	<!--<a href="customer-both.html"><imgright-arrow.png"  style="width: 100px; height: 100px; margin-left: 0; padding-left: 45px; padding-bottom: auto;"></a>-->
	<input type="button" name="submit" value="done" style="font-size: 40px;">
</div>
</form>

<?php 
	
}
?>

</form>
<div id = "bottom-calendar"style="font-size: 35px;">
	<p id = "month" ></p>
	<img src="down-collapsible.png" onclick="calClose()" style="position: fixed; right: 45px; bottom: 615px;height: 55px;width: 55px;">	
	<ul>
		<li>Sun</li>
		<li>Mon</li>
		<li>Tue</li>
		<li>Wed</li>
		<li>Thu</li>
		<li>Fri</li>
		<li>Sat</li>
	</ul>
	<ul id = "dates" style="margin-top: 20px;">

	</ul>
</div>

<div id = "bottom-navbar">
	<a  style="font-size:35px;background-color: #ff7878; color: #fff;"class = "child" href="customer-after-ordering.php">
		<img src="home_white.png"width="65" height="65" style="align-self: center; margin-bottom: 5px;">
		<label style="    font-family: Segoe UI,Frutiger,Frutiger Linotype,Dejavu Sans,Helvetica Neue,Arial,sans-serif;">Home</label>
	</a>
	<a  href="customer-notif.html" style="font-size:35px;"class = "child">
		<img src="notification.png"width="65" height="65" style="align-self: center;margin-bottom: 5px;">
		<label style="    font-family: Segoe UI,Frutiger,Frutiger Linotype,Dejavu Sans,Helvetica Neue,Arial,sans-serif;">Notifications</label>
	</a>
	<a href="bill.php"style="font-size:35px;"class = "child">
		<img src="statement.png"width="65" height="65" style="align-self: center;margin-bottom: 5px;">
		<label style="    font-family: Segoe UI,Frutiger,Frutiger Linotype,Dejavu Sans,Helvetica Neue,Arial,sans-serif;">Bill</label>
	</a>
	<a href="customer-settings.php" style="font-size:35px;"class = "child" >
		<img src="settings.png"width="65" height="65" style="align-self: center;margin-bottom: 5px;">
		<label style="    font-family: Segoe UI,Frutiger,Frutiger Linotype,Dejavu Sans,Helvetica Neue,Arial,sans-serif;">Settings</label>
	</a>
</div>

	</body>
</html>