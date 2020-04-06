<?php
function upLoadPic($name,$id)
{

	$id = str_replace(" " , "-" , $id );
	$cl = trim($name['name']);
	$pic="";
	$fileName="";
	if(isset($cl) and $cl != "")
	{
		if(!file_exists("../upload_images/"))
		mkdir("../upload_images/", 0777);
		$uploadDir = "../upload_images/";
		$uploadFile = $uploadDir.$id;
		if( move_uploaded_file($name['tmp_name'], $uploadFile) )
		{
			return $id;
		}else{
			return "error";
		}
	}
}
function upLoadPic2($name,$id)
{
	$cl = trim($name['name']);
	$pic="";
	$fileName="";
	if(isset($cl) and $cl != "")
	{
		$temp_fileName = explode(".", $name['name']);
		if(!file_exists("../upload_images/"))
		mkdir("../upload_images/", 0777);
		$uploadDir = "../upload_images/";
		$uploadFile = $uploadDir.$id;
		if( move_uploaded_file($name['tmp_name'], $uploadFile) )
		{
			return $id;
		}else{
			return "error";
		}
	}
}
function upLoadFile($name,$id)
{
	$cl = trim($name['name']);
	$pic="";
	$fileName="";
	if(isset($cl) and $cl != "")
	{
		$temp_fileName = explode(".", $name['name']);
		if(!file_exists("upload_doc/"))
		mkdir("upload_doc/", 0777);
		$uploadDir = "upload_doc/";
		$uploadFile = $uploadDir.$id;
		if( move_uploaded_file($name['tmp_name'], $uploadFile) )
		{
			return $id;
		}else{
			return "error";
		}
	}
}

function strpSlash($value){
	return stripslashes($value);	
}

function emailFormat($to , $from , $subject , $emailMessage)
{
	$htmlFormat = '<style type="text/css">
				.text {font-family: Arial, Helvetica, sans-serif; font-size: 12px; }
				.heading_bold_black
				{
					font-family: Arial, "MS Sans Serif";
					font-size: 14px;
					color: #000000;
					font-weight: bold;
				}
				.brd {
					BORDER-RIGHT: #000000 1px solid; 
					BORDER-TOP: #000000 1px solid; 
					BORDER-LEFT: #000000 1px solid; 
					BORDER-BOTTOM: #000000 1px solid; 
					border-color: #3399CC;
				}
				.style1 {font-family: Arial, Helvetica, sans-serif; font-size: 12px; font-weight: bold; }
			</style>
				<table width="800" align="center" cellpadding="0" cellspacing="0"  >						
					<tr>
						<td  valign="top">'.$emailMessage.'</td>
					</tr> 									
				</table>'; 

  // Always set content-type when sending HTML email
	$headers = "MIME-Version: 1.0" . "\r\n";
	$headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";// More headers
	$headers .= "From: support@flashybuy.com\r\n";
	$headers .= "Bcc: support@flashybuy.com,ahumza786@gmail.com\r\n";
	
	if(@mail($to , $subject , $htmlFormat , $headers)){
		return true;
	}else{
		              
	}
	
}

function generateRandomString($length = 7) {
    $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

function getTime( $times ){

	$time =  $times ;
	
	$days = floor($time / (24*60*60));
	$hours = floor(($time - ($days*24*60*60)) / (60*60));
	$minutes = floor(($time - ($days*24*60*60)-($hours*60*60)) / 60);
	
	if($days > 0 ){
		$string = $days.' dys ';
	}
	if($hours > 0 ){
		$string .= $hours.' hr ';
	}
	
	
	echo $string;
	if($string == "" ){
		echo  'Within Hr';
	}

}
  // Time format is UNIX timestamp or
  // PHP strtotime compatible strings
  function dateDiff($time1, $time2, $precision = 6) {
    // If not numeric then convert texts to unix timestamps
    if (!is_int($time1)) {
      $time1 = strtotime($time1);
    }
    if (!is_int($time2)) {
      $time2 = strtotime($time2);
    }

    // If time1 is bigger than time2
    // Then swap time1 and time2
    if ($time1 > $time2) {
      $ttime = $time1;
      $time1 = $time2;
      $time2 = $ttime;
    }

    // Set up intervals and diffs arrays
    $intervals = array('year','month','day','hour','minute','second');
	$timeAbb["year"] = "yr";
	$timeAbb["month"] = "mn";
	$timeAbb["day"] = "dy";
	$timeAbb["hours"] = "hr";
	$timeAbb["minutes"] = "mn";
	$timeAbb["seconds"] = "sec";

	
    $diffs = array();

    // Loop thru all intervals
    foreach ($intervals as $interval) {
      // Create temp time from time1 and interval
      $ttime = strtotime('+1 ' . $interval, $time1);
      // Set initial values
      $add = 1;
      $looped = 0;
      // Loop until temp time is smaller than time2
      while ($time2 >= $ttime) {
        // Create new temp time from time1 and interval
        $add++;
        $ttime = strtotime("+" . $add . " " . $interval, $time1);
        $looped++;
      }
 
      $time1 = strtotime("+" . $looped . " " . $interval, $time1);
      $diffs[$interval] = $looped;
    }
    
    $count = 0;
    $times = array();
    // Loop thru all diffs
    foreach ($diffs as $interval => $value) {
      // Break if we have needed precission
      if ($count >= $precision) {
        break;
      }
      // Add value and interval 
      // if value is bigger than 0
      if ($value > 0) {
        // Add s if value is not 1
        if ($value != 1) {
          $interval .= "s";
        }
        // Add value and interval to times array
        $times[] = $value . " " . $timeAbb[$interval];
        $count++;
      }
    }

    // Return string with times
    return implode(", ", $times);
  }
// Link image type to correct image loader and saver
// - makes it easier to add additional types later on
// - makes the function easier to read
/*const IMAGE_HANDLERS = [
    IMAGETYPE_JPEG => [
        'load' => 'imagecreatefromjpeg',
        'save' => 'imagejpeg',
        'quality' => 100
    ],
    IMAGETYPE_PNG => [
        'load' => 'imagecreatefrompng',
        'save' => 'imagepng',
        'quality' => 0
    ],
    IMAGETYPE_GIF => [
        'load' => 'imagecreatefromgif',
        'save' => 'imagegif'
    ]
];*/
/**
 * @param $src - a valid file location
 * @param $dest - a valid file target
 * @param $targetWidth - desired output width
 * @param $targetHeight - desired output height or null
 */
function createThumbnail($src, $dest, $targetWidth, $targetHeight = null) {
    // 1. Load the image from the given $src
    // - see if the file actually exists
    // - check if it's of a valid image type
    // - load the image resource
    // get the type of the image
    // we need the type to determine the correct loader
    $type = exif_imagetype($src);
    // if no valid type or no handler found -> exit
    if (!$type || !IMAGE_HANDLERS[$type]) {
        return null;
    }
    // load the image with the correct loader
    $image = call_user_func(IMAGE_HANDLERS[$type]['load'], $src);
    // no image found at supplied location -> exit
    if (!$image) {
        return null;
    }
    // 2. Create a thumbnail and resize the loaded $image
    // - get the image dimensions
    // - define the output size appropriately
    // - create a thumbnail based on that size
    // - set alpha transparency for GIFs and PNGs
    // - draw the final thumbnail
    // get original image width and height
    $width = imagesx($image);
    $height = imagesy($image);
    // maintain aspect ratio when no height set
    if ($targetHeight == null) {
        // get width to height ratio
        $ratio = $width / $height;
        // if is portrait
        // use ratio to scale height to fit in square
        if ($width > $height) {
            $targetHeight = floor($targetWidth / $ratio);
        }
        // if is landscape
        // use ratio to scale width to fit in square
        else {
            $targetHeight = $targetWidth;
            $targetWidth = floor($targetWidth * $ratio);
        }
    }
    // create duplicate image based on calculated target size
    $thumbnail = imagecreatetruecolor($targetWidth, $targetHeight);
    // set transparency options for GIFs and PNGs
    if ($type == IMAGETYPE_GIF || $type == IMAGETYPE_PNG) {
        // make image transparent
        imagecolortransparent(
            $thumbnail,
            imagecolorallocate($thumbnail, 0, 0, 0)
        );
        // additional settings for PNGs
        if ($type == IMAGETYPE_PNG) {
            imagealphablending($thumbnail, false);
            imagesavealpha($thumbnail, true);
        }
    }
    // copy entire source image to duplicate image and resize
    imagecopyresampled(
        $thumbnail,
        $image,
        0, 0, 0, 0,
        $targetWidth, $targetHeight,
        $width, $height
    );
    // 3. Save the $thumbnail to disk
    // - call the correct save method
    // - set the correct quality level
    // save the duplicate version of the image to disk
    return call_user_func(
        IMAGE_HANDLERS[$type]['save'],
        $thumbnail,
        $dest,
        IMAGE_HANDLERS[$type]['quality']
    );
}




const IMAGE_HANDLERS = [
    IMAGETYPE_JPEG => [
        'load' => 'imagecreatefromjpeg',
        'save' => 'imagejpeg',
        'quality' => 100
    ],
    IMAGETYPE_PNG => [
        'load' => 'imagecreatefrompng',
        'save' => 'imagepng',
        'quality' => 0
    ],
    IMAGETYPE_GIF => [
        'load' => 'imagecreatefromgif',
        'save' => 'imagegif'
    ]
];
function igImagePrepare($img,$name , $width){
   
    $square_size = $width;
    $dir = '../upload_images/';
   

    //Your Image
    $imgSrc = $img;

    //getting the image dimensions
    list($width, $height) = getimagesize($imgSrc);
	
	

    //saving the image into memory (for manipulation with GD Library)
   // $myImage = imagecreatefromjpeg($imgSrc);

	


	$type = exif_imagetype($imgSrc);
	if( $type == IMAGETYPE_GIF ){ $fileType = ".gif";}elseif( $type == IMAGETYPE_JPEG ){  $fileType = ".jpg";}elseif( $type == IMAGETYPE_PNG ){  $fileType = ".png";}
    $img_name = $name.'_'.$square_size.$fileType;
	
	
    // if no valid type or no handler found -> exit
    if (!$type || !IMAGE_HANDLERS[$type]) {
        return null;
    }
    // load the image with the correct loader
    $myImage = call_user_func(IMAGE_HANDLERS[$type]['load'], $imgSrc);
    // no image found at supplied location -> exit
    /*if (!$image) {
        return null;
    }*/


   

    $width = imagesx( $myImage );
    $height = imagesy( $myImage );


                //set dimensions
                if($width> $height) {
                        $width_t=$square_size;
                        //respect the ratio
                        $height_t=round($height/$width*$square_size);
                        //set the offset
                        $off_y=ceil(($width_t-$height_t)/2);
                        $off_x=0;
                } elseif($height> $width) {
                        $height_t=$square_size;
                        $width_t=round($width/$height*$square_size);
                        $off_x=ceil(($height_t-$width_t)/2);
                        $off_y=0;
                }
                else {
                        $width_t=$height_t=$square_size;
                        $off_x=$off_y=0;
                }


   /* Create the New Image */
    $new = imagecreatetruecolor( $square_size , $square_size );
   /* Transcribe the Source Image into the New (Square) Image */
    $bg = imagecolorallocate ( $new, 255, 255, 255 );
    imagefill ( $new, 0, 0, $bg );
    imagecopyresampled( $new , $myImage , $off_x, $off_y, 0, 0, $width_t, $height_t, $width, $height );

    //final output
    imagejpeg($new, $dir.$img_name);

    return $dir.$img_name;
  }
  
  function get_ip_address( $ip , $link , $page_name  ){

	$curl = curl_init();
	
	curl_setopt_array($curl, array(
	  CURLOPT_URL => "https://api.ipdata.co/" . $ip. "?api-key=85ffa8d8fdc521a62c8fd25cc0827007eea7444f048e31cecc50c669",
	  CURLOPT_RETURNTRANSFER => true,
	  CURLOPT_ENCODING => "",
	  CURLOPT_MAXREDIRS => 10,
	  CURLOPT_TIMEOUT => 30,
	  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	  CURLOPT_CUSTOMREQUEST => "GET",
	));
	
	$response = curl_exec($curl);
	$err = curl_error($curl);
	
	curl_close($curl);
	
	$check = json_decode($response);


	$ip = $check->ip;
	$city = $check->city;
	$region = $check->region;
	$country_name = $check->country_name;
	$country_code = $check->country_code;
	$continent_name = $check->continent_name;
	$latitude = $check->latitude;
	$longitude = $check->longitude;
	$organisation = $check->organisation;
	$postal = $check->postal;
	$flag = $check->flag;
	$name = $check->time_zone->name;
	$abbr = $check->time_zone->abbr;
	$offset = $check->time_zone->offset;
	$current_time = $check->time_zone->current_time;
	
	$is_tor = $check->threat->is_tor;
	$is_proxy = $check->threat->is_proxy;
	$is_anonymous = $check->threat->is_anonymous;
	$is_known_attacker = $check->threat->is_known_attacker;
	$is_known_abuser = $check->threat->is_known_abuser;
	$is_threat = $check->threat->is_threat;
	$is_bogon = $check->threat->is_bogon;
	
	$sIP =  " INSERT INTO sp_ip_details SET
					time_id = unix_timestamp(),
					ip	= '$ip',
					city	= '$city',
					region	= '$region',
					country_name	= '$country_name',
					country_code	= '$country_code',
					continent_name	= '$continent_name',
					latitude	= '$latitude',
					longitude	= '$longitude',
					organisation	= '$organisation',
					postal	= '$postal',
					flag	= '$flag',
					`time_zone`	= '$time_zone',
					`abbr`	= '$abbr',
					`offset`	= '$offset',
					`current_time`	= '$current_time',
					is_tor	= '$is_tor',
					is_proxy	= '$is_proxy',
					is_anonymous	= '$is_anonymous',
					is_known_attacker	= '$is_known_attacker',
					is_known_abuser	= '$is_known_abuser',
					is_threat	= '$is_threat',
					is_bogon	= '$is_bogon',
					page_name	= '$page_name'
			";
	mysqli_query( $link ,  $sIP );		
	
		
}
// Function to get the client IP address
function get_client_ip() {
    $ipaddress = '';
    if (getenv('HTTP_CLIENT_IP'))
        $ipaddress = getenv('HTTP_CLIENT_IP');
    else if(getenv('HTTP_X_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
    else if(getenv('HTTP_X_FORWARDED'))
        $ipaddress = getenv('HTTP_X_FORWARDED');
    else if(getenv('HTTP_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_FORWARDED_FOR');
    else if(getenv('HTTP_FORWARDED'))
       $ipaddress = getenv('HTTP_FORWARDED');
    else if(getenv('REMOTE_ADDR'))
        $ipaddress = getenv('REMOTE_ADDR');
    else
        $ipaddress = 'UNKNOWN';
    return $ipaddress;
}


?>