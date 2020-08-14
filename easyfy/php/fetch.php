<?php

session_start();
if(isset($_POST['view'])){

	$link = mysqli_connect('localhost','root','','easyfy');
	$query1 = "SELECT * FROM `notifications` WHERE `to_id` = '".$_SESSION['vendor-id']."'";
	$result1 = mysqli_query($link,$query1);
	$output1 = '';

	if(mysqli_num_rows($result1) > 0){

		while($row1 = mysqli_fetch_assoc($result1)){
			$output1 .= "
				<li>".$row1['comments']."</li>
			";
		}

	}
	else{
		$output1 .= "<li>No Notifications</li>";
	}
	$query2 = "SELECT * FROM `notifications` WHERE `to_id` = '".$_SESSION['vendor-id']."' AND `comment_status` = '1'";
	$result2 = mysqli_query($link,$query2);
	$count = mysqli_num_rows($result2);
	$data = array(
		'notification' => $output1,
		'unseen_notification' => $count
	);

	echo json_encode($data);
}

if(isset($_POST['request'])){
	$link = mysqli_connect('localhost','root','','easyfy');
	$query1 = "SELECT * FROM `requests` WHERE `to_id` = '".$_SESSION['vendor-id']."'";
	$result1 = mysqli_query($link,$query1);
	$output = "";
	$count = 0;
	if(mysqli_num_rows($result1)>0){
		while($row1 = mysqli_fetch_assoc($result1)){
			switch($row1['sent_by']){
				case 'customer':
				$query3 = "SELECT * FROM `customer_residence` WHERE `c_id` = '".$row1['from_id']."'";
				$result3 = mysqli_query($link,$query3);
				$row3 = mysqli_fetch_assoc($result3);
				switch($row3['residence_type']){
					case 'Building':
					$query4 = "SELECT * FROM `customer_building` WHERE `c_id` = '".$row3['c_id']."'";
					$result4 = mysqli_query($link,$query4);
					$row4 = mysqli_fetch_assoc($result4);
					$output .= "
						<li class='flex-parent'>
							<div class = 'flex-child-img'>
								<img src='data:image/jpeg;base64,".base64_encode($row4['c_image'])."' width='200' height='200'>
							</div>
							<div class='flex-child-details'>
								<p class = 'id'>".$row4['c_id']."</p>
								<p class = 'name'>".$row4['c_name']."</p>
							</div>	
							<div class='flex-child-requests'>
								<a href='php/accept-customer.php?cid=".$row3['c_id']."&vid=".$_SESSION['vendor-id']."'><img src='check-button.png' width='50' height='50' onclick='send_approval()'>
								<a href='php/decline-customer.php?cid=".$row3['c_id']."&vid=".$_SESSION['vendor-id']."'><img src='cancel-button.png' width='50' height='50'>
							</div>
						</li>
					";
					$count++;
					break;

					case 'Bungalow':
					$query4 = "SELECT * FROM `customer_bungalow` WHERE `c_id` = '".$row3['c_id']."'";
					$result4 = mysqli_query($link,$query4);
					$row4 = mysqli_fetch_assoc($result4);
					$output .= "
						<li class='flex-parent'>
							<div class = 'flex-child-img'>
								<img src='data:image/jpeg;base64,".base64_encode($row4['c_image'])."' width='200' height='200'>
							</div>	
							<div class='flex-child-details'>
								<p class = 'id'>".$row4['c_id']."</p>
								<p class = 'name'>".$row4['c_name']."</p>
							</div>	
							<div class='flex-child-requests'>
								<a href='php/accept-customer.php?cid=".$row3['c_id']."&vid=".$_SESSION['vendor-id']."'><img src='check-button.png' onclick='send_approval()' width='105'height='105'>
								<a href='php/decline-customer.php?cid=".$row3['c_id']."&vid=".$_SESSION['vendor-id']."'><img src='cancel-button.png' width='105' height='105'>
							</div>
						</li>
					";
					$count++;
					break;

					case 'Chawl':
					$query4 = "SELECT * FROM `customer_chawl` WHERE `c_id` = '".$row3['c_id']."'";
					$result4 = mysqli_query($link,$query4);
					$row4 = mysqli_fetch_assoc($result4);
					$output .= "
						<li class='flex-parent'>
							<div class = 'flex-child-img'>
								<img src='data:image/jpeg;base64,".base64_encode($row4['c_image'])."' width='200' height='200'>
							</div>
							<div class='flex-child-details'>
								<p class = 'name'>".$row4['c_id']."</p>
								<p class = 'name'>".$row4['c_name']."</p>
							</div>
							<div class='flex-child-requests'>
								<a href='php/accept-customer.php?cid=".$row3['c_id']."&vid=".$_SESSION['vendor-id']."'><img src='check-button.png'>
								<a href='php/decline-customer.php?cid=".$row3['c_id']."&vid=".$_SESSION['vendor-id']."'><img src='cancel-button.png'>
							</div>
						</li>
					";
					$count++;
					break;

					case 'Shop':
					$query4 = "SELECT * FROM `customer_shop` WHERE `c_id` = '".$row3['c_id']."'";
					$result4 = mysqli_query($link,$query4);
					$row4 = mysqli_fetch_assoc($result4);
					$output .= "
						<li class='flex-parent'>
							<div class = 'flex-child-img'>
								<img src='data:image/jpeg;base64,".base64_encode($row4['c_image'])."' width='200' height='200'>
							</div>
							<div class='flex-child-details'>
								<p class = 'name'>".$row4['c_id']."</p>
								<p class = 'name'>".$row4['c_name']."</p>
							</div>
							<div class='flex-child-requests'>
								<a href='php/accept-customer.php?cid=".$row3['c_id']."&vid=".$_SESSION['vendor-id']."'><img src='check-button.png'>
								<a href='php/decline-customer.php?cid=".$row3['c_id']."&vid=".$_SESSION['vendor-id']."'><img src='cancel-button.png'>
							</div>
						</li>
					";
					$count++;
					break;
				}
				break;

				case 'deliveryboy':
				$query5 = "SELECT * FROM `phone_no_db` WHERE `db_id` = '".$row1['from_id']."'";
				$result5 = mysqli_query($link,$query5);
				$row5 = mysqli_fetch_assoc($result5);
				$output .= "
					<li class='flex-parent'>
							<div class = 'flex-child-img'>
								<img src='data:image/jpeg;base64,".base64_encode($row5['image'])."' width='200' height='200'>
							</div>
							<div class = 'flex-child-details'>
							<p class = 'name'>".$row5['db_id']."</p>
							<p class = 'name'>".$row5['name']."</p>
							</div>
							<div class='flex-child-requests'>
								<a href='php/accept-customer.php?cid=".$row5['db_id']."&vid=".$_SESSION['vendor-id']."'><img src='check-button.png' height='60px' width='60px'></a>
								<a href='php/decline-customer.php?cid=".$row5['db_id']."&vid=".$_SESSION['vendor-id']."'><img src='cancel-button.png' height='60px' width='60px'></a>
								
								
							</div>
						</li>
				";
				$count++;
				break;
			}
		}
	}
	$data = array(
		'approve_request' => $output,
		'unseen_request' => $count
	);

	echo json_encode($data);
}

?>