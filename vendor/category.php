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


									<div class="row">
                                        <div class="col-lg-4">
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
                                                <ul id="subcategories">
                                              
                                                </ul>

                                        </div>
                                        <div class="col-lg-4 subsubcategories">
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
                                        <form id="categories_form">
                                            <div class="col-lg-3">
                                                <input type="text" name="category_name" required="" placeholder="Enter Category name" class="form-control">
                                            </div>
                                            <div class="col-lg-1"></div>
                                            <div class="col-lg-3">
                                                <input type="text" name="subcategory_name" required="" placeholder="Enter subcategory name" class="form-control">
                                            </div>
                                            <div class="col-lg-1"></div>
                                            <div class="col-lg-3">
                                                <input type="text" name="subsubcategory_name" required="" placeholder="Enter Sub-subcategory name" class="form-control">
                                            </div>

                                            <div class="col-lg-1">
                                                <button type="button" class="btn btn-inverse" onclick="saveCategories()">save</button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="row" id="subcategories_div" style="display: none;">
                                        <form id="subcategories_form">
                                            <div class="col-lg-3">
                                                <input type="hidden" name="category_name" id="category_name"  required="" placeholder="Enter Category name" class="form-control">
                                            </div>
                                            <div class="col-lg-1"></div>
                                            <div class="col-lg-3">
                                                <input type="text" name="subcategory_name" id="subcategory_name" required="" placeholder="Enter subcategory name" class="form-control">
                                            </div>
                                            <div class="col-lg-1"></div>
                                            <div class="col-lg-3">
                                                <input type="text" name="subsubcategory_name" id="subsubcategory_name" required="" placeholder="Enter Sub-subcategory name" class="form-control">
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
                                                <input type="hidden" name="subcategory_name"  required="" placeholder="Enter subcategory name" class="form-control subcategory_name">
                                            </div>
                                            <div class="col-lg-1"></div>
                                            <div class="col-lg-3">
                                                <input type="text" name="subsubcategory_name"  required="" placeholder="Enter Sub-subcategory name" class="form-control subsubcategory_name">
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
        function saveCategories(){

           var categories          = $("input[name='category_name']").val();
           var subcategories       = $("input[name='subcategory_name']").val();
           var subsubcategories    = $("input[name='subsubcategory_name']").val();

           if (categories != "" && subcategories != "" && subsubcategories != "") {

                // var data = $("#categories_form").serializeArray();
                $.ajax({
                        type: "POST",
                        url: 'action/addCategories.php',
                        data: $('#categories_form').serialize(),
                        success:function(data){
                            
                            $('#categories').html(null);
                            swal("Congrats! Categories added succesfully")
                            $('#categories').append(data);
                            

                        }
                });
           }
           else{
                
                swal("Please! Fill all categories Fields") 
           }

            
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
</script>