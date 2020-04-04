<?php 
		include('../../includes/db.php');
	$db = new connection();
	if (isset($_POST['s_id'])) 
	{
		$select = mysqli_query($db->connect(),"select * from shop_detail where id = id");
		$fetch = mysqli_fetch_array($select);
		echo json_encode($fetch);
	}
?>