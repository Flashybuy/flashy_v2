<?php include("../includes/db.php");?>
<?php include("includes/header.php");?>
<?php include("includes/sidebar.php");?>
            <!-- Left Sidebar End --> 
<style type="text/css">
    .dropdown-menu{

        min-width: 92px !important;
    }
</style>


            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->                      
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">

                        <!-- Page-Title -->
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="page-title-box">
                                    <ol class="breadcrumb pull-right">
                                        <li><a href="#">Minton</a></li>
                                        <li><a href="#">Tables</a></li>
                                        <li class="active">Responsive Table</li>
                                    </ol>
                                    <h4 class="page-title">Responsive Table</h4>
                                </div>
                            </div>
                        </div>


                        <div class="row">
							<div class="col-sm-12">
								<div class="card-box">


									<div class="table-rep-plugin">
										<div class="table-stripped" data-pattern="priority-columns">
											<table id="tech-companies-1" class="table  table-striped">
												<thead>
													<tr>
														<th data-priority="1">#</th>
														<th data-priority="3">Name</th>
														<th data-priority="3">Total Stock</th>
														<th data-priority="1">Base Price</th>
														<th data-priority="3">Number of Sale</th>
														<th data-priority="3">Rating</th>
														<th data-priority="6">Approved</th>
														<th data-priority="6">Today Deals</th>
														<th>options</th>
													</tr>
												</thead>
												<tbody>
<?php   

					$sql = 	"SELECT P.*,PV.first_variation_value,PV.first_variation_name,PV.second_variation_value,PV.price,PV.quantity,PV.sku,				PVS.variation_value,PVS.image1,PVS.image2,PVS.image3,PVS.image4  FROM products AS P 

                    			INNER JOIN product_variations AS PV ON PV.product_id = P.product_id
                    			INNER JOIN product_variant_images AS PVS ON PV.product_id = PVS.product_id
                    
                    			WHERE P.product_id = PV.product_id
                    			AND P.product_id = PVS.product_id";
        			$query = mysqli_query($con,$sql);
 $i=1; 
 while($res = mysqli_fetch_array($query)) {
        				

        										?>
													<tr>
														<th><?php echo $i++; ?></th>
														<td><img src="<?php echo "200_".$res['image1'];?>"> <?php echo $res['name'];?></td>
														<td>12</td>
														<td>582.93</td>
														<td>3</td>
														<td>0</td>
														<td><span class="text-success">Approved</span></td>
														<td>NO</td>
														<td>
                                                                    <div class="btn-group">
                                                                        <button type="button" class="btn btn-inverse dropdown-toggle waves-effect waves-light" data-toggle="dropdown" aria-expanded="false">Actions <span class="caret"></span></button>
                                                                        <ul class="dropdown-menu" role="menu">
                                                                            <li><a href="#">Edit</a></li>
                                                                            <li><a href="#">Delete</a></li>
                                                                            <li><a href="#">Duplicate</a></li>
                                                                        </ul>
                                                                    </div>
                                                        </td>
													</tr>
												<?php } ?>
												</tbody>
											</table>
										</div>

									</div>

								</div>
							</div>
						</div>
						<!-- end row -->


                    </div>
                    <!-- end container -->

                </div>
                <!-- end content -->



<?php include('includes/footer.php'); ?>