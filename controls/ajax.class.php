<?php
/*
	[Bidcms.com!] (C)2009-2011 Bidcms.com.
	This is NOT a freeware, use is subject to license terms
	$author limengqi
	$Id: index.class.php 2010-08-24 10:42 $
*/
if(!defined('IN_BIDCMS')) {
	exit('Access Denied');
}
class ajax_controller
{
	function ajax_controller()
	{
		include ROOT_PATH.'./models/common.php';
	}

	function updatevip_action()
	{
		global $db,$_G;
		$id=intval($_REQUEST['id']);
		
		if($id>0 && $_G['uid']>0)
		{
			$winfo=$db->fetch_first("select * from ".tname('user_weixin')." where id=".$id." and uid=".$_G['uid']);
			$winfo['money']=getuserprofile('extcredits4');
			if($winfo['id']>0)
			{
				if(submitcheck('commit'))
				{
					//判断应付金币
					$gvip=$_POST['vip'];
					$gmonth=intval($_POST['period']);
					$shouldpay=$gvip*$gmonth;
					
					//原来折合多少金币
					$diffmoney=intval((($winfo['lasttime']-time())/86400)*$GLOBALS['vip'][$winfo['vip_level']]);
					
					$vip_array=array_flip($GLOBALS['vip']);
					
					$lasttime=time()+$gmonth*86400;
					$money=intval($shouldpay-$diffmoney);
					if($winfo['money']>0 && $winfo['money']>$money && $gvip>0 && $gmonth>=30)
					{
						if($money>0)
						{
							updatemembercount($_G['uid'], array('extcredits5' => 0+abs($money),'extcredits4' => 0-abs($money)), false, 'BID',$id);//扣除金币
						
						}
						else
						{
							updatemembercount($_G['uid'], array('extcredits5' => 0-abs($money),'extcredits4' => 0+abs($money)), false, 'BID',$id);//扣除金币
						}
						$db->query("update ".tname('user_weixin')." set vip_level=".$vip_array[$gvip].",lasttime=".$lasttime." where uid=".$_G['uid']." and id=".$id);
						echo '<script type="text/javascript">
						<!--
							alert("操作成功");
							parent.hideWindow("smemberss");
						//-->
						</script>';
					}
					else
					{
						echo '<script type="text/javascript">
						<!--
							alert("所需金币不足");
						//-->
						</script>';
					}
				}
				else
				{
					include bidcms_template('ajax_vip');
				}
			}
		}
		
	}
	function requestcount_action()
	{
		global $db,$_G;
		$id=intval($_REQUEST['id']);
		
		if($id>0 && $_G['uid']>0)
		{
			$winfo=$db->fetch_first("select * from ".tname('user_weixin')." where id=".$id." and uid=".$_G['uid']);
			$winfo['money']=getuserprofile('extcredits4');
			if(submitcheck('commit'))
			{
				$gtel=intval($_POST['tel']);
				if($gtel>0)
				{
					$money=ceil($gtel/5);
					if($winfo['money']>$money)
					{
					updatemembercount($_G['uid'], array('extcredits5' => 0+abs($money),'extcredits4' => 0-abs($money)), false, 'BID',$id);//扣除金币
					$db->query("update ".tname('user_weixin')." set price_count=price_count+".$gtel." where uid=".$_G['uid']." and id=".$id);
					echo '<script type="text/javascript">
						<!--
							alert("操作成功");
							parent.hideWindow("smembers");
						//-->
						</script>';
						exit;
					}
					else
					{
						echo '<script type="text/javascript">
						<!--
							alert("所需金币不足");
						//-->
						</script>';
						exit;
					}
				}
				else
				{
					echo '<script type="text/javascript">
						<!--
							alert("请求数为空");
						//-->
						</script>';
				}
			}
			else
			{
				include bidcms_template('ajax_request_count');
			}
		}
	}
}