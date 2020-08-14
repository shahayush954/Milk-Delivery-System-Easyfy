<!DOCTYPE html>
<html>
<head>
	<title>Eezyfy</title>
	<link rel="stylesheet" type="text/css" href="deliveryboys-home.css">
</head>
<body>


<div id="vendor_id" style="margin-top: 200px;">
	<h2 style="text-align: center; font-size: 70px; font-family: Segoe UI,Frutiger,Frutiger Linotype,Dejavu Sans,Helvetica Neue,Arial,sans-serif;">Enter Vendor Id</h2>
		<form action="vendor_display_profile.php" style="text-align: center;" method="POST">
			<div>
				<input class="inp" type="number" name="v_code" placeholder="Enter number" style="width: 70%;display: block;margin-left: auto;margin-right: auto; border-radius: 50px;font-size: 40px;padding: 20px;">
			</div>
			<button type="submit" name="v_code_submit" class="btn" style="border-radius: 35px;
			border:2px solid #ff7878; font-size: 50px; padding-left:75px; padding-right: 225px;
			color: #ff7878;padding-top: 5px;padding-bottom: 5px; background: white;margin-top: 100px;width:30px;">Submit</button>
		</form>
</div>

<!--<div class="butto" style="text-align: center;">
  <a href="customer-both.html"><imgright-arrow.png"  style="width: 100px; height: 100px;"></a>
</div>-->


<div id = "bottom-navbar">
	<a href="deliveryboys-home.html"  style="font-size:40px;"class = "child">
		<img src="home.png"width="65" height="65" style="align-self: center; margin-bottom: 5px;">
		<label style="    font-family: Segoe UI,Frutiger,Frutiger Linotype,Dejavu Sans,Helvetica Neue,Arial,sans-serif;">Home</label>
	</a>
	<a  href="deliveryboys-notif.html" style="font-size:40px;"class = "child">
		<img src="notification.png"width="65" height="65" style="align-self: center;margin-bottom: 5px;">
		<label style="    font-family: Segoe UI,Frutiger,Frutiger Linotype,Dejavu Sans,Helvetica Neue,Arial,sans-serif;">Notifs</label>
	</a>
	<a href="deliveryboys-customer-page.php"style="font-size:40px;"class = "child">
		<img src="customer-icon.png"width="65" height="65" style="align-self: center;margin-bottom: 5px;">
		<label style="    font-family: Segoe UI,Frutiger,Frutiger Linotype,Dejavu Sans,Helvetica Neue,Arial,sans-serif;">Customers</label>
	</a>
	<a href="deliveryboys-settings.php" style="font-size:40px;"class = "child">
		<img src="settings.png"width="65" height="65" style="align-self: center;margin-bottom: 5px;">
		<label style="    font-family: Segoe UI,Frutiger,Frutiger Linotype,Dejavu Sans,Helvetica Neue,Arial,sans-serif;">Settings</label>
	</a>
</div>


</body>
</html>