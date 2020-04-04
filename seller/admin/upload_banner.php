<?php 
	include('../../includes/db.php');
	$db = new connection();
	if(isset($_POST['btnsub'])) 
	{
		$title 			= $_POST['title'];
		$url 			= $_POST['url'];
		$primary 		= $_FILES['primary']['name'];
		$secondry 		= $_FILES['secondry']['name'];
		$monday 		= $_POST['ch_monday'];
		$tuesday 		= $_POST['ch_tuesday'];
		$wednesday 		= $_POST['ch_wednesday'];
		$thursday		= $_POST['ch_thursday'];
		$friday 		= $_POST['ch_friday'];
		$saturday 		= $_POST['ch_saturday'];
		$sunday 		= $_POST['ch_sunday'];

		$target_primary = "banner/".$primary;
$upload_primary = move_uploaded_file($_FILES['primary']['tmp_name'], $target_primary);
/*$upload_secondry = move_uploaded_file($_FILES['secondry']['tmp_name'], $target_secondry);*/
if ($upload_primary) 
		{
			$query = $db->db_insert("insert into tbl_banner 
(title,url,primary_image,monday,tuesday,wednesday,thursday,friday,saturday,sunday) 
			values
('$title','$url','$primary','$monday','$tuesday','$wednesday','$thursday','$friday','$saturday','$sunday')");
			if ($query) 
			{
				header("Location:../banner.php");
			}
			else
			{
				echo "error";
			}

		}		

		
	}
?>