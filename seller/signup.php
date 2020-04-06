<?php 
include('../includes/db.php');
	$obj = new connection();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
        <meta name="author" content="Coderthemes">


        <link rel="shortcut icon" href="assets/images/favicon_1.ico">

        <title>Flash Buy</title>

        <link href="../plugins/switchery/switchery.min.css" rel="stylesheet" />
        <link href="../plugins/jquery-circliful/css/jquery.circliful.css" rel="stylesheet" type="text/css" />

        <link href="../admin/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="../admin/assets/css/core.css" rel="stylesheet" type="text/css">
        <link href="../admin/assets/css/icons.css" rel="stylesheet" type="text/css">
        <link href="../admin/assets/css/components.css" rel="stylesheet" type="text/css">
        <link href="../admin/assets/css/pages.css" rel="stylesheet" type="text/css">
        <link href="../admin/assets/css/menu.css" rel="stylesheet" type="text/css">
        <link href="../admin/assets/css/responsive.css" rel="stylesheet" type="text/css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script type="text/javascript" src="http://ajax.microsoft.com/ajax/jquery.validate/1.7/jquery.validate.js"></script>

<!-- Latest compiled JavaScript -->
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

        <script src="../admin/assets/js/validation.js"></script>

        <script src="assets/js/modernizr.min.js"></script>

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->

        
    </head>
    <body>


        <div class="wrapper-page">

            <div class="text-center">
                <a href="#" class="logo-lg"><i class="md md-equalizer"></i> <span>Flashy Buy</span> </a>
            </div>

            <form class="form-horizontal m-t-20" id="form_register" method="post" action="php/signup.php">
                <div class="form-group">
                    <div class="col-xs-12">
                        
                        <input class="form-control" type="text" id="firstname" name="firstname"placeholder="Firstname" tabindex="1">
                        <span id="lblError" class="text-danger"></span>
                        <p id="lbl_error"></p>

                        <i class="fa fa-user form-control-feedback l-h-34"></i>
                    </div>
                </div>


                 <div class="form-group">
                    <div class="col-xs-12">
                        
                        <input class="form-control" type="text"  id="lastname" name="lastname" placeholder="Lastname">
                        <span id="lastname" class="text-danger"></span>
                        <i class="fa fa-user form-control-feedback l-h-34"></i>
                    </div>
                </div>

                 <div class="form-group">
                    <div class="col-xs-12">
                        
                        <input class="form-control" type="text"  id="shp_name" name="shp_name" placeholder="Shop Name">
                        <span id="lastname" class="text-danger"></span>
                        <i class="fa fa-user form-control-feedback l-h-34"></i>
                    </div>
                </div>


                 <div class="form-group">
                    <div class="col-xs-12">
                        
                        <input class="form-control" type="email" id="email" name="email" onblur="checkMailStatus()"  placeholder="Email">
                              <span id="availability"></span>

                        <i class="fa fa-envelope form-control-feedback l-h-34"></i>
                    </div>
                </div>


                <div class="form-group">
                    <div class="col-xs-6">



                        <input class="form-control" type="text" data-mask="+27 000 000" id="mobile_number" name="mobile_number"  placeholder="Cell Phone Number (optional)">
                        <i class="fa fa-mobile form-control-feedback l-h-34"></i>
                    </div>

                    <div class="col-xs-6">
                        <input class="form-control" type="text"  id="phone_number" name="phone_number" placeholder="Phone Number (optional)">
                        <i class="fa fa-phone form-control-feedback l-h-34"></i>
                    </div>
                </div>
                <br>
                <h4>Tell us about your business</h4>

               
                  <div class="form-group">
                    <div class="col-xs-12">
                        
                        <input class="form-control" type="text"  id="company" name="company" placeholder="Company Name">
                          <span id="lblcompany" class="text-danger"></span>
                        <i class="fa fa-bank form-control-feedback l-h-34"></i>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-12">
                        
                        <select name="category" id="category" class="form-control">
                        	<option value="">Select Category</option>
                        	<?php 
                        		$rec = $obj->get_cat();
                        		while ($fetch= mysqli_fetch_array($rec)) 
                        		{
                        			echo "<option value='$fetch[0]'>$fetch[1]</option>";
                        		}
                        	?>

                        </select>
                        <i class="fa fa-list form-control-feedback l-h-34"></i>
                    </div>
                </div>

                 <div class="form-group">
                    <div class="col-xs-12">
                        
                        <input class="form-control" name="web" type="text" placeholder="Website">
                        <i class="fa fa-globe form-control-feedback l-h-34"></i>
                    </div>
                </div>

                   <div class="form-group">
                    <div class="col-xs-12">
                        
                        <input class="form-control" name="s_media" type="text"  placeholder="Social Media">
                        <i class="fa fa-circle form-control-feedback l-h-34"></i>
                    </div>
                </div>


               <div class="form-group">
                    <div class="col-xs-12">
                        <label>Are you VAT registered?</label><br>
                      <div class="radio">
                      <input type="radio" name="radio1" id="radio11" value="YES" >
                      <label for="radio11">
                      YES
                      </label>
                      </div>

                      <div class="radio">
                      <input type="radio" name="radio1" id="radio11" value="NO" >
                      <label for="radio11">
                      NO
                      </label>
                      </div>
                    </div>
                </div>

                <div class="form-group" style="display:none" id="vat">
                    <div class="col-xs-12">
                        
                        <input class="form-control" name="v_number" type="text"  placeholder="Vat Number">
                        <i class="fa fa-gg-circle form-control-feedback l-h-34"></i>
                    </div>
                </div>


                 <div class="form-group">
                    <div class="col-xs-12">
                        <label>Monthly Revenue</label><br>
                      <div class="radio">
                      
                      <input type="radio" name="r_amount" id="r_amount" value="YES" >
                      <label for="radio11">
                      Less than R20k
                      </label>
                      </div>

                     <div class="radio">
                      <input type="radio" name="r_amount" id="r_amount" value=" R20k - R50k" >
                      <label for="radio11">
                      R20k - R50k
                      </label>
                      </div>

                       <div class="radio">
                      <input type="radio" name="r_amount" id="r_amount" value=" R50k - R100k" >
                      <label for="radio11">
                      R50k - R100k
                      </label>
                      </div>

                       <div class="radio">
                      <input type="radio" name="r_amount" id="r_amount" value=" R100 - R500k" >
                      <label for="radio11">
                      R100 - R500k
                      </label>
                      </div>

                       <div class="radio">
                      <input type="radio" name="r_amount" id="r_amount" value="More than R500k" >
                      <label for="radio11">
                      More than R500k
                      </label>
                      </div>

                       <div class="radio">
                      <input type="radio" name="r_amount" id="r_amount" value=" Less than R20k" >
                      <label for="radio11">
                      Less than R20k
                      </label>
                      </div>
                    </div>
                </div>


                 <div class="form-group">
                    <div class="col-xs-12">
                      <label>Business Registration Number</label>  
             <input class="form-control" type="text"  name="b_number" id="b_number" placeholder="Business Registration Number">
                  </div>
                </div>


                <div class="form-group text-right m-t-20">
                	<div class="col-xs-12">
                		<textarea class="form-control" name="extra_comment" placeholder="Do you have any additional comments?" style="height:90px; resize: none;"></textarea>
                </div>

                
                    
                    
                        <button style="margin-top: 20px; margin-right: 120px;" class="btn btn-primary btn-custom waves-effect waves-light w-md" id="btnsub" name="btnsub" type="submit">Apply To Sell</button>
                    
                


            </form>
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

      <p>Account Created Succssfullt</p>

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





<script type="text/javascript">
function checkMailStatus(){
    //alert("came");
var email=$("#email").val();// value in field email
$.ajax({
    type:'post',
        url:'php/check.php',// put your real file name 
        data:{email: email},
        success:function(msg){
        $("#availability").html(msg)
        }
 });
}

</script>



<?php if(isset($_GET['msg']))
{
	 echo "<script>$('#message_modal').modal('show')</script>";
}
?>
        
    	<script>
            var resizefunc = [];
        </script>

        <!-- Main  -->
        <script src="../admin/assets/js/bootstrap.min.js"></script>
        <script src="../admin/assets/js/detect.js"></script>
        <script src="../admin/assets/js/fastclick.js"></script>
        <script src="../admin/assets/js/jquery.slimscroll.js"></script>
        <script src="../admin/assets/js/jquery.blockUI.js"></script>
        <script src="../admin/assets/js/waves.js"></script>
        <script src="../admin/assets/js/wow.min.js"></script>
        <script src="../admin/assets/js/jquery.nicescroll.js"></script>
        <script src="../admin/assets/js/jquery.scrollTo.min.js"></script>

        <!-- Custom main Js -->
        <script src="../admin/assets/js/jquery.core.js"></script>
        <script src="../admin/assets/js/jquery.app.js"></script>
	<script>
	$("input[type='radio']").change(function(){

   if($(this).val()=="YES")
   {
      $("#vat").show();
   }
   else
   {
       $("#vat").hide(); 
   }

});

	</script>
	</body>
</html>