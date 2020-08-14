
<?php

session_start();

$link = mysqli_connect('localhost','root','','easyfy');

$query = "SELECT * FROM vendor WHERE v_id = '".$_SESSION['vendor-id']."'";

$result  = mysqli_query($link,$query);

$row = mysqli_fetch_assoc($result);

$query1 = "SELECT * FROM vendor_customer WHERE v_id = '".$_SESSION['vendor-id']."'";

$result1 = mysqli_query($link,$query1);

$nocus = mysqli_num_rows($result1);

$litres = 0;

while($row1 = mysqli_fetch_assoc($result1)){
	$query2 = "SELECT * FROM customer_milk_details WHERE c_id = '".$row1['c_id']."' AND `date` = '".date("Y-m-d", strtotime('tomorrow'))."'";

	$result2 = mysqli_query($link,$query2);

	$query3 = "SELECT * FROM customer_residence WHERE c_id = '".$row1['c_id']."'";

	$result3 = mysqli_query($link,$query3);

	$row3 = mysqli_fetch_assoc($result3);

	if(mysqli_num_rows($result2) > 0){
		$row2 = mysqli_fetch_assoc($result2);
		$litres = $litres + $row2['litres'];
		if($row2['litres'] == 0){
			$nocus = $nocus - 1;
		}
	}
	else{
		$litres = $litres + $row3['c_litres'];
	}
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Eezyfy</title>
	<link rel="stylesheet" type="text/css" href="vendor-main-page-style(UPDATED).css">
	<script
  src="https://code.jquery.com/jquery-3.3.1.js"
  integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
  crossorigin="anonymous"></script>
<style type="text/css">
    .vendor-share{
        width: 96%;
        border:4px solid #ff7878;
        border-radius:80px;
        padding-top:0%;
        padding-bottom:2%;
        padding-left:1%;
        padding-right:2%;
        position: relative;
        top:245px;
    }
    .vendor-share p{
        font-family: Segoe UI,Frutiger,Frutiger Linotype,Dejavu Sans,Helvetica Neue,Arial,sans-serif; 
        font-size: 50px; 
    }
    .share-image{
        width: 150px;
        height:150px;
        position: relative;
        top: 355px;
        left: 400px;
        border:4px solid #ff7878;
        border-radius: 50%;
    }
    .share-image img{
        padding: 20%;}

        .bottom-navbar img{
  opacity: 0.7;
  filter: alpha(opacity=50); /* For IE8 and earlier */    
    }

    .calendar_display_top {
    opacity: 0.7;
  filter: alpha(opacity=50);	
    }


</style>
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

 			
			<li style="padding-top: 5px; padding-bottom: 10px; background-color: #ff7878;color: #fff; border-radius: 25px;" id = "today"></li>
				
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

<p id = "day" style="margin: 3%;margin-top: -25px; color: #ff7878;font-size: 60px;">Today</p>

<div class="vendor-share">
        <p>Share Your Vendor Details to Connect</p>
</div>

<div class="share-image">
    <img src="share.png" width="80" height="80">
</div>

	<div class = "card">
	<a href="vendor-currentday-del-boys.php" style="text-decoration: none; color: #fff;">
	<div class = "card-child-left">
		<div class = "img" style="float: left; width: 30%;">
			<img src="users.png">
		</div>
		<div class = "text" style="float: right; width: 70%;">
			<h3 id = "custs" style="margin: 0;font-size:80px;margin-left: 50px;"></h3>
			<h4 style="margin: 0;margin-left: 50px;">Customers</h4>
		</div>
	</div>

	<div class = "card-child-right">

		<div class = "img" style="float: left; width: 30%;">
			<img src="milk-bottle (2).png">
		</div>
		<div class = "text" style="float: right; width: 70%;">
			<h3 id = "litres" style="margin: 0;font-size:80px;"></h3>
			<h4 style="margin: 0;">Req Litres</h4>
		</div>
	</div>
	</a>
	</div>

<div id = "bottom-calendar"style="font-size: 35px;">
	<p id = "month" ></p>
	<img src="down-collapsible.png" onclick="calClose()" style="position: fixed; right: 45px; bottom: 615px;width: 55px;height: 55px">	
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
	<a style="font-size:35px;background-color: #ff7878; color: #fff;"class = "child" href="vendor-main-page.php">
		<img src="home_white.png"width="65" height="65" style="align-self: center; margin-bottom: 5px;">
		<label style="    font-family: Segoe UI,Frutiger,Frutiger Linotype,Dejavu Sans,Helvetica Neue,Arial,sans-serif;">Home</label>
	</a>
	<a  href="vendor-notif.html" style="font-size:35px;"class = "child">
		<img src="notification.png"width="65" height="65" style="align-self: center;margin-bottom: 5px;">
		<label style="    font-family: Segoe UI,Frutiger,Frutiger Linotype,Dejavu Sans,Helvetica Neue,Arial,sans-serif;">Notifications</label>
	</a>
	<a href="vendor-del-boys.php"style="font-size:35px;"class = "child">
		<img src="delivery-boy-icon.png"width="65" height="65" style="align-self: center;margin-bottom: 5px;">
		<label style="    font-family: Segoe UI,Frutiger,Frutiger Linotype,Dejavu Sans,Helvetica Neue,Arial,sans-serif;">Delivery Boys</label>
	</a>
	<a href="vendor-settings.php" style="font-size:35px;"class = "child">
		<img src="settings.png"width="65" height="65" style="align-self: center;margin-bottom: 5px;">
		<label style="    font-family: Segoe UI,Frutiger,Frutiger Linotype,Dejavu Sans,Helvetica Neue,Arial,sans-serif;">Settings</label>
	</a>
</div>

	<script type="text/javascript">

		var customers = 0;
		var litres = 0;
		
		var x_date = '<?php echo $row['v_start_date']; ?>';
		console.log("1st " + x_date);

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

			console.log(x);

			today.setDate(x);

			console.log(today);

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

			// console.log("MM: " + $("#calendar_display_top #today").text());
			// console.log(x_date);
			// console.log(x_date > $("#calendar_display_top #today").text().substring(0,1));

			$("#calendar_display_top #today").click();
			var x = document.getElementById("bottom-calendar");
			x.style.display = "none";				
		}

		window.onload = function(){
		document.getElementById("currmonth").innerHTML = (toWordsMonth(today.getMonth()) + ' ' + today.getFullYear());
		document.getElementById("month").innerHTML = (toWordsMonth(today.getMonth()) + ' ' + today.getFullYear());
		setupTopCalendar(today.getDate());



		//var custDisplay = document.getElementById('custNo');
		//var litresDisplay = document.getElementById('litresNo');

		//var custNo = /*GET FROM DATABASE*/ 5;
		//var litresNo = /*GET FROM DATABASE*/ 25;

		//var tommCustNo = /*GET FROM DATABASE*/ 7;
		//var tommLitresNo = /*GET FROM DATABASE*/ 29;

		/*if (today.getHours() >= 21) {
			custNo = tommCustNo;
			litresNo = tommLitresNo;
		}

		if(custNo < 9)
			custDisplay.innerHTML = '0' + custNo;
		else
			custDisplay.innerHTML = custNo;

		if(litresNo < 9)
			litresDisplay.innerHTML = '0' + litresNo;
		else
			litresDisplay.innerHTML = litresNo;
		*/

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

		function load_delivery_data(x){
			$.ajax({
				url:"php/fetch_delivery_data.php",
				method:"POST",
				data:{datedata:x},
				dataType:"json",
				success:function(data){
					customers = data.customers;
					litres = data.litres;
					console.log(customers);
					console.log(litres);
				}
			});
		}

		$(function(){

			$(".card").hide();

			$("#calendar_display_top li").click(function(){
				var x = "" + $(this).text() + "";
				console.log(x); //date and day
				x = x.substring(0,2);
				// If a date is single digit
				 if (isNaN(x))
					x = x.substring(0,1);
				// define if its today/tomorrow or yestterday
				console.log(x - (new Date).getDate());


				if (x - (new Date).getDate() == 1){
					d = "Tomorrow";
				}
				else if (x - (new Date).getDate() == 0){
					d = "Today";
				} 
				else if (x - (new Date).getDate() == -1){
					d = "Yesterday";
				}

			
				console.log("Today's Date:" + x_date);	// today's date
				console.log(x); // selected date
				load_delivery_data(today);

				if (x - (new Date).getDate() == 1){
					$("#day").text("Tomorrow");
				}
				else if (x - (new Date).getDate() == 0){
					console.log("X");
					$("#day").text("Today");
				} 
				else if (x - (new Date).getDate() == -1){
					$("#day").text("Yesterday");
				}
				else{
					$("#day").text("");
					$(".card").show();
					$(".vendor-share").hide();
					$(".share-image").hide();			
				}
				$(".card #custs").text(customers);
				$(".card #litres ").text(litres);	

				if (x_date == x){
					$(".card").hide();
					$(".vendor-share").show();
					$(".share-image").show();
					$("#day").show();
				}

				else if (x_date < x) {
					$(".card").show();
					$(".vendor-share").hide();
					$(".share-image").hide();
					$("#day").show();

				}

				else {
					$(".card").hide();
					$(".vendor-share").hide();
					$(".share-image").hide();					
					$("#day").hide();
				}


			})

			$("#calendar_display_top #pos1").click();
			$("#calendar_display_top #today").click();

		})



		}



	</script>
</body>
</html>