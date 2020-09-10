<?php

$sideAds[] = 'img/ads/300x600/ad1.png';
$sideAds[] = 'img/ads/300x600/ad2.png';
$sideAds[] = 'img/ads/300x600/ad3.png';

function randomize ($arr) {
	if(is_array($arr)) {//Generate random item from array and return it
		return $arr[mt_rand(0, count($arr) - 1)];
	}else{
		return $arr;
	}
}#end randomize()

$bannerAds[] = 'img/ads/banner/ad1.png';
$bannerAds[] = 'img/ads/banner/ad2.png';
$bannerAds[] = 'img/ads/banner/ad3.png';

function rotate ($arr) {
	if(is_array($arr)) {//Generate item in array using date and modulus of count of the array
		return $arr[((int)date("i")) % count($arr)];  // date("j") = day of month
	}else{
		return $arr;
	}
}#end rotate

?>