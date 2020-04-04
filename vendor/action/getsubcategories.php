<?php 
include('../../includes/db.php');
if (isset($_POST['category_id'])) {
	
$data;
	$id = $_POST['category_id'];


    $sql = mysqli_query($con, "SELECT * From sub_categories where category_id='$id' AND delte = 0 ");
    $row = mysqli_num_rows($sql);
    while ($row = mysqli_fetch_array($sql)){
        $id   = $row['sub_cat_id'];
        $name = $row['name'];

        echo '<li onclick="get_subsubcategories_by_subcategory(this, '.$id.')">'.$name.' <span class="fa fa-angle-right icon"></span></li>';
        
    }
    
}



?>