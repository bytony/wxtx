<?php
/*
	[Bidcms.com!] (C)2009-2011 Bidcms.com.
	This is NOT a freeware, use is subject to license terms

	$Id: session.class.php 2010-08-24 10:42 $
*/

if(!defined('IN_BIDCMS')) {
	exit('Access Denied');
}

function createvideo($url)
{
	$swf=$url;
	if(!empty($url))
	{
		$content=bidcms_fsockopen($url);
		if(strpos($url,'tudou'))
		{
			$url=str_replace('pinswf','',$url);
			preg_match("#iid: ([0-9]+)#",$content,$match);
			$swf='http://js.tudouui.com/bin/lingtong/PortalPlayer_8.swf?iid='.$match[1];
			
		}
	}
	return $swf;
}
function createprice($url)
{
	$source=array('store'=>'','price'=>0,'title'=>'','link'=>$url);
	if(!empty($url) && (strpos($url,'item.taobao') || strpos($url,'detail.tmall')) )
	{
		$content=bidcms_fsockopen($url);
		$content=str_replace("\n","",$content);
		$content=str_replace("\"","'",$content);
		$taobao['price']="#<strong id='J_StrPrice'.*?>.*?([0-9\.]+).*?</strong>#";
		$taobao['title']="#<title>(.*?)</title>#";
		$tmall['price']="#<strong class='J_originalPrice'.*?>.*?([0-9\.]+).*?</strong>#";
		$tmall['title']="#<title>(.*?)</title>#";
		if(strpos($url,'item.taobao'))
		{
			$source['store']='taobao';
			preg_match($taobao['price'],$content,$match);
			$source['price']=$match[1];
			preg_match($taobao['title'],$content,$match);
			$source['title']=$match[1];
		}
		elseif(strpos($url,'detail.tmall'))
		{
			$source['store']='tmall';
			preg_match($tmall['price'],$content,$match);
			$source['price']=$match[1];
			preg_match($tmall['title'],$content,$match);
			$source['title']=$match[1];
		}
	}
	return $source;
}