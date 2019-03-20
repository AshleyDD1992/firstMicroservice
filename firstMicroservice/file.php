<?php
header ("Content-type: image/png");

/* drawStar or regular polygon
   $x, $y  -> Position in the image
   $radius -> Radius of the star
   $spikes -> Number of spikes (min 2)
   $ratio  -> Ratio between outer and inner points
   $dir    -> Rotation 270° for having an up spike( with ratio<1)
*/
function drawStar($x, $y, $radius, $spikes=5, $ratio=0.5, $dir=270) {
   $coordinates = array();
   $angle = 360 / $spikes ;
   for($i=0; $i<$spikes; $i++){
       $coordinates[] = $x + (       $radius *cos(deg2rad($dir+$angle*$i)));
       $coordinates[] = $y + (       $radius *sin(deg2rad($dir+$angle*$i)));
       $coordinates[] = $x + ($ratio*$radius *cos(deg2rad($dir+$angle*$i + $angle/2)));
       $coordinates[] = $y + ($ratio*$radius *sin(deg2rad($dir+$angle*$i + $angle/2)));
   }
   return $coordinates ;
}

// 14*20+24*2 = 328 Examples
$im = imagecreate(800,600);
    imagecolorallocate($im,   0,   0,   0);
$w = imagecolorallocate($im, 255, 255, 255);
$r = imagecolorallocate($im, 255,   0,   0);
for ($spikes=2; $spikes<16; $spikes++) { //[2-15]
   for ($ratio=1; $ratio<21; $ratio++) { //[0.1-2.0]
       $values = drawStar(40*$ratio-20, $spikes*40-60, 10, $spikes, $ratio/10);
       imagefilledpolygon($im, $values, count($values)/2, ($ratio % 5 == 0) ? $r : $w);
   }
}
for ($dir=0; $dir<24; $dir++) {
   $values = drawStar(30*$dir+20, 580, 10, 2, 1.5, $dir*15);
   imagefilledpolygon($im, $values, count($values)/2, $w);
   $values = drawStar(30*$dir+20, 580, 10, 2, 0.2, $dir*15);
   imagefilledpolygon($im, $values, count($values)/2, $r);
}
imagepng($im);
imagedestroy($im);
?>