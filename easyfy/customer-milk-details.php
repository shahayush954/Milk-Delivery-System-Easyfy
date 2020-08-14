<?php 

session_start();

$link = mysqli_connect('localhost','root','','easyfy');

$query1 = "SELECT * FROM customer_residence WHERE c_id = '".$_SESSION['customer-id']."'";

$result1 = mysqli_query($link,$query1);

$row1 = mysqli_fetch_assoc($result1);

?>
<!DOCTYPE html>
<html>
<head>
	<title>Eezyfy</title>
    <link rel="stylesheet" type="text/css" href="">
    <style>
    body{
	margin: 0;
	padding: 0;
	color: #ff7878;
	background: #fff;
	font-size: 65px;
	font-family: Segoe UI,Frutiger,Frutiger Linotype,Dejavu Sans,Helvetica Neue,Arial,sans-serif;
}

.heading{
	font-size: 75px;
	font-weight: bold;
	text-align: center;
	margin-top: 8%;
}

.details{
	display: flex;
	flex-direction: column;
	justify-content: flex-start;
	align-items: stretch;
	width: 80%;
	margin: auto;
	margin-top: 5%;
}

.details .card{
	margin: 5% 0;
	border-radius: 50px;
	border: 5px solid #ff7878;
	padding: 5%;
}

.details .card .title{
	margin: 0;
	margin-bottom: 3%;
	font-weight: bold;
}

.details .card input{
	width: 100%;
	border: none;
	font-size: 55px;
	color: #ff7878;
}

::placeholder{
	color: #ff7878;
}

:disabled{
	background: #fff;
}

.submit{
	background: #ff7878;
	color: #fff;
	display: block;
	margin: 2% auto;
	font-size: 55px;
	border: 4px solid #ff7878;
	padding: 2% 4%;
	border-radius: 50px;
	display: none;
}
    </style>
</head>
<body>
	<div class = "heading">
        <a href="customer-settings.php"><img src="back.png" width="60" height="60" style=" position:fixed;left: 15px;
		top:25px;"></a>
		Milk Details
	<button style="position: absolute; right: 11%; top: 6%; background: transparent; border: none" onclick="edit()">
		<img src="edit.png" width="50" height="50">
	</button>
	</div>
	<div class = "details">
		<div class = "card">
		<form method="POST" action='php/update-customer-milk-details.php'>
		
            <input type="number" name="customer-litres" placeholder="Litres" id = "litres" value="<?php echo $row1['c_litres']; ?>"> 
            <input type="text" onclick="drop_cust()" name="customer-subscription" placeholder="Postpaid" value="<?php echo $row1['subscription']; ?>" id = "paid1"> 
            <input type="text" onclick="days()" name="customer-delivery" placeholder="Everyday" value="<?php echo $row1['c_delivery_days']; ?>" id = "dayss"> 
            


	   </div>
		<!--<div class = "card">
			<p class = "title">Phone Number</p>
			<input type="text" name="vendor-contact" placeholder="Contact Number" value="" id = "vendor-contact">
		</div>
		<div class = "address card">
			<p class = "title">Address</p>
			<input type="text" name="vendor-address-plot" placeholder="Plot No." value="" id = "vendor-address-plot">
			<input type="text" name="vendor-address-area" placeholder="Area" value="" id = "vendor-address-area">
			<input type="text" name="vendor-address-city" placeholder="City" value="" id = "vendor-address-city">
			<input type="text" name="vendor-address-state" placeholder="State" value="" id = "vendor-address-state">			
			<input type="text" name="vendor-address-pin" placeholder="Pin Code" value="<?php echo $row1['v_pincode'] ?>" id = "vendor-address-pin">
		</div>-->

	</div>
	<button class = "submit" onclick="submit()">
		Submit
    </button>
    
    <div id="paid" style="position: relative;bottom: 0; width: 30%; border: 2px solid #ff7878;">
            <p class = "choices" id = "PrePaid" onclick="changeSub('PrePaid')" style="margin-top:0;margin-bottom:0;">PrePaid</p>
            <p class = "choices" id = "PostPaid" onclick="changeSub('PostPaid')" style="margin-bottom:0;margin-top:0;">PostPaid</p>
    </div>

    <div id="days1" style="position: relative;bottom: 0; width: 30%; border: 2px solid #ff7878;">
            <p class = "choices" id = "everyday" onclick="changeSub1('Everyday')" style="margin-top:0;margin-bottom:0;">Everyday</p>
            <p class = "choices" id = "weekdays" onclick="changeSub1('weekdays')" style="margin-bottom:0;margin-top:0;">weekdays</p>
            <p class = "choices" id = "weekends" onclick="changeSub1('weekends')" style="margin-bottom:0;margin-top:0;">weekends</p>
    </div>


</form>
	<script type="text/javascript">
		window.onload = function() {

            document.getElementById('paid').style.display='none';
            document.getElementById('days1').style.display='none';


			var inputs = document.getElementsByTagName("input");
			for(var i = 0; i < inputs.length; i++) {
				inputs[i].disabled = true;
				inputs[i].setAttribute("onkeypress","editted()");
				inputs[i].setAttribute("onkeydown","editted()");
				inputs[i].setAttribute("onpaste","editted()");
				inputs[i].setAttribute("oninput","editted()");
			}
		}

        function drop_cust(){
            var x = document.getElementById("paid");
            if (x.style.display === "none") {
            x.style.display = "block";
            } else {
            x.style.display = "none";
                    }
            }
        
            function days(){
            var y = document.getElementById("days1");
            if (y.style.display === "none") {
            y.style.display = "block";
            } else {
            y.style.display = "none";
                    }
            }



        
        function changeSub(x){
            document.getElementById('paid1').value=x;
        }

        function changeSub1(y){
            document.getElementById('dayss').value=y;
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