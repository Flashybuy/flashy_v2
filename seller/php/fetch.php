<?php 
	include('../../includes/db.php');
$obj = new connection();
if (isset($_POST['rec_id'])) 
{
	$select = mysqli_query($obj->connect(),"select * from bank_details where id =  ".$_POST['rec_id']." ");
	$row = mysqli_fetch_array($select);
	echo json_encode($row);
}
?>