<?php 
session_start();
	include('../../includes/db.php');
$obj = new connection();
if (isset($_POST['btnsub'])) 
{
	$email = $_POST['email'];
	$pass = md5($_POST['pwd']);
	$q = $obj->login($email,$pass);
}


?>