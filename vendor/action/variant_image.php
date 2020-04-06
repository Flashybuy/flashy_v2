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
                           
<div class="row">
    <div class="col-lg-3">
        <div class="fileupload btn btn-primary waves-effect waves-light">
            <span><i class="ion-upload m-r-5"></i>Image1</span>
            <input type="file" name="variant_img1[]" class="upload">
        </div>
    </div>
    <div class="col-lg-3">
        <div class="fileupload btn btn-primary waves-effect waves-light">
            <span><i class="ion-upload m-r-5"></i>Image2</span>
            <input type="file" name="variant_img2[]" class="upload">
        </div>
    </div>
    <div class="col-lg-3">
        <div class="fileupload btn btn-primary waves-effect waves-light">
            <span><i class="ion-upload m-r-5"></i>Image3</span>
            <input type="file" name="variant_img3[]" class="upload">
        </div>
    </div>
    <div class="col-lg-3">
        <div class="fileupload btn btn-primary waves-effect waves-light">
            <span><i class="ion-upload m-r-5"></i>Image4</span>
            <input type="file" name="variant_img4[]" class="upload">
        </div>
    </div>
</div><br>   
                            <!-- <div style="   min-height: 150px;
    border: 2px dashed rgba(0, 0, 0, 0.3);
    background: white;
    border-radius: 6px;"> <input name="variant_img[]" type="file" /></div>
                            </div>
                            <div class="col-lg-3">
                            <div style="   min-height: 150px;
    border: 2px dashed rgba(0, 0, 0, 0.3);
    background: white;
    border-radius: 6px;"> <input name="variant_img[]" type="file" /></div>
                            </div>
                            <div class="col-lg-3">
                            <div style="   min-height: 150px;
    border: 2px dashed rgba(0, 0, 0, 0.3);
    background: white;
    border-radius: 6px;"> <input name="variant_img[]" type="file" /></div>
                            </div>
                            <div class="col-lg-3">
                            <div style="   min-height: 150px;
    border: 2px dashed rgba(0, 0, 0, 0.3);
    background: white;
    border-radius: 6px;"> <input name="variant_img[]" type="file" /></div>
                            </div>
                            </div>
                            <br>
                            <br> -->
                            <?php
                       }
                }
            }
        }
        
        
        
    }

//
 }


























?>