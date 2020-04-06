<?php 
		include('../../includes/db.php');
	$db = new connection();
	if (isset($_POST['b_id'])) 
	{
	$select = mysqli_query($db->connect(),"select * from bank_details where id = id");
		$fetch = mysqli_fetch_array($select);
		echo json_encode($fetch);
	}
?>