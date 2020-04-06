<?php 
include('../../includes/db.php');
$obj = new connection();
	if (isset($_POST['btnsub']))
	{
		$value=0;

		$arrlist = array();
	
		if( $_POST['acount_holder']=="")
		{
			$error_list['account_holder']="Account Holder Name Required";
			$value =1 ;
		}
		if ($_POST['bank']=="") 
		{
			echo$error_lis['bank']="Bank Name is Required"; 
		}


		if ($_POST['branch']=="") 
		{
			$error_lis['branch']="Branch Name is Required"; 
		}
		
		if ($_POST['branch_code']=="") 
		{
			$error_lis['bank']="Branch Code is Required"; 
		}
		
		else if($value!=1)
		{
		$acount_holder  = $_POST['acount_holder'];
		$bank 			= $_POST['bank'];
		$branch_name    = $_POST['branch'];
		$branch_code    = $_POST['branch_code'];
		$id 			= $_POST['txtid'];
		$query = $obj->db_insert("insert into bank_details(acount_holder,bank,branch_name,branch_code,user_id)values('$acount_holder','$bank','$branch_name','$branch_code','$id')");
		if ($query) 
		{
			echo "record save";
		}
		else
		{
			echo json_encode($error_list);
		}
		}


	}
?>