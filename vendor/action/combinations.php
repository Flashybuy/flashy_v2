<?php
include('combination_function.php');
$options = array();
if (isset($_POST['vari_type'])) {
	

	foreach ($_POST['vari_type'] as $key => $no) {
		$name = 'options_'.$no;
		$my_str = implode('|', $_POST[$name]);
		array_push($options, explode(',', $my_str));
	}
	$combinations = combinations($options);
	foreach ($combinations as $key => $combination) {
		

		$str = '';
		foreach ($combination as $key => $item){
			if($key > 0 ){
				$str .= '-'.str_replace(' ', '', $item);
			}
			else{
					$str .= str_replace(' ', '', $item);
				}
		}
		if(strlen($str) > 0){
		?>
		<tr><td><label for="" class="control-label"><?php echo $str; ?></label></td><td><input type="number" name="price[]" value="" min="1" step="1" class="form-control" required></td><td><input type="text" name="sku[]" value="<?php echo $str; ?>" class="form-control" required></td><td><input type="number" name="qty[]"  min="1" step="1" class="form-control" required></td></tr> 
	 <?php	
	}}
// 	// 
// 	foreach ($my_str as $key => $a) {
// 		$my_str =  explode(',', $a);
// 		foreach ($my_str as $key => $value) {
// 			array_push($options, explode(',', $value));

// 		}
// 	}
// foreach ($options as $key => $value) {


// }
	
}

?>
