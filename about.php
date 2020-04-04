<?php 
include('includes/head.php'); 
include('includes/db.php'); 
 $sql = mysqli_query($con, "SELECT * From pages WHERE id=1");
        $row = mysqli_num_rows($sql);
        while ($row = mysqli_fetch_array($sql)){

            $id                 = $row['id'];
            $name               = $row['name']; 
            $subject            = $row['subject']; 
        $content               = $row['content'];     

        }

?>  

    <div class="ps-breadcrumb">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="index.html">Home</a></li>
                <li><?=$subject?></li>
            </ul>
        </div>
    </div>
    <div class="ps-page--single" id="about-us"><img src="img/bg/about-us.jpg" alt="">
        <div class="ps-about-intro">
            <div class="container">
               <?=$content?>
            </div>
        </div>
        <!--include ../../partials/pages/about-us/milestone-->
       
    </div>
    <?php include('includes/footer.php'); ?>