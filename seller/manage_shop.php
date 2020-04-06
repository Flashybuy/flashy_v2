<?php 
include_once('../includes/db.php');
$obj = new connection();
include('include/header.php');
include('include/nav.php');
$id = $_SESSION['id'];
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
                                        <li><a href="#">Flashy Buy</a></li>
                                        <li><a href="#">Manage Shop Detail</a></li>
                                        <li class="active">Manage Detail</li>
                                    </ol>
                                    <h4 class="page-title">Manage Shop Details <i class="fa fa-bank"></i></h4>
                                </div>
                            </div>
                        </div>
                        <div class="row">
							<div class="col-lg-12">
								<div class="card-box">
                                   <?php
                                            if ($obj->check_shop($id)==true) 
                                            {
                                                echo "";        
                                            }
                                            else
                                            {
                                                echo "<a href='shop_detail.php' class='btn btn-success'>ADD<i class='fa fa-plus'></i></a></b></h4>";
                                            }
                                         ?>
                                    <div class="table-responsive">
                                        <table class="table m-0">
                                            <thead>
                                                <tr>

                                    <?php
                                    $rec = $obj->get_shop_detail($id);
                                     while($fetch = mysqli_fetch_array($rec)){ ?>
                                                    <tr>
                                                    <th>S.No</th>
                                                    <th>1</th>
                                                    </tr>
                                                    
                                                    <tr>
                                                        <th>Address</th>
                                                        <td><?php echo $fetch[1] ?></td>
                                                    </tr>

                                                    <tr>
                                                    <th>Street</th>
                                                    <td><?php echo $fetch[2] ?></td>
                                                    </tr>
                                                    <tr>
                                                    <th>Rout</th>
                                                    <td><?php echo $fetch[3] ?></td>    
                                                    </tr>
                                                    <tr>
                                                    <th>State</th>
                                                    <td><?php echo $fetch[4] ?></td>
                                                    </tr>
                                                     <tr>
                                                    <th>Subrub</th>
                                                    <td><?php echo $fetch[5] ?></td>
                                                    </tr>
                                                     <tr>
                                                    <th>Postal Code</th>
                                                    <td><?php echo $fetch[6] ?></td>
                                                    </tr>
                                                     <tr>
                                                    <th>Country</th>
                                                    <td><?php echo $fetch[7] ?></td>
                                                    </tr>
                                                    <th>City</th>
                                                    <td><?php echo $fetch[8] ?></td>
                                                    </tr>
                                                     <tr>
                                                    <tr>
                                                    <th>Action</th>
                                    <td><button type="button" data-shop_id="<?php echo $fetch[0] ?>" id="btn_edit" class="btn btn-warning edit"><i class="fa fa-edit"></i></button></td>
                                                    </tr>
                                            </thead>
                                                <?php }?>
                                         <tbody>
                                          
                                        </table>
                                    </div>
								</div>
							</div>
						</div>
                    </div>
                    <!-- end container -->
                </div>
                <!-- end content -->

<!-- Update Modal -->



<!-- Modal -->



<!-- Update Modal End -->
                <!-- FOOTER -->
                <footer class="footer text-right">
                    2017 © Minton.
                </footer>
                <!-- End FOOTER -->

            </div>

            <div class="modal fade" id="message_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-sm modal-notify modal-danger" role="document">
    <!--Content-->
    <div class="modal-content text-center">
      <!--Header-->
      <div class="modal-header d-flex justify-content-center">
        <p class="heading">Warning Message</p>
      </div>

      <!--Body-->
      <div class="modal-body">

      <p>Your Are already enter bank detail..!</p>

      </div>

      <!--Footer-->
      <div class="modal-footer flex-center">
        
        <a type="button" class="btn  btn-success waves-effect" data-dismiss="modal">Ok</a>
      </div>
    </div>
    <!--/.Content-->
  </div>
</div>




</script>
<?php include('include/footer.php') ?>

<div class="modal fade" id="update_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Update Shop Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
            <div class="col-md-12">
                <form method="post" action="php/update_details.php">
                <div class="form-group">
                    <input type="hidden" id="id" name="id" value="<?php echo $fetch[0] ?>">
                    <label>Address</label>
                    <input type="text" class="form-control" name="adress" id="address">
                </div>

                <div class="form-group">
                    <label>Street</label>
                    <input type="text" name="street" id="street" class="form-control">
                </div>

                <div class="form-group">
                    <label>Rout</label>
                    <input type="text" name="rout" id="rout" class="form-control">
                </div>

                <div class="form-group">
                    <label>State</label>
                    <input type="text" name="state" id="state" class="form-control">
                </div>

                <div class="form-group">
                    <label>Subrub</label>
                    <input type="text" name="subrub" id="subrub" class="form-control">
                </div>

                <div class="form-group">
                    <label>Postal Code</label>
                    <input type="text" name="postal_code" id="postal_code" class="form-control">
                </div>

                <div class="form-group">
                    <label>Country</label>
                    <input type="text" name="country" id="country" class="form-control">
                </div>

                <div class="form-group">
                    <label>City</label>
                    <input type="text" name="city" id="city" class="form-control">
                </div>



            </div>


        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="btn_sub" class="btn btn-primary">Update Changes</button>
      </div>
  </form>
    </div>
  </div>
</div>


<script>
        $(document).ready(function(){
                $("#btn_edit").click(function(){
                        var s_id = $(this).data("shop_id");
                        $.ajax({
                                url:"php/fetch_details.php/"+s_id,
                                method : "POST",
                                data:{
                                    s_id:s_id
                                },
                                success:function(responce)
                                {
                                   var result = $.parseJSON(responce);
                                $("#address").val(result.address);
                                $("#street").val(result.street);
                                $("#rout").val(result.rout);
                                $("#state").val(result.state);
                                $("#subrub").val(result.subrub);
                                $("#postal_code").val(result.postal_code);
                                $("#country").val(result.country);
                                $("#city").val(result.city);
                                $("#user_id").val(result.user_id);
                                $("#id").val(result.id);
                                $("#update_modal").modal("show");     
                                }


                        });

                });

        });

</script>