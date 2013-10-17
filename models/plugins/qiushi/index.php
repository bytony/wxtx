<?php
header("content-type:text/html;charset=utf-8");

$url='http://lengxiaohua.cn/';
$content=file_get_contents($url);
$pattern="#<div class=\"articleContent\">(.*?)</div>#";
$p="#<img.*?data-url=\"(.*?)\".*?>#";
preg_match_all($pattern,$content,$m);

foreach($m[0] as $k=>$v)
{
	$rand=rand(0,20);
	if($v==$rand)
	{
		preg_match($p,$v,$cm);
		if(isset($cm[1]))
		{
			$data['img']=$cm[1];
		}
		$data['content']=strip_tags($v);
		echo json_encode($data);
		break;
	}
}