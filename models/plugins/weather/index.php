<?php
header("content-type:text/html;charset=utf-8");
include "../../../inc/http/curlHttp.class.php";
$city=str_replace('天气','',str_replace('市','',$_GET['city']));
$city=trim(!empty($city)?$city:getCity());
$url='http://toy1.weather.com.cn/search?cityname='.$city.'&callback=getCity';
$content=getContent($url);
if(strlen($content)>20)
{
	$content=str_replace(")","",str_replace("getCity(","",$content));
	$cityobj=json_decode($content);
	$cityid=explode('~',$cityobj[0]->ref);
	$wurl='http://www.weather.com.cn/data/cityinfo/'.$cityid[0].'.html';
	$wcontent=getContent($wurl);
	$jsondata=json_decode($wcontent);
	$cinfo='';
	if($jsondata)
	{
		$winfo=$jsondata->weatherinfo;
		$cinfo=$winfo->city.','.$winfo->weather.',最高温度:'.$winfo->temp1.',最低温度:'.$winfo->temp2;
	}
	echo $cinfo;
}
function getContent($url)
{
	
	$http=new curlHttp();
	$content=$http->get($url);
	return $content;
}

function getCity()
{
	$ip=!empty($_SERVER['HTTP_CLIENTIP'])?$_SERVER['HTTP_CLIENTIP']:$_SERVER['REMOTE_ADDR'];
	$url='http://api.map.baidu.com/location/ip?ak=5f24164715675cffd7aa9d94c7032889&ip='.$ip.'&coor=bd09ll';
	$cityinfo=getContent($url);
	$data=json_decode($cityinfo);
	$citydata='';
	if(isset($data->content))
	{
		$citydata=$data->content->address_detail->city;
	}
	$citydata=!empty($citydata)?$citydata:'上海';
	return str_replace('市','',$citydata);
}