<?php include('../includes/db.php'); 
      include('includes/header.php');
      include('includes/sidebar.php');

if (isset($_POST['type'])) {
   
        $subsubcategory_id = $_GET['id'];

        $form = array();
        $select_types = ['select', 'multi_select', 'radio'];
        $j = 0;
        for ($i=0; $i < count($_POST['type']); $i++) {
            $item['type'] = $_POST['type'][$i];
            $item['label'] = $_POST['label'][$i];
            if(in_array($_POST['type'][$i], $select_types)){
                $item['options'] = json_encode($_POST['options_'.$_POST['option'][$j]]);
                $j++;
            }
            array_push($form, $item);
        }
        $data = json_encode($form);
        $sql   = "INSERT into variant_options (subsubcategory_id,options) VALUES ('$subsubcategory_id','$data')";
        if (mysqli_query($con,$sql)) {
             
             $msg = "<span>Options Added successfully...!!</span>";
         }
         else{


            $error = "<span>Something went wrong...!!</span>";
         } 
}

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
                                        <li><a href="#">Minton</a></li>
                                        <li><a href="#">Forms</a></li>
                                        <li class="active">Form Validation</li>
                                    </ol>
                                    <h4 class="page-title">Add Categories Options</h4>
                                </div>
                            </div>
                        </div>
 <!-- Start Showing success or warning Msg -->
<?php
if (isset($error)) {?>
    <div class="row">
        <div class="col-lg-6 col-sm-offset-3">
            <div class="alert alert-warning msg">    
    <?php echo $error; ?>
            </div>
        </div>
    </div>
<?php
}
?>
<?php
if (isset($msg)) { ?>
<div class="row">
    <div class="col-lg-6 col-sm-offset-3">
        <div class="alert alert-success msg">    
    <?php echo $msg; ?>

        </div>
    </div>
</div>
<?php 
}
?>

<!-- End Message Alert -->
                       <div class="row">
                                <div class="card-box">
                                    <h4 class="m-t-0 header-title"><b>Add Custom options</b></h4>
                                    <p class="text-muted font-13 m-b-30">
                                        Add your Options.
                                    </p>
                                    <form action="variant_options.php?id=<?php echo $_GET['id']; ?>" method="post">
                                      <div class="row">  
                                        <div class="col-lg-8 form-horizontal" id="form">
                                        </div>
                                        <div class="col-lg-4">
                                            <ul class="list-group">
                                                <li class="list-group-item btn" style="text-align: left;" onclick="appenddToForm('text')">Text Input</li>
                                                <li class="list-group-item btn" style="text-align: left;" onclick="appenddToForm('select')">Select</li>
                                                <li class="list-group-item btn" style="text-align: left;" onclick="appenddToForm('multi-select')">Multiple Select</li>
                                                <li class="list-group-item btn" style="text-align: left;" onclick="appenddToForm('radio')">Radio</li>
                                                <li class="list-group-item btn" style="text-align: left;" onclick="appenddToForm('file')">File</li>
                                            </ul>
                                        </div>
                                      </div>
                                      <div class="text-right">
                                            <button class="btn btn-inverse" type="submit">Save</button>
                                      </div>  
                                    </form>        
                                </div>
                        </div>



                    </div>
                    <!-- end container -->

                </div>
                <!-- end content -->



                <!-- FOOTER -->
                <?php 
                     include('includes/footer.php');
                ?>
<script type="text/javascript">

        var i = 0;

        function add_customer_choice_options(em){
            var j = $(em).closest('.form-group').find('.option').val();
            var str = '<div class="form-group">'
                            +'<div class="col-sm-6 col-sm-offset-4">'
                                +'<input class="form-control" type="text" name="options_'+j+'[]" value="" required>'
                            +'</div>'
                            +'<div class="col-sm-2"> <span class="btn btn-icon btn-circle icon-lg fa fa-times" onclick="delete_choice_clearfix(this)"></span>'
                            +'</div>'
                        +'</div>'
            $(em).parent().find('.customer_choice_options_types_wrap_child').append(str);
        }
        function delete_choice_clearfix(em){
            $(em).parent().parent().remove();
        }
        function appenddToForm(type){
            //$('#form').removeClass('seller_form_border');
            if(type == 'text'){
                var str = '<div class="form-group" style="background:rgba(0,0,0,0.1);padding:10px 0;">'
                                +'<input type="hidden" name="type[]" value="text">'
                                +'<div class="col-lg-3">'
                                    +'<label class="control-label">Text</label>'
                                +'</div>'
                                +'<div class="col-lg-7">'
                                    +'<input class="form-control" type="text" name="label[]" placeholder="Label">'
                                +'</div>'
                                +'<div class="col-lg-2">'
                                    +'<span class="btn btn-icon btn-circle icon-lg fa fa-times" onclick="delete_choice_clearfix(this)"></span>'
                                +'</div>'
                            +'</div>';
                $('#form').append(str);
            }
            else if (type == 'select') {
                i++;
                var str = '<div class="form-group" style="background:rgba(0,0,0,0.1);padding:10px 0;">'
                                +'<input type="hidden" name="type[]" value="select"><input type="hidden" name="option[]" class="option" value="'+i+'">'
                                +'<div class="col-lg-3">'
                                    +'<label class="control-label">Select</label>'
                                +'</div>'
                                +'<div class="col-lg-7">'
                                    +'<input class="form-control" type="text" name="label[]" placeholder="Select Label" style="margin-bottom:10px">'
                                    +'<div class="customer_choice_options_types_wrap_child">'

                                    +'</div>'
                                    +'<button class="btn btn-success pull-right" type="button" onclick="add_customer_choice_options(this)"><i class="glyphicon glyphicon-plus"></i> Add option</button>'
                                +'</div>'
                                +'<div class="col-lg-2">'
                                    +'<span class="btn btn-icon btn-circle icon-lg fa fa-times" onclick="delete_choice_clearfix(this)"></span>'
                                +'</div>'
                            +'</div>';
                $('#form').append(str);
            }
            else if (type == 'multi-select') {
                i++;
                var str = '<div class="form-group" style="background:rgba(0,0,0,0.1);padding:10px 0;">'
                                +'<input type="hidden" name="type[]" value="multi_select"><input type="hidden" name="option[]" class="option" value="'+i+'">'
                                +'<div class="col-lg-3">'
                                    +'<label class="control-label">Multiple select</label>'
                                +'</div>'
                                +'<div class="col-lg-7">'
                                    +'<input class="form-control" type="text" name="label[]" placeholder="Multiple Select Label" style="margin-bottom:10px">'
                                    +'<div class="customer_choice_options_types_wrap_child">'

                                    +'</div>'
                                    +'<button class="btn btn-success pull-right" type="button" onclick="add_customer_choice_options(this)"><i class="glyphicon glyphicon-plus"></i> Add option</button>'
                                +'</div>'
                                +'<div class="col-lg-2">'
                                    +'<span class="btn btn-icon btn-circle icon-lg fa fa-times" onclick="delete_choice_clearfix(this)"></span>'
                                +'</div>'
                            +'</div>';
                $('#form').append(str);
            }
            else if (type == 'radio') {
                i++;
                var str = '<div class="form-group" style="background:rgba(0,0,0,0.1);padding:10px 0;">'
                                +'<input type="hidden" name="type[]" value="radio"><input type="hidden" name="option[]" class="option" value="'+i+'">'
                                +'<div class="col-lg-3">'
                                    +'<label class="control-label">Radio</label>'
                                +'</div>'
                                +'<div class="col-lg-7">'
                                    +'<input class="form-control" type="text" name="label[]" placeholder="Radio Label" style="margin-bottom:10px">'
                                    +'<div class="customer_choice_options_types_wrap_child">'

                                    +'</div>'
                                    +'<button class="btn btn-success pull-right" type="button" onclick="add_customer_choice_options(this)"><i class="glyphicon glyphicon-plus"></i> Add option</button>'
                                +'</div>'
                                +'<div class="col-lg-2">'
                                    +'<span class="btn btn-icon btn-circle icon-lg fa fa-times" onclick="delete_choice_clearfix(this)"></span>'
                                +'</div>'
                            +'</div>';
                $('#form').append(str);
            }
            else if (type == 'file') {
                var str = '<div class="form-group" style="background:rgba(0,0,0,0.1);padding:10px 0;">'
                                +'<input type="hidden" name="type[]" value="file">'
                                +'<div class="col-lg-3">'
                                    +'<label class="control-label">File</label>'
                                +'</div>'
                                +'<div class="col-lg-7">'
                                    +'<input class="form-control" type="text" name="label[]" placeholder="Label">'
                                +'</div>'
                                +'<div class="col-lg-2">'
                                    +'<span class="btn btn-icon btn-circle icon-lg fa fa-times" onclick="delete_choice_clearfix(this)"></span>'
                                +'</div>'
                            +'</div>';
                $('#form').append(str);
            }
        }
    </script>                
<script type="text/javascript">
    $(document).ready(function() {

        setTimeout(function(){ $(".msg").hide(); }, 5000);
    });
</script>