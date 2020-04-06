<?php include('../../includes/db.php');


if (isset($_POST['subsubcategoryid'])) {
	

	$subsubcategoryid = $_POST['subsubcategoryid'];


	$sql = "SELECT * from variant_options WHERE subsubcategory_id ='$subsubcategoryid'";

	$query = mysqli_query($con,$sql);

	while ($row = mysqli_fetch_array($query)) {
		
		$options =  $row['options'];
		
	}
	if (!empty($options)) {
		
	
			foreach (json_decode($options) as $key => $element){
		    if ($element->type == 'text'){ ?>
		            <div class="row">
		                <div class="col-md-2">
		                    <label><?php echo $element->label; ?> <span class="required-star">*</span></label>
		                </div>
		                <div class="col-md-10">
		                    <input type="<?php echo $element->type; ?>" class="form-control mb-3" placeholder="<?php echo $element->label; ?>" name="element_<?php echo $key; ?>" required>
		                </div>
		            </div><br>
		    <?php
			}
			elseif($element->type == 'file'){?>
		                                    <div class="row">
		                                        <div class="col-md-2">
		                                            <label><?php echo $element->label ?></label>
		                                        </div>
		                                        <div class="col-md-10">
		                                            <input type="<?php echo $element->type ?>" name="element_<?php echo $key ?>" id="file-2" class="custom-input-file custom-input-file--4" data-multiple-caption="count files selected" required/>
		                                            <label for="file-2" class="mw-100 mb-3">
		                                                <span></span>
		                                                <strong>
		                                                    <i class="fa fa-upload"></i>
		                                                    Choose file
		                                                </strong>
		                                            </label>
		                                        </div>
		                                    </div><br>
		    <?php 
			}
		    		elseif ($element->type == 'select' && is_array(json_decode($element->options))){?>
		                                    <div class="row">
		                                        <div class="col-md-2">
		                                            <label><?php echo $element->label ?></label>
		                                        </div>
		                                        <div class="col-md-10">
		                                            <div class="mb-3">
		                                                <select class="form-control selectpicker" data-minimum-results-for-search="Infinity" name="element_<?php echo $key ?>" required>
		                                                </select>
		                                                	<?php
		                                                    foreach (json_decode($element->options) as $value){?>
		                                                        <option value="<?php echo $value ?>"><?php echo $value ?></option>
		                                                    
		                                                    <?php } ?>
		                                                </select>
		                                            </div>
		                                        </div>
		                                    </div><br>
		    <?php

		    		}
		    		elseif ($element->type == 'multi_select' && is_array(json_decode($element->options))){?>
		                                    <div class="row">
		                                        <div class="col-md-2">
		                                            <label><?php echo $element->label ?></label>
		                                        </div>
		                                        <div class="col-md-10">
		                                            <div class="mb-3">
		                                                <select class="select2" name="element_<?php echo $key ?>[]" id="variations_name" multiple="multiple" multiple data-placeholder="Choose ...">
		                                                	<?php
		                                                    foreach (json_decode($element->options) as $value){?>
		                                                        <option value="<?php echo $value ?>"><?php echo $value ?></option>
		                                                    <?php } ?>
		                                                </select>
		                                            </div>
		                                        </div>
		                                    </div><br>
		           <?php
		            }
		            	elseif ($element->type == 'radio'){?>
		                                    <div class="row">
		                                        <div class="col-md-2">
		                                            <label><?php echo $element->label ?></label>
		                                        </div>
		                                        <div class="col-md-10">
		                                            <div class="mb-3">
		                                             <?php  foreach (json_decode($element->options) as $value){?>
		                                                    <div class="radio radio-inline">
		                                                        <input type="radio" name="element_<?php echo $key ?>" value="<?php echo $value ?>" id="<?php echo $value ?>" required>
		                                                        <label for="<?php echo $value ?>"><?php echo $value ?></label>
		                                                    </div>
		                                                <?php } ?>
		                                            </div>
		                                        </div>
		                                    </div><br>
		            <?php
		                }
			}
	}
}
?>
<script type="text/javascript">
	
	$("select.select2").select2();
</script>