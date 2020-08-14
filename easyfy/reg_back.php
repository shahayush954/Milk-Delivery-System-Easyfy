<?php 
session_start();

$db_name="";
$flag=true;
$errors=array();
	
	$db=mysqli_connect('localhost','root','','easyfy');

	if (isset($_POST['name_submit'])) {
		$db_name=mysqli_real_escape_string($db,$_POST['db_name']);

		if (empty($db_name)) {
			$flag=false;
			array_push($errors,"Please enter the name");
							  }

		if(count($errors)==0 and $flag==true ) {
			$db_phone=$_SESSION['d-phone'];
			$query="update phone_no_db set name='".$db_name."' where phone_no=".$db_phone." ";
			mysqli_query($db,$query);
				
		} 					  
	}

	?>