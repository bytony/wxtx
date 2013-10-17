<?php
header("content-type:text/html;charset=utf-8");
$goldtype=iconv('utf-8','gbk',trim(!empty($_GET['type'])?$_GET['type']:''));
if(strpos('#'.$goldtype.'#','黄金'))
{
	$content=getContent('http://quote.zhijinwang.com/xml/gold.txt');
}
elseif(strpos('#'.$goldtype.'#','银')>0)
{
	$content=getContent('http://quote.zhijinwang.com/xml/ag.txt');
}
elseif(strpos('#'.$goldtype.'#','铂金')>0)
{
	$content=getContent('http://quote.zhijinwang.com/xml/pt.txt');
}
else
{
	$content=getContent('http://quote.zhijinwang.com/xml/gold.txt');
}
if(!empty($content))
{
	$info='';
	$c=explode('&',$content);
	$cs=explode('=',$c[1]);
	$ct=explode('|',$cs[1]);
	$a=array('中间价','买入价','卖出价','最高价','最低价','现货','美指','石油');
	foreach($a as $k=>$v)
	{
		$info.=$v.':'.$ct[$k+1]."\n";
	}
	$info.=$c[0];
	echo $info;
}
function getContent($url)
{
	$content=@file_get_contents($url);
	/*if(empty($content))
	{
		include "../../../inc/http/curlHttp.class.php";
		$http=new curlHttp();
		//$http->setHeader('Referer','http://www.cngold.org/img_date/zhigold_rmb.html');
		$content=$http->get($url);
	}
	if(empty($content))
	{
		include "../../../inc/http/fsockopenHttp.class.php";
		$http=new fsockopenHttp();
		//$http->setHeader('Referer','http://www.cngold.org/img_date/zhigold_rmb.html');
		$content=$http->get($url);
	}*/
	return $content;
}