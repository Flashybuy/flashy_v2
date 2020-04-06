<?php 
	include('include/header.php');
?>
<div class="ps-page--my-account">
      <div class="ps-breadcrumb">
        <div class="container">
          <ul class="breadcrumb">
            <li><a href="index.html">Home</a></li>
            <li>My account</li>
          </ul>
        </div>
      </div>
      <div class="ps-my-account">
        <div class="container">
          <form class="ps-form--account ps-tab-root" name="signup" id="signup" action="php/signup.php" method="post">
            <ul class="ps-tab-list">
              <li class="active"><a href="#">Register</a></li>
            </ul>
            <div class="ps-tabs">
              <div class="" id="">
                <div class="ps-form__content">
                  <h5>Register An Account</h5>
                  <div class="form-group">
                    <input class="form-control" id="name" name="name" type="text" placeholder="Enter Name">
                  </div>
                  <div class="form-group">
                    <input class="form-control" id="email" name="email" type="email" placeholder="enter Email Address">
                  </div>

                  <div
                   class="form-group">
                    <input class="form-control" id="password" name="password" type="password" placeholder="enter Email Address">
                  </div>

                  <div class="form-group submtit">
                    <button type="submit" name="btnsub" id="btnsub" class="ps-btn ps-btn--fullwidth">Login</button>
                  </div>
                </div>
                <div class="alert alert-primary" style="display: none;" id="result"></div>
                <div class="ps-form__footer">
                  <p>Connect with:</p>
                  <ul class="ps-list--social">
                    <li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
                    <li><a class="google" href="#"><i class="fa fa-google-plus"></i></a></li>
                    <li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
                    <li><a class="instagram" href="#"><i class="fa fa-instagram"></i></a></li>
                  </ul>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>

    <?php include('include/footer.php'); ?>
 
  <script>
         $(document).ready(function(){
                $("#acount_holder").keyup(function(){
                    var reg_name =/^[a-zA-Z ]+$/;
                    if (reg_name.test($("#name").val()))
                    {
                    $("#name").closest('.form-group').removeClass('has-error');
                    $("#name").closest('.form-group').addClass('has-success');
                    }
                    else
                    {
                     $("#name").closest('.form-group').addClass('has-error');   
                    }
                    
                });       
    
               
                $("#email").keyup(function(){
                    var email =/^[+a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/i;
                    if (email.test($("#email").val()))
                    {
                    $("#email").closest('.form-group').removeClass('has-error');
                    $("#email").closest('.form-group').addClass('has-success');
                    }
                    else
                    {
                     $("#email").closest('.form-group').addClass('has-error');   
                    }
                    
                });


                $("#password").keyup(function(){
                    var reg_ac_no =/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/;
                    if (reg_ac_no.test($("#password").val()))
                    {
                    $("#password").closest('.form-group').removeClass('has-error');
                    $("#password").closest('.form-group').addClass('has-success');
                    }
                    else
                    {
                     $("#password").closest('.form-group').addClass('has-error');   
                    }
                    
                });
                $("#btnsub").click(function(event){
                        event.preventDefault();
                        var formdata  = $("#signup").serialize();
                        console.log(formdata);
                        $.ajax({
                            url : 'php/signup.php',
                            method: 'post',
                            data : formdata + '&action=btnsub'
                        }).done(function(result){
                                 $(".alert").show();
                                $("#result").html(result);
                                
                        });
                });
             
 });



</script>