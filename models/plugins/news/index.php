<?php
header("content-type:text/html;charset=utf-8");

$url='http://news.163.com/special/00011K6L/rss_newstop.xml';
$content=file_get_contents($url);
$c=simplexml_load_string($content);
$count=count($c->channel->item);
if($count>0)
{
$rand=rand(0,$count);
$ds=(array)$c->channel->item[$rand];

$ds['guid']=str_replace('http://news.163.com/','http://3g.163.com/news/',$ds['guid']);
$ds['description']=str_replace('&nbsp;','',strip_tags($ds['description']));
echo implode('<[im61]>',$ds);
}