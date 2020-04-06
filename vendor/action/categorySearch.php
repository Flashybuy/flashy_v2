<?php
include('../../includes/db.php');
if (isset($_POST['keyword'])) {
	
	$keyword = $_POST['keyword'];

		if ($keyword != null) {
		
			$sql = "SELECT * from categories where name like '%$keyword%' AND delte=0";

			$query = mysqli_query($con,$sql);


			while ($row = mysqli_fetch_array($query)) {
				// print_r($row);
					$id   = $row['cat_id'];
		        	$name = $row['name'];

					echo '<li onclick="get_subcategories_by_category(this, '.$id.')">'.$name.'</li>';
			}
		}
		else{

			$sql = "SELECT * from categories where delte=0";

			$query = mysqli_query($con,$sql);

			while ($row = mysqli_fetch_array($query)) {
				
					$id   = $row['cat_id'];
		        	$name = $row['name'];

					echo '<li onclick="get_subcategories_by_category(this, '.$id.')">'.$name.'</li>';
			}
		}	

}
?>