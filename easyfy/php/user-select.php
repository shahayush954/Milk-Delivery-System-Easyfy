<?php

session_start();

$_SESSION['user'] = $_GET['user'];

header("Location: ../loginPage.html");

?>