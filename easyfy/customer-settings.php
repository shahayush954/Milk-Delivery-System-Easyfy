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

	</div>
<form action="php/customer-change-pic.php" method="POST" enctype="multipart/form-data">
	<div class = "vendor-details">
		<input type="file" id="myFileInput" onchange='readURL(this)' name = "vendor-image">
		<a id = "imgHolder" onclick="openModal()"><?php echo "<img src='data:image/jpeg;base64,".base64_encode($row4['c_image'])."' id='blah1'>" ?></a>
		<p id = "customer-id"><?php echo $row3['c_id'] ?></p>
	</div>

	<!-- The Modal -->
	<div id="myModal" class="modal">

	<!-- Modal content -->
	<div class="modal-content">
		<?php echo "<img src='data:image/jpeg;base64,".base64_encode($row4['c_image'])."' style='width: 100%;height:700px;border-radius:50px;' id='blah2'>";?>
		<button type="button" class = "changePic" onclick="document.getElementById('myFileInput').click()"style="color:#ff7878;">Change Profile Picture</button>
		<button type="submit" class="close">Okay</button>
		<p class = "close" style = "color: #fff; font-size: 50px; margin: 25px;">Close</p>
	</div>

	</div>
</form>

	<ul class = "settings-choices">
		<a href="customer-personal-settings.php" style="text-decoration: none; color: #ff7878;"><li>Personal Settings</li></a>
		<a href="customer-milk-details.php" style="text-decoration: none; color: #ff7878;"><li>Milk Details </li></a>
		<a href="customer-contact.html" style="text-decoration: none; color: #ff7878;"><li>Contact Us</li></a>
		<a href="customer-feedback.html" style="text-decoration: none; color: #ff7878;"><li>Feedback</li></a>

	</ul>

	<a href="php/logout.php" style="text-decoration: none; color: #ff7878; position: relative;top: 5px;"><p id = "logout-button">Logout</p></a>


	<div id = "bottom-navbar">
		<a  style="font-size:35px;"class = "child" href="customer-after-ordering.php">
			<img src="home.png"width="65" height="65" style="align-self: center; margin-bottom: 5px;">
			<label style="    font-family: Segoe UI,Frutiger,Frutiger Linotype,Dejavu Sans,Helvetica Neue,Arial,sans-serif;">Home</label>
		</a>
		<a  href="customer-notif.html" style="font-size:35px;"class = "child">
			<img src="notification.png"width="65" height="65" style="align-self: center;margin-bottom: 5px;">
			<label style="font-family: Segoe UI,Frutiger,Frutiger Linotype,Dejavu Sans,Helvetica Neue,Arial,sans-serif;">Notifications</label>
		</a>
		<a href="bill.php"style="font-size:35px;"class = "child">
			<img src="statement.png"width="65" height="65" style="align-self: center;margin-bottom: 5px;">
			<label style="    font-family: Segoe UI,Frutiger,Frutiger Linotype,Dejavu Sans,Helvetica Neue,Arial,sans-serif;">Bill</label>
		</a>
		<a href="customer-settings.php" style="font-size:35px;background-color: #ff7878; color: #fff;"class = "child">
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