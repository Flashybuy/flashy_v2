<?php include('../includes/db.php'); 
      include('includes/header.php');
      include('includes/sidebar.php'); 


     $sub_cat_id = base64_decode($_GET['id']);
     if(isset($_POST['form_category'])){

        $id        =    $_POST['sub_sub_cat'];
        $name        =    $_POST['name'];    
        $meta_title  =    $_POST['meta_title'];
        $meta_desc   =    $_POST['meta_description'];
        $category_id   =   addslashes( $_POST['category_id'] );
        $variation_id   =   addslashes( $_POST['variation_id'] );
        $slug        =   str_replace(" ","-", $name);

        $query = "update sub_sub_categories SET name='".$name."', meta_title='".$meta_title."', meta_description='".$meta_desc."',slug='".$slug."',sub_category_id='".$category_id."',variation_id='".$variation_id."' Where sub_sub_cat='".$id."'";       
        echo $query;
        if (mysqli_query($con,$query)){

            echo "<script>window.location.assign('sub-subcategories.php');</script>";
            $msg = "<span>Categories updated successfully...!!</span>";
        }
        else{ 
            header("location:edit-sub-subcategories.php?id=".$sub_cat_id);
            $error = "<span>Something went wrong...!!</span>";
        }

     }
//  Get Category data bases on cat_id /////

     $sql = mysqli_query($con, "SELECT * From sub_sub_categories WHERE sub_sub_cat=$sub_cat_id AND delte=0");
        $row = mysqli_num_rows($sql);
        while ($row = mysqli_fetch_array($sql)){

            $sub_cat_id           = $row['sub_sub_cat'];
            $name                 = $row['name'];
            $meta_title           = $row['meta_title'];     
            $meta_description     = $row['meta_description'];
            $category_id          = $row['sub_category_id'];
            $variation_id         = $row['variation_id'];
        }
$sql = mysqli_query($con, "SELECT * From sub_categories WHERE sub_cat_id=$category_id AND delte=0");
        $row = mysqli_num_rows($sql);
    while ($row = mysqli_fetch_array($sql)){

        $cat_name = $row['name'];
}
$sql = mysqli_query($con, "SELECT * From variations WHERE id=$variation_id AND delte=0");
        $row = mysqli_num_rows($sql);
    while ($row = mysqli_fetch_array($sql)){

        $vari_name = $row['variation_name'];
}
// <!-- End -->
?>


            <!-- Left Sidebar End -->
            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->                      
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">

                        <!-- Page-Title -->
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="page-title-box">
                                    <ol class="breadcrumb pull-right">
                                        <li><a href="#">Minton</a></li>
                                        <li><a href="#">Forms</a></li>
                                        <li class="active">Form Validation</li>
                                    </ol>
                                    <h4 class="page-title">Update Subcategories</h4>
                                </div>
                            </div>
                        </div>
 <!-- Start Showing success or warning Msg -->
<?php
if (isset($error)) {?>
    <div class="row">
        <div class="col-lg-6 col-sm-offset-3">
            <div class="alert alert-warning">    
    <?php echo $error; ?>
            </div>
        </div>
    </div>
<?php
}
?>
<?php
if (isset($msg)) { ?>
<div class="row">
    <div class="col-lg-6 col-sm-offset-3">
        <div class="alert alert-success">    
    <?php echo $msg; ?>

        </div>
    </div>
</div>
<?php 
}
?>

<!-- End Message Alert -->
                       <div class="row">
                            <div class="col-lg-6 col-sm-offset-3">
                                <div class="card-box">
                                    <h4 class="m-t-0 header-title"><b>SubCategory Information</b></h4>
                                    <p class="text-muted font-13 m-b-30">
                                       edit your Subcategories.
                                    </p>

                                    <form id="form_category"  method="post" action="">
                                        <input type="hidden" name="sub_sub_cat" value="<?=$sub_cat_id?>">
                                        <div class="form-group">
                                            <label for="userName"> Name*</label>
                                            <input type="text" name="name" value="<?=$name?>" required parsley-trigger="change"  placeholder="Name" class="form-control" id="userName">
                                        </div>
                                        <div class="form-group">
                                            <label>Choose Parent Category</label>
                                            <select class="form-control select2" name="category_id">
                                                <option value="<?=$category_id?>" selected><?=$cat_name?></option>
                                            <?php
                                                $sql = mysqli_query($con, "SELECT * From sub_categories where delte = 0");
                                                $row = mysqli_num_rows($sql);
                                                while ($row = mysqli_fetch_array($sql)){
                                                echo "<option value='". $row['sub_cat_id'] ."'>" .$row['name'] ."</option>" ;
                                            }
                                            ?>
                                            
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Choose variation type</label>
                                            <select class="form-control select2" name="variation_id">
                                                <option value="<?=$variation_id?>" selected><?=$vari_name?></option>
                                            <?php
                                                $sql = mysqli_query($con, "SELECT * From variations where delte = 0");
                                                $row = mysqli_num_rows($sql);
                                                while ($row = mysqli_fetch_array($sql)){
                                                echo "<option value='". $row['id'] ."'>" .$row['variation_name'] ."</option>" ;
                                            }
                                            ?>
                                            
                                            </select>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="passWord2">Meta title</label>
                                            <input  type="text" name="meta_title" required placeholder="meta title" class="form-control" value="<?=$meta_title?>">
                                        </div>
                                        <div class="form-group">
                                                    <label>Textarea</label>
                                                   
                                                    <textarea required class="form-control" name="meta_description"><?=$meta_description?></textarea>
                                                
                                        </div>

                                        <div class="form-group text-right m-b-0">
                                            <button class="btn btn-primary waves-effect waves-light" name="form_category" type="submit">
                                                Submit
                                            </button>
                                            <button type="reset" class="btn btn-default waves-effect waves-light m-l-5">
                                                Cancel
                                            </button>
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>



                    </div>
                    <!-- end container -->

                </div>
                <!-- end content -->



                <!-- FOOTER -->
                <?php 
                     include('includes/footer.php');
                ?>
                