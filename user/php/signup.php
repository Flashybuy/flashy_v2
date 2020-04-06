<?php
	include('../../includes/db.php');
$obj = new connection();	

if (isset($_POST['action']) && $_POST['action'] == 'btnsub')
 {
validation();
$name 	= mysqli_real_escape_string($obj->connect(),$_POST['name']);
$email 	= mysqli_real_escape_string($obj->connect(),$_POST['email']);
$pass 	= mysqli_real_escape_string($obj->connect(),md5($_POST['password']));
$ip = $_SERVER['REMOTE_ADDR'];
$query = $obj->user_signup($name,$email,$pass,$ip);	
if ($query) 
{
	echo "<script>window.location='Signup Successfully Please check your email'</script>";
}

 }
 function validation()
 {
 	$data['name'] = filter_input(INPUT_POST, 'name',FILTER_SANITIZE_NUMBER_INT);
	if (false == $data['name']) 
		{
			echo "Please Enter Your Name ";
			exit;
		}	

		$data['email'] = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
	if (false == $data['email']) 
		{
			echo "Please Must Enter your Emil";
			exit;
		}	
		

	$data['pass'] = filter_input(INPUT_POST, 'pass',FILTER_SANITIZE_STRING);
	if (false == $data['pass']) 
		{
			echo "Please Enter your password";
			exit;
		}	
	}
?>