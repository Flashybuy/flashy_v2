<?php 
include('../../includes/db.php');
$obj = new connection();
	if (isset($_POST['btnsub']))
	{
		$acount_holder  = $_POST['acount_holder'];
		$bank 			= $_POST['bank'];
		$branch_name    = $_POST['branch'];
		$branch_code    = $_POST['branch_code'];
		$id 			= $_POST['txtid'];
if (empty($acount_holder) && empty($bank) && empty($branch_name) && empty($branch_code) ) 
	{
		header("Location:../bank_detail.php?error=empty");
	}
	else
	{
		$query = $obj->db_insert("insert into bank_details(acount_holder,bank,branch_name,branch_code,user_id)values('$acount_holder','$bank','$branch_name','$branch_code','$id')");
		if ($query==true) 
		{
			header("Location:../bank_detail.php?msg=success");
		}
	}
	}
?>