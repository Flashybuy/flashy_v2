<?php 
include('../../includes/db.php');

$obj = new connection();
if (isset($_POST['action']) && $_POST['action'] == 'btnsub')
 {
		$data = validation();
		$acount_holder  = $_POST['acount_holder'];
		$account_number  = $_POST['ac_no'];
		$bank 			= $_POST['bank'];
		$branch_name    = $_POST['branch'];
		$branch_code    = $_POST['branch_code'];
		$id 			= $_POST['txtid'];
		$query = $obj->save_bank($acount_holder,$account_number,$bank,$branch_name,$branch_code,$id);
		if ($query == true) 
		{
			echo "Your Account has been done created successfully";
		}		
 }
 function validation()
 {
 	$data['account_holder'] = filter_input(INPUT_POST, 'ac_no',FILTER_SANITIZE_NUMBER_INT);
	if (false == $data['account_holder']) 
		{
			echo "Enter Account Holder Name";
			exit;
		}	
		


		$data['account_holder'] = filter_input(INPUT_POST, 'acount_holder',FILTER_SANITIZE_STRING);
	if (false == $data['account_holder']) 
		{
			echo "Enter Account Holder Name";
			exit;
		}	
		

	$data['bank'] = filter_input(INPUT_POST, 'bank',FILTER_SANITIZE_STRING);
	if (false == $data['bank']) 
		{
			echo "Enter Bank Name";
			exit;
		}	
		
		
	$data['branch_name'] = filter_input(INPUT_POST, 'branch',FILTER_SANITIZE_STRING);
	if (false ==$data['branch_name']) 
		{
			echo "Enter Branch Name";
			exit;
		}	
		
		
	$data['branch_code'] = filter_input(INPUT_POST, 'branch_code',FILTER_SANITIZE_NUMBER_INT);
	if (false == $data['branch_code']) 
		{
			echo "Enter Branch Code";
			exit;
		}	
		
	}

/*
	if (isset($_POST['btnsub']))
	{
		
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
?>*/