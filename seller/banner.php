<?php

include('include/header.php');
include('include/nav.php'); 
include_once('../includes/db.php');

 ?>
    <style>
       .container {
  padding-top: 3%;
}

.hide-element {
  display: none;
}

.glyphicon-remove-circle {
  float: right;
  font-size: 2em;
  cursor: pointer;
}


/*
* http://www.abeautifulsite.net/whipping-file-inputs-into-shape-with-bootstrap-3/
*/

.btn-file {
  position: relative;
  overflow: hidden;
  /*box-shadow: 10px 10px 5px #888888;*/
}

.btn-file input[type=file] {
  position: absolute;
  top: 0;
  right: 0;
  min-width: 100%;
  min-height: 100%;
  font-size: 100px;
  text-align: right;
  filter: alpha(opacity=0);
  opacity: 0;
  outline: none;
  background: white;
  cursor: inherit;
  display: block;
}


#uploadDataInfo p {
  margin-left: 2%;
  margin-top: 3%;
  font-size: 1.2em;
}

.media-left #edit {
  z-index: 1000;
  cursor: pointer;
}

.thumbnail #edit {
  position: absolute;
  display: inline;
  z-index: 1000;
  top: 1px;
  right: 15px;
  cursor: pointer;
}

.thumbnail #delete {
  position: absolute;
  display: inline;
  z-index: 1000;
  margin-top: 4%;
  top: 20px;
  right: 15px;
  cursor: pointer;
}

.caption input[type="text"] {
  /*width: 80%;*/
}

.thumbnail .fa-check-circle {
  color: #006dcc;
  *color: #0044cc;
}

.thumbnail .fa-times-circle {
  color: #E74C3C;
}

.modal-header .close {
  float: right !important;
  margin-right: -30px !important;
  margin-top: -25px !important;
  background-color: white !important;
  border-radius: 15px !important;
  width: 30px !important;
  height: 30px !important;
  opacity: 1 !important;
}

.modal-header {
  padding: 0px;
  min-height: 0px;
}

.modal-dialog {
  top: 50px;
}

.media-left img {
  cursor: pointer;
}

.label-tags {
  font-size: 16px;
  padding: 1%;
  color: black;
  background-color: white;
  border: 1px solid blue;
  border-radius: 4px;
  margin: 3px;
}

.label-tags i {
  cursor: pointer;
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
                                <li><a href="#">Crousel Management</a></li>
                                <li class="active">Crousel Upload</li>
                            </ol>
                            <h4 class="page-title">Upload Crousel</h4>
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
                                    <form class="form-horizontal" enctype="multipart/form-data" method="post" action="admin/upload_banner.php" role="form">
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
                                            <label class="col-md-2 control-label">Primary Image</label>
                                            <div class="col-md-10">
<div id="individualImagePreview" class="modal fade" role="dialog">
<div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><i class="fa fa-times"></i></button>
      </div>
      <div class="modal-body">
        <img src="" alt="default image"  class="img-responsive" id="individualPreview" />
      </div>
      <div class="modal-footer" id="displayTags">
        <div class="pull-left">

        </div>
      </div>
    </div>
</div>
</div>

<div class="container">
  
  <div class="alert hide-element" role="alert" id="file-error-message">
    <span class='glyphicon glyphicon-remove-circle'></span>
    <p></p>
  </div>
    <span class="btn btn-primary btn-file">
    Browse <input type="file" name="primary" accept="image/*" id="uploadImages"/></span>
    <button type="button" data-toggle="modal" data-target="#myModal" 
    class="btn btn-primary disabled" value="Preview" name="imagesUpload" id="imagesUpload">Preview</button>
  

  <div class="hide-element" id="previewImages">
    <div class="media">
      <div class="media-left">

        <img class="media-object thumbnail" src="img/200x200.gif" alt="" id="0" title="" data-toggle="modal" data-target="#individualImagePreview" />
      </div>
      <div class="media-body">
        <a role="button" class="btn btn-primary hide-element" id="undo0">Undo</a>
        <a role="button" class="btn btn-danger pull-right" id="delete0">Delete</a>
      </div>
    </div>
    <div class="media">
      <div class="media-left">
        <img class="media-object thumbnail" src="img/200x200.gif" alt="" id="1" title="" data-toggle="modal" data-target="#individualImagePreview" />
      </div>
      <div class="media-body">
        <a role="button" class="btn btn-primary hide-element" id="undo1">Undo</a>
        <a role="button" class="btn btn-danger pull-right" id="delete1">Delete</a>
      </div>
    </div>
    <div class="media">
      <div class="media-left">
        <img class="media-object thumbnail" src="img/200x200.gif" alt="" id="2" title="" data-toggle="modal" data-target="#individualImagePreview" />
      </div>
      <div class="media-body">
        <a role="button" class="btn btn-primary hide-element" id="undo2">Undo</a>
        <a role="button" class="btn btn-danger pull-right" id="delete2">Delete</a>
      </div>
    </div>
    <div class="media">
      <div class="media-left">
        <img class="media-object thumbnail" src="img/200x200.gif" alt="" id="3" data-toggle="modal" data-target="#individualImagePreview" />
      </div>
      <div class="media-body">
        
        <a role="button" class="btn btn-primary hide-element" id="undo3">Undo</a>
        <a role="button" class="btn btn-danger pull-right" id="delete3">Delete</a>
      </div>
    </div>
  </div>

  <div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"><i class="fa fa-times"></i></button>
        </div>
        <div class="modal-body">
          <div id="myCarousel" class="carousel slide">
            <div class="carousel-inner" role="listbox" id="previewItems">
            </div>
            <!-- Left and right controls -->
            <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
              <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
              <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>
        </div>
        <div class="modal-footer hide-element">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>

    </div>
  </div>
</div>

                                            </div>
                                        </div>

                                         <div class="form-group">
                                            <label class="col-md-2 control-label">Secondry</label>
                                            <div class="col-md-10">
                                                <div class="container">
  
  <div class="alert hide-element" role="alert" id="file-error-message">
    <span class='glyphicon glyphicon-remove-circle'></span>
    <p></p>
  </div>
    <span class="btn btn-primary btn-file">
    Browse <input type="file" multiple="multiple" accept="image/*" id="uploadImages"/></span>
    <button type="button" data-toggle="modal" data-target="#myModal" 
    class="btn btn-primary disabled" value="Preview" name="imagesUpload" id="imagesUpload">Preview</button>
  

  <div class="hide-element" id="previewImages">
    <div class="media">
      <div class="media-left">

        <img class="media-object thumbnail" src="img/200x200.gif" alt="" id="0" title="" data-toggle="modal" data-target="#individualImagePreview" />
      </div>
      <div class="media-body">
        <a role="button" class="btn btn-primary hide-element" id="undo0">Undo</a>
        <a role="button" class="btn btn-danger pull-right" id="delete0">Delete</a>
      </div>
    </div>
    <div class="media">
      <div class="media-left">
        <img class="media-object thumbnail" src="img/200x200.gif" alt="" id="1" title="" data-toggle="modal" data-target="#individualImagePreview" />
      </div>
      <div class="media-body">
        <a role="button" class="btn btn-primary hide-element" id="undo1">Undo</a>
        <a role="button" class="btn btn-danger pull-right" id="delete1">Delete</a>
      </div>
    </div>
    <div class="media">
      <div class="media-left">
        <img class="media-object thumbnail" src="img/200x200.gif" alt="" id="2" title="" data-toggle="modal" data-target="#individualImagePreview" />
      </div>
      <div class="media-body">
        <a role="button" class="btn btn-primary hide-element" id="undo2">Undo</a>
        <a role="button" class="btn btn-danger pull-right" id="delete2">Delete</a>
      </div>
    </div>
    <div class="media">
      <div class="media-left">
        <img class="media-object thumbnail" src="img/200x200.gif" alt="" id="3" data-toggle="modal" data-target="#individualImagePreview" />
      </div>
      <div class="media-body">
        
        <a role="button" class="btn btn-primary hide-element" id="undo3">Undo</a>
        <a role="button" class="btn btn-danger pull-right" id="delete3">Delete</a>
      </div>
    </div>
  </div>

  <div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"><i class="fa fa-times"></i></button>
        </div>
        <div class="modal-body">
          <div id="myCarousel" class="carousel slide">
            <div class="carousel-inner" role="listbox" id="previewItems">
            </div>
            <!-- Left and right controls -->
            <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
              <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
              <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>
        </div>
        <div class="modal-footer hide-element">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>

    </div>
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

  <script>
   $(document).ready(function() {
  $('[data-toggle="tooltip"]').tooltip({
    html: true
  });
  $('.media').addClass('hide-element');
  $('#imagesUploadForm').submit(function(evt) {
    evt.preventDefault();
  });
 
  $('#delete').click(function() {
    console.log('click detected inside circl-o of delete');
    $('#delete').toggleClass('fa-circle-o').toggleClass('fa-times-circle');
  });
  //namespace variable to determine whether to continue or not
  var proceed = false;
  //Ensure that FILE API is supported by the browser to proceed
  if (window.File && window.FileReader && window.FileList && window.Blob) {
    if (window.webkitURL || window.URL) {
      $('#errorMessaage').removeClass('hide-element').addClass(
        'alert-success').html('<span class="glyphicon glyphicon-ok"></span>\n\
            <span class="sr-only">Success:</span>Great your browser is compatiblle for Files API. \n\
Enjoy the demo');
      proceed = true;
    } else {
      $('#errorMessaage').removeClass('hide-element').addClass(
        'alert-warning').html('<span class="glyphicon glyphicon-exclamation-sign"></span>\n\
            <span class="sr-only">Warning:</span>The browser does not support few APIs used in this demo.\n\
But we will be back with a solution.');
    }

  } else {
    $('#errorMessaage').removeClass('hide-element').addClass(
      'alert-warning').html('<span class="glyphicon glyphicon-exclamation-sign"></span>\n\
            <span class="sr-only">Warning:</span>Snap looks like you still live in stone age. \n\
Wake up..Time to update the browser');
  }
  if (proceed) {
    var input = "";
    var formData = new FormData();
    $('input[type=file]').on("change", function(e) {
      var counter = 0;
      var modalPreviewItems = "";
      input = this.files;
      $($(this)[0].files).each(function(i, file) {
        formData.append("file[]", file);
      });
      $('#previewImages').removeClass('hide-element');
      $('#imagesUpload').removeClass('disabled');
      var successUpload = 0;
      var failedUpload = 0;
      var extraFiles = 0;
      var size = input.length;
      $(input).each(function() {
        var reader = new FileReader();
        var uploadImage = this;
        console.log(this);
        reader.readAsArrayBuffer(this);
        reader.onload = function(e) {
          var magicNumbers = validateImage.magicNumbersForExtension(e);
          var fileSize = validateImage.isUploadedFileSizeValid(uploadImage);
          var extension = validateImage.uploadFileExtension(uploadImage);
          var isValidImage = validateImage.validateExtensionToMagicNumbers(magicNumbers);
          var thumbnail = validateImage.generateThumbnail(uploadImage);
          if (fileSize && isValidImage) {
            $('#' + counter).parents('.media').removeClass('hide-element');
            $('#' + counter).attr('src', thumbnail).height('200');
            $('#uploadDataInfo').removeClass('hide-element').addClass('alert-success');
            successUpload++;
            modalPreviewItems += carouselInsideModal.createItemsForSlider(thumbnail, counter);

          } else {
            $('#uploadDataInfo').removeClass('hide-element alert-success').addClass('alert-warning');
            failedUpload++;
          }
          counter++;
          if (counter === size) {
            $('#myCarousel').append(carouselInsideModal.createIndicators(successUpload, "myCarousel"));
            $('#previewItems').append(modalPreviewItems);
            $('#previewItems .item').first().addClass('active');
            $('#carouselIndicators > li').first().addClass('active');
            $('#myCarousel').carousel({
              interval: 2000,
              cycle: true
            });
            if (size > 4) {
              $('#toManyFilesUploaded').html("Only files displayed below will be uploaded");
              extraFiles = size - 4;
            }

            $('#filesCount').html(successUpload + " files are ready to upload");
            if (failedUpload !== 0 || extraFiles !== 0) {
              failedUpload === 0 ? "" : failedUpload;
              extraFiles === 0 ? "" : extraFiles;
              $('#filesUnsupported').html(failedUpload + extraFiles + " files were not selected for upload");
            }

          }
        };
      });

    });
    $(document).on('click', '.glyphicon-remove-circle', function() {
      $('#file-error-message').addClass('hide-element');
    });
    $("body").on("click", ".media-object", function() {
      var image = $(this).attr('src');
      $("#individualPreview").attr('src', image);
      var tags = [];
      var displayTagsWithFormat = "";
      ($(this).parents('.media').find('input[type="text"]')).each(function() {
        if ($(this).attr('name') === 'tags') {
          tags = $(this).val().split(",");
          $.each(tags, function(index) {
            displayTagsWithFormat += "<span class = 'label-tags label'>#" + tags[index] + "  <i class='fa fa-times'></i></span>";
          });
          $("#displayTags").html("<div class='pull-left'>" + displayTagsWithFormat + "</div>");
          //console.log(tags);
        }
      });
    });
    var toBeDeleted = [];
    var eachImageValues = [];
    $('.media').each(function(index) {
      var imagePresent = "";
      $("body").on("click", "#delete" + index, function() {
        imagePresent = $("#" + index).attr('src');
        $("#undo" + index).removeClass('hide-element');
        $("#" + index).attr('src', './img/200x200.gif');
        $("#delete" + index).addClass('hide-element');
        toBeDeleted.push(index);
        //console.log(toBeDeleted);                      
        $("#delete" + index).parent().find('input[type="text"]').each(function() {
          var attribute = $(this).attr('name');
          var attributeValue = $(this).val();
          eachImageValues[attribute + index] = attributeValue;
          //console.log(eachImageValues);

        });
        //console.log(toBeDeleted.length);
        if (toBeDeleted.length === 4) {
          $('#sendImagesToServer').prop('disabled', true).html('No Files to Upload');

        } else {
          $('#sendImagesToServer').prop('disabled', false).html('Update &amp; Preview');
        }

        $("#delete" + index).parent().find('input[type="text"]').prop('disabled', true).addClass('disabled');
      });
      $("body").on("click", "#undo" + index, function() {
        $("#" + index).attr('src', imagePresent);
        $("#undo" + index).addClass('hide-element');
        $("#delete" + index).removeClass('hide-element');
        var indexToDelete = toBeDeleted.indexOf(index);
        if (indexToDelete > -1) {
          toBeDeleted.splice(indexToDelete, 1);
          // console.log(toBeDeleted);
          $("#delete" + index).parent().find('input[type="text"]').prop('disabled', false).removeClass('disabled');
        }
        if (toBeDeleted.length === 4) {
          $('#sendImagesToServer').prop('disabled', true).html('No Files to Upload');

        } else {
          $('#sendImagesToServer').prop('disabled', false).html('Update &amp; Preview');
        }
      });
    });
    $('body').on("click", "#sendImagesToServer", function() {
      var counter = 0;
      var imageData = "";
      var consolidatedData = [];
      $('.media').each(function() {
        var description = "";
        var caption = "";
        var tags = "";
        $('.media').find('input[type="text"]').each(function(index) {
          if ((index === 0 || index <= 11) && counter <= 11) {
            counter++;
            var attributeName = "";
            var attributeValue = "";

            attributeName = $(this).attr('name');
            attributeValue = $(this).val();
            switch (attributeName) {
              case "description":
                description = attributeValue;
                // console.log(description);
                break;
              case "caption":
                caption = attributeValue;
                // console.log(caption);
                break;
              case "tags":
                tags = attributeValue;
                // console.log(tags);
                break;
              default:
                break;
            }
            if (counter % 3 === 0) {
              imageData = new imageInformation(description, caption, tags);
              consolidatedData.push(imageData);
              //JSON.stringify(consolidatedData);                        
              //console.log(toBeDeleted);
            }
          }
        });
      });
      imageData = new deleteList(toBeDeleted);
      consolidatedData.push(imageData);
      var sendData = JSON.stringify(consolidatedData);
      formData.append("important", sendData);
      $.ajax({
        type: 'POST',
        url: 'upload.php',
        xhr: function() {
          var customXhr = $.ajaxSettings.xhr();
          if (customXhr.upload) {
            customXhr.upload.addEventListener('progress', progressHandlingFunction, false); // For handling the progress of the upload
          }
          return customXhr;
        },
        data: formData,
        dataType: 'json',
        cache: false,
        contentType: false,
        processData: false,
        success: function(data) {
          $('#ajaxLoad').addClass('hide-element');
          $('#successResponse').html(data.message);
          console.log(data.message + " inside success function");
        },
        error: function(data) {
          $('#successResponse').html(data.responseJSON.message).addClass('label label-danger').css({
            'font-size': '18px'
          });
          console.log(data.responseJSON.message + " inside error function");
        }
      });

      function progressHandlingFunction(e) {
        if (e.lengthComputable) {
          $('#progressIndicator').css({
            'width': e.loaded
          });
        }
      };
      //
      //console.log(JSON.stringify(consolidatedData));
    });

    function imageInformation(description, caption, tags) {
      this.description = description;
      this.caption = caption;
      this.tags = tags;
    };

    function deleteList(toBeDeleted) {
      this.toBeDeleted = toBeDeleted;
    };
    var validateImage = {
      magicNumbersForExtension: function(event) {
        var headerArray = (new Uint8Array(event.target.result)).subarray(0, 4);
        var magicNumber = "";
        for (var counter = 0; counter < headerArray.length; counter++) {
          magicNumber += headerArray[counter].toString(16);
        }
        return magicNumber;
      },
      isUploadedFileSizeValid: function(fileUploaded) {
        var fileSize = fileUploaded.size;
        var maximumSize = 2097125;
        var isValid = "";
        if (fileSize <= maximumSize) {
          isValid = true;
        } else {
          isValid = false;
        }
        return isValid;
      },
      uploadFileExtension: function(fileUploaded) {
        var fileExtension = "";
        var imageType = "";
        imageType = fileUploaded.type.toLowerCase();
        fileExtension = imageType.substr((imageType.lastIndexOf('/') + 1));
        return fileExtension;
      },
      validateExtensionToMagicNumbers: function(magicNumbers) {
        var properExtension = "";
        if (magicNumbers.toLowerCase() === "ffd8ffe0" || magicNumbers.toLowerCase() === "ffd8ffe1" ||
          magicNumbers.toLowerCase() === "ffd8ffe8" ||
          magicNumbers.toLocaleLowerCase() === "89504e47") {
          properExtension = true;

        } else {
          properExtension = false;
        }
        return properExtension;
      },
      generateThumbnail: function(uploadImage) {
        if (window.URL)
          imageSrc = window.URL.createObjectURL(uploadImage);
        else
          imageSrc = window.webkitURL.createObjectURL(uploadImage);
        return imageSrc;
      }
    };
    var carouselInsideModal = {
      createIndicators: function(carouselLength, dataTarget) {
        var carouselIndicators = '<ol class = "carousel-indicators" id="carouselIndicators">';
        for (var counter = 0; counter < carouselLength; counter++) {
          carouselIndicators += '<li data-target = "#' + dataTarget + '"data-slide-to="' + counter + '"></li>';
        }
        carouselIndicators += "</ol>";
        return carouselIndicators;
      },
      createItemsForSlider: function(imgSrc, counter) {
        var item = '<div class = "item">' + '<img src="' + imgSrc + '" id="preview' + counter + '" /></div>';
        return item;
      }
    };
  }
});
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



                   <!--  <script>
                        // Time Picker
                        $('#timepicker').timepicker({
                            defaultTIme: false
                        });
                        $('#timepicker2').timepicker({
                            showMeridian: false
                        });
                        $('#timepicker3').timepicker({
                            minuteStep: 15
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
                        }, function(start, end, label) {
                            console.log(start.toISOString(), end.toISOString(), label);
                            $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
                        });
                    </script> -->