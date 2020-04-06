<?php
		include('../../includes/db.php');

		if ($_POST['sub_sub_cat']) {
			
			$sub_sub_id = $_POST['sub_sub_cat'];


			$sql =mysqli_query($con,"SELECT * from sub_sub_categories where sub_sub_cat='$sub_sub_id' AND delte = 0");

			$row = mysqli_num_rows($sql);
		    while ($row = mysqli_fetch_array($sql)){
		        $id   = $row['variation_id'];
		        $id   = explode(",",$id);
		    }
		foreach ($id as $key => $value) {
			
			$sql =mysqli_query($con,"SELECT * from variations where id='$value'  AND delte = 0");
		    $row = mysqli_num_rows($sql);
		    while ($row = mysqli_fetch_array($sql)){
		        $name   = $row['variation_name'];   
		    }
		    echo '<option value="'.$name.'">'.$name.'</option>';
		}
		    
		    
		}
?>