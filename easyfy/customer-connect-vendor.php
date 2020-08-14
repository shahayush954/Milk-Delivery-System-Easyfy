<!DOCTYPE html>
<html>
<head>
	<title>Eezyfy</title>
	<link rel="stylesheet" type="text/css" href="deliveryboys-home.css">
</head>
<body>

<div style="padding: 0.1% 2%;">


<div id="vendor_id" style="margin-top: 200px;">
	<h2 style="text-align: center; font-size: 65px;font-family: Segoe UI,Frutiger,Frutiger Linotype,Dejavu Sans,Helvetica Neue,Arial,sans-serif;">Enter Vendor Id</h2>
		<form action="vendor-display-profile-to-customer.php" style="text-align: center;" method="POST">
			<div>
				<input class="inp" type="number" name="v_code" placeholder="Enter number" required style="width: 70%;display: block;margin-left: auto;margin-right: auto; border-radius: 50px;font-size: 40px;padding: 20px;border:2px solid #ff7878;">
			</div>
			<button type="submit" name="v_code_submit" class="btn" style="border-radius: 35px;
			border:2px solid #ff7878; font-size: 45px; padding-left:50px; padding-right: 200px;
			color: #ff7878;padding-top: 5px;padding-bottom: 5px; background: white;margin-top: 100px;width:30px;">Submit</button>
		</form>
</div>


<div id = "bottom-navbar">
	<a href="deliveryboys-home.html"  style="font-size:40px;"class = "child" href="deliveryboys-home.php">
		<img src="home.png"width="65" height="65" style="align-self: center; margin-bottom: 5px;">
		<label style="    font-family: Segoe UI,Frutiger,Frutiger Linotype,Dejavu Sans,Helvetica Neue,Arial,sans-serif;">Home</label>
	</a>
	<a  href="deliveryboys-notif.html" style="font-size:40px;"class = "child" href="vendor-notif.html">
		<img src="notification.png"width="65" height="65" style="align-self: center;margin-bottom: 5px;">
		<label style="    font-family: Segoe UI,Frutiger,Frutiger Linotype,Dejavu Sans,Helvetica Neue,Arial,sans-serif;">Notifs</label>
	</a>
	<a href="deliveryboys-customer-page.php"style="font-size:40px;"class = "child" href="vendor-del-boys.html">
		<img src="statement.png"width="65" height="65" style="align-self: center;margin-bottom: 5px;">
		<label style="    font-family: Segoe UI,Frutiger,Frutiger Linotype,Dejavu Sans,Helvetica Neue,Arial,sans-serif;">Bill</label>
	</a>
	<a href="deliveryboys-settings.php" style="font-size:40px;"class = "child" href="vendor-settings.html">
		<img src="settings.png"width="65" height="65" style="align-self: center;margin-bottom: 5px;">
		<label style="    font-family: Segoe UI,Frutiger,Frutiger Linotype,Dejavu Sans,Helvetica Neue,Arial,sans-serif;">Settings</label>
	</a>
</div>

	
	

		
	</script>
</body>
</html>