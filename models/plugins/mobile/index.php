<?php
header("content-type:text/html;charset=utf-8");
if(!empty($_GET['mobile']))
{
	$url='http://api.showji.com/Locating/www.showji.com.aspx?m='.$_REQUEST['mobile'].'&output=json';
	$content=str_replace("\n","",str_replace('"','',getContent($url)));
	$data=explode(',',str_replace('{','',str_replace('}','',$content)));
	$d='';
	foreach($data as $k=>$v)
	{
		$p=explode(':',$v);
		if(isset($p[1]))
		{
			if($p[0]=='Province')
			{
				$d.=$p[1];
			}
			if($p[0]=='City')
			{
				$d.=' '.$p[1];
			}
			
			if($p[0]=='Corp')
			{
				$d.="\n".$p[1];
			}
		}
	}
	if(!empty($d))
	{
		echo $d;
	}
}
function getContent($url)
{
	$content=@file_get_contents($url);
	if(empty($content))
	{
		include "../../../inc/http/curlHttp.class.php";
		$http=new curlHttp();
		$http->setHeader('Referer','http://api.showji.com/Locating/www.showji.com.aspx?m=13900008888&output=json');
		$content=$http->get($url);
	}
	if(empty($content))
	{
		include "../../../inc/http/fsockopenHttp.class.php";
		$http=new fsockopenHttp();
		$http->setHeader('Referer','http://api.showji.com/Locating/www.showji.com.aspx?m=13900008888&output=json');
		$content=$http->get($url);
	}
	return $content;
}
