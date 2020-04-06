<?php 
include('../../includes/db.php');
include("../../thirdparty/image-resize/ImageResize.php");
include ("../../thirdparty/image-resize/ImageResizeException.php");
use \Gumlet\ImageResize;
use \Gumlet\ImageResizeException;

if (isset($_POST['addcategory'])) {

		$category_name          = $_POST['category_name'];
		$categoryslug           = str_replace(" ","-", $category_name);
		$subcategory_name       = $_POST['subcategory_name'];
		$subcategoryslug        = str_replace(" ","-", $subcategory_name);
		$subsubcategory_name    = $_POST['subsubcategory_name'];
		$subsubcategoryslug     = str_replace(" ","-", $subsubcategory_name);
        foreach ($_POST['variation_id'] as $key => $value) {
            
            $variation_id     =  implode(',' , $_POST['variation_id']);
        }

if (isset($_FILES['file']["name"])) {
    $filename = $_FILES["file"]["name"];
    $extension = @end(explode('.', $filename)); // explode the image name to get the extension
    $pic1extension = strtolower($extension);
    $pic1 = time().rand();
    $pic1we=$pic1.".".$pic1extension;
    $location = "../../upload/category/".$pic1we;
    
if(move_uploaded_file($_FILES["file"]["tmp_name"], $location)){

        try {
            $image = new ImageResize($location);
            $image->quality_jpg = 85;
            $image->resizeToWidth(170);
            $image->resizeToHeight(170);
            $new_name = '800_' . $pic1 . '.jpg';
            $new_path = '../../upload/category/' . $new_name;
            $image->save($new_path, IMAGETYPE_JPEG); 
        } 
        catch (ImageResizeException $e) {
            return null;
        }

}
}
		$sqlCategory = "INSERT into categories (name,slug,banner) VALUES ('$category_name','$categoryslug','$new_path')";
        if ( mysqli_query($con,$sqlCategory)){

        	$cat_id = mysqli_insert_id($con);

        	$sqlSubCategory = "INSERT into sub_categories (name,slug,category_id) VALUES ('$subcategory_name','$subcategoryslug','$cat_id')";

        	if ( mysqli_query($con,$sqlSubCategory)){

        		$sub_cat_id = mysqli_insert_id($con);

        		$sqlSubSubCategory = "INSERT into sub_sub_categories (name,slug,sub_category_id,variation_id) VALUES ('$subsubcategory_name','$subsubcategoryslug','$sub_cat_id','$variation_id')";

        		if (mysqli_query($con,$sqlSubSubCategory)) {

                        header("location:../category.php?msg=success");
        		}
                else{

                    header("location:../category.php?msg=error");
                }

        	}		
        }

}




















?>