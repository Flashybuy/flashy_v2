<?php include('include/header.php');
	  include('include/nav.php');	
 ?>
    <style>
        .imagePreview {
            width: 100%;
            height: 180px;
            background-position: center center;
            background: url(http://cliquecities.com/assets/no-image-e3699ae23f866f6cbdf8ba2443ee5c4e.jpg);
            background-color: #fff;
            background-size: cover;
            background-repeat: no-repeat;
            display: inline-block;
            box-shadow: 0px -3px 6px 2px rgba(0, 0, 0, 0.2);
        }
        
        .btn-primary {
            display: block;
            border-radius: 0px;
            box-shadow: 0px 4px 6px 2px rgba(0, 0, 0, 0.2);
            margin-top: -5px;
        }
        
        .imgUp {
            margin-bottom: 15px;
        }
        
        .del {
            position: absolute;
            top: 0px;
            right: 15px;
            width: 30px;
            height: 30px;
            text-align: center;
            line-height: 30px;
            background-color: rgba(255, 255, 255, 0.6);
            cursor: pointer;
        }
        
        .imgAdd {
            width: 30px;
            height: 30px;
            border-radius: 50%;
            background-color: #4bd7ef;
            color: #fff;
            box-shadow: 0px 0px 2px 1px rgba(0, 0, 0, 0.2);
            text-align: center;
            line-height: 30px;
            margin-top: 0px;
            cursor: pointer;
            font-size: 15px;
        }


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
  background-color: #2196F3;
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
                            <ol class="breadcrumb pull-right">
                                <li><a href="#">Flashy buy</a></li>
                                <li><a href="#">Edit Crousel Management</a></li>
                                <li class="active">Edit Crousel Upload</li>
                            </ol>
                            <h4 class="page-title">Update  Crousel</h4>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="card-box">
                           <div class="row">
                            <div class="alert alert-success">
                              <p class="text-center"><i class="fa fa-info-circle"></i> 
                                <b>Banner size must 1090x245 pixel</b></p>

                          </div>
                                <div class="col-md-12">
                                    <form class="form-horizontal" enctype="multipart/form-data" method="post" action="admin/crousel_upload.php" role="form">
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">Title</label>
                                            <div class="col-md-10">
                                                <textarea class="form-control" name="title" placeholder="Enter Title" style="resize: none;"></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">Url</label>
                                            <div class="col-md-10">
                                                <input type="text" name="url" placeholder="Enter Url" class="form-control">
                                            </div>

                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-2 control-label">
                                                Upload Image
                                            </label>
                                            <div class="col-sm-4 imgUp">
                                                <div class="imagePreview"></div>
                                                <label class="btn btn-primary">
                                                    Upload
                                                    <input type="file" name="img" class="uploadFile img" value="Upload Photo" style="width: 0px;height: 0px;overflow: hidden;">
                                                </label>
                                            </div>
                                        </div>

                                          <div class="form-group">
                                            <label class="col-md-2 control-label">
                                               View Image
                                            </label>
                                            <div class="col-sm-4 imgUp">
                                                <div class="imagePreview"></div>
                                               
                                            </div>
                                        </div>


                                </div>



                               <!--  <div class="form-group">
                                                        <label class="col-lg-4 control-label">Date Range With Time</label>
                                                        <div class="col-lg-8">
                                                            <input type="text" class="form-control input-daterange-timepicker" name="daterange" value="01/01/2015 1:30 PM - 01/01/2015 2:00 PM"/>
                                                        </div>
                                                    </div> -->
                            </div>
                            <div class="row">
                            	<div class="col-md-12">
                            		<table class="table table-border">
                            			<thead class="thead-dark">
                            		<tr>	
                            			<th>Sunday</th>
                            			<th>Monday</th>
                            			<th>Tuesday</th>
                            			<th>Wednesday</th>
                            			<th>thursday</th>
                            			<th>Friday</th>
                            			<th>Saturday</th>
                            			</thead>
                            		</tr>
                            		<tr>
                            		</tr>	
                            		<tr>
                            			<td><label class="switch">
  										<input type="checkbox" checked="">
  										<span class="slider round"></span>
										</label></td>

										<td><label class="switch">
  										<input type="checkbox" checked="">
  										<span class="slider round"></span>
										</label></td>

										<td><label class="switch">
  										<input type="checkbox" checked="">
  										<span class="slider round"></span>
										</label></td>

										<td><label class="switch">
  										<input type="checkbox" checked="">
  										<span class="slider round"></span>
										</label></td>

										<td><label class="switch">
  										<input type="checkbox" checked="">
  										<span class="slider round"></span>
										</label></td>

										<td><label class="switch">
  										<input type="checkbox" checked="">
  										<span class="slider round"></span>
										</label></td>

										<td><label class="switch">
  										<input type="checkbox" checked="">
  										<span class="slider round"></span>
										</label></td>
                            		</tr>
                            		</table>
                            	</div>	

                            </div>
                        </div>

                    </div>
                    <!-- end container -->

                </div>
                <input type="submit" name="btnsub" class="btn btn-primary" value="Create Crousel">
              </form>
                <!-- end content -->

                <!-- FOOTER -->
                <footer class="footer text-right">
                    2017 © Minton.
                </footer>
                <!-- End FOOTER -->

            </div>

    
         <?php include('include/footer.php'); ?>
           <script>


                // Time Picker
        $('#timepicker').timepicker({
          defaultTIme : false
        });
        $('#timepicker2').timepicker({
          showMeridian : false
        });
        $('#timepicker3').timepicker({
          minuteStep : 15
        });

                // Date Picker
                $('#datepicker').datepicker();
                $('#datepicker-autoclose').datepicker({
                  autoclose: true,
                  todayHighlight: true
                });
                $('#datepicker-inline').datepicker();
                $('#datepicker-multiple-date').datepicker({
                    format: "mm/dd/yyyy",
          clearBtn: true,
          multidate: true,
          multidateSeparator: ","
                });
                $('#date-range').datepicker({
                    toggleActive: true
                });



        //Date range picker
        $('.input-daterange-datepicker').daterangepicker({
          buttonClasses: ['btn', 'btn-sm'],
                applyClass: 'btn-default',
                cancelClass: 'btn-primary'
        });
            $('.input-daterange-timepicker').daterangepicker({
                timePicker: true,
                format: 'MM/DD/YYYY h:mm A',
                timePickerIncrement: 30,
                timePicker12Hour: true,
                timePickerSeconds: false,
                buttonClasses: ['btn', 'btn-sm'],
                applyClass: 'btn-default',
                cancelClass: 'btn-primary'
            });
            $('.input-limit-datepicker').daterangepicker({
                format: 'MM/DD/YYYY',
                minDate: '06/01/2016',
                maxDate: '06/30/2016',
                buttonClasses: ['btn', 'btn-sm'],
                applyClass: 'btn-default',
                cancelClass: 'btn-primary',
                dateLimit: {
                    days: 6
                }
            });

            $('#reportrange span').html(moment().subtract(29, 'days').format('MMMM D, YYYY') + ' - ' + moment().format('MMMM D, YYYY'));

            $('#reportrange').daterangepicker({
                format: 'MM/DD/YYYY',
                startDate: moment().subtract(29, 'days'),
                endDate: moment(),
                minDate: '01/01/2016',
                maxDate: '12/31/2016',
                dateLimit: {
                    days: 60
                },
                showDropdowns: true,
                showWeekNumbers: true,
                timePicker: false,
                timePickerIncrement: 1,
                timePicker12Hour: true,
                ranges: {
                    'Today': [moment(), moment()],
                    'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                    'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                    'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                    'This Month': [moment().startOf('month'), moment().endOf('month')],
                    'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                },
                opens: 'left',
                drops: 'down',
                buttonClasses: ['btn', 'btn-sm'],
                applyClass: 'btn-success',
                cancelClass: 'btn-default',
                separator: ' to ',
                locale: {
                    applyLabel: 'Submit',
                    cancelLabel: 'Cancel',
                    fromLabel: 'From',
                    toLabel: 'To',
                    customRangeLabel: 'Custom',
                    daysOfWeek: ['Su', 'Mo', 'Tu', 'We', 'Th', 'Fr', 'Sa'],
                    monthNames: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
                    firstDay: 1
                }
            }, function (start, end, label) {
                console.log(start.toISOString(), end.toISOString(), label);
                $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
            });


            </script>