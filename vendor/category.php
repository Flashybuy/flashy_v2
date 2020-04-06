<?php include("../includes/db.php");?>
<?php include("includes/header.php");?>
<?php include("includes/sidebar.php");?>
             
<style type="text/css">
    .dropdown-menu{

        min-width: 92px !important;

    }
    #categories li{
        list-style: none;
        position: relative;
        left: -25px;
    }
    #categories li.selected {
        background: #4c5667;
        padding: 5px;
        color: #fff;
        border: 1px black solid;
        list-style: none;
    }
    #subcategories li{
        list-style: none;
        position: relative;
        left: -25px;
    }
    #subcategories li.selected {
        background: #4c5667;
        padding: 5px;
        color: #fff;
        border: 1px black solid;
        list-style: none;
    }
    #subsubcategories li{
        list-style: none;
        position: relative;
        left: -25px;
    }
    #subsubcategories li.selected {
        background: #4c5667;
        padding: 5px;
        color: #fff;
        border: 1px black solid;
        list-style: none;
    }
    .subcategories{

        border-left: 1px solid grey;
        min-height: 300px;
    }
    .subsubcategories{

        border-left: 1px solid grey;
        min-height: 300px;
    }
    .icon{
            float: right
    }
    #img_notify{

        font-size: 10px;
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
                                        <li><a href="#">Tables</a></li>
                                        <li class="active">Responsive Table</li>
                                    </ol>
                                    <h4 class="page-title">Responsive Table</h4>
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
							<div class="col-sm-12">
								<div class="card-box">


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
                                                 <li onclick="get_subcategories_by_category(this, <?php echo $row['cat_id']?>)"><?php echo $row['name']?>       <span class="fa fa-angle-right icon"></span></li>
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
                                    <div class="row" id="addnew">
                                        <div class="col-lg-4">
                                            <button type="button" class="btn btn-inverse" id="categories_add" onclick="categoriesForm()">Add new</button>
                                        </div>
                                        <div class="col-lg-4">
                                            <button type="button" class="btn btn-inverse" id="subcategories_add" style="display: none;" onclick="subcategoriesForm()">Add new</button>
                                        </div>
                                        <div class="col-lg-4">
                                            <button type="button" class="btn btn-inverse" id="subsubcategories_add" style="display: none;" onclick="subsubcategoriesForm()">Add new</button>
                                            <button type="button" class="btn btn-inverse" id="add_options" style="display: none;"><a id="variant_options" href="" style="text-decoration: none;color: #fff">Add Options</a></button>
                                        </div>
                                    </div><br>
                                    <div class="row" id="categories_div" style="display: none;">
                                        <form id="categories_form" method="POST" action="action/addCategories.php" enctype="multipart/form-data">
                                            <div class="col-lg-3">
                                                <input type="text" name="category_name" required="" placeholder="Enter Category name" class="form-control">
                                            </div>
                                            <div class="col-lg-3">
                                                <input type="text" name="subcategory_name" required="" placeholder="Enter subcategory name" class="form-control">
                                            </div>
                                            <div class="col-lg-3">
                                                <input type="text" name="subsubcategory_name" required="" placeholder="Enter Sub-subcategory name" class="form-control">
                                            </div>
                                                <div class="col-lg-3">
                                                    <select class="select2 select2-multiple" multiple multiple="multiple"  data-placeholder="Choose variation Type" name="variation_id[]">
                                                        <?php
                                                            $sql = mysqli_query($con, "SELECT * From variations");
                                                            $row = mysqli_num_rows($sql);
                                                            while ($row = mysqli_fetch_array($sql)){
                                                            echo "<option value='". $row['id'] ."'>" .$row['variation_name'] ."</option>" ;
                                                        }
                                                        ?>
                                            
                                                    </select>
                                                </div><br>    
                                                <div class="col-lg-3">
                                                    <div class="fileupload btn btn-inverse waves-effect waves-light">
                                                        <span><i class="ion-upload m-r-5"></i>Category image</span>
                                                        <input type="file" name="file" class="upload">
                                                    </div><br>
                                                    <span class="text-danger" id="img_notify">* image size will be 170x170px</span>
                                                </div>
                                                <div class="col-lg-1">
                                                    <button type="submit" class="btn btn-inverse" name="addcategory">save</button>
                                                </div>
                                        </form>
                                    </div>
                                    <div class="row" id="subcategories_div" style="display: none;">
                                        <form id="subcategories_form">
                                            <div class="col-lg-3">
                                                <input type="text" name="subcategory_name" id="subcategory_name" required="" placeholder="Enter subcategory name" class="form-control">
                                                <input type="hidden" name="category_name" id="category_name"  required="" placeholder="Enter Category name" class="form-control">
                                            </div>
                                            <div class="col-lg-1"></div>
                                            <div class="col-lg-3">
                                                <input type="text" name="subsubcategory_name" id="subsubcategory_name" required="" placeholder="Enter Sub-subcategory name" class="form-control">
                                            </div>
                                            <div class="col-lg-1"></div>
                                            <div class="col-lg-3">
                                                <select class="select2 select2-multiple" multiple multiple="multiple" id="variation_id"  data-placeholder="Choose variation Type" name="variation_id[]">
                                                        <?php
                                                            $sql = mysqli_query($con, "SELECT * From variations");
                                                            $row = mysqli_num_rows($sql);
                                                            while ($row = mysqli_fetch_array($sql)){
                                                            echo "<option value='". $row['id'] ."'>" .$row['variation_name'] ."</option>" ;
                                                        }
                                                        ?>
                                            
                                                </select>
                                            </div>

                                            <div class="col-lg-1">
                                                <button type="button" class="btn btn-inverse" onclick="saveSubCategories()">save</button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="row" id="subsubcategories_div" style="display: none;">
                                        <form id="subsubcategories_form">
                                            <div class="col-lg-3">
                                                <input type="hidden" name="category_name"  required="" placeholder="Enter Category name" class="form-control category_name">
                                            </div>
                                            <div class="col-lg-1"></div>
                                            <div class="col-lg-3">
                                                <input type="text" name="subsubcategory_name"  required="" placeholder="Enter Sub-subcategory name" class="form-control subsubcategory_name">
                                                <input type="hidden" name="subcategory_name"  required="" placeholder="Enter subcategory name" class="form-control subcategory_name">
                                            </div>
                                            <div class="col-lg-1"></div>
                                            <div class="col-lg-3">
                                                
                                                <select class="select2 select2-multiple" multiple multiple="multiple" id="variation_id"  data-placeholder="Choose variation Type" name="variation_id[]">
                                                        <?php
                                                            $sql = mysqli_query($con, "SELECT * From variations");
                                                            $row = mysqli_num_rows($sql);
                                                            while ($row = mysqli_fetch_array($sql)){
                                                            echo "<option value='". $row['id'] ."'>" .$row['variation_name'] ."</option>" ;
                                                        }
                                                        ?>
                                            
                                                </select>
                                            </div>

                                            <div class="col-lg-1">
                                                <button type="button" class="btn btn-inverse" onclick="saveSubSubCategories()">save</button>
                                            </div>
                                        </form>
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
<script type="text/javascript">
    $(".select2").select2();

    $(document).ready(function() {

        setTimeout(function(){ $(".msg").hide(); }, 5000);
    });
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
            $("#category_name").val(category_id);
            $("#subcategories_div").css("display","none");
            $("#add_options").css("display","none");
            $("#subsubcategories_add").css("display","none");
            $("#subsubcategories_div").css("display","none");
            $(".subsubcategories .app-search").css("display","none");
            category_name = $(el).html();
            $('#subcategories').html(null);
            $('#subsubcategories').html(null);
            $.ajax({
                type: "POST",
                url: 'action/getsubcategories.php',
                data: {category_id:category_id},
                success:function(data){

                        $('#subcategories').append(data);
                        $("#categories_div").css("display","none");
                        $("#categories_add").css("display","none");
                        $("#subcategories_add").css("display","");
                        $(".subcategories .app-search").css("display","");
                }
            });

        }
        function get_subsubcategories_by_subcategory(el, cat_id){
            list_item_highlight(el);
            subcategory_id = cat_id;
            $(".category_name").val(category_id);
            $(".subcategory_name").val(subcategory_id);
            $("#add_options").css("display","none");
            $("#subcategories_div").css("display","none");
            $("#subsubcategories_div").css("display","none");

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
                        $("#subcategories_div").css("display","none");
                        $("#subcategories_add").css("display","none");
                        $("#subsubcategories_add").css("display","");
                        $(".subsubcategories .app-search").css("display","");
                    
                }
            });
        }
        function confirm_subsubcategory(el, subsubcat_id){
            list_item_highlight(el);
            subsubcategory_id = subsubcat_id;
            subsubcategory_name = $(el).html();
            // fetch_Variations(subsubcategory_id);
        }
        //////////////////////////////////////////////
        ////// -----add new Categories ------////////
        ///--------------------------------------///
        function categoriesForm(){

            $("#categories_div").css("display","");
            $("#categories_add").css("display","none");
        }
        //////////////////////////////////////////////
        ////// -----add new SubCategories ------////////
        ///--------------------------------------///
        function subcategoriesForm(){

            $("#subcategories_div").css("display","");
            $("#subcategories_add").css("display","none");
        }
        function saveSubCategories(){


           var categories          = $("#category_name").val();
           var subcategories       = $("#subcategory_name").val();
           var subsubcategories    = $("#subsubcategory_name").val();

           if (categories != "" && subcategories != "" && subsubcategories != "") {

                // var data = $("#categories_form").serializeArray();
                $.ajax({
                        type: "POST",
                        url: 'action/addSubCategories.php',
                        data: $('#subcategories_form').serialize(),
                        success:function(data){
                            
                            $('#subcategories').html(null);
                            swal("Congrats! SubCategories added succesfully")
                            $('#subcategories').append(data);
                            

                        }
                });
           }
           else{
                
                swal("Please! Fill all categories Fields") 
           }
        } 
        //////////////////////////////////////////////
        ////// -----add new SUB SUB Categories ------////////
        ///--------------------------------------///
        function subsubcategoriesForm(){

            $("#subsubcategories_div").css("display","");
            $("#subsubcategories_add").css("display","none");

        }
        function saveSubSubCategories(){


           var categories          = $(".category_name").val();
           var subcategories       = $(".subcategory_name").val();
           var subsubcategories    = $(".subsubcategory_name").val();

           if (categories != "" && subcategories != "" && subsubcategories != "") {

                // var data = $("#categories_form").serializeArray();
                $.ajax({
                        type: "POST",
                        url: 'action/addSubSubCategories.php',
                        data: $('#subsubcategories_form').serialize(),
                        success:function(data){
                            
                            $('#subsubcategories').html(null);
                            swal("Congrats! SubSubCategories added succesfully")
                            $('#subsubcategories').append(data);
                            

                        }
                });
           }
           else{
                
                swal("Please! Fill all categories Fields") 
           }
        }
        //////////////////////////////
        //---Confirm Subcategory----//

        function confirm_subsubcategory(el,sub_sub_id){

            list_item_highlight(el);
            $("#add_options").css("display","");
            $("#subsubcategories_div").css("display","none");
            $("#subsubcategories_add").css("display","none");
            $("#variant_options").attr("href","variant_options.php?id="+sub_sub_id);
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
</script>