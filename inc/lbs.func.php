<?php
/*
	[Phpup.Net!] (C)2009-2011 Phpup.net.
	This is NOT a freeware, use is subject to license terms

	$Id: global.func.php 2010-08-24 10:42 $
*/

if(!defined('IN_BIDCMS')) {
	exit('Access Denied');
}
define('EARTH_RADIUS',6378.137);//地球半径
function rad($d)
{
   return $d * M_PI/ 180.0;
} 

function GetAround($lat, $lng, $raidus) {

  $degree = (24901 * 1609) / 360.0;
  

  $dpmLat = 1 / $degree;
  $radiusLat = $dpmLat * $raidus;
  $minLat = $lat - $radiusLat;
  $maxLat = $lat + $radiusLat;

  $mpdLng = $degree *cos($latitude * (PI / 180));
  $dpmLng = 1 / $mpdLng;
  $radiusLng = $dpmLng * $raidus;
  $minLng = $lng - $radiusLng;
  $maxLng = $lng + $radiusLng;
  return array($minLat, $minLng, $maxLat, $maxLng);
}
//经度,纬度,经度2，纬度2
function GetDistance($lng1,$lat1,$lng2,$lat2)
{
   $s = 2 *EARTH_RADIUS* Asin(Sqrt(Pow(Sin((rad($lat1)- rad($lat2))/2),2) +
    Cos(rad($lat1))*Cos(rad($lat2))*Pow(Sin((rad($lng1) - rad($lng2))/2),2)));
   //$s = Round($s * 1000) / 1000;
   $s=round($s,2);
   //因在东经使用,简单判断
   $e=$s>0?($lng1>$lng2?'南':'北'):'';
   $n=$s>0?($lat1>$lat2?'西':'东'):'';
   
   return array($s,$e,$n);
}
//经度,纬度,经度字段，纬度字段
function createSql($lng1,$lat1,$lng2,$lat2)
{
	$d="(2 * ".EARTH_RADIUS."* ASIN(SQRT(POW(SIN(PI() * (".$lat1." - `".$lat2."`)/360), 2) + COS(".rad($lat1).")* COS(`".$lat2."` * PI() / 180) * POW(SIN(PI() * (".$lng1." - `".$lng2."`) / 360), 2))))";
	return array(" and ".$d."*1000 ",$d,$d."*1000 as distanct");
}