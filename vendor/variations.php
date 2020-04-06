<?php include('../includes/db.php'); 
      include('includes/header.php');
      include('includes/sidebar.php');

    if($_GET['id']){

        $cat_id = base64_decode($_GET['id']);
        
        $sql = "update variations SET delte = '1' WHERE id = $cat_id";
        if(mysqli_query($con,$sql)){

            $msg = "<span>Data Deleted successfully...!!</span>";
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
                                        <li><a href="#">Tables</a></li>
                                        <li class="active">Variations</li>
                                    </ol>
                                    <h4 class="page-title">Variations</h4>
                                </div>
                            </div>
                        </div>
<!-- Start Message -->
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
<!-- End Message  -->
                        <div class="row">
							


                            <div class="col-lg-12">
								<div class="card-box">
                                    <div class="col-lg-9">
                                        <h4 class="m-t-0 header-title"><b>Variations</b></h4><br>
                                    </div>
                                    <div class="col-lg-3">
                                        <button class="btn-rounded btn-primary"><a href="add-variations.php" style="color:#fff">Add new Variation</a></button>
                                    </div>    
                                    <table class="table table-striped m-0">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Name</th>
                                                <th>Image Approval</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
<!-- Fetch Categories -->
<?php

    $sql = mysqli_query($con, "SELECT * From variations Where delte = 0");
    $i = 0;
    $row = mysqli_num_rows($sql);
    while ($row = mysqli_fetch_array($sql)){
        $id = base64_encode($row['id']);
        $i++;
?>
                                            <tr>
                                                <th scope="row"><?=$i?></th>

                                                <td><?=$row['variation_name']?></td>
                                                <td>
                                                    <?php if($row['image_approval']=='Y'){?>

                                                     YES
                                                     <?php }else{?>
                                                        NO
                                                     <?php } ?>   
                                                 </td>
                                                    
                                                <td>
                                                    <div class="btn-group">
                                                        <button type="button" class="btn btn-inverse dropdown-toggle waves-effect waves-light"             data-toggle="dropdown" aria-expanded="false">Actions<span class="caret"></span>
                                                        </button>
                                                        <ul class="dropdown-menu" role="menu">
                                                            <li><a href="edit-variations.php?id=<?=$id?>">Edit</a></li>
                                                            <li><a href="variations.php?id=<?=$id?>">Delete</a></li>
                                                        </ul>
                                                    </div>
                                                </td>
                                            </tr>
<?php } ?>
<!-- End categories fetch  -->
                                        </tbody>
                                    </table>

								</div>
							</div>

						</div>
                    </div>
                    <!-- end container -->

                </div>
                <!-- end content -->



                <!-- FOOTER -->
<?php include('includes/footer.php')?>
<script type="text/javascript">
    $(document).ready(function() {

        setTimeout(function(){ $(".msg").hide(); }, 5000);
    });
</script> 