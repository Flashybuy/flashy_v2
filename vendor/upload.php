<?php
include("../thirdparty/image-resize/ImageResize.php");
include ("../thirdparty/image-resize/ImageResizeException.php");
use \Gumlet\ImageResize;
use \Gumlet\ImageResizeException;
if(isset($_POST["submit"])) {
    $filename = $_FILES["file1"]["name"];
    $extension = @end(explode('.', $filename)); // explode the image name to get the extension
    $pic1extension = strtolower($extension);
    $pic1 = time().rand();
    $pic1we=$pic1.$pic1extension;
    $location = "../upload/product/".$pic1we;

if(move_uploaded_file($_FILES["file1"]["tmp_name"], $location)){

try {
    $image = new ImageResize($target_file);
    $image->quality_jpg = 85;
    $image->resizeToWidth(800);
    $image->resizeToHeight(800);
    $new_name = '800_' . $pic1 . '.jpg';
    $new_path = '../upload/product/' . $new_name;
    $image->save($new_path, IMAGETYPE_JPEG);
  
} catch (ImageResizeException $e) {
    return null;
}
try {
    $image = new ImageResize($target_file);
    $image->quality_jpg = 85;
    $image->resizeToWidth(300);
    $image->resizeToHeight(300);
    $new_name = '300_' . $pic1 . '.jpg';
    $new_path = '../upload/product/' . $new_name;
    $image->save($new_path, IMAGETYPE_JPEG);
  
} catch (ImageResizeException $e) {
    return null;
}
try {
    $image = new ImageResize($target_file);
    $image->quality_jpg = 85;
    $image->resizeToWidth(200);
    $image->resizeToHeight(150);
    $new_name = '200_' . $pic1 . '.jpg';
    $new_path = '../upload/product/' . $new_name;
    $image->save($new_path, IMAGETYPE_JPEG);
  
} catch (ImageResizeException $e) {
    return null;
}
       }
    }
?>