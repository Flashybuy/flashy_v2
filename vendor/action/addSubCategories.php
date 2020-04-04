<?php 
include('../../includes/db.php');


if (isset($_POST['category_name'])) {

		$category_name          = $_POST['category_name'];
		$category_id          = $_POST['category_name'];
		$subcategory_name       = $_POST['subcategory_name'];
		$subcategoryslug        = str_replace(" ","-", $subcategory_name);
		$subsubcategory_name    = $_POST['subsubcategory_name'];
		$subsubcategoryslug     = str_replace(" ","-", $subsubcategory_name);

		

        	$sqlSubCategory = "INSERT into sub_categories (name,slug,category_id) VALUES ('$subcategory_name','$subcategoryslug','$category_name')";

        	if ( mysqli_query($con,$sqlSubCategory)){

        		$sub_cat_id = mysqli_insert_id($con);

        		$sqlSubSubCategory = "INSERT into sub_sub_categories (name,slug,sub_category_id) VALUES ('$subsubcategory_name','$subsubcategoryslug','$sub_cat_id')";

        		if (mysqli_query($con,$sqlSubSubCategory)) {
        			
        			$sql = mysqli_query($con, "SELECT * From sub_categories where category_id = '$category_id' AND delte = 0");
                    $row = mysqli_num_rows($sql);
                    while ($row = mysqli_fetch_array($sql)){

                    	$id   = $row['sub_cat_id'];
        				$name = $row['name'];

        				 echo '<li onclick="get_subsubcategories_by_subcategory(this, '.$id.')">'.$name.' <span class="fa fa-angle-right icon"></span></li>';
                    }
        		}

        	}		
        

}




















?>