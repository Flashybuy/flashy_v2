<?php include('../includes/db.php'); 
      include('includes/header.php');
      include('includes/sidebar.php');

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
                                        <li><a href="#">FlashyBuy</a></li>
                                       
                                        <li class="active">Pages</li>
                                    </ol>
                                    <h4 class="page-title">Pages</h4>
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
                                        <h4 class="m-t-0 header-title"><b>Pages</b></h4><br>
                                    </div>
                                     
                                    <table class="table table-responsive m-0">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Name</th>
                                                <th>Subject</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
<!-- Fetch Categories -->
<?php

    $sql = mysqli_query($con, "SELECT * From pages");
    $i = 0;
    $row = mysqli_num_rows($sql);
    while ($row = mysqli_fetch_array($sql)){
        $id = base64_encode($row['id']);
        $i++;
?>
                                            <tr>
                                                <th scope="row"><?=$i?></th>

                                                <td><?=$row['name']?></td>
                                                <td>
                                                    <?=$row['subject']?>     
                                                 </td>
                                                    
                                                <td>
                                                    <div class="btn-group">
                                                        <button type="button" class="btn btn-inverse dropdown-toggle waves-effect waves-light"             data-toggle="dropdown" aria-expanded="false">Actions<span class="caret"></span>
                                                        </button>
                                                        <ul class="dropdown-menu" role="menu">
                                                            <li><a href="edit-pages.php?id=<?=$id?>">Edit</a></li>
                                                            <!-- <li><a href="brands.php?id=<?=$id?>">Delete</a></li> -->
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