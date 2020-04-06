<?php 

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
                                <li><a href="#">Manage Banks</a></li>
                                <li class="active">Bank Details</li>
                            </ol>
                            <h4 class="page-title">Bank Details <i class="fa fa-bank"></i></h4>

                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="card-box">

                            <div class="row">
                               
                                <div class="col-md-6 col-md-offset-3">
                                 
                                    <form class="form-horizontal" id="details" name="details" method="post" role="form" action="php/bank_detail.php">
                                        
                                        <div class="form-group">
                                            <label class="col-md-2 control-label" for="example-email">Bank</label>
                                            <div class="col-md-10">
                                                <input type="text" id="bank" name="bank" class="form-control" placeholder="Bank">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-2 control-label">Account Name</label>
                                            <div class="col-md-10">
                                                <input type="hidden" name="txtid" value="<?php echo $_SESSION['id'] ?>">
                                                <input type="text" class="form-control" placeholder="Account Holder" id="acount_holder" name="acount_holder">
                                            </div>
                                        </div>
                                        

                                        <div class="form-group">
                                            <label class="col-md-2 control-label">Account Number</label>
                                            <div class="col-md-10">
                                                <input type="text" placeholder="Account Number" name="ac_no" id="ac_no" class="form-control">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-2 control-label">Branch Name</label>
                                            <div class="col-md-10">
                                                <input type="text" placeholder="Branch Name" name="branch" id="branch" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">Branch Code</label>
                                            <div class="col-md-10">
                                         <input type="text" class="form-control" placeholder="placeholder" id="branch_code" name="branch_code">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <input type="submit" id="btnsub" name="btnsub" class="btn btn-success" value="Save Details">
                                        </div>
<div id="result" class="alert alert-danger" style="display: none;"></div>
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
<script>
         $(document).ready(function(){
                $("#acount_holder").keyup(function(){
                    var reg_name =/^[a-zA-Z 0-9 ]+$/;
                    if (reg_name.test($("#acount_holder").val()))
                    {
                    $("#acount_holder").closest('.form-group').removeClass('has-error');
                    $("#acount_holder").closest('.form-group').addClass('has-success');
                    }
                    else
                    {
                     $("#acount_holder").closest('.form-group').addClass('has-error');   
                    }
                    
                });       
    
               
                $("#bank").keyup(function(){
                    var reg_bank =/^[a-zA-Z ]+$/;
                    if (reg_bank.test($("#bank").val()))
                    {
                    $("#bank").closest('.form-group').removeClass('has-error');
                    $("#bank").closest('.form-group').addClass('has-success');
                    }
                    else
                    {
                     $("#bank").closest('.form-group').addClass('has-error');   
                    }
                    
                });


                $("#ac_no").keyup(function(){
                    var reg_ac_no =/^[0-9]+$/;
                    if (reg_ac_no.test($("#ac_no").val()))
                    {
                    $("#ac_no").closest('.form-group').removeClass('has-error');
                    $("#ac_no").closest('.form-group').addClass('has-success');
                    }
                    else
                    {
                     $("#ac_no").closest('.form-group').addClass('has-error');   
                    }
                    
                });

                

 
                $("#branch").keyup(function(){
                    var reg_branch =/^[a-zA-Z ]+$/;
                    if (reg_branch.test($("#branch").val()))
                    {
                    $("#branch").closest('.form-group').removeClass('has-error');
                    $("#branch").closest('.form-group').addClass('has-success');
                    }
                    else
                    {
                     $("#branch").closest('.form-group').addClass('has-error');   
                    }
                    
                });
                 
                $("#branch_code").keyup(function(){
                    var reg_code =/^[0-9]+$/;
                    if (reg_code.test($("#branch_code").val()))
                    {
                    $("#branch_code").closest('.form-group').removeClass('has-error');
                    $("#branch_code").closest('.form-group').addClass('has-success');
                    }
                    else
                    {
                     $("#branch_code").closest('.form-group').addClass('has-error');   
                    }
                    
                });
                $("#btnsub").click(function(event){
                        event.preventDefault();
                        var formdata  = $("#details").serialize();
                        console.log(formdata);
                        $.ajax({
                            url : 'php/bank_detail.php',
                            method: 'post',
                            data : formdata + '&action=btnsub'
                        }).done(function(result){
                                 $(".alert").show();
                                $("#result").html(result);
                                
                        });
                });
             
 });



</script>