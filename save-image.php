<?php
$tmp_name=$_FILES['crop_image']['tmp_name'];
$file_name=$_FILES['crop_image']['name'];
$file_path=getcwd().'/uploads/'.$file_name;
move_uploaded_file($tmp_name,$file_path);
$thumb = new Imagick($file_path);

$thumb->resizeImage(800,800,Imagick::FILTER_LANCZOS,1);
$thumb->writeImage($file_path);
header('location:crop.html?file='.$file_name);
?>