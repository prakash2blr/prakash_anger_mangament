<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$targ_w = $targ_h = 150;
	$jpeg_quality = 90;
	
	if(!isset($_POST['x']) || !is_numeric($_POST['x'])) {
	  die('Please select a crop area.');
	}
    $src='uploads/'.$_POST['file_name'];
	$img_r = imagecreatefromjpeg($src);
	$dst_r = ImageCreateTrueColor($targ_w, $targ_h);

	imagecopyresampled($dst_r,$img_r,0,0,$_POST['x'],$_POST['y'],
	$targ_w,$targ_h,$_POST['w'],$_POST['h']);
	//header('Content-type: image/jpeg');
    $file=getcwd().'/cropped/cropped_'.date('Y_m_d_H_i_s').'.jpeg';
	imagejpeg($dst_r,$file,$jpeg_quality);
    $image_paths=explode('/',$file);
    header('location:koppakami.html?file='.$image_paths[count($image_paths)-1]);
}

?>