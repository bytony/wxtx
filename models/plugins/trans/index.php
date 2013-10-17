<?php
header("content-type:text/html;charset=utf-8");
$word=!empty($_GET['data'])?$_GET['data']:'';
		
if(!empty($word))
{
	$url='http://openapi.baidu.com/public/2.0/bmt/translate?client_id=FLyqr7li5ZfM7GoCXjnOBuoZ&from=auto&to=auto&q='.$word;
	$content=getContent($url);
	/*$url='http://translate.google.cn/translate_a/t?client=t&hl=zh-CN&sl=en&tl=zh-CN&ie=UTF-8&oe=UTF-8&oc=1&otf=2&ssel=0&tsel=0&sc=2&q='.$word;
	//$aurl='http://translate.google.cn/translate_tts?ie=UTF-8&q='.$word.'&tl=en&total=1&idx=0&textlen=5&prev=input';
	$content=getContent($url);
	//[[["ÄãºÃ","hello","N¨« h¨£o",""]],[["¸ĞÌ¾´Ê",["ÄãºÃ!","Î¹!"],[["ÄãºÃ!",["Hello!","Hi!","Hallo!"],,0.0959670842],["Î¹!",["Hey!","Hello!"],,0.0159129035]],"Hello!"]],"en",,[["ÄãºÃ",[4],0,0,1000,0,1,0]],[["hello",4,[["ÄãºÃ",1000,0,0],["´òÕĞºô",0,0,0],["ÕĞºô",0,0,0],["¸öÕĞºô",0,0,0],["ÎÊºÃ",0,0,0]],[[0,5]],"hello"]],,,[],2]
	$content=str_replace('[','',$content);
	$content=str_replace(']','',$content);
	$content=preg_replace('#[0-9\.]+#','',$content);
	$content=preg_replace('#,{1,}#',',',$content);
	echo $content;
	exit;*/
	$r=json_decode($content);
	echo $r->trans_result[0]->dst;
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