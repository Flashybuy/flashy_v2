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
                                 
                                    <form class="form-horizontal" id="details" name="details" id="details" method="post" role="form" action="php/shop_detail.php">
                                        <div class="form-group">
                                            <div class="col-md-6 col-md-offset-3">
                                               
                                                <label>Address</label>
                                                <textarea name="address" class="form-control" placeholder="Enter Your Address" style="resize:none;" id="address"></textarea>
                                            </div>
                                            </div>
                                           <div class="form-group">
                                            <div class="col-md-6 col-md-offset-3">
                                               
                                                <label>Street</label>
                                                <input type="text" name="street" id="street" class="form-control" placeholder="Enter Your Street">
                                            </div>
                                            </div>
                                        <div class="form-group">
                                            <div class="col-md-6 col-md-offset-3">
                                              
                                                <label>Rout</label>
                                                <input type="text" name="rout" id="rout" class="form-control" placeholder="Enter Your rout">
                                            </div>
                                            </div>
                                         <div class="form-group">
                                         <div class="row">
                                          
                                            <div class="col-md-6 col-md-offset-3">
                                                <label>State</label>
                                                <input type="text" name="state" class="form-control" placeholder="Enter Your State" style="resize:none;" id="state">
                                            </div>
                                            </div>

                                            </div>

                                             <div class="form-group">
                                            <div class="col-md-6 col-md-offset-3">
                                               
                                                <label>Subrub </label>
                                                <input type="text" name="Subrub" id="subrub" class="form-control" placeholder="Enter Your Subrub ">
                                            </div>
                                            </div>

                                             <div class="form-group">
                                            <div class="col-md-6 col-md-offset-3">
                                               
                                                <label>Postal Code</label>
                                                <input type="text" name="postal_code" placeholder="Enter Your Postal Code" id="postal_code" class="form-control">
                                            </div>
                                            </div> 

                                             <div class="form-group">
                                            <div class="col-md-6 col-md-offset-3">
                                              
                                                <label>Country </label>
                                                <input type="text" name="country" id="country" class="form-control" placeholder="Enter Your Country">
                                            </div>
                                            </div>


                                             <div class="form-group">
                                             <div class="col-md-6 col-md-offset-3">
                                               
                                                <label>City</label>
                                                <input type="text" name="city" placeholder="Enter Your City" id="city" class="form-control">
                                            </div>
                                            </div> 

                                            <input type="hidden" name="user_id" value="<?php echo $_SESSION['id'] ?>">
                                            
                                           <div class="col-md-6 col-md-offset-3">
                                            <button type="submit" style="margin-top: 20px;" class="btn btn-success" id="btnsub" name="btnsub"><i class="fa fa-plus"></i> Shop Detail</button>
                                           </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="result" class="alert alert-danger col-md-6 col-md-offset-3" style="display: none;"></div>
        <!-- end content -->

        <!-- FOOTER -->
      
        <!-- End FOOTER -->

    </div>
    <script>
         $(document).ready(function(){
                $("#address").keyup(function(){
                    var reg_address =/^[a-zA-Z ]+$/;
                    if (reg_address.test($("#address").val()))
                    {
                    $("#address").closest('.form-group').removeClass('has-error');
                    $("#address").closest('.form-group').addClass('has-success');
                    }
                    else
                    {
                     $("#address").closest('.form-group').addClass('has-error');   
                    }
                    
                });       
    
                $("#street").keyup(function(){
                    var reg_street =/^[a-zA-Z ]+$/;
                    if (reg_street.test($("#street").val()))
                    {
                    $("#street").closest('.form-group').removeClass('has-error');
                  $("#street").closest('.form-group').addClass('has-success');
                    }
                    else
                    {
                     $("#street").closest('.form-group').addClass('has-error');   
                    }
                    
                });

                $("#subrub").keyup(function(){
                    var reg_subrub =/^[a-zA-Z ]+$/;
                    if (reg_subrub.test($("#subrub").val()))
                    {
                    $("#subrub").closest('.form-group').removeClass('has-error');
                  $("#subrub").closest('.form-group').addClass('has-success');
                    }
                    else
                    {
                     $("#subrub").closest('.form-group').addClass('has-error');   
                    }
                    
                });

                $("#rout").keyup(function(){
                    var reg_rout =/^[a-zA-Z ]+$/;
                    if (reg_rout.test($("#rout").val()))
                    {
                    $("#rout").closest('.form-group').removeClass('has-error');
                    $("#rout").closest('.form-group').addClass('has-success');
                    }
                    else
                    {
                     $("#rout").closest('.form-group').addClass('has-error');   
                    }
                    
                });
 
                $("#postal_code").keyup(function(){
                    var reg_postal =/^[0-9]+$/;
                    if (reg_postal.test($("#postal_code").val()))
                    {
                    $("#postal_code").closest('.form-group').removeClass('has-error');
                    $("#postal_code").closest('.form-group').addClass('has-success');
                    }
                    else
                    {
                     $("#postal_code").closest('.form-group').addClass('has-error');   
                    }
                    
                });
                 
                $("#country").keyup(function(){
                    var country_reg =/^[a-zA-Z ]+$/;
                    if (country_reg.test($("#country").val()))
                    {
                    $("#country").closest('.form-group').removeClass('has-error');
                    $("#country").closest('.form-group').addClass('has-success');
                    }
                    else
                    {
                     $("#country").closest('.form-group').addClass('has-error');   
                    }
                    
                });


                    $("#city").keyup(function(){
                    var city_reg =/^[a-zA-Z ]+$/;
                    if (city_reg.test($("#city").val()))
                    {
                    $("#city").closest('.form-group').removeClass('has-error');
                    $("#city").closest('.form-group').addClass('has-success');
                    }
                    else
                    {
                     $("#city").closest('.form-group').addClass('has-error');   
                    }
                    
                });




                $("#btnsub").click(function(event){
                        event.preventDefault();
                        var formdata  = $("#details").serialize();
                        console.log(formdata);
                        $.ajax({
                            url : 'php/shop_detail.php',
                            method: 'post',
                            data : formdata + '&action=btnsub'
                        }).done(function(result){
                                 $(".alert").show();
                                $("#result").html(result);
                                
                        });
                });
             
 });



</script>
    <?php include('include/footer.php') ?>
            <?php if(isset($_GET['msg']))
{
     echo "<script>$('#message_modal').modal('show')</script>";
}
?>
