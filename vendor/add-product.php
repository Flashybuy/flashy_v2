<?php 
        include('../includes/db.php');
        include('includes/header.php');
        include('includes/sidebar.php');
?>
            <!-- Left Sidebar End -->
<style type="text/css">
    li.selected {
    background: rgb(234, 234, 234);
    padding: 8px;
    list-style: none;
}
.select2-container-multi .select2-search-choice-close{
    display: none !important;
}
.app-search .form-control,.app-search .form-control:focus{
        border: 1px solid rgba(10, 10, 10, 0.2);
        background: rgba(10, 10, 10, 0.75);
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
                                        <li><a href="#">Forms</a></li>
                                        <li class="active">Form Validation</li>
                                    </ol>
                                    <h4 class="page-title">Form Validation</h4>
                                </div>
                            </div>
                        </div>
 <!-- Start Showing success or warning Msg -->
<?php
if (isset($_GET['error'])) {?>
    <div class="row">
        <div class="col-lg-6 col-sm-offset-3">
            <div class="alert alert-warning msg">    
    <?php echo "Something went wrong!"; ?>
            </div>
        </div>
    </div>
<?php
}
?>
<?php
if (isset($_GET['msg'])) { ?>
<div class="row">
    <div class="col-lg-6 col-sm-offset-3">
        <div class="alert alert-success msg">    
    <?php echo "<span>Data Inserted successfully...!!</span>"; ?>

        </div>
    </div>
</div>
<?php 
}
?>

<!-- End Message Alert -->


                        <div class="row">
							<div class="col-lg-9 col-sm-offset-1">
								<div class="card-box">
									<h4 class="m-t-0 header-title"><b>Product</b></h4>
									<p class="text-muted font-13 m-b-30">
	                                    Add Your Products Details
	                                </p>

									<form action="action/add_product.php" method="POST" data-parsley-validate novalidate id="product_form" enctype="multipart/form-data">
										<div class="form-group">
											<label for="userName">Product Name*</label>
											<input type="text" name="name" parsley-trigger="change" required placeholder="Enter Product name" class="form-control" id="userName">
										</div>
										<div class="form-group">
											<label for="emailAddress">Select Category</label>
											<input type="text" parsley-trigger="change" required  class="form-control" data-toggle="modal" data-target=".bs-example-modal-lg" id="categories_name" value="Select Category">
                                            <input type="hidden" name="category_id" id="category_id" value="" required>
                                            <input type="hidden" name="subcategory_id" id="subcategory_id" value="" required>
                                            <input type="hidden" name="subsubcategory_id" id="subsubcategory_id" value="" required>
										</div>
										<div class="form-group">
											<label for="pass1">Product Brand</label>
											<select class="form-control" name="brand" required="">
                                                <option selected disabled>Choose Brand</option>
                                            <?php
                                                $sql = mysqli_query($con, "SELECT * From brands where delte = 0");
                                                $row = mysqli_num_rows($sql);
                                                while ($row = mysqli_fetch_array($sql)){
                                                    echo "<option value='". $row['id'] ."'>" .$row['name'] ."</option>" ;
                                                }
                                            ?>                                 
                                            </select>
										</div>
										<div class="form-group">
                                            <label>Does your product have variations?</label>
                                            <input type="checkbox"  data-plugin="switchery" id="variations" onchange="showVariations()" data-color="#00b19d" name="variation_approval" data-size="small" value="Y"/>                              
                                        </div>
                                        <div class="row" id="images">
                                            <div class="col-lg-3">
                                                <div class="fileupload btn btn-primary waves-effect waves-light">
                                                    <span><i class="ion-upload m-r-5"></i>Image1</span>
                                                    <input type="file" name="file1" class="upload">
                                                </div>
                                            </div>
                                            <div class="col-lg-3">
                                                <div class="fileupload btn btn-primary waves-effect waves-light">
                                                    <span><i class="ion-upload m-r-5"></i>Image2</span>
                                                    <input type="file" name="file2" class="upload">
                                                </div>
                                            </div>
                                            <div class="col-lg-3">
                                                <div class="fileupload btn btn-primary waves-effect waves-light">
                                                    <span><i class="ion-upload m-r-5"></i>Image3</span>
                                                    <input type="file" name="file3" class="upload">
                                                </div>
                                            </div>
                                            <div class="col-lg-3">
                                                <div class="fileupload btn btn-primary waves-effect waves-light">
                                                    <span><i class="ion-upload m-r-5"></i>Image4</span>
                                                    <input type="file" name="file4" class="upload">
                                                </div>
                                            </div>
                                            <!-- <div class="col-md-3 portlets"> -->
                                                <!-- Your awesome content goes here -->

                                                <!-- <div class="m-b-30">
                                                    <div class="dropzone" id="dropzone1">
                                                      <div class="fallback">
                                                        <input name="file1" type="file" />
                                                      </div>

                                                    </div>
                                                </div>
                                            </div> -->
                                            <!-- <div class="col-md-3 portlets"> -->
                                                <!-- Your awesome content goes here -->
                                                <!-- <div class="m-b-30">
                                                    <div class="dropzone" id="dropzone2">
                                                      <div class="fallback">
                                                        <input name="file2" type="file" />
                                                      </div>

                                                    </div>
                                                </div>
                                            </div> -->
                                            <!-- <div class="col-md-3 portlets"> -->
                                                <!-- Your awesome content goes here -->
                                                <!-- <div class="m-b-30">
                                                    <div class="dropzone" id="dropzone3">
                                                      <div class="fallback">
                                                        <input name="file3" type="file"/>
                                                      </div>

                                                    </div>
                                                </div>
                                            </div> -->
                                            <!-- <div class="col-md-3 portlets"> -->
                                                <!-- Your awesome content goes here -->
                                                <!-- <div class="m-b-30">
                                                    <div class="dropzone" id="dropzone4">
                                                      <div class="fallback">
                                                        <input name="file4" type="file" />
                                                      </div>

                                                    </div>
                                                </div>
                                            </div> -->
                                        </div><br>
                                        <div class="row" id="price_section">
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label>Market Price:</label>
                                                    <input type="number" min="1" name="market_price" class="form-control" >
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label>Selling Price:</label>
                                                    <input type="number" min="1" name="selling_price" class="form-control" >
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label>Quantity:</label>
                                                    <input type="number" min="1" name="quantity" class="form-control" >
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label>Width:</label>
                                                    <input type="number" min="1" name="width" class="form-control" >
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label>Height:</label>
                                                    <input type="number" min="1" name="height" class="form-control" >
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label>Length:</label>
                                                    <input type="number" min="1" name="length" class="form-control" >
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                        <div class="col-lg-4">
                                        <div class="form-group">
                                            <label>Courier Size</label>
                                            <select class="form-control" name="courier_size">
                                                <option selected disabled="">Choose</option>
                                            </select>
                                        </div>
                                        </div>
                                        <div class="col-lg-4">
                                        <div class="form-group">
                                            <label>Varienty</label>
                                            <select class="form-control" name="warrenty">
                                                <option value="">Choose</option>
                                                <option value="0">No Warrenty</option>
                                                <option value="1">1 days</option>
                                                <option value="2">2 days</option>
                                                <option value="3">3 days</option>
                                            </select>
                                        </div>
                                        </div>
                                        <div class="col-lg-4">
                                        <div class="form-group">
                                            <label>Video Url</label>
                                            <input type="url" name="video" class="form-control" >
                                        </div>
                                        </div>
                                        <div class="col-lg-4">
                                        <div class="form-group">
                                            <label>Product Manual</label>
                                            <input type="file" name="manual" class="form-control" >
                                        </div>
                                        </div>
                                        </div>
                                        <div class="row" id="variations_value" style="display: none;">
                                            <div class="col-lg-4 col-sm-offset-4">
                                                <label class="panel-title" style="background: #FAFAFA;padding: 10px;border: 1px solid black;">Variations</label><br><br>
                                            </div>
                                                <div class="col-lg-12">
                                                    <div class="col-lg-4">
                                                        <label>Product Variants (Options)</label>
                                                    </div>    
                                                        <div class="col-lg-8">
                                                            <select class="select2" onchange="variationsName()" name="variationname[]" id="variations_name" multiple="multiple" multiple data-placeholder="Choose ...">
                                                            </select>
                                                        </div><br><br>
                                                </div>
                                                <div class="row" id="varition-options">
                                                    
                                                </div>
                                                <table class="table table-bordered" id="variant_table" style="display: none;">
                                                        <thead>
                                                            <tr>
                                                                <td class="text-center">
                                                                    <label for="" class="control-label">Variant</label>
                                                                </td>
                                                                <td class="text-center">
                                                                    <label for="" class="control-label">Variant Price</label>
                                                                </td>
                                                                <td class="text-center">
                                                                    <label for="" class="control-label">SKU</label>
                                                                </td>
                                                                <td class="text-center">
                                                                    <label for="" class="control-label">Quantity</label>
                                                                </td>
                                                            </tr>
                                                        </thead>
                                                        <tbody id="variant_combinations">
                                                        </tbody>
                                                </table>
                                            </div>
                                            <div class="form-group">
                                                <label>Description</label>
                                                <textarea name="description" class="form-control"></textarea>
                                            </div>
                                            <div class="row" id="variation_image">
                                                
                                            </div><br>
                                            <input type="hidden" name="custom_options" id="custom_options" value="">
                                            <div id="variant_options">
                                                
                                            </div>
                                        </div>
                                    
										<div class="form-group text-right m-b-0">
											<button class="btn btn-primary waves-effect waves-light" type="submit" name="add-product">
												Submit
											</button>
											<button type="reset" class="btn btn-default waves-effect waves-light m-l-5">
												Cancel
											</button>
										</div>

									</form>
								</div>
							</div>
						</div>



                    </div>
                    <!-- end container -->

                </div>
                <!-- end content -->
<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title" id="myLargeModalLabel">Choose Categories</h4>
                                                </div>
                                                <div class="modal-body">
                                                  <div class="row">
                                                      <div class="col-lg-4">
                                                        <form role="search" class="app-search" novalidate="">
                                                            <input type="text" placeholder="Search..." id="categorysearch" oninput="categorySearch()" class="form-control app-search-input" data-parsley-id="4">
                                                        </form>
                                                         <ul id="categories">
                                                            <?php

                                                                $sql = mysqli_query($con, "SELECT * From categories where delte = 0");
                                                                $row = mysqli_num_rows($sql);
                                                                while ($row = mysqli_fetch_array($sql)){
                                                                    
                                                            ?>
                                                             <li onclick="get_subcategories_by_category(this, <?php echo $row['cat_id']?>)"><?php echo $row['name']?></li>
                                                         <?php } ?>

                                                         </ul>
                                                      </div>
                                                      <div class="col-lg-4 subcategories">
                                                        <form role="search" class="app-search" novalidate="" style="display: none">
                                                            <input type="text" placeholder="Search..." id="subcategorysearch" oninput="subcategorySearch()" class="form-control app-search-input" data-parsley-id="4">
                                                        </form>
                                                          <ul id="subcategories">
                                                              
                                                          </ul>
                                                      </div>
                                                      <div class="col-lg-4 subsubcategories">
                                                            <form role="search" class="app-search" novalidate="" style="display: none">
                                                                <input type="text" placeholder="Search..." id="subsubcategorysearch" oninput="subsubcategorySearch()" class="form-control app-search-input" data-parsley-id="4">
                                                            </form>                                                        
                                                          <ul id="subsubcategories">
                                                              
                                                          </ul>
                                                      </div>
                                                  </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <div class="row">
                                                        <div class="col-lg-2 col-sm-offset-9">
                                                            <button class="btn btn-success waves-effect w-md waves-light m-b-5" onclick="closeModal()">confirm</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div><!-- /.modal-content -->
                                        </div><!-- /.modal-dialog -->
                                    </div>
    
        <?php include('includes/footer.php'); ?>
        <script type="text/javascript">

        var category_name = "";
        var subcategory_name = "";
        var subsubcategory_name = "";

        var category_id = null;
        var subcategory_id = null;
        var subsubcategory_id = null;

            function list_item_highlight(el){
                $(el).parent().children().each(function(){
                    $(this).removeClass('selected');
                });
                $(el).addClass('selected');
            }
        function get_subcategories_by_category(el, cat_id){
            list_item_highlight(el);
            category_id = cat_id;
            category_name = $(el).html();
            $('#subcategories').html(null);
            $('#subsubcategories').html(null);
            $.ajax({
                type: "POST",
                url: 'action/getsubcategories.php',
                data: {category_id:category_id},
                success:function(data){

                        $('#subcategories').append(data);
                        $(".subcategories .app-search").css("display","");
                }
            });
        }
        function get_subsubcategories_by_subcategory(el, cat_id){
            list_item_highlight(el);
            subcategory_id = cat_id;
            subsubcategory_name = "";
            subsubcategory_id= null;
            sub_category_name = $(el).html();
            $('#subsubcategories').html(null);
            $.ajax({
                type: "POST",
                url: 'action/getsubsubcategories.php',
                data: {category_id:subcategory_id},
                success:function(data){
                
                        $('#subsubcategories').append(data);
                        $(".subsubcategories .app-search").css("display","");
                }
            });
        }
        function confirm_subsubcategory(el, subsubcat_id){
            list_item_highlight(el);
            subsubcategory_id = subsubcat_id;
            subsubcategory_name = $(el).html();
            fetch_Variations(subsubcategory_id);
            fetch_variant_options(subsubcategory_id);
        }
        function fetch_Variations(id){
            $('#variations_name').html(null);
            $.ajax({
                type: "POST",
                url: 'action/getvariations.php',
                data: {sub_sub_cat:id},
                success:function(data){
                
                        $('#variations_name').append(data);
                        // console.log(data);
                    
                }
            });


        }
////////////////////////

///////////////////////////////////////
////---- Variant Options ---------////
////////////////////////////////////// 

        function fetch_variant_options(id){
            // $('#variations_name').html(null);
            $.ajax({
                type: "POST",
                url: 'action/getvariantoptions.php',
                data: {subsubcategoryid:id},
                success:function(data){
                        // console.log(data);
                        $('#variant_options').append(data);
                        $('#custom_options').val('Y');
                    
                }
            });


        }
///////////////////////////////////////
////---- Variant Options ---------////
//////////////////////////////////////       
        function closeModal(){
            if(category_id > 0 && subcategory_id > 0 && subsubcategory_id > 0){
                $('#category_id').val(category_id);
                $('#subcategory_id').val(subcategory_id);
                $('#subsubcategory_id').val(subsubcategory_id);
                $('#categories_name').val(category_name+'>'+sub_category_name+'>'+subsubcategory_name);
                $('#categories_name').prop('readonly', true);
                $('.bs-example-modal-lg').modal('hide');
            }
            else{
                alert('Please choose categories...');
            }
        }
        $(".select2").select2();
        function showVariations(){

            var variations = $('#variations').val();
            if (variations=='Y') {

                $("#variations_value").css("display","");
                $("#price_section").css("display","none");
                $('#variations').val('N');
            }
            else{

                $("#variations_value").css("display","none");
                $("#price_section").css("display","");
                $('#variations').val('Y');
            }  
        }
/////////////////////////////////
    //Append attribute/////
////////////////////////////////
var i = 0;
function variationsName(){

    $('#varition-options').html(null);
    $("#variation_image").html(null);
    $("select#variations_name :selected").each(function() {
        vari = $(this).val();
        if (vari != null) {
            if(vari == 'Color'){
                $("#varition-options").append('<div class="row '+vari+'"><div class="col-lg-3"><input type="text"  value="'+vari+'" class="form-control" disabled=""><input type="hidden" name="vari[]" value="'+vari+'" class="form-control"><input type="hidden" name="vari_type[]" value="'+i+'" class="form-control"></div><div class="col-lg-8"><input type="text" class="form-control tagsInput" onchange="update_sku();imagediv()" id="'+vari+'" name="options_'+i+'[]" value=""></div><div class="col-lg-1"><button type="button" onclick="delete_row(this)" class="btn btn-link btn-icon text-danger"><i class="fa fa-trash-o"></i></button></div></div>');
            }
            else{
                $("#varition-options").append('<div class="row '+vari+'"><div class="col-lg-3"><input type="text"  value="'+vari+'" class="form-control" disabled=""><input type="hidden" name="vari[]" value="'+vari+'" class="form-control"><input type="hidden" name="vari_type[]" value="'+i+'" class="form-control"></div><div class="col-lg-8"><input type="text" class="form-control tagsInput" onchange="update_sku();" id="'+vari+'" name="options_'+i+'[]" value=""></div><div class="col-lg-1"><button type="button" onclick="delete_row(this)" class="btn btn-link btn-icon text-danger"><i class="fa fa-trash-o"></i></button></div></div>');
            }
                i++;
                $('.tagsInput').tagsinput('items');
                
        }
    });
    
        
}               

function delete_row(em){
            
     $(em).closest('.row').remove();
     var  va =$('.bootstrap-tagsinput').val(); 
     $("#variant_table").css("display","none");
     update_sku();
     imagediv();

}
function update_sku(){

    $.ajax({
                type: "POST",
                url: 'action/combinations.php',
                data: $('#product_form').serialize(),
                success:function(data){
                    // console.log(data);
                if (data != null) {

                    $("#variant_table").css("display","");
                    $('#variant_combinations').html(data);
                }

            }
    });
     
}

function imagediv(){
var s = new Array();
        $('#Color').on('itemAdded', function(event) {

           s =  $("#Color").val();
           $('#variation_image').html(null);
           var data = $('#product_form').serializeArray();
           data.push({name: 'color', value: s});
           // console.log(data);
           $.ajax({
                type: "POST",
                url: 'action/variant_image.php',
                data: data,
                success:function(data){
                    // console.log(data);
                     
                    $("#variation_image").append(data);
                    $("#images").css("display","none");

            }
        });
        });
        

} 

        //////////////////////////////////////////////////////
        //-----------  Category Search     ----------------//
        ////////////////////////////////////////////////////

        function categorySearch(){

           var keyword = $("#categorysearch").val();

                $.ajax({
                        type: "POST",
                        url: 'action/categorySearch.php',
                        data: {keyword:keyword},
                        success:function(data){
                            
                            $('#categories').html(null);
                            // swal("Congrats! SubCategories added succesfully")
                            $('#categories').append(data);
                            // console.log(data);

                        }
                });
           
        }


        //////////////////////////////////////////////////////
        //-------- End Category Search     ----------------//
        ////////////////////////////////////////////////////

        //////////////////////////////////////////////////////
        //-----------  SubCategory Search     -------------//
        ////////////////////////////////////////////////////

        function subcategorySearch(){

           var keyword = $("#subcategorysearch").val();

                $.ajax({
                        type: "POST",
                        url: 'action/subCategorySearch.php',
                        data: {keyword:keyword,id:category_id},
                        success:function(data){
                            
                            $('#subcategories').html(null);
                            // swal("Congrats! SubCategories added succesfully")
                            $('#subcategories').append(data);
                            // console.log(data);

                        }
                });
           
        }


        //////////////////////////////////////////////////////
        //-------- End subCategory Search    --------------//
        //////////////////////////////////////////////////// 

        //////////////////////////////////////////////////////
        //-----------  subSubCategory Search  -------------//
        ////////////////////////////////////////////////////

        function subsubcategorySearch(){

           var keyword = $("#subsubcategorysearch").val();

                $.ajax({
                        type: "POST",
                        url: 'action/subSubCategorySearch.php',
                        data: {keyword:keyword,id:subcategory_id},
                        success:function(data){
                            
                            $('#subsubcategories').html(null);
                            // swal("Congrats! SubCategories added succesfully")
                            $('#subsubcategories').append(data);
                            // console.log(data);

                        }
                });
           
        }


        //////////////////////////////////////////////////////
        //-------- End subsubCategory Search --------------//
        //////////////////////////////////////////////////// 


    $(document).ready(function() {

        setTimeout(function(){ $(".msg").hide(); }, 5000);
    });
</script>  