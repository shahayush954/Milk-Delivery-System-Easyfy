<?php 
session_start();
$link = mysqli_connect('localhost','root','','easyfy');

$query1 = "SELECT * FROM `vendor` WHERE `v_id` = '".$_SESSION['vendor-id']."'";

$result1 = mysqli_query($link,$query1);

$row1 = mysqli_fetch_assoc($result1);

$query2 = "SELECT * FROM `vendor` WHERE `v_id` = '".$_SESSION['vendor-id']."'";
$result2 = mysqli_query($link,$query2);
while ($row2=mysqli_fetch_assoc($result2)) {
	$ph=$row2['v_phone'];
}
/*
$query3="select count(*) from phone_no_db where phone_no=".$ph." ";
$result3=mysqli_query($link,$query3);
while ($row3=mysqli_fetch_assoc($result3)) {
	$c=$row3['count(*)'];
}
*/

$r012=mysqli_query($link,"select count(db_id),db_id from phone_no_db where phone_no=".$ph." ");
while ($row12=mysqli_fetch_assoc($r012)) {
	$dbid=$row12['db_id'];
	$count=$row12['count(db_id)'];
}
$c="";
if($count==1){
$query100="select count(*) from vendor_deliveryboy where v_id=".$_SESSION['vendor-id']." and db_id=".$dbid." ";
$result100=mysqli_query($link,$query100);
while ($row100=mysqli_fetch_assoc($result100)) {
	$c=$row100['count(*)'];
}
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Eezyfy</title>
	<link rel="stylesheet" type="text/css" href="vendor-settings-styles.css">
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

	<div class = "heading">
		Settings
	<button style="position: absolute; right: 9%; top: 3%; background: transparent; border: none">
		<img style="width:60px;height: 60px;margin-top: 10px;"src="share.png">
	</button>
	</div>
	<form action="php/vendor-change-pic.php" method="POST" enctype="multipart/form-data">
	<div class = "vendor-details">
		<input type="file" id="myFileInput" name="vendor-image" onchange = 'readURL(this)'>
		<a id = "imgHolder" onclick="openModal()"><?php echo "<img src='data:image/jpeg;base64,".base64_encode($row1['v_image'])."' id='blah1'>"; ?></a>
		<p id = "vendor-id"><?php echo $row1['v_id'] ?></p>
	</div>

	<!-- The Modal -->
	<div id="myModal" class="modal">

	<!-- Modal content -->
	<div class="modal-content">
		<?php echo "<img src='data:image/jpeg;base64,".base64_encode($row1['v_image'])."' style='width: 100%;height:700px;border-radius:50px;' id='blah2'>"; ?>
		<button type="button" class = "changePic" onclick="document.getElementById('myFileInput').click()"style="color:#ff7878;">Change Profile Picture</button>
		<button type="submit" class="close">Okay</button>
		<p class = "close" style = "color: #fff; font-size: 50px; margin: 25px;">Close</p>
	</div>
	</div>
</form>

	<ul class = "settings-choices">
		<a href="vendor-personal-settings.php" style="text-decoration: none; color: #ff7878;"><li>Personal Settings</li></a>
		<a href="vendor-milk-settings.php?vid=<?php echo $row1['v_id']; ?>" style="text-decoration: none; color: #ff7878;"><li>Milk Delivery </li></a>
		<a href="vendor-contact.html" style="text-decoration: none; color: #ff7878;"><li>Contact Us</li></a>
		<a href="vendor-feedback.html" style="text-decoration: none; color: #ff7878;"><li>Feedback</li></a>
	<?php		 if($c==1) { ?>
		<a href="vendor-switch-accounts.php" style="text-decoration: none; color: #ff7878;"><li>Switch Accounts</li></a>
<?php	} ?>

 	</ul>

	<a href="php/logout.php" style="text-decoration: none; color: #ff7878;"><p id = "logout-button">Logout</p></a>

	<div id = "bottom-navbar">
	<a href="vendor-main-page.php"  style="font-size:35px;"class = "child">
		<img src="home.png"width="65" height="65" style="align-self: center; margin-bottom: 5px;">
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
	<a href="vendor-settings.php" style="font-size:35px;background-color: #ff7878; color: #fff;"class = "child">
		<img src="settings_white.png"width="65" height="65" style="align-self: center;margin-bottom: 5px;">
		<label style="    font-family: Segoe UI,Frutiger,Frutiger Linotype,Dejavu Sans,Helvetica Neue,Arial,sans-serif;">Settings</label>
	</a>
</div>

	<script type="text/javascript">
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