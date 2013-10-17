<?php
header("content-type:text/html;charset=utf-8");
if(!empty($_GET['data']))
{
	$data=$_GET['data'];
	$url='http://www.baidu.com/s?wd='.$data.'百度百科';
	$content=file_get_contents($url);
	$pattern='#<h3 class="t">.*?<a.*?href="(.*?)".*?>.*?</a>.*?</h3>#';
	preg_match($pattern,$content,$m);
	if(!empty($m[1]))
	{
		echo $m[1];
	}
}
?>