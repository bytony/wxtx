<?php
error_reporting(0);
$word=!empty($_GET['data'])?$_GET['data']:'';

if(!empty($word))
{
	$lang='en';
	if(preg_match('#[^0-9a-zA-Z]+#',$word))
	{
		$lang='zh-CN';
	}

	//文件的类型 
	header('Content-type: audio/mp3'); 
	$len=mb_strlen($word,'utf-8');
	$aurl='http://translate.google.cn/translate_tts?ie=UTF-8&q='.$word.'&tl='.$lang.'&total=1&idx=0&textlen='.$len.'&prev=input';
	$content=getContent($aurl);
	echo $content;
	$filename=md5($word);
	//下载显示的名字 
	header('Content-Disposition: attachment; filename="'.$filename.'.mp3"'); 
	
}
function getContent($url)
{
	$content=@file_get_contents($url);
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