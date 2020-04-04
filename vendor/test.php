<?php include('../includes/db.php'); 
     


     $sql = mysqli_query($con, "SELECT * From pages WHERE id=4 ");
        $row = mysqli_num_rows($sql);
        while ($row = mysqli_fetch_array($sql)){

            $id                 = $row['id'];
            $name               = $row['name']; 
            $subject            = $row['subject']; 
         echo   $content               = $row['content'];     

        }

?>    
