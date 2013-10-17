<?php
header("content-type:text/html;charset=utf-8");
if(!empty($_GET['data']))
{
	$data=trim($_GET['data']);
	$c=file_get_contents('http://chengyu.itlearner.com/chaxun.php?q='.iconv('utf-8','gbk',$data).'&t=ChengYu');
	$pattern="#<td.*?class=\"td2\".*?>(.*?)</td>#";
	preg_match($pattern,$c,$m);
	echo iconv('gbk','utf-8',$m[1]);
}