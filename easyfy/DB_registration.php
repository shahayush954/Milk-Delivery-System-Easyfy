<?php
              //  session_start();
                $db=mysqli_connect('localhost','root','','easyfy');

?>


 
<?php



//.........................................................................................................
        if(isset($_POST['upload'])){
        	//	session_start();
        		$db_phone =$_SESSION['d-phone'];

                move_uploaded_file($_FILES['file']['tmp_name'],"pictures/".$_FILES['file']['name']);
                $con = mysqli_connect("localhost","root","","milk_delivery");
                $q = mysqli_query($con,"UPDATE phone_no_db SET image = '".$_FILES['file']['name']."' WHERE phone_no = ".$db_phone." ");

        //......................................................................................................


$db_name="";
$flag=true;
$errors=array();
    
    $db=mysqli_connect('localhost','root','','easyfy');

    if (isset($_POST['upload'])) {
        $db_name=mysqli_real_escape_string($db,$_POST['db_name']);

        if (empty($db_name)) {
            $flag=false;
            array_push($errors,"Please enter the name");
                              }

        if(count($errors)==0 and $flag==true ) {
            $db_phone=$_SESSION['phone_no'];
            $query="update phone_no_db set name='".$db_name."' where phone_no=".$db_phone." ";
            mysqli_query($db,$query);
            header('location:connect-to-vendor.php');
                
        }                     
    }




        }

?>

<?php 
	if (isset($_POST['next'])) {
		header('location: vendor_code_front.php');
	}
?>
 


<!--
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form method="post" action="DB_registration.php">
		<label>Name</label>
		<input type="text" name="db_name">
		<button type="submit" name="name_submit">submit</button> 
	</form>
	
	<br>
	<br>
<!--	............................................................ 
	   <form action="" method="post" enctype="multipart/form-data">
                        <input type="file" name="file">
                        <input type="submit" name="upload">
                </form>
           <form method="post">     
            <button type="submit" name="next">NEXT</button>
           		</form>
	<!--	............................................................ -->

<?php
/*                        $con = mysqli_connect("localhost","root","","milk_delivery");
                        $q = mysqli_query($con,"SELECT * FROM phone_no_db");
                        while($row = mysqli_fetch_assoc($q)){
                                echo $row['phone_no'];
                                if($row['image'] == ""){
                                        echo "<img width='100' height='100' src='pictures/default.jpg' alt='Default Profile Pic'>";
                                } else {
                                        echo "<img width='100' height='100' src='pictures/".$row['image']."' alt='Profile Pic'>";
                                }
                                echo "<br>";
                        }
                       */
                ?>

                <?php 


    ?>

