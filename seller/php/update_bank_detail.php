<?php 
		include('../../includes/db.php');
	$db = new connection();

if (isset($_POST['btn_sub'])) 
{
	$user_id				=  $_POST['user_id'];
	$id 					= $_POST['detail_id'];
	$acount_holder 			= $_POST['acount_holder'];
	$bank 					= $_POST['bank'];
	$branch_name 			= $_POST['branch_name'];
	$branch_code 			= $_POST['branch_code'];
	$ip 					= $_SERVER['REMOTE_ADDR'];
	
$update = $db->db_insert("update bank_details set acount_holder = '$acount_holder' , bank = '$acount_holder' , bank ='$bank' , branch_name = '$branch_name' , branch_code = '$branch_code' where id = $id ");
if ($update) 
	{
		$log = $db->db_insert("insert into tbl_log(acount_holder_name,Bank,branch_name,branch_code,user_id,ip) values('$acount_holder','$bank','$branch_name','$branch_code','$user_id','$ip')");
		$json = $db->make_json($user_id);
		header("Location:../manage_detail.php?msg=success");
		
	}	
	else
	{
		echo "error";
	}
}

?>