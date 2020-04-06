<?php 
include('../../includes/db.php');


if (isset($_POST['category_name'])) {

		$category_name          = $_POST['category_name'];
		$category_id            = $_POST['category_name'];
		$subcategory_name       = $_POST['subcategory_name'];
		$subcategory_id         = $_POST['subcategory_name'];
		$subsubcategory_name    = $_POST['subsubcategory_name'];
		$subsubcategoryslug     = str_replace(" ","-", $subsubcategory_name);
        foreach ($_POST['variation_id'] as $key => $value) {
            
            $variation_id     =  implode(',' , $_POST['variation_id']);
        }
		

        		$sqlSubSubCategory = "INSERT into sub_sub_categories (name,slug,sub_category_id,variation_id) VALUES ('$subsubcategory_name','$subsubcategoryslug','$subcategory_id','$variation_id')";

        		if (mysqli_query($con,$sqlSubSubCategory)) {
        			
        			$sql = mysqli_query($con, "SELECT * From sub_sub_categories where sub_category_id = '$subcategory_id' AND delte = 0");
                    $row = mysqli_num_rows($sql);
                    while ($row = mysqli_fetch_array($sql)){

                    	$id   = $row['sub_sub_cat'];
        				$name = $row['name'];

        				 echo '<li onclick="confirm_subsubcategory(this, '.$id.')">'.$name.' <span class="fa fa-angle-right icon"></span></li>';
                    }
        		}		
        

}




















?>