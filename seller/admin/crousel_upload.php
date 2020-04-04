<?php 
	
	include('../../includes/db.php');
	$db = new connection();

if (isset($_POST['btnsub'])) 
{
	$title 	= $_POST['title'];
	$url 	= $_POST['url'];
	$image  = $_FILES['img']['name'];
		$sunday 		= $_POST['ch_sunday'];
		$monday 		= $_POST['ch_monday'];
		$tuesday 		= $_POST['ch_tuesday'];
		$wednesday		= $_POST['ch_wednesday'];
		$thursday 		= $_POST['ch_thursday'];
		$friday 		= $_POST['ch_friday'];
		$saturday 		= $_POST['ch_saturday'];
	$upload = move_uploaded_file($_FILES['img']['tmp_name'],"crousel/".$image);
	if ($upload) 
	{
		$query = $db->db_insert("insert into tbl_slider (title,url,image,sunday,monday,tuesday,wednesday,thursday,friday,saturday)values('$title','$url','$image','$sunday','$monday','$tuesday','$wednesday','$thursday','$friday','$saturday')");
		if ($query) 
		{
			header("Location:../crousel.php?msg=success");
		}
		else
		{
			echo "error";
		}
	}
}

?>