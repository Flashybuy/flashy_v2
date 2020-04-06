<?php
include_once('../../includes/db.php');
$obj = new connection();
if (isset($_POST['btnsub'])) 
{	
	
		$id 			=$_POST['txtid'];
		$title 			= $_POST['title'];
		$url 			= $_POST['url'];
		$primary  		= $_FILES['primary']['name'];
		$secondry  		= $_FILES['secondry']['name'];
		$monday 		= $_POST['ch_monday'];
		$tuesday 		= $_POST['ch_tuesday'];
		$wednesday 		= $_POST['ch_wednesday'];
		$thursday		= $_POST['ch_thursday'];
		$friday 		= $_POST['ch_friday'];
		$saturday 		= $_POST['ch_saturday'];
		$sunday 		= $_POST['ch_sunday'];
$upload_primary = move_uploaded_file($_FILES['primary']['tmp_name'],"banner/".$primary);

$upload_secondry = move_uploaded_file($_FILES['secondry']['tmp_name'],"banner/".$secondry);
if ($upload_primary && $upload_secondry) 
	{
$update =mysqli_query($obj->connect(),"update tbl_banner set title='$title' , url = '$url' , primary_image ='$primary',secondry_image='$secondry',sunday='$sunday',monday='$monday',tuesday='$tuesday',wednesday='$wednesday',thursday='$thursday',friday='$friday',saturday='$saturday' where id = '$id' ");
			if ($update>0) 
			{
				header("Location:../view_banner.php?msg=success");
			}
			else
			{
				echo "error";
			}
		
}
}


 ?>
