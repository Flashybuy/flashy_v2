<?php include('../includes/db.php'); 
      include('includes/header.php');
      include('includes/sidebar.php'); 


     if(isset($_POST['form_category'])){

        $name             =   addslashes( $_POST['name'] );    
        $meta_title       =   addslashes( $_POST['meta_title'] );
        $meta_desc        =   addslashes( $_POST['meta_description'] );
        $subcategory_id   =   addslashes( $_POST['category_id'] );
        foreach ($_POST['variation_id'] as $key => $value) {
            
            $variation_id     =  implode(',' , $_POST['variation_id']);
        }
        
        $slug             = str_replace(" ","-", $name);

        $sql = "INSERT into sub_sub_categories (name, meta_title, meta_description,slug,sub_category_id,variation_id) VALUES ('$name', '$meta_title', '$meta_desc','$slug','$subcategory_id','$variation_id')";

        if ( mysqli_query($con,$sql)){

            $msg = "<span>Data Inserted successfully...!!</span>";
        }
        else{

            $error = "<span>Something went wrong...!!</span>";
        }

     }

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
                                    <h4 class="page-title">Add Sub Sub-Categories</h4>
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
                                    <h4 class="m-t-0 header-title"><b>Sub-subCategory Information</b></h4>
                                    <p class="text-muted font-13 m-b-30">
                                        Add your Sub-subcategories.
                                    </p>

                                    <form id="form_category"  method="post" action="add-subsubcategories.php">
                                        <div class="form-group">
                                            <label for="userName"> Name*</label>
                                            <input type="text" name="name" required parsley-trigger="change"  placeholder="Name" class="form-control" id="userName">
                                        </div>
                                        <div class="form-group">
                                            <label>Choose Parent Category</label>
                                            <select class="form-control select2" name="category_id">
                                                <option  selected disabled>Choose</option>
                                            <?php
                                                $sql = mysqli_query($con, "SELECT * From sub_categories");
                                                $row = mysqli_num_rows($sql);
                                                while ($row = mysqli_fetch_array($sql)){
                                                echo "<option value='". $row['sub_cat_id'] ."'>" .$row['name'] ."</option>" ;
                                            }
                                            ?>
                                            
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Choose variation type</label>
                                            <select class="select2 select2-multiple" multiple multiple="multiple"  data-placeholder="Choose ..." name="variation_id[]">
                                            <?php
                                                $sql = mysqli_query($con, "SELECT * From variations");
                                                $row = mysqli_num_rows($sql);
                                                while ($row = mysqli_fetch_array($sql)){
                                                echo "<option value='". $row['id'] ."'>" .$row['variation_name'] ."</option>" ;
                                            }
                                            ?>
                                            
                                            </select>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="passWord2">Meta title</label>
                                            <input  type="text" name="meta_title" required placeholder="meta title" class="form-control" >
                                        </div>
                                        <div class="form-group">
                                                    <label>Textarea</label>
                                                   
                                                    <textarea required class="form-control" name="meta_description"></textarea>
                                                
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
    $(".select2").select2();
    $(document).ready(function() {

        setTimeout(function(){ $(".msg").hide(); }, 5000);
    });
</script>                