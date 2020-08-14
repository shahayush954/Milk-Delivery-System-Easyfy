<?php

session_start();
switch($_SESSION['user']){
	case 'vendor':
	header("Location: ../vendor-registration.html");
	break;

	case 'deliveryboy':
	header("Location: ../delivery.php");
	break;

	case 'customer':
	header("Location: ../customer-registration.html");
	break;
}

?>