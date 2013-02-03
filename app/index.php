<?php
    include_once "fbmain.php";
    
    //if user is logged in and session is valid.
    if ($user){
        //fql query example using legacy method call and passing parameter
        try{
            $fql            =   "select name, hometown_location, sex, pic_square from user where uid=" . $user;
            
            //http://developers.facebook.com/docs/reference/fql/
            $param  =   array(
                'method'    => 'fql.query',
                'query'     => $fql,
                'callback'  => ''
            );
            $fqlResult   =   $facebook->api($param);
        }
        catch(Exception $o){
            d($o);
        }
    }
    //set page to include default is home.php
	
	
	
	$create = $_GET["create"];
	
	
	if ($create=="any") {
		
    include_once "pictures.php";
	
	}
	


	elseif ($create=="crop") {
		
    
	
	

	$targ_w = 200;
	$targ_h = 600;
	$jpeg_quality = 90;

	$src = $_POST['picture'];
	
	$size=getimagesize($src);
	
	switch($size["mime"]){
        case "image/jpeg":
            $img_r = imagecreatefromjpeg($src); //jpeg file
        break;
        case "image/gif":
            $img_r = imagecreatefromgif($src); //gif file
      break;
      case "image/png":
          	$img_r = imagecreatefrompng($src); //png file
      break;
    default: 
        $img_r=false;
    break;
    }
	
	$ratio = $_POST['ratio'];
	
	$new_x = ($_POST['x']*$ratio);
	$new_y = ($_POST['y']*$ratio);
	$new_w = ($_POST['w']*$ratio);
	$new_h = ($_POST['h']*$ratio);
	
	
	
	$dst_r = ImageCreateTrueColor( $targ_w, $targ_h );

	imagecopyresampled($dst_r,$img_r,0,0,$new_x,$new_y,$targ_w,$targ_h,$new_w,$new_h);
	
	$facebookimagename = ''. $user .''. time() .'';
	imagejpeg($dst_r,'facebook/' .$facebookimagename .'.jpg' ,$jpeg_quality);

	
	
	
	
	$facebook->setFileUploadSupport(true);
	
	// upload a picture
	$photo_details = array(
	 'message'=> 'My new profile picture created in Chihuahuapp'
	);
	$photo_details['image'] = '@' . realpath('facebook/' .$facebookimagename .'.jpg');
	$upload_photo = $facebook->api($album_id.'/photos', 'post', $photo_details);
	
	
	
	
	header( 'Location: http://www.facebook.com/?sk=lf' ) ;
	
	
	exit;
	
	
	
	
	
	
	
	
	
	
	//
	
	
	
	
	}
	
	
	
	
	
	
	
	
	
	
	
	
	elseif ($create=="xxx") {
 
 
  	}
	else {
		
    include_once "template.php";
	
	}
?>