<?php 
include('../../includes/db.php');
$obj = new connection();
	if (isset($_POST['email'])) 
	{
		$email = mysqli_real_escape_string($obj->connect(), $_POST["email"]);
		$query = mysqli_query($obj->connect(),"select * from vendor where email = '$email'");
	 	 $count = mysqli_num_rows($query);
	 	if($count>0)
	 	{
	 		echo "<font color='red'>Email already exsist</font>";
	 	}
	 	else
	 	{
	 		echo "<font color='green'>Email Avaliable</font>";
	 	}
	}

?>