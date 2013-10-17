<?php
header("content-type:text/html;charset=utf-8");

if(!empty($_GET['data']))
{
	$d=$_GET['data'];
	
	$url='http://tool.httpcn.com/ShiCi/So.asp?tid=2&wd='.$d;
	$pattern="#<dl.*?class=\"content_shici\">(.*?)</dl>#";
	$content=str_replace("\n","",getContent($url));
	preg_match_all($pattern,$content,$m);
	print_r($m);
	exit;
}
function getContent($url)
{
	$content=@file_get_contents($url);
	if(empty($content))
	{
		include "../../../inc/http/curlHttp.class.php";
		$http=new curlHttp();
		//$http->setHeader('Referer','http://api.showji.com/Locating/www.showji.com.aspx?m=13900008888&output=json');
		$content=$http->get($url);
	}
	if(empty($content))
	{
		include "../../../inc/http/fsockopenHttp.class.php";
		$http=new fsockopenHttp();
		//$http->setHeader('Referer','http://api.showji.com/Locating/www.showji.com.aspx?m=13900008888&output=json');
		$content=$http->get($url);
	}
	return $content;
}
