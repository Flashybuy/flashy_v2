<?php 
	include('../../includes/db.php');
	$db = new connection();
if (isset($_POST['id'])) 
{	
	$update = mysqli_query($db->connect(),"update tbl_slider set
		status = ".$_POST['status']." where id = ".$_POST['id']."");
	if ($update) 
	{
			echo json_encode(['success'=>'User status change successfully.']);
	}
}
?>