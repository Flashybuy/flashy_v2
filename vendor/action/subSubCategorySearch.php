<?php
include('../../includes/db.php');
if (isset($_POST['keyword'])) {
	
	$keyword = $_POST['keyword'];
	$category_id = $_POST['id'];
		if ($keyword != null) {
		
			$sql = "SELECT * from sub_sub_categories where name like '%$keyword%' AND sub_category_id = $category_id AND delte=0";

			$query = mysqli_query($con,$sql);


			while ($row = mysqli_fetch_array($query)) {
				// print_r($row);
					$id   = $row['sub_sub_cat'];
		        	$name = $row['name'];

					echo '<li onclick="confirm_subsubcategory(this, '.$id.')">'.$name.'</li>';
			}
		}
		else{

			$sql = "SELECT * from sub_sub_categories where delte=0 AND sub_category_id = $category_id";

			$query = mysqli_query($con,$sql);

			while ($row = mysqli_fetch_array($query)) {
				
					$id   = $row['sub_sub_cat'];
		        	$name = $row['name'];

					echo '<li onclick="confirm_subsubcategory(this, '.$id.')">'.$name.'</li>';
			}
		}	

}
?>