<?php 
	include('../../includes/db.php');
	$db = new connection();
if (isset($_POST['action']) && $_POST['action'] == 'btnsub')
 {
		$data = validation();
		$address 		= $_POST['address'];
		$street 		= $_POST['street'];
		$rout 			= $_POST['rout'];
		$state 			= $_POST['state'];
		$subrub 		= $_POST['Subrub'];
		$postal_code 	= $_POST['postal_code'];
		$country 		= $_POST['country'];
		$city 			= $_POST['city'];
		$id 			= $_POST['user_id'];

		$query = $db->save_shop_details($address,$street,$rout,$state,$subrub,$postal_code,$country,$city,$id);
		if ($query == true) 
		{
			echo "Your Account has been done created successfully";
		}		
 }
 function validation()
 {
 	$data['address'] = filter_input(INPUT_POST, 'address',FILTER_SANITIZE_STRING);
	if (false == $data['address']) 
		{
			echo "Enter Address";
			exit;
		}	
		

	$data['s_street'] = filter_input(INPUT_POST, 'street',FILTER_SANITIZE_STRING);
	if (false == $data['s_street']) 
		{
			echo "Enter Street";
			exit;
		}	
		
		
	$data['rout'] = filter_input(INPUT_POST, 'rout',FILTER_SANITIZE_STRING);
	if (false ==$data['rout']) 
		{
			echo "Enter Rout";
			exit;
		}	
		
		
	$data['state'] = filter_input(INPUT_POST, 'state',FILTER_SANITIZE_STRING);
	if (false == $data['state']) 
		{
			echo "Enter State";
			exit;
		}

		$data['sub_rub'] = filter_input(INPUT_POST, 'Subrub',FILTER_SANITIZE_STRING);
	if (false == $data['sub_rub']) 
		{
			echo "Enter Subrub";
			exit;
		}

		$data['postal_code'] = filter_input(INPUT_POST, 'postal_code',FILTER_SANITIZE_NUMBER_INT);
	if (false == $data['postal_code']) 
		{
			echo "Enter Postal Code";
			exit;
		}	


	$data['country'] = filter_input(INPUT_POST, 'country',FILTER_SANITIZE_STRING);
	if (false == $data['country']) 
		{
			echo "Enter Country";
			exit;
		}	
		
	
	$data['city'] = filter_input(INPUT_POST, 'city',FILTER_SANITIZE_STRING);
	if (false == $data['city']) 
		{
			echo "Enter City";
			exit;
		}			

	}
	
?>