<?php 
	include('include/header.php');
	include('include/nav.php');
	include_once('../includes/db.php');
$obj = new connection();

?>

 <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">        
                        <div class="row">
							<div class="col-lg-12">
								<table id="example" class="display nowrap" style="width:100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>Account Holder</th>
                <th>Bank</th>
                <th>Barnch Name</th>
                <th>Branch Code</th>
                <th>User ID</th>
                <th>Update At</th>
                <th>Acount</th>
                <th>View Details</th>

            </tr>
        </thead>
        <tbody>
        		<?php 
        			$data = $obj->view_log();
        			while ($row = mysqli_fetch_array($data)) 
        			{
        				echo "<tr>
        						<td class='text-center'>$row[0]</td>
        						<td class='text-center'>$row[1]</td>
        						<td class='text-center'>$row[2]</td>
        						<td class='text-center'>$row[3]</td>
        						<td class='text-center'>$row[4]</td>
        						<td class='text-center'>$row[5]</td>
        						<td class='text-center'>$row[6]</td>
        						<td class='text-center'>$row[7]</td>
                                <td class='text-center'><button type='button' class='btn btn-primary' data-toggle='modal' data-target='#exampleModalLong'>
 View Detail
</button></</td>
        				</tr>";
        			}
        		?>

        </tbody>
        <tfoot>
            <tr>
                <th>ID</th>
                <th>Account Holder</th>
                <th>Bank</th>
                <th>Barnch Name</th>
                <th>Branch Code</th>
                <th>User ID</th>
                <th>Update At</th>
                <th>Acount</th>
                <th>View Details</th>
            </tr>
        </tfoot>
    </table>
							</div>
						</div>
                    </div>
                    
                </div>
                

<?php include('include/footer.php'); ?>
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content col-md-12">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Change Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Updated Details</p>
       <table class="table table-bordered">
            <tr>
                <th>Account Holder</th>
                <th>Bank</th>
                <th>Barnch Name</th>
                <th>Branch Code</th>
                <th>User ID</th>
                <th>Update At</th>
                <th>Acount</th>
                <th>View Details</th>
            </tr>
            <tbody>
                 <tr>
                <th>Account Holder</th>
                <th>Bank</th>
                <th>Barnch Name</th>
                <th>Branch Code</th>
                <th>User ID</th>
                <th>Update At</th>
                <th>Acount</th>
                <th>View Details</th>
            </tr>
            </tbody>

       </table>



        <table class="table table-bordered">
            <p>Previous Details</p>
            <tr>
                <th>Account Holder</th>
                <th>Bank</th>
                <th>Barnch Name</th>
                <th>Branch Code</th>
                <th>User ID</th>
                <th>Update At</th>
                <th>Acount</th>
                <th>View Details</th>
            </tr>
            <tbody>
                 <tr>
                <th>Account Holder</th>
                <th>Bank</th>
                <th>Barnch Name</th>
                <th>Branch Code</th>
                <th>User ID</th>
                <th>Update At</th>
                <th>Acount</th>
                <th>View Details</th>
            </tr>
            </tbody>

       </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-success">Approve</button>
      </div>
    </div>
  </div>
</div>