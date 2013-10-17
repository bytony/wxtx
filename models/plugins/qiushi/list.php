<?php
header("content-type:text/html;charset=utf-8");
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="viewport" content="width=device-width,height=device-height,inital-scale=1.0,maximum-scale=1.0,user-scalable=no;">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<meta name="format-detection" content="telephone=no">
<meta name="description" content="微信机器人 糗事">
<title>糗事</title>
<style type="text/css">
	img{width:100%;}
</style>
</head>

<?php
$url='http://lengxiaohua.cn/';
$content=file_get_contents($url);
$pattern="#<div class=\"articleContent\">(.*?)</div>#";
$p="#<img.*?data-url=\"(.*?)\".*?>#";
preg_match_all($pattern,$content,$m);

foreach($m[0] as $k=>$v)
{
	echo str_replace("data-url","src",str_replace("src","data",$v));
}
?>
</body>
</html>