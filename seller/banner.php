<?php

include('include/header.php');
include('include/nav.php'); 
include_once('../includes/db.php');

 ?>
  <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <style>
     .box {
  display: block;
  min-width: 350px;
  height: 300px;
  margin: 10px;
  background-color: white;
  border-radius: 5px;
 margin-left: 40%;
  -webkit-transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
  transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
  overflow: hidden;
}

.upload-options {
  position: relative;
  height: 75px;
    width: 250px;
  background-color: cadetblue;
  cursor: pointer;
  overflow: hidden;
  text-align: center;
  -webkit-transition: background-color ease-in-out 150ms;
  transition: background-color ease-in-out 150ms;
}
.upload-options:hover {
  background-color: #7fb1b3;
}
.upload-options input {
  width: 0.1px;
  height: 0.1px;
  opacity: 0;
  overflow: hidden;
  position: absolute;
  z-index: -1;
}
.upload-options label {
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-align: center;
      -ms-flex-align: center;
          align-items: center;
  width: 250px;
  height: 100%;
  font-weight: 200;
  text-align: center;
  text-overflow: ellipsis;
  white-space: nowrap;
  cursor: pointer;
  overflow: hidden;
}
.upload-options label::after {
  content: 'Add Banner';
  font-family: 'Material Icons';
  position: absolute;
  font-size:20px;
  color: #e6e6e6;
  top: calc(50% - 1.5rem);
  left: calc(40% - 1.25rem);
  z-index: 0;
}
.upload-options label span {
  display: inline-block;
  width: 250px;
  height: 100%;
  text-overflow: ellipsis;
  white-space: nowrap;
  overflow: hidden;
  vertical-align: middle;
  text-align: center;
}
.upload-options label span:hover i.material-icons {
  color: lightgray;
}

.js--image-preview {
  height: 225px;
  width: 250px;
  position: relative;
  overflow: hidden;
  background-image: url("");
  background-color: white;
  background-position: center center;
  background-repeat: no-repeat;
  background-size: cover;
}
.js--image-preview::after {
  content: "photo_size_select_actual";
  font-family: 'Material Icons';
  position: relative;
  font-size: 4.5em;
  color: #e6e6e6;
  top: calc(50% - 3rem);
  left: calc(50% - 2.25rem);
  z-index: 0;
}
.js--image-preview.js--no-default::after {
  display: none;
}

i.material-icons {
  -webkit-transition: color 100ms ease-in-out;
  transition: color 100ms ease-in-out;
  font-size: 2.25em;
  line-height: 55px;
  color: white;
  display: block;
}

.drop {
  display: block;
  position: absolute;
  background: rgba(95, 158, 160, 0.2);
  border-radius: 100%;
  -webkit-transform: scale(0);
          transform: scale(0);
}

.animate {
  -webkit-animation: ripple 0.4s linear;
          animation: ripple 0.4s linear;
}

@-webkit-keyframes ripple {
  100% {
    opacity: 0;
    -webkit-transform: scale(2.5);
            transform: scale(2.5);
  }
}

@keyframes ripple {
  100% {
    opacity: 0;
    -webkit-transform: scale(2.5);
            transform: scale(2.5);
  }
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
                                <li><a href="#">Banner Management</a></li>
                                <li class="active">Banner Upload</li>
                            </ol>
                            <h4 class="page-title">Upload Banner</h4>
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
                                    <form class="form-horizontal" enctype="multipart/form-data" method="post" action="admin/upload_banner.php" role="form" onSubmit="return validate();">
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

                                     <br>
   <h3 class="text-center"><div class="alert alert-success"> Upload Primary & Secondry Banner Images</div></h3>  

<div class="form-group">
    <div class="col-md-10">
    
     <div class="box">
    <div class="js--image-preview"></div>
   
    <div class="upload-options">
   
      <label>
    
        <input type="file" name="primary" id="primary" class="image-upload" accept="image/*" onchange="primaryImage()" />
      </label>
    </div>
  </div>
</div>
</div>
<div class="form-group">
    <div class="col-md-10">
  <div class="box">
    <div class="js--image-preview"></div>
    <div class="upload-options">
      <label>
        <input type="file" name="secondry" id="secondry" class="image-upload" accept="image/*" onchange="secondry_image()" />
      </label>
    </div>
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
                                                <td>
                                                    <label class="switch">
                                                        <input type="checkbox" name="ch_sunday"  value="1" id="sunday" checked="">
                                                        <span class="slider round"></span>
                                                    </label>
                                                </td>

                                                <td>
                                                    <label class="switch">
                                                        <input type="checkbox" name="ch_monday"  value="1" id="monday" checked="">
                                                        <span class="slider round"></span>
                                                    </label>
                                                </td>

                                                <td>
                                                    <label class="switch">
                                                        <input type="checkbox" value="1" name="ch_tuesday" id="tuesday" checked="" >
                                                        <span class="slider round"></span>
                                                    </label>
                                                </td>

                                                <td>
                                                    <label class="switch">
                                                        <input type="checkbox" name="ch_wednesday" id="wednesday" checked=""   value="1">
                                                        <span class="slider round"></span>
                                                    </label>
                                                </td>

                                                <td>
                                                    <label class="switch">
                                                        <input type="checkbox" name="ch_thursday"  value="1" id="thursday" checked="" >
                                                        <span class="slider round"></span>
                                                    </label>
                                                </td>

                                                <td>
                                                    <label class="switch">
                                                        <input type="checkbox" name="ch_friday"  value="1" id="frinday" checked="" >
                                                        <span class="slider round"></span>
                                                    </label>
                                                </td>

                                                <td>
                                                    <label class="switch">
                                                        <input type="checkbox"  name="ch_saturday" value="1" id="saturday" checked="">
                                                        <span class="slider round"></span>
                                                    </label>
                                                </td>
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

  <script src='//production-assets.codepen.io/assets/common/stopExecutionOnTimeout-b2a7b3fe212eaa732349046d8416e00a9dec26eb7fd347590fbced3ab38af52e.js'></script>
<script>
   
function initImageUpload(box) {
  let uploadField = box.querySelector('.image-upload');

  uploadField.addEventListener('change', getFile);

  function getFile(e){
    let file = e.currentTarget.files[0];
    checkType(file);
  }
  
  function previewImage(file){
    let thumb = box.querySelector('.js--image-preview'),
        reader = new FileReader();

    reader.onload = function() {
      thumb.style.backgroundImage = 'url(' + reader.result + ')';
    }
    reader.readAsDataURL(file);
    thumb.className += ' js--no-default';
  }

  function checkType(file){
    let imageType = /image.*/;
    if (!file.type.match(imageType)) {
      throw 'Datei ist kein Bild';
    } else if (!file){
      throw 'Kein Bild gewählt';
    } else {
      previewImage(file);
    }
  }
  
}

// initialize box-scope
var boxes = document.querySelectorAll('.box');

for(let i = 0; i < boxes.length; i++) {if (window.CP.shouldStopExecution(1)){break;}
  let box = boxes[i];
  initDropEffect(box);
  initImageUpload(box);
}
window.CP.exitedLoop(1);




/// drop-effect
function initDropEffect(box){
  let area, drop, areaWidth, areaHeight, maxDistance, dropWidth, dropHeight, x, y;
  
  // get clickable area for drop effect
  area = box.querySelector('.js--image-preview');
  area.addEventListener('click', fireRipple);
  
  function fireRipple(e){
    area = e.currentTarget
    // create drop
    if(!drop){
      drop = document.createElement('span');
      drop.className = 'drop';
      this.appendChild(drop);
    }
    // reset animate class
    drop.className = 'drop';
    
    // calculate dimensions of area (longest side)
    areaWidth = getComputedStyle(this, null).getPropertyValue("width");
    areaHeight = getComputedStyle(this, null).getPropertyValue("height");
    maxDistance = Math.max(parseInt(areaWidth, 10), parseInt(areaHeight, 10));

    // set drop dimensions to fill area
    drop.style.width = maxDistance + 'px';
    drop.style.height = maxDistance + 'px';
    
    // calculate dimensions of drop
    dropWidth = getComputedStyle(this, null).getPropertyValue("width");
    dropHeight = getComputedStyle(this, null).getPropertyValue("height");
    
    // calculate relative coordinates of click
    // logic: click coordinates relative to page - parent's position relative to page - half of self height/width to make it controllable from the center
    x = e.pageX - this.offsetLeft - (parseInt(dropWidth, 10)/2);
    y = e.pageY - this.offsetTop - (parseInt(dropHeight, 10)/2) - 30;
    
    // position drop and animate
    drop.style.top = y + 'px';
    drop.style.left = x + 'px';
    drop.className += ' animate';
    e.stopPropagation();
    
  }
}

//# sourceURL=pen.js
</script>





<script>
    
$('#monday').on('change', function(){
   this.value = this.checked ? 1 : 0;
});

$('#tuesday').on('change', function(){
   this.value = this.checked ? 1 : 0;
});

$('#wednesday').on('change', function(){
   this.value = this.checked ? 1 : 0;
});

$('#thursday').on('change', function(){
   this.value = this.checked ? 1 : 0;
});

$('#friday').on('change', function(){
   this.value = this.checked ? 1 : 0;
});

$('#saturday').on('change', function(){
   this.value = this.checked ? 1 : 0;
});

$('#sunday').on('change', function(){
   this.value = this.checked ? 1 : 0;
});

</script>
<script>
      $(document).ready(function(){
        
        $("#").keyup(function(){



        });

        $("#").keyup(function(){



        });

        $("#").keyup(function(){



        });
      })

</script>


<script type="text/javascript">
    function primaryImage(){
        var fileName = document.getElementById("primary").value;
        var idxDot = fileName.lastIndexOf(".") + 1;
        var extFile = fileName.substr(idxDot, fileName.length).toLowerCase();
        if (extFile=="jpg" || extFile=="jpeg" || extFile=="png"){
            //TO DO
        }else{
            alert("Only jpg/jpeg and png files are allowed!");
            document.getElementById("upload_imgs").value='';
        }   
    }
</script>     


<script type="text/javascript">
    function secondry_image(){
        var fileName = document.getElementById("secondry").value;
        var idxDot = fileName.lastIndexOf(".") + 1;
        var extFile = fileName.substr(idxDot, fileName.length).toLowerCase();
        if (extFile=="jpg" || extFile=="jpeg" || extFile=="png"){
            //TO DO
        }else{
            alert("Only jpg/jpeg and png files are allowed!");
            document.getElementById("upload_imgs").value='';
        }   
    }
</script>     


                