<?php 
	include('../../includes/db.php');
	$db = new connection();
	if (isset($_POST['btnsub'])) 
	{
		$address 		= $_POST['address'];
		$street 		= $_POST['street'];
		$rout 			= $_POST['rout'];
		$state 			= $_POST['state'];
		$subrub 		= $_POST['Subrub'];
		$postal_code 	= $_POST['postal_code'];
		$country 		= $_POST['country'];
		$city 			= $_POST['city'];
		$id 			= $_POST['user_id'];

$insert = $db->db_insert("insert into shop_detail(address,street,rout,state,subrub,postal_code,country,city,user_id)values('$address','$street','$rout','$state','$subrub','$postal_code','$country','$city')");
	if ($insert==true) 
	{
		header("Location:../shop_detail.php?msg=success");
	}
	

	}
?>