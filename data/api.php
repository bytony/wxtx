<?php

include 'inc/common.simple.php';
include 'inc/lbs.func.php';

if(!empty($_REQUEST))
{     
	$postObj=$_REQUEST;
	$fromUsername = $postObj['fromUsername'];
	$toUsername = $postObj['toUsername'];
	$Location_X = $postObj['Location_X'];
	$Location_Y = $postObj['Location_Y'];
	$Scale = $postObj['Scale'];
	$Label = $postObj['Label'];
	$PicUrl = $postObj['PicUrl'];
	$MsgType = $postObj['MsgType'];
	$MsgId  = $postObj['MsgId'];
	$Url = $postObj['Url'];
	$Event = $postObj['Event'];
	$Latitude = $postObj['Latitude'];
	$Longitude = $postObj['Longitude'];
	$Precision = $postObj['Precision'];
	$EventKey = $postObj['EventKey'];
	$Message = trim($postObj['Message']);
	$token = $postObj['token'];
	$version = $postObj['version'];

	if(!empty($fromUsername) && !empty($toUsername))
	{
		$uinfo=mysql_fetch_array(mysql_query("select uid,id,text_count,free_count,image_count,audio_count,price_count,given_count,weixin_num,weixin_home,weixin_avatar,weixin_name,weixin_user_api,vip_level from `".$bidcmstable_prefix."user_weixin` where weixin_id='".$toUsername."'"));
		$uid=$uinfo['id'];
		$randKeywords['content']="http://wxtx8888.com/index.php?con=wap&act=index&id=".$uinfo['id'];
		parseStr($randKeywords,'text');
	}
		
}
function parseStr($info,$type,$flag=0)
{
	global $bidcmstable_prefix,$Message,$uid,$uinfo,$postObj;
	$infotype=$type=='lbs'?'news':$type;
	$str="<xml><ToUserName><![CDATA[".$postObj['fromUsername']."]]></ToUserName><FromUserName><![CDATA[".$postObj['toUsername']."]]></FromUserName><CreateTime>".time()."</CreateTime><MsgType><![CDATA[".$infotype."]]></MsgType>";
	if($type=='music')
	{
		$str.="<Music><Title><![CDATA[".$info['title']."]]></Title><Description><![CDATA[".$info['content']."]]></Description><MusicUrl><![CDATA[".$info['music']."]]></MusicUrl><HQMusicUrl><![CDATA[".$info['hq_music']."]]></HQMusicUrl></Music>";
	}
	elseif($type=='news')
	{
		$ext_info[0]=$info;
		//检查是否有多图文
		if(!empty($info['ext_info']))
		{
			$query=mysql_query("select * from `".$bidcmstable_prefix."info` where id in (".$info['ext_info'].")");
			while($rs=mysql_fetch_array($query))
			{
				$ext_info[]=$rs;
			}
			
		}
		$str.="<ArticleCount>".count($ext_info)."</ArticleCount> <Articles>";
		foreach($ext_info as $k=>$einfo)
		{
			$url=!empty($einfo['url'])?$einfo['url']:'http://wxtx8888.com/?con=wap&act=item&id='.$einfo['id'];
			$einfo['url']=createUrl($url);
			$str.="<item> <Title><![CDATA[".$einfo['title']."]]></Title><Description><![CDATA[".$einfo['intro']."]]></Description> <PicUrl><![CDATA[".$einfo['face']."]]></PicUrl> <Url><![CDATA[".$einfo['url']."]]></Url></item>";
		}
		$str.="</Articles>";
	}
	elseif($type=='lbs')
	{
		$str.="<ArticleCount>".count($info)."</ArticleCount> <Articles>";
		foreach($info as $k=>$einfo)
		{
			$url='http://wxtx8888.com/?pluginid=lbs&con=wap&act=item&id='.$einfo['id'];
			$einfo['url']=createUrl($url);
			$str.="<item> <Title><![CDATA[".$einfo['title']."]]></Title><Description><![CDATA[".$einfo['content']."]]></Description> <PicUrl><![CDATA[".$einfo['logo']."]]></PicUrl> <Url><![CDATA[".$einfo['url']."]]></Url></item>";
		}
		$str.="</Articles>";
	}
	elseif($type=='text')
	{
		$str.="<Content><![CDATA[".$info['content']."]]></Content>";
	}
	$sid=intval($info['id']);
	if($sid>0)
	{
		mysql_query("update `".$bidcmstable_prefix."info` set viewtimes=viewtimes+1 where id=".$sid);
	}
	if(!empty($str))
	{
		if(date('d')=='1')
		{
			$monthd='month_send=0';
		}
		else
		{
			$monthd='month_send=month_send+1';
		}
		$sql="update `".$bidcmstable_prefix."user_weixin` set free_count=free_count-1,all_send=all_send+1,".$monthd." where id=".$uinfo['id'];
		mysql_query($sql);
		echo $str;
	}
	mysql_query("insert into  `".$bidcmstable_prefix."weixin_log`(weixin_sid,send_time,send_infoid,uid,msg) values(".$uinfo['id'].",".time().",".$sid.",".$uid.",'{".serialize($postObj)."}')");
	exit;
}
?>