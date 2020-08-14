<?php 

session_start();
$link = mysqli_connect('localhost','root','','easyfy');

$query1 = "SELECT * FROM `phone_no_db` WHERE `db_id` = '".$_SESSION['deliveryboy-id']."'";

$result1 = mysqli_query($link,$query1);
$row1 = mysqli_fetch_assoc($result1);

$query2="SELECT * FROM `phone_no_db` WHERE `db_id` = '".$_SESSION['deliveryboy-id']."'";
$r2=mysqli_query($link,$query2);

while ($row02=mysqli_fetch_assoc($r2)) {
	$ph1=$row02['phone_no'];
}
/*
$q="select count(*) from vendor WHERE v_phone=".$ph1." ";
$r=mysqli_query($link,$q);
while ($row03=mysqli_fetch_assoc($r)) {
	$c01=$row03['count(*)'];
}
*/
$q100="select count(v_id),v_id from vendor WHERE v_phone=".$ph1." ";
$r100=mysqli_query($link,$q100);
while ($row100=mysqli_fetch_assoc($r100)) {
	$count=$row100['count(v_id)'];
	$vid=$row100['v_id'];
}
$c01="";
if ($count==1) {
	$q2="select count(*) from vendor_deliveryboy where db_id=".$_SESSION['deliveryboy-id']." and v_id=".$vid." ";
	$r20=mysqli_query($link,$q2);
	while ($row200=mysqli_fetch_assoc($r20)) {
		$c01=$row200['count(*)'];
	}
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Eezyfy</title>
	<link rel="stylesheet" type="text/css" href="vendor-settings-styles.css">

<style type="text/css">
	body{
	font-size: 50px;
	margin: 0;
	color: #ff7878;
}

.heading{
	font-size: 80px;
	font-weight: bold;
	text-align: center;
	margin-top: 3%;
}

.vendor-details{
	margin: 5%;
}

.vendor-details #myFileInput{
	display: none;
}

.vendor-details #vendor-id{
	text-align: center;
	display: block;
	margin: 4% auto; 
}

.vendor-details img{
	display: block;
	width: 300px;
	margin: 2% auto;
	border: 4px solid #ff7878;
	border-radius: 50%;
}

.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 2; /* Sit on top */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content/Box */
.modal-content {
  background-color: #fefefe;
  margin: 15% auto; /* 15% from the top and centered */
  padding: 20px;
  border: 1px solid #888;
  width: 80%; /* Could be more or less, depending on screen size */
}

.modal-content .changePic{
	border: 8px solid #ff7878;
	padding: 14px 28px;
	border-radius: 40px;
	background: #fff;
	font-size: 50px;
	display: block;
	margin: 5% auto;
}

/* The Close Button */
.close {
  color: #aaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: black;
  text-decoration: none;
  cursor: pointer;
}

.settings-choices{
	margin-top: 8%;
	padding: 0;
}

#logout-button,
.settings-choices li{
	list-style: none;
	padding: 2% 5%;
	width: 80%;
	margin: 4% auto;
	border: 3px solid #ff7878;
	border-radius: 100px;
}

#logout-button{
	width: 20%;
	text-align: center;
	margin: 13% auto;
}

#bottom-navbar{
	height: 150px;
	width: 100%;
	border: 2px solid #ff7878;
	position: fixed;
	left: -2px;
	bottom: 0;
	z-index: 1;
	background: #fff;
	color: #ff7878;
	margin: 0;
	display: flex;
	flex-direction: row;
	justify-content: center;
	align-items: stretch;
}

#bottom-navbar .child{
	padding: 2%;
	font-size: 50px;
	display: inline;
	flex-basis: 24%;
	margin: 0;
	text-align: center;
	text-decoration: none;
	color: #ff7878;
}

#bottom-navbar .child img{
	display: block;
	margin: 0 auto;
}
#ri{
	position: absolute;
	margin: 3% auto;
	top: 40%;
	width: 80%;
	padding: 2% 5%;
}
.rishi{
	list-style: none;
	padding: 2% 5%;
	width: 80%;
	margin: 3% auto;
	border: 2px solid #ff7878;
	border-radius: 100px;
}
</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<script type="text/javascript">
	
	function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah1')
                        .attr('src', e.target.result);

                    $('#blah2')
                        .attr('src', e.target.result)
                        .width(800)
                        .height(700);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }

</script>
<body>

	<div class = "heading" style="font-family: Segoe UI,Frutiger,Frutiger Linotype,Dejavu Sans,Helvetica Neue,Arial,sans-serif;">
		Settings
	</div>
	<form action="php/deliveryboys-change-pic.php" method="POST" enctype="multipart/form-data">

	<div class = "vendor-details">
		<input type="file" id="myFileInput" onchange='readURL(this)' name = "vendor-image">
		<a id = "imgHolder" onclick="openModal()"><?php 
			echo "<img src='data:image/jpeg;base64,".base64_encode($row1['image'])."' heigth='50' width='50' id='blah1'>";
		?></a>
		<p id = "vendor-id"><?php echo $row1['db_id']; ?></p>
	</div>

	<!-- The Modal -->
	<div id="myModal" class="modal">

	<!-- Modal content -->
	<div class="modal-content">
		<?php 
			echo "<img src='data:image/jpeg;base64,".base64_encode($row1['image'])."' width='500px' height='700px' id='blah2'>";
		?>
		<button type="button" class = "changePic" onclick="document.getElementById('myFileInput').click()">Change Profile Picture</button>
		<button type="submit" class="close">Okay</button>
		<p class = "close" style = "color: #fff; font-size: 50px; margin: 25px;">Close</p>
	</div>

	</div>
</form>

	<ul class = "settings-choices">
		<li style="    font-family: Segoe UI,Frutiger,Frutiger Linotype,Dejavu Sans,Helvetica Neue,Arial,sans-serif;">Personal Settings </li>
		
		<a href="deliveryboys-contact.html" style="text-decoration: none; color: #ff7878;"><li style="    font-family: Segoe UI,Frutiger,Frutiger Linotype,Dejavu Sans,Helvetica Neue,Arial,sans-serif;"id="si">Contact Us</li>
		<a href="deliveryboys-feedback.html" style="text-decoration: none; color: #ff7878;"><li>Feedback</li></a>
		<?php if ($c01==1) { ?>

		<a href="deliveryboy-switch-accounts.php" style="text-decoration: none; color: #ff7878;"><li style="    font-family: Segoe UI,Frutiger,Frutiger Linotype,Dejavu Sans,Helvetica Neue,Arial,sans-serif;">Switch Accounts</li></a>
<?php	} ?>
	</ul>

	<div id="ri">
			<ul class = "settings-choices">
		<div class="rishi">
		<p style="margin-top: 0;">Name </p>
		<input type="text" name="vendor-name" placeholder="Name" class="inputt"value="Oliver Johnston" id = "vendor-name" style="font-size: 40px; position: absolute; top: 150px; ">
		</div>
		<li >Phone no</li>
		
		
	</ul>

	</div>

	<a href="php/logout-db.php"  style="text-decoration: none; color: #ff7878;font-family: Segoe UI,Frutiger,Frutiger Linotype,Dejavu Sans,Helvetica Neue,Arial,sans-serif;"><p id = "logout-button">Logout</p></a>

	<div id = "bottom-navbar">
	<a style="font-size:35px;"class = "child" href="deliveryboys-home.php">
		<img src="home.png"width="65" height="65" style="align-self: center; margin-bottom: 5px;">
		<label style="    font-family: Segoe UI,Frutiger,Frutiger Linotype,Dejavu Sans,Helvetica Neue,Arial,sans-serif;">Home</label>
	</a>
	<a  href="deliveryboys-notif.html" style="font-size:35px;"class = "child">
		<img src="notification.png"width="65" height="65" style="align-self: center;margin-bottom: 5px;">
		<label style="    font-family: Segoe UI,Frutiger,Frutiger Linotype,Dejavu Sans,Helvetica Neue,Arial,sans-serif;">Notifications</label>
	</a>
	<a href="deliveryboys-customer-page.php"style="font-size:35px;"class = "child">
		<img src="users1.png"width="65" height="65" style="align-self: center;margin-bottom: 5px;">
		<label style="    font-family: Segoe UI,Frutiger,Frutiger Linotype,Dejavu Sans,Helvetica Neue,Arial,sans-serif;">Customers</label>
	</a>
	<a href="deliveryboys-settings.php" style="font-size:35px;background-color: #ff7878; color: #fff;"class = "child">
		<img src="settings_white.png"width="65" height="65" style="align-self: center;margin-bottom: 5px;">
		<label style="    font-family: Segoe UI,Frutiger,Frutiger Linotype,Dejavu Sans,Helvetica Neue,Arial,sans-serif;">Settings</label>
	</a>
</div>

	<script type="text/javascript">
			window.onload=function(){
		document.getElementById('ri').style.display="none";
	}
	function function1(){
		var x=document.getElementById('ri');
		if(x.style.display=="none"){
			document.getElementById('ri').style.display="block";
			document.getElementById('si').style.marginTop="45%";

		}
		else{
			document.getElementById('ri').style.display="none";
			document.getElementById('si').style.marginTop="0%";
		}
		
	}
	// Get the modal
	var modal = document.getElementById('myModal');

	// Get the button that opens the modal
	var imgLocation = document.getElementById("imgHolder");

	// Get the <span> element that closes the modal
	var span = document.getElementsByClassName("close")[0];

	// When the user clicks on the button, open the modal 
	openModal = () => {
	modal.style.display = "block";
	}

	// When the user clicks on <span> (x), close the modal
	span.onclick = function() {
	modal.style.display = "none";
	}

	// When the user clicks anywhere outside of the modal, close it
	window.onclick = function(event) {
	if (event.target == modal) {
	modal.style.display = "none";
	}
	}
	</script>

</body>
</html>