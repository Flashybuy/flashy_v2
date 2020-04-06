<?php 

/*exit();*/
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
                                        <li><a href="#">Manage Bank Detail</a></li>
                                        <li class="active">Manage Detail</li>
                                    </ol>
                                    <h4 class="page-title">Manage Bank Details <i class="fa fa-bank"></i>


                                    </h4>
                                    
                                </div>
                            </div>
                        </div>
                        <div class="row">
							<div class="col-lg-12">
								<div class="card-box">
                                    <h4 class="m-t-0 header-title"><b>
                                    	<?php
                                    	 	if ($obj->check_record($id)==true) 
                                    	 	{
                                    			echo ""; 		
                                    	 	}
                                    	 	else
                                    	 	{
                                    	 		echo "<a href='bank_detail.php' class='btn btn-success'>ADD<i class='fa fa-plus'></i></a></b></h4>";
                                    	 	}
                                    	 ?>
                                    <div class="table-responsive">
                                        <table class="table m-0">
                                            <thead>
                                                <tr>

                                    <?php
                                    $rec = $obj->get_bank_detail($id);
                                     while($fetch = mysqli_fetch_row($rec)){ ?>
                                                    <tr>
                                                    <th>Account Number</th>
                                                    <th>1</th>
                                                    </tr>
                                                    
                                                    <tr>
                                                        <th>Acount Holder Name</th>
                                                        <td><?php echo $fetch[1] ?></td>
                                                    </tr>

                                                    <tr>
                                                        <th>Account</th>
                                                        <td><?php echo $fetch[2] ?></td>
                                                    </tr>

                                                    <tr>
                                                    <th>Bank</th>
                                                    <td><?php echo $fetch[3] ?></td>
                                                    </tr>
                                                    <tr>
                                                    <th>Branch Name</th>
                                                    <td><?php echo $fetch[4] ?></td>    
                                                    </tr>
                                                    <tr>
                                                    <th>Branch Code</th>
                                                    <td><?php echo $fetch[5] ?></td>
                                                    </tr>
                                                    <tr>
                                                    <th>Action</th>
                                    <td><button type="button" id="btn_edit" class="btn btn-warning" data-bank_id="<?php echo $fetch[0] ?>"><i class="fa fa-edit"></i></button></td>
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
<div class="modal fade" id="update_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Update Bank Detail <i class="fa fa-bank"></i></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="php/update_bank_detail.php">
            <div class="row">
            <div class="col-md-12">
            <div class="form-group">
                <label>Account Holder Name</label>
                <input type="hidden" name="detail_id" value="<?php echo $fetch[0] ?>" id="id">
                <input type="hidden" name="user_id" id="user_id">
                <input type="text" name="acount_holder" id="acount_holder" class="form-control">
            </div>

             <div class="form-group">
                <label>Account Number</label>
                <input type="text" name="ac_no" id="ac_no" class="form-control">
            </div>

             <div class="form-group">
                <label>Bank</label>
                <input type="text" name="bank" id="bank" class="form-control">
            </div>

             <div class="form-group">
                <label>Branch Name</label>
                <input type="text" name="branch_name" id="branch_name" class="form-control">
            </div>

             <div class="form-group">
                <label>Branch Code</label>
                <input type="text" name="branch_code" id="branch_code" class="form-control">
            </div>
                 <div class="modal-footer">
        
        <button style="float: left;" type="submit" name="btn_sub" class="btn btn-warning">Update Bank Details <i class="fa fa-bank"></i></button>
      </div>
            </div>
        </div>
        </div>
        </form>
      </div>
     
    </div>
  </div>
</div>


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


<?php include('include/footer.php') ?>
<script>
        $(document).ready(function(){
                $("#btn_edit").click(function(){
                        var b_id = $(this).data("bank_id");
                        $.ajax({
                                url:"php/edit_bank.php/"+b_id,
                                method :"POST",
                                data:{
                                      b_id:b_id
                                },
                                success:function(responce)
                                {
                                   var result = $.parseJSON(responce);
                                $("#ac_no").val(result.account_number);
                                $("#acount_holder").val(result.acount_holder);
                                $("#bank").val(result.bank);
                                $("#branch_name").val(result.branch_name);
                                $("#branch_code").val(result.branch_code);
                                $("#id").val(result.id);
                                $("#user_id").val(result.user_id);
                                $("#update_modal").modal("show");     
                                }


                        });

                });

        });

</script>