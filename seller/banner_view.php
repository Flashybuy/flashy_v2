<?php include('include/header.php');
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
 </style>
  <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">

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
 <select class="form-control">
   <option>Active</option>
   <option>In-Active</option>
 </select>
  </div>

  <div class="btn-group dropright">
  <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">
 <i class="fa fa-trash"></i>
 </button>
  </div>


  <div class="btn-group dropright" style="float: right">
  <a href="banner.php"  class="box btn btn-primary">
    Create Banner
    <i class="fa fa-plus"></i>
  </a>
  </div>
</div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-sm-12">
                                <table class="table table-bordered" id="tblLocations">
                                	<tr>
                                		<th style="width: 50px;" class="text-center">Select</th>
                                		<th style="width: 200px;" class="text-center">Image</th>
                                		<th class="text-center">Title</th>
                                		<th class="text-center">Url</th>
                                		<th class="text-center">Status</th>
                                    <th class="text-center">Aciton</th>
                                  </tr>

                                	<tr>
                                		<td><input type="checkbox" name="ch" class="cb-element" id="check"></td>
                                		<td><img src="img/1.jpg" width="200" class="img-responsive"></td>
                                		<td class="text-center">Bedroom set</td>
                                		<td class="text-center">https://www.google.com</td>
                                		<td class="text-center">
                                     <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">
                                        <i class="fa fa-trash"></i>
                                      </button>

                                      <button type="button" class="btn btn-warning">
                                        <i class="fa fa-edit"></i>
                                      </button>

                                    </td>
                                			<td>
                                				<label class="switch">
  										<input type="checkbox" checked="">
  										<span class="slider round"></span>
										</label>
                                			</td>

                                	</tr>

                                  <tr>
                                    <td><input type="checkbox" name="ch" class="cb-element" id="check"></td>
                                    <td><img src="img/1.jpg" width="200" class="img-responsive"></td>
                                    <td class="text-center">Bedroom set</td>
                                    <td class="text-center">https://www.google.com</td>
                                    <td class="text-center">
                                     <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">
                                        <i class="fa fa-trash"></i>
                                      </button>

                                      <button type="button" class="btn btn-warning">
                                        <i class="fa fa-edit"></i>
                                      </button>
                                    </td>
                                      <td>
                                        <label class="switch">
                      <input type="checkbox" checked="">
                      <span class="slider round"></span>
                    </label>
                                      </td>

                                  </tr>

                                	
                                </table>
                                	
                                
                            </div>
                        </div>
                        <!-- end row -->


                    </div>
                    <!-- end container -->

                </div>
                <!-- end content -->
<?php include('include/footer.php'); ?>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete Alert</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <h4 class="text-danger text-center">Are You sure Delete this item?</h4>
        <center><h3 class="text-danger"><i class="fa fa-trash"></i></h3></center>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">NO</button>
        <button type="button" class="btn btn-danger">YES</button>
      </div>
    </div>
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

<script>
    
      $("table tbody").sortable( {
  update: function( event, ui ) {
    $(this).children().each(function(index) {
      $(this).find('td').last().html(index + 1)
    });
  }
});
</script>
 

