<?php

$imageURI = (isset($_GET['uri'])) ? $_GET['uri'] : 'monalisa_before.png' ;
$image_extension = substr(strrchr($imageURI, '.'), 1) ;

// Taken from http://stackoverflow.com/questions/3114147/100-safe-photo-upload-script
$mime_mapping = array('png' => 'image/png', 'gif' => 'image/gif', 'jpg' => 'image/jpeg', 'jpeg' => 'image/jpeg') ;
$info = getimagesize($imageURI);
if(!$info){ exit('not an image') ; }
$type = $mime_mapping[$image_extension] ;
if($info['mime']!=$type){ exit('wrong extension given') ; }

switch($type){
	case 'image/jpeg': $source = imagecreatefromjpeg($imageURI) ; break ;
	case 'image/gif' : $source = imagecreatefromgif ($imageURI) ; break ;
	case 'image/png' : $source = imagecreatefrompng ($imageURI) ; break ;
	default : quit('File type not known.') ; break ;
}

$wIn = imagesx($source) ;
$hIn = imagesy($source) ;

$wOut = $wIn ;
if(isset($_GET['w'])){
  if($_GET['w']>0) $wOut = $_GET['w'] ;
}
$d    = (isset($_GET['d'])) ? $_GET['d'] :   5 ;
$hOut = $wOut*$hIn/$wIn ;
$c = ($d-1)/2 ;

$nx = $wIn/$d ;
$ny = $hIn/$d ;
$mx = $wOut/$nx ;
$my = $hOut/$ny ;
$image = imagecreatetruecolor($wOut, $hOut) ;

for($i=0 ; $i<$nx ; $i++){
  for($j=0 ; $j<$ny ; $j++){
    $r = 0 ;
    $g = 0 ;
    $b = 0 ;
    for($k=$d*$i-$c ; $k<=$d*$i+$c ; $k++){
      for($l=$d*$j-$c ; $l<=$d*$j+$c ; $l++){
        $color = imagecolorat($source, $k, $l) ;
        $r += ($color >> 16) & 0xFF ;
        $g += ($color >> 8 ) & 0xFF ;
        $b += ($color >> 0 ) & 0xFF ;
		}
	  }
	$r = $r/($d*$d) ;
	$g = $g/($d*$d) ;
	$b = $b/($d*$d) ;
	$color = getColor($image,$r,$g,$b,1) ;
	imagefilledrectangle($image, ($i-1)*$mx, ($j-1)*$my, ($i+1)*$mx, ($j+1)*$my, $color) ;
  }
}

header("content-type:image/png") ;
imagejpeg($image) ;
imagedestroy($image) ;
imagedestroy($source) ;

function getColor($image,$r,$g,$b,$a){
  $color = imagecolorexactalpha($image,$r,$g,$b,$a) ;
  if($color==-1){
    $color = imagecolorallocatealpha($image,$r,$g,$b,$a) ;
    if($color == -1){
      $color = imagecolorclosestalpha($image,$r,$g,$b,$a) ;
    }
  }
  return $color;
}

function quit($message){
  if($_GET['debug']==1){ echo $message ; }
  exit() ;
}

?>