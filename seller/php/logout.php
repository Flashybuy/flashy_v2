<?php 
	include('../../includes/db.php');
	$db = new connection();
	session_start();
				$id = $_SESSION['id'];	
				$logtout = date("Y-m-d H:i:s");
				$ip   = $_SERVER['REMOTE_ADDR'];
				$insert = mysqli_query($db->connect(),"insert into login_log(user_id,logout_time,ip) values('$id','$logtout','$ip')");	
				header("Location:../login.php");


	session_detroy();
?>