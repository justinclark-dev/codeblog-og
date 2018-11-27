<?php

$config->sideAds[] = 'img/ads/300x600/acumatica.png';
$config->sideAds[] = 'img/ads/300x600/dynatrace.png';
$config->sideAds[] = 'img/ads/300x600/freshdesk.png';
$config->sideAds[] = 'img/ads/300x600/infusionsoft.png';
$config->sideAds[] = 'img/ads/300x600/infusionsoft2.png';
$config->sideAds[] = 'img/ads/300x600/nerdwallet.png';
$config->sideAds[] = 'img/ads/300x600/tableau.jpg';
$config->sideAds[] = 'img/ads/300x600/tableau.png';
$config->sideAds[] = 'img/ads/300x600/tableau2.png';
$config->sideAds[] = 'img/ads/300x600/workato.jpg';

function randomize ($arr) {
	if(is_array($arr)) {//Generate random item from array and return it
		return $arr[mt_rand(0, count($arr) - 1)];
	}else{
		return $arr;
	}
}#end randomize()

$config->bannerAds[] = 'img/ads/banner/algolia.png';
$config->bannerAds[] = 'img/ads/banner/alltech.png';
$config->bannerAds[] = 'img/ads/banner/alltech2.png';
$config->bannerAds[] = 'img/ads/banner/lowermybills.png';
$config->bannerAds[] = 'img/ads/banner/quickenloans.png';
$config->bannerAds[] = 'img/ads/banner/regence.jpg';
$config->bannerAds[] = 'img/ads/banner/shift.png';

function rotate ($arr) {
	if(is_array($arr)) {//Generate item in array using date and modulus of count of the array
		return $arr[((int)date("i")) % count($arr)];  // date("j") = day of month
	}else{
		return $arr;
	}
}#end rotate

?>