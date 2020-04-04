<?php
include('include/header.php');
include('include/nav.php');
$obj = new connection();
$edit = mysqli_query($obj->connect(),"select * from vendor where id = ".$_SESSION['id']." ");  
$fetch = mysqli_fetch_array($edit);


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
                                        <li><a href="#">Minton</a></li>
                                        <li><a href="#">Extras</a></li>
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
                                            <img src="<?php echo "profile/$fetch[20]" ?>" class="img-circle img-thumbnail" alt="profile-image">
                                        </div>

                                        <div class="">
                                            <h4 class="m-b-5"><?php echo $fetch[1] ?></h4>
                                            <p class="m-b-5"><?php echo $fetch[6] ?></p>
                                        </div>

                                        <button type="button" class="btn btn-success btn-sm w-sm waves-effect m-t-10 waves-light">Admin Contact</button>
                                        <button type="button" class="btn btn-danger btn-sm w-sm waves-effect m-t-10 waves-light">De Activate Account</button>
                                    </div>

                                </div> <!-- end card-box -->

                                

                            </div> <!-- end col -->


                            <div class="col-md-8 col-lg-9">
                                <div class="">
                                    <div class="">
                                        <ul class="nav nav-tabs navtab-custom">
                                            <li class="">
                                                <a href="#home" data-toggle="tab" aria-expanded="true">
                                                    <span class="visible-xs"><i class="fa fa-user"></i></span>
                                                    <span class="hidden-xs">About Seller
                                                    </span>
                                                </a>
                                            </li>
                                            <li class="active">
                                                <a href="#profile" data-toggle="tab" aria-expanded="false">
                                                    <span class="visible-xs"><i class="fa fa-photo"></i></span>
                                                    <span class="hidden-xs">Store Detail</span>
                                                </a>
                                            </li>
                                            <li class="">
                                                <a href="#settings" data-toggle="tab" aria-expanded="false">
                                                    <span class="visible-xs"><i class="fa fa-cog"></i></span>
                                                    <span class="hidden-xs">Trasaction Details</span>
                                                </a>
                                            </li>
                                        </ul>
                                        <div class="tab-content">
                                            <div class="tab-pane" id="home">
                                                <table class="table table-hover">
                                                    <tr>
                                                        <th>Vendor Name</th>
                                                        <th><?php echo $fetch[1] ?></th>
                                                    </tr>

                                                    <tr>
                                                        <th>Lastname</th>
                                                        <th><?php echo $fetch[2] ?></th>
                                                    </tr>

                                                    <tr>
                                                        <th>Company</th>
                                                        <th><?php echo $fetch[3] ?></th>
                                                    </tr>

                                                    <tr>
                                                        <th>Business registration number   
                                                         </th>
                                                        <th><?php echo $fetch[15] ?></th>
                                                    </tr>

                                                    <tr>
                                                        <th>Category</th>
                                                        <th><?php echo $fetch[9] ?></th>
                                                    </tr>
                                                <tr>
                                            <th>Website</th>
                                            <th>
                                                
                                                <?php 
                                                $rec = "";
                                                if ( $fetch[10] == "") 
                                                {
                                                    $fetch = "N/A";
                                                }
                                                else
                                                {
                                                    $rec = $fetch[10];
                                                }
                                                 ?>
                                                <?php echo $fetch; ?>
                                              </th>
                                        </tr>

                                                </table>

                                                
                                            </div>
                                            <div class="tab-pane active" id="profile">
                                                <div class="row">
                                                    <?php 
                                                    $shop = mysqli_query($obj->connect(),"select * from shop_detail where user_id = ".$_SESSION['id']." "); 
                                                    $rec = mysqli_fetch_array($shop); 


                                                    ?>
                                                <table class="table table-hover">
                                                    <tr>
                                                        <th>Address</th>
                                                        <th><?php echo $rec[1] ?></th>
                                                    </tr>

                                                    <tr>
                                                        <th>Street</th>
                                                        <th><?php echo $rec[2] ?></th>
                                                    </tr>

                                                    <tr>
                                                        <th>Rout</th>
                                                        <th><?php echo $rec[3] ?></th>
                                                    </tr>

                                                    <tr>
                                                        <th>Country</th>
                                                        <th><?php echo $rec[7] ?></th>
                                                    </tr>

                                                    <tr>
                                                        <th>Postal Code</th>
                                                        <th><?php echo $rec[6] ?></th>
                                                    </tr>

                                                </table>                                                                        
                                                 

                                                  

                                                </div>
                                            </div>
                                            <div class="tab-pane" id="settings">
                                                <table class="table table-hover">
                                                    <tr>
                                                        <td class="text-center">There Is No Record</td>
                                                    </tr>

                                                </table> 
                                            </div>
                                        </div>
                                    </div>
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

            </div
            <?php include('include/footer.php'); ?>