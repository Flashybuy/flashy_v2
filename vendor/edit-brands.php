<?php include('../includes/db.php'); 
      include('includes/header.php');
      include('includes/sidebar.php'); 
?>
    

<?php    
    $id = base64_decode($_GET['id']);
     if(isset($_POST['form_category'])){

        $id            =    addslashes($_POST['id']);
        $name          =   addslashes( $_POST['name'] );    
        $slug          = str_replace(" ","-", $name);

        $query = "update brands SET name='".$name."', slug='".$slug."' Where id='".$id."'";       
        
        if (mysqli_query($con,$query)){

            echo "<script>window.location.assign('brands.php');</script>";
            $msg = "<span>Categories updated successfully...!!</span>";
        }
        else{ 
            header("location:edit-brands.php?id=".$id);
            $error = "<span>Something went wrong...!!</span>";
        }

     }


//  Get Category data bases on cat_id /////

     $sql = mysqli_query($con, "SELECT * From brands WHERE id=$id AND delte = 0");
        $row = mysqli_num_rows($sql);
        while ($row = mysqli_fetch_array($sql)){

            $id                 = $row['id'];
            $name               = $row['name'];     

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
            <div class="alert alert-warning msg">    
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
        <div class="alert alert-success msg">    
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
                                    <h4 class="m-t-0 header-title"><b>Brands Information</b></h4>
                                    <p class="text-muted font-13 m-b-30">
                                        Update your Brands.
                                    </p>

                                    <form id="form_category"  method="post" action="" enctype="multipart/form-data">
                                        <input type="hidden" name="id" value="<?=$id?>">
                                        <div class="form-group">
                                            <label for="userName">Brand Name*</label>
                                            <input type="text" name="name" required parsley-trigger="change"  placeholder="Name" class="form-control" id="userName" value="<?=$name?>">
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
<script type="text/javascript">
    $(document).ready(function() {

        setTimeout(function(){ $(".msg").hide(); }, 5000);
    });
</script>                