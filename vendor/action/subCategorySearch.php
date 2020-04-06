<?php
include('../../includes/db.php');
if (isset($_POST['keyword'])) {
	
	$keyword = $_POST['keyword'];
	$category_id = $_POST['id'];
		if ($keyword != null) {
		
			$sql = "SELECT * from sub_categories where name like '%$keyword%' AND category_id = $category_id AND delte=0";

			$query = mysqli_query($con,$sql);


			while ($row = mysqli_fetch_array($query)) {
				// print_r($row);
					$id   = $row['sub_cat_id'];
		        	$name = $row['name'];

					echo '<li onclick="get_subsubcategories_by_subcategory(this, '.$id.')">'.$name.'</li>';
			}
		}
		else{

			$sql = "SELECT * from sub_categories where delte=0 AND category_id = $category_id ";

			$query = mysqli_query($con,$sql);

			while ($row = mysqli_fetch_array($query)) {
				
					$id   = $row['sub_cat_id'];
		        	$name = $row['name'];

					echo '<li onclick="get_subsubcategories_by_subcategory(this, '.$id.')">'.$name.'</li>';
			}
		}	

}
?>