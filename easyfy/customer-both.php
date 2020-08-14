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


		cal = () => {
			var x = document.getElementById("bottom-calendar");
			if (x.style.display == "block"){
				x.style.display = "none";
			} else {
				x.style.display = "block";
			}
		}
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
var dd = today.getDate();
var mm = today.getMonth() + 1; //January is 0!
var yyyy = today.getFullYear();

if (dd < 10) {
  dd = '0' + dd;
}

if (mm < 10) {
  mm = '0' + mm;
}

today2 = mm + '/' + dd + '/' + yyyy;
/*document.getElementById('tarik').innerHTML=today2;

	setupTopCalendar = (x) => {

			today.setDate(x);

			
			document.getElementById('tarik').innerHTML="<h4 style='margin-right:200px; display: inline;'>"+
			today.getDate() + ' ' + toWordsMonth(today.getMonth()) + ' ' + today.getFullYear() + "</h4>";*/

		
			/*document.getElementById("neg2").innerHTML = "<h3 style = 'margin: 0'>" + before_yesterday.getDate() + "</h3><h5 style = 'margin: 0'>" + toWords(before_yesterday.getDay()) + "</h5>";
			document.getElementById("neg1").innerHTML = "<h3 style = 'margin: 0'>" + yesterday.getDate() + "</h3><h5 style = 'margin: 0'>" + toWords(yesterday.getDay()) + "</h5>";
			document.getElementById("today").innerHTML = "<h3 style = 'margin: 0'>" + today.getDate() + "</h3><h5 style = 'margin: 0'>" + toWords(today.getDay()) + "</h5>";
			document.getElementById("pos1").innerHTML = "<h3 style = 'margin: 0'>" + tomorrow.getDate() + "</h3><h5 style = 'margin: 0'>" + toWords(tomorrow.getDay()) + "</h5>";
			document.getElementById("pos2").innerHTML = "<h3 style = 'margin: 0'>" + after_tomorrow.getDate() + "</h3><h5 style = 'margin: 0'>" + toWords(after_tomorrow.getDay()) + "</h5>";*/
		

		window.onload = function(){

				document.getElementById('default').style.display='block';
	document.getElementById('postpaid').style.display='none';
	document.getElementById('prepaid').style.display='none';
		//document.getElementById ("xyz").addEventListener ("click", cal);

		document.getElementById("month").innerHTML = (toWordsMonth(today.getMonth()) + ' ' + today.getFullYear());
		//setupTopCalendar(today.getDate());


//Bottom Calendar!
	


		}


	function prepaid(){
	document.getElementById('default').style.display='none';
	document.getElementById('postpaid').style.display='none';
	document.getElementById('prepaid').style.display='block';
}
function postpaid1(){
	document.getElementById('default').style.display='none';
	document.getElementById('prepaid').style.display='none';
	document.getElementById('postpaid').style.display='block';
}

</script>

<body>
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
	<form action="php/change-customer-milk-details-both.php" method="POST">
	<div class="paid">
			<!--<a href="#" onclick="prepaid()" >Prepaid</a>-->
		<input type="radio" name="payment" style="display: none;">
		<button type="button" onclick="prepaid()" style="margin: 3% 0; border: 2px solid #ff7878; color: #fff; border-radius: 50px; background: #ff7878; padding: 1.5% 3%; width: 30%; text-align: center;font-size:50px;">Prepaid
		</button>
		<button type="button" onclick="postpaid1()" style="margin: 3% 0;margin-left: 15%; border: 2px solid #ff7878; color: #fff; border-radius: 50px; background: #ff7878; padding: 1.5% 3%; width: 30%; text-align: center;font-size:50px;">Postpaid
		</button>
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
			<select name = "month" style="font-size: 45px; color: #ff7878; border-radius: 20px;padding: 1%;border:3px solid #ff7878;">
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
			<input type="radio" name="day" checked value="Daily"style="width: 32px;height: 32px;"><label >Daily</label>
			<input type="radio" name="day" value="WeekDays"style="width: 32px;height: 32px;"><label>Weekdays</label>
			<input type="radio" name="day" value="Weekends"style="width: 32px;height: 32px;"><label>Weekends</label>
		</div>
	</div>
	<div class="paid1">

		<div>
			<label >Door Bell<input type="radio" name="days" checked value="Door Bell"><img src="bell-alarm-symbol.png" width="50" height="50" style=" border-radius: 25px;"></label>
		</div>
		<div>
			<label>Basket<input type="radio" name="days" value="Basket"><img src="shopping-basket.png" width="50" height="50" style="border-radius: 25px;"></label>
		</div>
		<div>
			<label>None<input type="radio" name="days" value="None"><img src="forbidden-sign-icon.png" width="50" height="50"
				style="border-radius: 25px;"></label>
		</div>
	</div>
	<div class="paid1" style="padding:20px;">
		<!--<a href="customer-1st-page.html">
			<img src="right-arrow.png" width="100" height="100">
		</a>-->
		<div id="default">
		<input type="submit" name="postpaid" value="Submit" style="font-size: 50px; border: 3px solid #ff7878; background: transparent; border-radius: 50px; padding: 2% 6%; color: #ff7878;margin-top: 15px;">
		</div>

		<div id="prepaid">
		<input type="submit" href="customer-after-prepaid-both.php" name="postpaid" value="Pay" style="font-size: 50px; border: 3px solid #ff7878; background: transparent; border-radius: 50px; padding: 2% 6%; color: #ff7878;margin-top: 15px;">
		</div>

		<div id="postpaid">
		<input type="submit" href="customer-after-ordering.php" name="postpaid" value="Submit" style="font-size: 50px; border: 3px solid #ff7878; background: transparent; border-radius: 50px; padding: 2% 6%; color: #ff7878;margin-top: 15px;">
		</div>
	

	</div>
	<!--<div id="prep">
		<a href="">pay</a>
	</div>
	<div id="post">
		<a href="">submit</a>
	</div>-->

</form>
</body>
</html>