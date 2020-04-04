<?php include('../includes/db.php'); 
      include('includes/header.php');
      include('includes/sidebar.php'); 
?>
<?php    
    $cat_id = base64_decode($_GET['id']);
     if(isset($_POST['form_category'])){

        $id        =    $_POST['cid'];
        $name        =    $_POST['name'];    
        $meta_title  =    $_POST['meta_title'];
        $meta_desc   =    $_POST['meta_description'];
        // $banner      =   addslashes( $_POST['banner'] );
        // $icon        =   addslashes( $_POST['icon'] );
        $slug        =   str_replace(" ","-", $name);

        $query = "update categories SET name='".$name."', meta_title='".$meta_title."', meta_description='".$meta_desc."',slug='".$slug."' Where cat_id='".$id."'";       
        
        if (mysqli_query($con,$query)){

            echo "<script>window.location.assign('categories.php');</script>";
            $msg = "<span>Categories updated successfully...!!</span>";
        }
        else{ 
            header("location:edit-categories.php?id=".$cat_id);
            $error = "<span>Something went wrong...!!</span>";
        }

     }


//  Get Category data bases on cat_id /////

     $sql = mysqli_query($con, "SELECT * From categories WHERE cat_id=$cat_id AND delte = 0");
        $row = mysqli_num_rows($sql);
        while ($row = mysqli_fetch_array($sql)){

            $cat_id               = $row['cat_id'];
            $name                 = $row['name'];
            $meta_title           = $row['meta_title'];     
            $meta_description     = $row['meta_description'];
            $banner               = $row['banner'];
            $icon                 = $row['icon'];

        }

?>    
<!-- End -->
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
                                    <h4 class="page-title">Update Categories</h4>
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
                                    <h4 class="m-t-0 header-title"><b>Category Information</b></h4>
                                    <p class="text-muted font-13 m-b-30">
                                        Update your Categories.
                                    </p>

                                    <form id="form_category"  method="post" action="" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <input type="hidden" name="cid" value="<?=$cat_id?>">
                                            <label for="userName"> Name*</label>
                                            <input type="text" name="name" required parsley-trigger="change"  placeholder="Name" class="form-control" id="userName" value="<?=$name?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="emailAddress">banner</label>
                                            <input type="file" name="banner" parsley-trigger="change" required  class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="pass1">icon</label>
                                            <input  type="file" name="icon" required class="form-control">
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
                