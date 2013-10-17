<?php
header("content-type:text/html;charset=utf-8");
if(!empty($_GET['data']))
{
	$url='http://www.youdao.com/smartresult-xml/search.s?type=id&q='.$_REQUEST['data'];
	$content=str_replace("\n","",getContent($url));
	$result=simplexml_load_string($content);
	$sex=$result->product->gender=='m'?'男':'女';
	echo '所在地：'.$result->product->location."\n出生日期:".$result->product->birthday."\n性别:".$sex;
	
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
