<?php 
include('../../includes/db.php');
	$db = new connection();
	if(isset($_POST['btnsub']))
	{
		echo "<script>alert('test')</script>";
		$arr = $_POST['ch'];
		foreach ($arr as $id) 
		{
			$query = mysqli_query($db->connect(),"delete from tbl_slider where id = ".$id." ");
		}
		header("Location:../crousel_view.php");
	}
?>