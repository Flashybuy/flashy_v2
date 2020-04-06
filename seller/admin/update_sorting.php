<?php 
	include('../../includes/db.php');
	$db = new connection();
$position = $_POST['position'];
$i=1;
foreach($position as $k=>$v){
    $sql = "Update tbl_slider SET order_by=".$i." WHERE id=".$v;
    $mysqli->mysqli_query($obj->connect(),$sql);


	$i++;
}

	
	
?>