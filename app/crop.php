<?php


	$targ_w = 200;
	$targ_h = 600;
	$jpeg_quality = 90;

	$src = $_POST['x'];
	
	echo $src;
	
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

	
	$dst_r = ImageCreateTrueColor( $targ_w, $targ_h );

	imagecopyresampled($dst_r,$img_r,0,0,$_POST['x'],$_POST['y'],
	$targ_w,$targ_h,$_POST['w'],$_POST['h']);

	header('Content-type: image/jpeg');
	imagejpeg($dst_r,null,$jpeg_quality);

	exit;


?>