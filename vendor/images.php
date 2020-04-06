<?php include('../includes/db.php'); 
      include('includes/header.php');
      include('includes/sidebar.php'); 


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
                                        <li><a href="#">Image</a></li>
                                        <li><a href="#">Forms</a></li>
                                        <li class="active">Image Upload with Crop</li>
                                    </ol>
                                    <h4 class="page-title">Image Upload with Crop</h4>
                                </div>
                            </div>
                        </div>
                        <form action="upload.php" method="post" enctype="multipart/form-data" > 
                        <div class="row">
                      
                            <div class="col-md-2 portlets">
                                <!-- Your awesome content goes here -->

                                <div class="m-b-30">
                                    <div class="dropzone" id="dropzone1">
                                      <div class="fallback">
                                        <input name="file1" type="file" />
                                      </div>

                                    </div>
                                    <!-- <div class="clearfix pull-right m-t-15">
                                      	<button type="button" class="btn btn-pink btn-rounded waves-effect waves-light">Submit</button>
                                  </div> -->
                                </div>
                            </div>
                            <div class="col-md-2 portlets">
                                <!-- Your awesome content goes here -->
                                <div class="m-b-30">
                                    <div class="dropzone" id="dropzone2">
                                      <div class="fallback">
                                        <input name="file2" type="file" />
                                      </div>

                                    </div>
                                    <!-- <div class="clearfix pull-right m-t-15">
                                      	<button type="button" class="btn btn-pink btn-rounded waves-effect waves-light">Submit</button>
                                  </div> -->
                                </div>
                            </div>
                            <div class="col-md-2 portlets">
                                <!-- Your awesome content goes here -->
                                <div class="m-b-30">
                                    <div class="dropzone" id="dropzone3">
                                      <div class="fallback">
                                        <input name="file3" type="file"/>
                                      </div>

                                    </div>
                                    <!-- <div class="clearfix pull-right m-t-15">
                                      	<button type="button" class="btn btn-pink btn-rounded waves-effect waves-light">Submit</button>
                                  </div> -->
                                </div>
                            </div>
                            <div class="col-md-2 portlets">
                                <!-- Your awesome content goes here -->
                                <div class="m-b-30">
                                    <div class="dropzone" id="dropzone4">
                                      <div class="fallback">
                                        <input name="file4" type="file" />
                                      </div>

                                    </div>
                                    <!-- <div class="clearfix pull-right m-t-15">
                                      	<button type="button" class="btn btn-pink btn-rounded waves-effect waves-light">Submit</button>
                                  </div> -->
                                </div>
                            </div>
                            

                        </div>
                        <div class="row">
                        <div class="col-md-2">
                                      	<button type="submit" name="submit" class="btn btn-pink btn-rounded waves-effect waves-light">Submit</button>
                                  </div>
                                  </div>
                        </form>
                        <!-- end row -->



                    </div>
                    <!-- end container -->

                </div>
                <!-- end content -->
              

    
                <!-- FOOTER -->
                <?php 
                     include('includes/footer.php');
                ?>
