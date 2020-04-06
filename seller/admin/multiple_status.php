<?php 
	include('../../includes/db.php');
	$db = new connection();
	if (isset($_POST['cmb_aray'])) 
	{
		$rec = $_POST['cmb_aray'];
		echo $rec;
		foreach ($rec as $cid) 
		{
			$query =
			 mysqli_query($db->connect(),"update tbl_slider set status =  ".$_POST['cmb_val']." where id = '$rec'");
			if ($query) 
			{
				echo json_encode(['success'=>'User status change successfully.']);
			}
		}



	}
?>