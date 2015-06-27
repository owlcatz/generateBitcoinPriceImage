<?php

$currency='USD';
if(isset($_GET["CUR"]))
{
	$currency=$_GET["CUR"];
}

$value=1;
if(isset($_GET["VALUE"]))
{
	$value=$_GET["VALUE"];
}

$price='last';
if(isset($_GET["TYPE"]))
{
	$price=strtolower($_GET["TYPE"]);
}


$homepage = file_get_contents('https://api.bitcoinaverage.com/ticker/'.$currency.'/');
$json = json_decode($homepage,true);

$timestamp="";
if(isset($_GET["TIMESTAMP"]))
{
	if(strtolower($_GET["TIMESTAMP"])=="yes")
		$timestamp=$json["timestamp"];
}

$precision=5;
if(isset($_GET["PRECISION"]))
{
	$precision=$_GET["PRECISION"];
}

$color='000000';
if(isset($_GET["COLOR"]))
{
	$color=$_GET["COLOR"];
}

$text= (round($value/doubleval($json[$price]),$precision))." BTC  ".substr($timestamp,0,strlen($timestamp)-6);

header('Content-Type: image/png');

$size=11;
if(isset($_GET["SIZE"]))
{
	$size=$_GET["SIZE"];
}

// Here can be problem on some servers. Other solution is arial.ttf and delete putenv('GDFONTPATH=' . realpath('.'));
putenv('GDFONTPATH=' . realpath('.'));
$font = 'arial';
if(isset($_GET["FONT"]))
{
	$font=$_GET["FONT"];
}

$bbox = imagettfbbox($size, 0, $font, $text);

$im = imagecreatetruecolor(12+$bbox[2]-$bbox[0], $size+2);

// Create some colors
$bg = imagecolorallocatealpha($im,255,255,255,0);
$white = imagecolorallocate($im, 255, 255, 255);
$black = imagecolorallocate($im, 0, 0, 0);
if ( strlen($color) == 6 && preg_match('/[0-9a-fA-F]{6}/', $color) ) {
                $black = imagecolorallocate($im, hexdec($color[0] . $color[1]),hexdec($color[2] . $color[3]),hexdec($color[4] . $color[5]));
        }
imagefilledrectangle($im, 0, 0, 12+$bbox[2]-$bbox[0], $size+2, $bg);

imagettftext($im, $size, 0, 10, $size+1, $black, $font, $text);

imagepng($im);
imagedestroy($im);


?> 