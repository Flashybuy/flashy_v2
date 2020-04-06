<?php
include_once('../../includes/db.php');
$obj = new connection();
if (isset($_POST['btnsub'])) 
{	
	
		$id 			=$_POST['txtid'];
		$title 			= $_POST['title'];
		$url 			= $_POST['url'];
		$image  		= $_FILES['img']['name'];
		$monday 		= $_POST['ch_monday'];
		$tuesday 		= $_POST['ch_tuesday'];
		$wednesday 		= $_POST['ch_wednesday'];
		$thursday		= $_POST['ch_thursday'];
		$friday 		= $_POST['ch_friday'];
		$saturday 		= $_POST['ch_saturday'];
		$sunday 		= $_POST['ch_sunday'];
$upload = move_uploaded_file($_FILES['img']['tmp_name'],"crousel/".$image);
if ($upload) 
	{
			$update =mysqli_query($obj->connect(),"update tbl_slider set title='$title' , url = '$url' , image ='$image',sunday='$sunday',monday='$monday',tuesday='$tuesday',wednesday='$wednesday',thursday='$thursday',friday='$friday',saturday='$saturday' where id = '$id' ");
			if ($update>0) 
			{
				header("Location:../crousel_view.php?msg=success");
			}
			else
			{
				echo "error";
			}
		
}
}


 ?>
