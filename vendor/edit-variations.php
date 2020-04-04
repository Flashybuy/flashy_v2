<?php include('../includes/db.php'); 
      include('includes/header.php');
      include('includes/sidebar.php'); 
?>
    

<?php    
    $id = base64_decode($_GET['id']);
     if(isset($_POST['form_category'])){

        $id            =    addslashes($_POST['id']);
        $name          =   addslashes( $_POST['variation_name'] );    
        $approval      =   addslashes( $_POST['image_approval'] );
        if($approval==""){
            $approval = "N";
        }

        $query = "update variations SET variation_name='".$name."', image_approval='".$approval."' Where id='".$id."'";       
        
        if (mysqli_query($con,$query)){

            echo "<script>window.location.assign('variations.php');</script>";
            $msg = "<span>Categories updated successfully...!!</span>";
        }
        else{ 
            header("location:edit-variations.php?id=".$id);
            $error = "<span>Something went wrong...!!</span>";
        }

     }


//  Get Category data bases on cat_id /////

     $sql = mysqli_query($con, "SELECT * From variations WHERE id=$id AND delte =0");
        $row = mysqli_num_rows($sql);
        while ($row = mysqli_fetch_array($sql)){

            $id                 = $row['id'];
            $name               = $row['variation_name'];
            $approval           = $row['image_approval'];     

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
                                    <h4 class="page-title">Update Variations</h4>
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
                                    <h4 class="m-t-0 header-title"><b>Variations Information</b></h4>
                                    <p class="text-muted font-13 m-b-30">
                                        Update your Variations.
                                    </p>

                                    <form id="form_category"  method="post" action="" enctype="multipart/form-data">
                                        <input type="hidden" name="id" value="<?=$id?>">
                                        <div class="form-group">
                                            <label for="userName">Variation Name*</label>
                                            <input type="text" name="variation_name" required parsley-trigger="change"  placeholder="Name" class="form-control" id="userName" value="<?=$name?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Image Approval</label>
                                            <input type="checkbox" <?php if($approval=="Y"){?> checked <?php } ?>  data-plugin="switchery" data-color="#00b19d" name="image_approval" data-size=" 
                                            small" value="Y" />
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
                