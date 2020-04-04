<?php 
		include('../../includes/db.php');
	$db = new connection();

if (isset($_POST['btn_sub'])) 
{
	$id 				= $_POST['id'];
	$adress 			= $_POST['adress'];
	$street 			= $_POST['street'];
	$rout 				= $_POST['rout'];
	$state 				= $_POST['state'];
	$subrub 			= $_POST['subrub'];
	$postal_code 		= $_POST['postal_code'];
	$country 			= $_POST['country'];
	$city 				= $_POST['city'];
	
$update = $db->db_insert("update shop_detail set address='$adress' , street = '$street' ,rout = '$rout' , state = '$state' , subrub = '$subrub' , postal_code = '$postal_code' , country = '$country' , city = '$city' where id = $id");
if ($update) 
	{
		header("Location:../manage_shop.php?msg=success");
	}	
	else
	{
		echo "error";
	}
}

?>