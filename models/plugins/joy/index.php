<?php
$page=rand(300,1);
$url='http://www.jokeji.cn/list_'.$page.'.htm';
$content=getContent($url);
if(strlen($content)>20)
{
	$pattern='#<a href="(/jokehtml/.*?/[0-9]+\.htm)".*?>.*?</a>#';
	preg_match_all($pattern,$content,$m);
	$index=array_rand($m[1]);
	$aurl='http://www.jokeji.cn'.$m[1][$index];
	$content=str_replace("\n","",getContent($aurl));
	$pattern='#<span id="text110">(.*?)</span>#';
	preg_match($pattern,$content,$m);
	$r=iconv('gbk','utf-8',trim(strip_tags(str_replace("</p>","\n",str_replace("<p>","\n",$m[1])))));
	echo $r;
	exit;
}
function getContent($url)
{
	$content=file_get_contents($url);
	if(empty($content))
	{
		include "../../../inc/http/curlHttp.class.php";
		$http=new curlHttp();
		$content=$http->get($url);
	}
	if(empty($content))
	{
		include "../../../inc/http/fsockopenHttp.class.php";
		$http=new fsockopenHttp();
		$content=$http->get($url);
	}
	return $content;
}