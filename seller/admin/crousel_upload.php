<?php 
include('../../includes/db.php');
$db = new connection();
if (isset($_POST['btnsub'])) 
{
	$title 	= $_POST['title'];
	$url 	= $_POST['url'];
	$image  = $_FILES['img']['name'];
	$tmpName = $_FILES['img']['tmp_name'];

list($width, $height, $type, $attr) = getimagesize($tmpName);

		if($width!="1230" || $height!="425")
		{
			header("Location:../crousel.php?img=invalid");
			exit();
		}
		$sunday 		= $_POST['ch_sunday'];
		$monday 		= $_POST['ch_monday'];
		$tuesday 		= $_POST['ch_tuesday'];
		$wednesday		= $_POST['ch_wednesday'];
		$thursday 		= $_POST['ch_thursday'];
		$friday 		= $_POST['ch_friday'];
		$saturday 		= $_POST['ch_saturday'];

	if ($filewidth != "1230" && $fileheight =!"425" ) 
	{
			echo "<script>alert('invalid file')</script>";
			exit();
	}	
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