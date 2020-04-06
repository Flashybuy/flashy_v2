<?php

include('../includes/db.php');
    $obj = new connection();
include('include/header.php') ;
include('include/nav.php');
  $edit = mysqli_query($obj->connect(),"select * from vendor where id = ".$_SESSION['id']." ");  
  $row = mysqli_fetch_array($edit);
?>

 <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">

                        <!-- Page-Title -->
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="page-title-box">
                                    <ol class="breadcrumb pull-right">
                                        <li><a href="#">Flashy buy</a></li>
                                        <li><a href="#">Manage User</a></li>
                                        <li class="active">Profile</li>
                                    </ol>
                                    <h4 class="page-title">Profile</h4>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-3 col-md-4">
                                <div class="text-center card-box">
                                    <div class="member-card">
                                        <div class="thumb-xl member-thumb m-b-10 center-block">
                                            <img src="<?php echo "profile/$row[20]" ?>" class="img-circle img-thumbnail" alt="profile-image">
                                        </div>

                                        <div class="">
                                            <h4 class="m-b-5"><?php echo $row[1] ?></h4>
                                            <p class="m-b-5"><?php echo $row[6] ?></p>
                                        </div>

                                        <button type="button" class="btn btn-success btn-sm w-sm waves-effect m-t-10 waves-light">Follow</button>
                                        <button type="button" class="btn btn-danger btn-sm w-sm waves-effect m-t-10 waves-light">Message</button>

                                    </div>

                                </div> <!-- end card-box -->

                               
                            </div> <!-- end col -->


                            <div class="col-md-6">
                            	<h1>Vendor Detail</h1>
                            	<table class="table">
                            			<tr>
                            				<th>Name</th>
                            				<th><?php echo $row[1] ?></th>
                            			</tr>

                            			<tr>
                            				<th>Last Name</th>
                            				<th><?php echo $row[2] ?></th>
                            			</tr>

                            			<tr>
                            				<th>Company Name</th>
                            				<th><?php echo $row[8] ?></th>
                            			</tr>

                                        <tr>
                                            <th>Business registration number</th>
                                            <th><?php echo $row[15] ?></th>
                                        </tr>

                            			<tr>
                            				<th>Category</th>
                            				<th><?php echo $row[9] ?></th>
                            			</tr>

                            			<tr>
                            				<th>Website</th>
                            				<th>
                                                
                                                <?php 
                                                $rec = "";
                                                if ( $row[10] == "") 
                                                {
                                                    $row = "N/A";
                                                }
                                                else
                                                {
                                                    $rec = $row[10];
                                                }
                                                 ?>
                                                <?php echo $row; ?>
                                              </th>
                            			</tr>
                            	</table>
                                </div>

                            </div> <!-- end col -->
                        </div>
                        <!-- end row -->



                    </div>
                    <!-- end container -->

                </div>
                <!-- end content -->



                <!-- FOOTER -->
                <footer class="footer text-right">
                    2017 © Minton.
                </footer>
                <!-- End FOOTER -->

            </div>

<?php include('include/footer.php') ?>