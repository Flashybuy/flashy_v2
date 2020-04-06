<?php 
include_once('../includes/db.php');
    include('include/header.php');
    include('include/nav.php');
$obj = new connection();
$edit = mysqli_query($obj->connect(),"select * from vendor where id = ".$_SESSION['id']." ");  
$fetch = mysqli_fetch_array($edit);

    
?>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>

    <div class="content-page">
        <!-- Start content -->
        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-title-box">
                            <ol class="breadcrumb pull-right">
                                <li><a href="dashboard.php">flashy buy</a></li>
                                <li><a href="#">Manage User</a></li>
                                <li class="active">Vender Profile</li>
                            </ol>
                            <h4 class="page-title">Profile <i class="fa fa-user"></i></h4>

                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="card-box">
                            <div class="row">
                                <div class="col-md-12">
                                    <form class="form-horizontal" id="details" name="details" method="post" enctype="multipart/form-data" role="form" action="php/update_profile.php">

                                        <div class="row">

                                            <div class="col-md-4">
                                                <label>Name</label>
                                                <input type="text" name="name" id="name" class="form-control" value="<?php echo $fetch[1] ?>">
                                            </div>

                                            <div class="col-md-4">
                                                <label>Lastname</label>
                                                <input type="text" name="lastname" id="lastname" class="form-control" value="<?php echo $fetch[2] ?>">
                                            </div>

                                            <div class="col-md-4">
                                                <label>Shop Name</label>
                                                <input type="text" name="shop_name" id="shop_name" class="form-control" value="<?php echo $fetch[3] ?>">
                                            </div>

                                           
                                        </div>

                                         <div class="row">
                                            <div class="col-md-4">
                                                <label>Email</label>
                                                <input type="text" name="email" class="form-control" id="email" value="<?php echo $fetch[4] ?>">
                                            </div>

                                            

                                            <div class="col-md-4">
                                                <label>Cell Phone</label>
                                                <input type="text" name="mobile" id="mobile" class="form-control" value="<?php echo $fetch[6]?>">
                                            </div>

                                            <div class="col-md-4">
                                                <label>Phone Number</label>
                                                <input type="text" name="phone"  id="phone" class="form-control" value="<?php echo $fetch[7] ?>">
                                            </div> 
                                            
                                        </div>

                                            <div class="col-md-4">
                                                <label>Company </label>
                                                <input type="text" name="company" id="company" class="form-control" value="<?php  echo $fetch[8]?>">
                                            </div>

                                             <div class="col-md-4">
                                                <label>Category Type</label>
                                                <select class="form-control" name="cmb_cat" id="cmb_cat">
                                                    <option><?php echo $fetch[9] ?></option>
                                                </select>
                                            </div> 

                                            <div class="col-md-4">
                                                <label>Website</label>
                                                <input type="text" name="website" class="form-control" value="<?php echo $fetch[10] ?>">
                                            </div> 

                                             <div class="row">
                                                    <div class="col-md-4">
                                                    <label>Social</label>
                                                    <input type="text" name="social" id="social" value="<?php echo $fetch[11] ?>" class="form-control">
                                                    </div>

                                                    <div class="col-md-4">
                                                    <label>VAT</label>
                                                    <input type="text" name="vat" id="vat" value="<?php echo $fetch[12] ?>" class="form-control">
                                                    </div>

                                                     <div class="col-md-4">
                                                    <label>Monthly Revenue</label>
                                                    <input type="text" name="month_rev" id="month_red" value="<?php echo $fetch[13] ?>" class="form-control">
                                                    </div>

                                                     

                                             </div>  

                                              <div class="row">
                                                <div class="col-md-4">
                                                    <label>Business Registration Number</label>
                                                    <input type="text" name="bs_number" id="bs_number" value="<?php echo $fetch[13] ?>" class="form-control">
                                                    </div>

                                                    <div class="col-md-4">
                                                    <label>Additional Comment</label>
                                                    <textarea class="form-control" style="resize: none" name="add_comnt" id="add_comnt"><?php echo $fetch[16] ?></textarea>
                                                    </div>

                                                    <div class="col-md-4">
                                                    <label>Country</label>
                                                    <input type="text" class="form-control" name="country" id="country" value="<?php echo $fetch[18] ?>" readonly="">
                                                    </div>

                                                    

                                                   

                                             </div>   

                                             <div class="row">
                                                <div class="col-md-4">
                                                    <label>UPload Image</label>
                                                    <input type="file" name="image" class="form-control" id="profile-img">
                                                    </div>
                                             </div>

                                            <input type="hidden" name="user_id" value="<?php echo $_SESSION['id'] ?>">
                                            
                                           <div class="col-md-4">
                                            <button type="submit" style="margin-top: 20px;" class="btn btn-success" name="btnsub"><i class="fa fa-user"></i> Update Profile</button>
                                           </div>
                                            <img src="" id="profile-img-tag" width="200px" class="img-responsive" />
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

      <p>Profile Update successfully</p>

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

    </div>
    <?php include('include/footer.php') ?>
            <?php if(isset($_GET['msg']))
{
     echo "<script>$('#message_modal').modal('show')</script>";
}
?>

<script type="text/javascript">
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $('#profile-img-tag').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $("#profile-img").change(function(){
        readURL(this);
    });
</script>