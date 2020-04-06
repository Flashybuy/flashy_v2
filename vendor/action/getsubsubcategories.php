<?php 
include('../../includes/db.php');
if (isset($_POST['category_id'])) {
	
$data;
	$id = $_POST['category_id'];


    $sql = mysqli_query($con, "SELECT * From sub_sub_categories where sub_category_id='$id' AND delte = 0");
    $row = mysqli_num_rows($sql);
    while ($row = mysqli_fetch_array($sql)){
        $id   = $row['sub_sub_cat'];
        $name = $row['name'];

        echo '<li onclick="confirm_subsubcategory(this, '.$id.')">'.$name.'</li>';
        
    }
    
}



?>