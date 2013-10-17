<?php
/*
	[Bidcms.com!] (C)2009-2011 Bidcms.com.
	This is NOT a freeware, use is subject to license terms
	$author limengqi
	$Id: upload.php 2010-08-24 10:42 $
*/
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

		//判断当前用户的微信信息
		$uinfo=mysql_fetch_array(mysql_query("select uid,id,text_count,free_count,image_count,audio_count,price_count,given_count,weixin_num,weixin_home,weixin_avatar,weixin_name,weixin_user_api,vip_level from `".$bidcmstable_prefix."user_weixin` where weixin_id='".$toUsername."'"));
		$uid=$uinfo['uid'];
		echo $uid;
		if($uid>0)
		{
			$uinfo_ext=mysql_fetch_array(mysql_query("select weixin_content from `".$bidcmstable_prefix."user_weixin_ext` where uwxid=".$uinfo['id']));
		}
		$uinfo['content']=!empty($uinfo_ext['weixin_content'])?$uinfo_ext['weixin_content']:('欢迎来到'.$uinfo['weixin_name']);
		//取得用户开通的功能
		$query=mysql_query("select * from `".$bidcmstable_prefix."user_plugins` where weixin_id='".$toUsername."'");
		while($rs=mysql_fetch_array($query))
		{
			$plugins[$rs['plugins_id']]=$rs['plugins_id'];
		}
		$arr=array('0'=>'text','1'=>'news','2'=>'music');
		if($uinfo['id']>0)
		{
			if($uinfo['free_count']==0 && $uinfo['given_count']==0 && $uinfo['price_count']==0)
			{
				parseStr(array('content'=>'请求次数已消耗完毕，请及时充值'),'text');
			}
			//关注时
			elseif('subscribe'==$Event)
			{
				$info=mysql_fetch_array(mysql_query("select * from `".$bidcmstable_prefix."info where weixin_id='".$toUsername."' and keywords='Hello2BizUser' order by rand()"));
				$type='text';
				if($info['id']>0)
				{
					$type=$arr[$info['info_type']];
				}
				else
				{
					$info=mysql_fetch_array(mysql_query("select * from `".$bidcmstable_prefix."notice_info` where weixin_id='".$toUsername."'"));
				}
				$tstr='为了更好的为您服务，请回复”vip“来完善您的信息';
				if($info['home']>0)
				{
					$uinfo['content']=$tstr;
					patternHome($uinfo);
				}
				else
				{
					$info['content']=isset($info['content'])?$info['content']:$tstr;
					parseStr($info,$type);
				}
			}
			elseif(!empty($Location_X) && !empty($Location_Y))
			{
				$sql=createSql($Location_X,$Location_Y,'lat','lng');
				$query=mysql_query("select title,id,logo,".$sql[2]." from `".$bidcmstable_prefix."plugins_lbs` where weixin_id='".$toUsername."' ".$sql[0]."<5000 order by distanct asc limit 0,10");
				while($rs=mysql_fetch_array($query))
				{
					$rs['content']='距离'.(ceil($rs['distanct'])/1000).'公里';
					$info[]=$rs;
				}
				if($info)
				{
					parseStr($info,'lbs');
				}
				else
				{
					parseEmpty();
				}
			}
			//一般信息
			else
			{
				if(strtolower($Message)=='home' || $Message=='首页')
				{
					patternHome($uinfo);
				}
				elseif(strpos('#'.$Message.'#','年历')>0 || strpos('#'.$Message.'#','日历')>0 || strpos('#'.$Message.'#','几号')>0)
				{
					$cinfo['content']=file_get_contents('http://bidcms.duapp.com/models/plugins/wannianli/index.php');
					$cinfo['type']='text';
					parseStr($cinfo,$cinfo['type']);
				}
				elseif(strpos('#'.$Message.'#','新闻')>0)
				{
					
					$data=file_get_contents('http://bidcms.duapp.com/models/plugins/news/index.php');
					$jsondata=explode('<[im61]>',$data);
					$cinfo=array('type'=>'news','title'=>$jsondata[0],'intro'=>$jsondata[2],'content'=>$jsondata[4],'face'=>'','url'=>$jsondata[4]);
					parseStr($cinfo,$cinfo['type']);
				}
				else
				{
					$info=patternPlugins();
					if(!empty($info['content']))
					{
						parseStr($info,$info['type']);
					}
					else
					{
						$info=patternKey($Message);
						if($info['id']<1)
						{
							parseEmpty($Message);
						}
						else
						{
							parseStr($info,$arr[$info['info_type']]);
						}
					}
				}
			}
			
			
		}
		
	}
}
function createUrl($url)
{
	global $postObj;
	$param='';
	$p=strpos('#'.$url,'?')>0?'&':'?';
	$param=$p."fromuser=".$postObj['fromUsername']."&datetime=".date("YmdHis")."&touser=".$postObj['toUsername'];
	return $url.$param;
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
			$url=!empty($einfo['url'])?$einfo['url']:'http://bidcms.duapp.com/?con=wap&act=item&id='.$einfo['id'];
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
			$url='http://bidcms.duapp.com/?pluginid=lbs&con=wap&act=item&id='.$einfo['id'];
			$einfo['url']=createUrl($url);
			$str.="<item> <Title><![CDATA[".$einfo['title']."]]></Title><Description><![CDATA[".$einfo['content']."]]></Description> <PicUrl><![CDATA[".$einfo['logo']."]]></PicUrl> <Url><![CDATA[".$einfo['url']."]]></Url></item>";
		}
		$str.="</Articles>";
	}
	elseif($type=='text')
	{
		$str.="<Content><![CDATA[".$info['content']."]]></Content>";
	}
	$str.="<FuncFlag>".$flag."</FuncFlag></xml>";
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
function patternKey($Message)
{
	global $bidcmstable_prefix,$toUsername;
	//取关键字
	$kinfo=array();
	$kinfo=mysql_fetch_array(mysql_query("select * from `".$bidcmstable_prefix."info_keywords` where weixin_id='".$toUsername."' and keyword='".$Message."' and mattch=1"));
	if($kinfo['info_id']<1)
	{
		$kinfo=mysql_fetch_array(mysql_query("select * from `".$bidcmstable_prefix."info_keywords` where weixin_id='".$toUsername."' and keyword like '%".$Message."%' and mattch=0"));
	}
	if($kinfo['info_id']>0)
	{
		$kinfo=mysql_fetch_array(mysql_query("select * from `".$bidcmstable_prefix."info` where id=".$kinfo['info_id']));
	}
	return $kinfo;
}
function patternHome($uinfo)
{
	$info=array('url'=>"http://bidcms.duapp.com/?con=wap&id=".$uinfo['id'],'title'=>$uinfo['weixin_name'],'intro'=>$uinfo['content'],'face'=>$uinfo['weixin_avatar']);
	parseStr($info,'news');
}
function parseEmpty($Message='')
{
	global $plugins,$bidcmstable_prefix,$toUsername,$uid;
	if(!empty($Message) && $plugins[12]>0)
	{
		$content=file_get_contents('http://liaotianji.duapp.com/index.php?q='.$Message.'&uid='.$uid.'&source=weixin');
	}
	if(!empty($content))
	{
		$cinfo=array('content'=>strip_tags($content)."\n<a href=\"http://liaotianji.duapp.com/add.php?tempq=".$Message."\">回答不满意，我来训练</a>");
		parseStr($cinfo,'text');
	}
	//查询匹配不到时随机回答
	$randKeywords=mysql_fetch_array(mysql_query("select * from `".$bidcmstable_prefix."rand_info` where weixin_id='".$toUsername."' order by rand()"));
	if($randKeywords['id']>0)
	{
		$randKeywords['content']=$randKeywords['content']."\n<a href=\"http://liaotianji.duapp.com/add.php?tempq=".$Message."\">回答不满意，我来训练</a>";
		parseStr($randKeywords,'text');
	}
}
function patternPlugins()
{
	global $postObj,$uinfo,$bidcmstable_prefix,$plugins;
	$postObj['Message']=str_replace('？','?',$postObj['Message']);
	$cinfo=array();
	
	//第三方接口
	if($plugins[8]>0 && $uinfo['vip_level']==$plugins[8]['plugins_level'] && !empty($uinfo['weixin_user_api']))
	{
		foreach($postObj as $k=>$v)
		{
			if($k!='fromUsername' && $k!='toUsername')
			{
				$param.="&".$k."=".$v;
			}
		}
		$d=strpos($uinfo['weixin_user_api'],'?')>0?'&datetime='.time():'?datetime='.time();
		$content=file_get_contents($uinfo['weixin_user_api'].$d.$param);
		if(!empty($content))
		{
			$cinfo=(array)json_decode($content);
			$cinfo['id']=1;
		}
	}
	
	elseif($plugins[1]>0 && (strpos('#'.$postObj['Message'].'#','天气')>0 || preg_match('#(^[[\d]{2,7}]$)#',$postObj['Message'])))
	{
		$cinfo['content']=file_get_contents('http://bidcms.duapp.com/models/plugins/weather/index.php?city='.$postObj['Message']);
		$cinfo['type']='text';
	}
	elseif($plugins[2]>0 && (strpos('#'.$postObj['Message'].'#','金')>0 || strpos('#'.$postObj['Message'].'#','银')>0))
	{
		$cinfo['type']='text';
		$cinfo['content']=file_get_contents('http://bidcms.duapp.com/models/plugins/gold/index.php?type='.$postObj['Message']);
	}
	elseif($plugins[3]>0 && strpos('#'.$postObj['Message'].'#','笑话')>0)
	{
		$cinfo['content']=file_get_contents('http://bidcms.duapp.com/models/plugins/joy/index.php');
		$cinfo['type']='text';
	}
	elseif($plugins[4]>0 && preg_match('#(^1[3-8][3-9][0-9]{8}$)#',$postObj['Message']))
	{
		$cinfo['content']=file_get_contents('http://bidcms.duapp.com/models/plugins/mobile/index.php?mobile='.$postObj['Message']);
		$cinfo['type']='text';
	}
	elseif($plugins[5]>0 && preg_match('#(^[[\d]{15}|[\d]{18}|[\d]{17}x]$)#',$postObj['Message']))
	{
		$cinfo['content']=file_get_contents('http://bidcms.duapp.com/models/plugins/shenfen/index.php?data='.$postObj['Message']);
		$cinfo['type']='text';
	}
	elseif($plugins[6]>0 && strpos('#'.$postObj['Message'].'#','快递')>0)
	{
		$cinfo['type']='text';
		$cinfo['content']=file_get_contents('http://bidcms.duapp.com/models/plugins/kuaidi/index.php?data='.$postObj['Message']);
	}
	
	elseif($plugins[7]>0 && substr($postObj['Message'],0,1)=='@')
	{
		$data=file_get_contents('http://bidcms.duapp.com/models/plugins/trans/index.php?data='.substr($postObj['Message'],1));
		$cinfo=array('type'=>'text','content'=>$data);
							
	}
	elseif($plugins[9]>0 && strpos('#'.$postObj['Message'].'#','优惠券')>0)
	{
		$cinfo=array('type'=>'news','title'=>'优惠券','intro'=>'抢优惠券活动进行中...','content'=>'抢优惠券活动进行中','face'=>'http://bidcms.duapp.com/data/upload/temp/activity-coupon-start.jpg','url'=>'http://bidcms.duapp.com/?pluginid=coupon&con=wap');
	}
	elseif($plugins[10]>0 && strpos('#'.$postObj['Message'].'#','音乐')>0)
	{
		$data=file_get_contents('http://yinyuesososo.duapp.com/json.php?data='.$postObj['Message']);
		$jsondata=json_decode($data);
		$cinfo=array('type'=>'news','title'=>$jsondata->title,'intro'=>$jsondata->intro,'content'=>$jsondata->intro,'face'=>$jsondata->face,'url'=>$jsondata->url);
	}
	elseif($plugins[11]>0 && strpos('#'.$postObj['Message'].'#','汇率')>0)
	{
		$cinfo=array('type'=>'news','title'=>'转换各种汇率','intro'=>'选择相应的货币','content'=>'选择相应的货币进行转换','face'=>'http://bidcms.duapp.com/data/upload/temp/t4.jpg','url'=>'http://bidcms.duapp.com/models/plugins/hunlv/index.php');
	}
	elseif($plugins[13]>0 && preg_match('#.*?([-0-9\.]+)([\+\-\*\/\%\^]{1})([-0-9\.]+).*?#',$postObj['Message'],$m))
	{
		eval('$r='.$postObj['Message'].';');
		$cinfo=array('type'=>'text','content'=>$r);
	}
	elseif($plugins[14]>0 && strpos('#'.$postObj['Message'].'#','百科')>0)
	{
		$key=str_replace('百科','',$postObj['Message']);
		$url=file_get_contents('http://bidcms.duapp.com/models/plugins/baike/index.php?data='.$key);
		$cinfo=array('type'=>'news','title'=>$postObj['Message'],'intro'=>'查看关于“'.$key.'”的词条','content'=>'百科查询','face'=>'','url'=>$url);
	}
	elseif($plugins[12]>0 && strpos('#'.$postObj['Message'].'#','机器人')>0)
	{
		$cinfo=array('type'=>'text','content'=>'<a href="http://liaotianji.duapp.com/add.php">点我进入训练模式</a>');
	}
	elseif($plugins[15]>0 && strpos('#'.$postObj['Message'].'#','刮刮卡')>0)
	{
		$cinfo=array('type'=>'news','title'=>'刮刮卡','intro'=>'刮刮卡活动进行中...','content'=>'刮刮卡活动进行中活动进行中','face'=>'http://bidcms.duapp.com/data/upload/temp/activity-scratch-card-start.jpg','url'=>'http://bidcms.duapp.com/?pluginid=guagua&con=wap');
	}
	elseif($plugins[16]>0 && strpos('#'.$postObj['Message'].'#','大转盘')>0)
	{
		$cinfo=array('type'=>'news','title'=>'大转盘','intro'=>'大转盘活动进行中...','content'=>'大转盘活动进行中','face'=>'http://bidcms.duapp.com/data/upload/temp/activity-lottery-start.jpg','url'=>'http://bidcms.duapp.com/?pluginid=zhuanpan&con=wap');
	}
	elseif($plugins[17]>0 && strpos('#'.strtolower($postObj['Message']).'#','vip')>0)
	{
		$cinfo=array('type'=>'news','title'=>'完善您的资料','intro'=>'完善您的会员资料，以便商家为你提供更好的服务...','content'=>'会员','face'=>'http://bidcms.duapp.com/data/upload/temp/t5.jpg','url'=>'http://bidcms.duapp.com/?pluginid=person&con=wap');
	}
	elseif($plugins[18]>0 && strpos('#'.$postObj['Message'].'#','投票')>0)
	{
		$cinfo=array('type'=>'news','title'=>'投票','intro'=>'投票活动进行中...','content'=>'投票活动进行中','face'=>'http://bidcms.duapp.com/data/upload/temp/t5.jpg','url'=>'http://bidcms.duapp.com/?pluginid=vote&con=wap');
	}
	elseif($plugins[19]>0 && strpos('#'.$postObj['Message'].'#','酒店')>0)
	{
		$cinfo=array('type'=>'news','title'=>'酒店预订','intro'=>'酒店在线预订...','content'=>'酒店在线预订','face'=>'http://bidcms.duapp.com/plugins/hotel/views/logo.jpg','url'=>'http://bidcms.duapp.com/?pluginid=hotel&con=wap');
	}
	elseif($plugins[20]>0 && strpos('#'.strtolower($postObj['Message']).'#','本地')>0)
	{
		$cinfo=array('type'=>'news','title'=>'本地生活在线预订','intro'=>'本地生活在线预订...','content'=>'本地生活在线预订','face'=>'http://bidcms.duapp.com/plugins/order/views/ktv.jpg','url'=>'http://bidcms.duapp.com/?pluginid=order&con=wap');
	}
	elseif($plugins[21]>0 && strpos('#'.$postObj['Message'].'#','糗事')>0)
	{
		
		$data=file_get_contents('http://bidcms.duapp.com/models/plugins/qiushi/index.php');
		$jsondata=json_decode($data);
		$cinfo=array('type'=>'news','title'=>$jsondata->content,'intro'=>$jsondata->content,'content'=>$jsondata->content,'face'=>$jsondata->img,'url'=>'http://bidcms.duapp.com/models/plugins/qiushi/list.php');
	}
	elseif($plugins[22]>0 && strpos('#'.$postObj['Message'].'#','人品')>0)
	{
		$cinfo['type']='text';
		$cinfo['content']=file_get_contents('http://bidcms.duapp.com/models/plugins/renpin/index.php?data='.str_replace('人品','',$postObj['Message']));
	}
	
	elseif($plugins[23]>0 && strpos('#'.$postObj['Message'].'#','成语')>0)
	{
		$cinfo['type']='text';
		$cinfo['content']=file_get_contents('http://bidcms.duapp.com/models/plugins/chengyu/index.php?data='.str_replace('成语','',$postObj['Message']));
	}
	return $cinfo;
}

?>