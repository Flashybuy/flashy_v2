<?php 
	include('../../includes/db.php');
$obj = new connection();

if (isset($_POST['btnsub']))
{	
	$id 			=$_POST['user_id'];
	$name 			= $_POST['firstname'];
	$lastname 		= $_POST['lastname'];
	$shop_name 		= $_POST['shop_name'];
	$email 			= $_POST['email'];
	$mobile 		= $_POST['mobile'];
	$phone 			= $_POST['phone'];
	$company 		= $_POST['company'];
	$cat 			= $_POST['cmb_cat'];
	$website 		= $_POST['website'];
	$social_media 	= $_POST['social'];
	$vat 			= $_POST['vat'];
	$monthly_rev 	= $_POST['month_rev'];
	$bus_number 	= $_POST['bs_number'];
	$add_comment 	= $_POST['add_comnt'];
	$profile_img    = $_FILES['image']['name'];
      $file_size =$_FILES['image']['size'];
      $file_tmp =$_FILES['image']['tmp_name'];
      $file_type=$_FILES['image']['type'];
      $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));
      
      $extensions= array("jpeg","jpg","png");
      
      if(in_array($file_ext,$extensions)=== false){
         $errors[]="extension not allowed, please choose a JPEG or PNG file.";
      }
      
      if($file_size > 2097152){
         $errors[]='File size must be excately 2 MB';
      }
      
      if(empty($errors)==true){
         move_uploaded_file($file_tmp,"../profile/".$profile_img);
         echo "Success";
      }else{
         print_r($errors);
      }
$query = $obj->db_insert("update vendor	set 
name = '$name',
lastname = '$lastname',
shop_name = '$shop_name',
email = '$email',
mobile = '$mobile',
phone = '$phone',
company = '$company',
cat_name = '$cat',
social = '$website',
vat = '$vat',
monthly_rev = '$monthly_rev',
business_reg = '$bus_number',
 adiotional_coment= '$add_comment',
 adiotional_coment = '$profile_img'
 where id = $id)");
if ($query==true) 
{
	header("Location:../signup.php?msg=success");
}
else
{
	echo "<script>alert('Error')</script>";
}


}

?>