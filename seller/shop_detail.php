<?php 
session_start();
    include('include/header.php');
    include('include/nav.php');
?>
    <div class="content-page">
        <!-- Start content -->
        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-title-box">
                            <ol class="breadcrumb pull-right">
                                <li><a href="dashboard.php">flashy buy</a></li>
                                <li><a href="#">Manage Shop</a></li>
                                <li class="active">Shop Details</li>
                            </ol>
                            <h4 class="page-title">Shop Details <i class="fa fa-bank"></i></h4>

                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="card-box">
                            <div class="row">
                                <div class="col-md-12">
                                    <form class="form-horizontal" id="details" name="details" method="post" role="form" action="php/shop_detail.php">

                                        <div class="row">
                                            <div class="col-md-4">
                                                <label>Address</label>
                                                <textarea name="address" class="form-control" placeholder="Enter Your Address" style="resize:none;" id="address"></textarea>
                                            </div>

                                            

                                            <div class="col-md-4">
                                                <label>Street</label>
                                                <input type="text" name="street" id="street" class="form-control" placeholder="Enter Your Street">
                                            </div>

                                            <div class="col-md-4">
                                                <label>Rout</label>
                                                <input type="text" name="rout" id="rout" class="form-control" placeholder="Enter Your rout">
                                            </div>

                                           
                                        </div>

                                         <div class="row">
                                            <div class="col-md-4">
                                                <label>State</label>
                                                <input type="text" name="state" class="form-control" placeholder="Enter Your State" style="resize:none;" id="state">
                                            </div>

                                            

                                            <div class="col-md-4">
                                                <label>Subrub </label>
                                                <input type="text" name="Subrub" id="Subrub" class="form-control" placeholder="Enter Your Subrub ">
                                            </div>

                                            <div class="col-md-4">
                                                <label>Postal Code</label>
                                                <input type="text" name="postal_code" placeholder="Enter Your Postal Code" id="Postal Code" class="form-control">
                                            </div> 
                                            
                                        </div>

                                      
                                            

                                            <div class="col-md-4">
                                                <label>Country </label>
                                                <input type="text" name="country" id="country" class="form-control" placeholder="Enter Your Country">
                                            </div>

                                             <div class="col-md-4">
                                                <label>City</label>
                                                <input type="text" name="city" placeholder="Enter Your City" class="form-control">
                                            </div> 
                                            <input type="hidden" name="user_id" value="<?php echo $_SESSION['id'] ?>">
                                            
                                           <div class="col-md-4">
                                            <button type="submit" style="margin-top: 20px;" class="btn btn-success" name="btnsub"><i class="fa fa-plus"></i> Shop Detail</button>
                                           </div>
                                            
                                        </div>

                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end container -->
<div class="modal fade" id="message_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-sm modal-notify modal-danger" role="document">
    <!--Content-->
    <div class="modal-content text-center">
      <!--Header-->
      <div class="modal-header d-flex justify-content-center">
        <p class="heading">Success Message</p>
      </div>

      <!--Body-->
      <div class="modal-body">

      <p>Record save successfully</p>

      </div>

      <!--Footer-->
      <div class="modal-footer flex-center">
        
        <a type="button" class="btn  btn-success waves-effect" data-dismiss="modal">Ok</a>
      </div>
    </div>
    <!--/.Content-->
  </div>
</div>
        </div>

        <!-- end content -->

        <!-- FOOTER -->
        <footer class="footer text-right">
            2017 © Minton.
        </footer>
        <!-- End FOOTER -->

    </div>
    <?php include('include/footer.php') ?>
            <?php if(isset($_GET['msg']))
{
     echo "<script>$('#message_modal').modal('show')</script>";
}
?>