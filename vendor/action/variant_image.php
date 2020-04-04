<?php 
 include ('../../includes/db.php');
 $options = array();
 if (isset($_POST['vari'])) {


    foreach ($_POST['vari'] as $key => $no) {

        if ($no == 'Color') {



            $sql   = "SELECT * from variations Where variation_name='$no'";
            $query = mysqli_query($con,$sql);

            while ($res = mysqli_fetch_array($query)) {
                
                $aprroval = $res['image_approval'];
                if ($aprroval == "Y" ) {
                    
                    $value =  $_POST['color'];
                    array_push($options, explode(',', $value));
                       foreach ($options as $key => $value) {
            
                            ?>

                            <div class="col-md-3 portlets"> <input name="variant_img[]" type="file" /></div>
                            <?php
                       }
                }
            }
        }
        
        
        
    }

//
 }


























?>