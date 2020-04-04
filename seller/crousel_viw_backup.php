<?php
include_once('../includes/db.php');
$obj = new connection();
include('include/header.php');
include('include/nav.php')		
 ?>
 <style>
 	 .switch {
  position: relative;
  display: inline-block;
  width: 60px;
  height: 34px;
}

/* Hide default HTML checkbox */
.switch input {
  opacity: 0;
  width: 0;
  height: 0;
}

/* The slider */
.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 26px;
  width: 26px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: green;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
}

table {
    display: block;
    overflow-x: auto;
    white-space: nowrap;
}
 </style>
  <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">
<form method="post" action="php/delete_multi.php">
                        <!-- Page-Title -->
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="page-title-box">
 <div class="btn-group dropright">
  <button type="button" class="box btn btn-warning mb-3" id="box" value="check all">Select All
    <i class="fa fa-check"></i>
  </button>
  </div>
 
  <div class="btn-group dropright">
 <select class="form-control" id="cmb_status" name="cmb_satus">
   <option value="1">Active</option>
   <option value="0">In-Active</option>
 </select>
  </div>
 
  <div class="btn-group dropright">
  
      <button type="submit" name="btnsub" class="btn btn-danger">
          <i class="fa fa-trash"></i>
    </button>
 <!--  <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">
 
 </button> -->

  </div>

  <div class="btn-group dropright" style="float: right">
  <a href="crousel.php"  class="box btn btn-primary">
    Create Crousel
    <i class="fa fa-plus"></i>
  </a>
  </div>
</div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-sm-12">
                                <table class="table table-bordered table-responsive" id="tblLocations" style="overflow-x:auto;">
                                	<tr>
                                		<th style="width: 50px;" class="text-center">Select</th>
                                		<th style="width: 200px;" class="text-center">Image</th>
                                		<th class="text-center">Title</th>
                                		<th class="text-center">Url</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-center">Sunday</th>
                                    <th class="text-center" style="width: 10px;">Monday</th>
                                    <th class="text-center" style="width: 10px;">Tuesday</th>
                                    <th class="text-center" style="width: 10px;">Wednesday</th>
                                    <th class="text-center" style="width: 10px;">Thursday</th>
                                    <th class="text-center" style="width: 10px;">Friday</th>
                                		<th class="text-center" style="width: 10px;">Saturday</th>
                                    <th class="text-center">Aciton</th>
                                  </tr>

                                   <?php
                                   $rec = $obj->get_crousel();
                                    
                                    while($record = mysqli_fetch_array($rec))
                                    {
                                    $status = "";
                                   
                                    if ($record[5]=="1") 
                                    {
                                      $status = "
<label class='switch'><input type='checkbox' class='ck'  value='".$record[5]."' checked='' 
data-c_id='".$record[0]."'name='chk_status'>
                                              <span class='slider round'></span>
                                              </label>
                                              ";
                                    }
                                    else
                                    {
                                      $status = "
                                      <label class='switch'>
<input type='checkbox' value='".$record[5]."' name='chk_status' class='ck' data-c_id='".$record[0]." '>
                                              <span class='slider round'></span>
                                              </label>
                                              ";
                                    }

                                    $sunday ="";
                                    $mon ="";
                                    $tue ="";
                                    $wed ="";
                                    $thurs ="";
                                    $fri ="";
                                    $sat ="";
                                    if ($record[6]=="1") 
                                    {
                                      $sunday="Y";
                                    }
                                    else
                                    {
                                      $sunday ="N";
                                    }

                                    if ($record[6]=="1") 
                                    {
                                      $mon="Y";
                                    }
                                     else
                                    {
                                      $mon ="N";
                                    }

                                    if ($record[8]=="1") 
                                    {
                                      $tue="Y";
                                    }
                                     else
                                    {
                                      $tue ="N";
                                    }

                                    if ($record[9]=="1") 
                                    {
                                      $wed="Y";
                                    }
                                     else
                                    {
                                      $wed ="N";
                                    }

                                    if ($record[10]=="1") 
                                    {
                                      $thurs="Y";
                                    }
                                     else
                                    {
                                      $thurs ="N";
                                    }

                                    if ($record[11]=="1") 
                                    {
                                      $fri="Y";
                                    }
                                     else
                                    {
                                      $fri ="N";
                                    }

                                    if ($record[12]=="1") 
                                    {
                                      $sat="Y";
                                    }
                                     else
                                    {
                                      $sat ="N";
                                    }

                                     if ($record[13]=="1") 
                                    {
                                      $sun="Y";
                                    }
                                     else
                                    {
                                      $sun ="N";
                                    }
                                    

                                    ?>
                                    <tr>
                                      <td><input type='checkbox' value='<?php echo $record[0] ?>' name="ch[]" class='cb-element' id='check'></td>

                                      <td><img src="admin/crousel/<?php echo $record[4]?>" height='50' width="250"></td>

                                      <td><?php echo $record[1] ?></td>
                                      <td><?php echo $record[2] ?></td>
                                      <td><?php echo $status ?></td>
                                      <td style="width: 10px;"><?php echo $sunday ?></td>
                                      <td style="width: 10px;"><?php echo $mon ?></td>
                                      <td style="width: 10px;"><?php echo $tue ?></td>
                                      <td style="width: 10px;"><?php echo $wed ?></td>
                                      <td style="width: 10px;"><?php echo $thurs ?></td>
                                      <td style="width: 10px;"><?php echo $fri ?></td>
                                      <td style="width: 10px;"><?php echo $sat ?></td>
                                      <td>
<a href="update_crousel.php?<?php echo "id=". base64_encode($record[0])?>" class='btn btn-primary'><i class="fa fa-edit"></i>
                                          </a>
                                 <button type="button" class="btn btn-danger delete_record" data-id="<?php echo $record[0] ?>">
                      <i class="fa fa-trash"></i>
                    </button>
                                  </button>
                                      </td>

                                      <?php 

                                      ?>
                                    </tr>
                                    <?php } ?>
                               </table>
                                	
                                
                            </div>
                        </div>
                        <!-- end row -->
</form>

                    </div>
                    <!-- end container -->

                </div>
                <!-- end content -->
<?php include('include/footer.php'); ?>


<div class="modal fade" id="delete_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
   aria-hidden="true">
  <div class="modal-dialog modal-sm modal-notify modal-danger" role="document">
    <!--Content-->
    <div class="modal-content text-center">
      <!--Header-->
      <div class="modal-header d-flex justify-content-center">
        <p class="heading">Delete Alert<p>
      </div>

      <!--Body-->
      <div class="modal-body">

          Are your really want to delete this record?

      </div>

      <!--Footer-->
      <div class="modal-footer flex-center">
        <a href="" id="yes" class="btn  btn-danger"><i class="fa fa-trash"></i>YES</a>
        <a type="button" class="btn  btn-warning waves-effect" data-dismiss="modal"><i class="fa fa-close"></i>  YES</a>
      </div>
    </div>
    <!--/.Content-->
  </div>
</div>


</div>
<script>
  $(document).ready(function() {
  // Check and Uncheck All With Single Button
  $("#box").click(function() {
    if ($("#box").val() == "check all") {
      $(".cb-element").prop("checked", true);
      $("#box").val("uncheck all");
    } else if ($("#box").val() == "uncheck all") {
      $(".cb-element").prop("checked", false);
      $("#box").val("check all");
    }
  });

});

</script>

<!-- Delete confirmation for single delete -->

<script>
    $(document).ready(function(){
        $(".delete_record").click(function ()
        {
            var crousel_id = $(this).data('id');
            alert(crousel_id);
            var url = 'admin/delete.php/'+crousel_id;

            $("#yes").attr('href',url);

            $("#delete_modal").modal("show");

        })
    })
</script>

<!-- Delete confirmation for single delete end -->


 <!-- Toggle satus update Rameez script -->
<script>
    $(document).ready(function(){
        $('.ck').change(function(){
          var status = $(this).prop('checked') == true ? 1 : 0; 
          var id = $(this).data('c_id');
      /*    alert(status);
          alert(id);*/
          $.ajax({
                  type : "POST",
                  datatype :"JSON",
                  url  : "admin/status_update.php",
                  data :{'status':status , 'id':id},
                  success:function(data){
                    console.log(data.success);
                  }   
          });
    });
      });
</script>
<script>
        $('select').on('change',function(e){
              var check2 = document.getElementsByName('ch[]');
              var vas2 ="";

              for(var i=0, n=check2.length;i<n;i++) 
              {
                if (check2[i].checked)
                {
                   vas2 += ","+check2[i].value;
                  alert(vas2);
                }
              }
              if (vas2) vas2 = vas2.substring(1);
                  $.ajax({
                        url:"admin/multi_status_update.php/"+vas2,
                        data:{'status':vas2,'id':check2},
                        success:function(data){
                         $("#delete_modal").modal("show");

                        }
                  });


              });
</script>



<!-- Multi status update on combo box end -->