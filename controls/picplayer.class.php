<?php
/*
	[Bidcms.com!] (C)2009-2011 Bidcms.com.
	This is NOT a freeware, use is subject to license terms
	$author limengqi
	$Id: ajax.class.php 2010-08-24 10:42 $
*/
if(!defined('IN_BIDCMS')) {
	exit('Access Denied');
}
class picplayer_controller
{
	function picplayer_controller()
	{
		include ROOT_PATH.'./models/common.php';
	}
	function index_action()
	{
		global $db;
		$this->_checkLogin();
		if(empty($this->weixinid))
		{
			sheader('index.php?con=user',3,'请先选择一个微信进行操作');
		}
		$winfo=$this->winfo;
		$current='picplayer';
		$uid=$GLOBALS['bidcms_uid'];
		$infolist=array();
		if($uid>0)
		{
			$query=$db->query('select * from '.tname('widget_picplayer').' where weixin_id="'.$this->weixinid.'" and uid='.$uid);
			while($rows=$db->fetch_array($query))
			{
				$infolist[]=$rows;
			}
		}
		include bidcms_template('widget_picplayer');
	}
	
	function modify_action()
	{
		global $db,$_G;
		$this->_checkLogin();
		
		if(empty($this->weixinid))
		{
			sheader('index.php?con=user',3,'请先选择一个微信进行操作');
		}
		$winfo=$this->winfo;
		
		$uid=$GLOBALS['bidcms_uid'];
		
		if(submitcheck('commit'))
		{
			if($uid>0)
			{
				$len=count($_POST['url']);
				if($len<6)
				{
					$db->query("delete from ".tname('widget_picplayer')." where weixin_id='".$this->weixinid."' and uid=".$uid);
					$sql="insert into ".tname('widget_picplayer')."(pic_title,pic_url,pic_link,weixin_id,uid) values ";
					foreach($_POST['url'] as $k=>$v)
					{
						if($v!='')
						{
							$data[]="('".$_POST['title'][$k]."','".$v."','".$_POST['link'][$k]."','".$this->weixinid."',".$uid.")";
						}
					}
					if(!empty($data))
					{
						$sql.=implode(',',$data);
						$db->query($sql);
					}
					sheader("index.php?con=picplayer",3,"操作成功");
				}
				else
				{
					sheader("index.php?con=picplayer",3,"最多只能添加5条的记录,操作失败");
				}
			}
			
		}
		
	}
	function _checkLogin()
	{
		global $session,$db;
		$uid=$GLOBALS['bidcms_uid'];
		if($uid<1)
		{
			sheader('bbs/member.php?mod=logging&action=login',3,'请先登录后操作');
		}
		
		$this->weixinid=$session->get('current_weixin_id');
		if(!empty($_GET['wxid']))
		{
			$session->set('current_weixin_id',$_GET['wxid']);
			$this->weixinid=$session->get('current_weixin_id');
		}
		if(!empty($this->weixinid))
		{
			$this->winfo=$db->fetch_first("select * from ".tname('user_weixin')." where weixin_id='".$this->weixinid."'");
			if($this->winfo['lasttime']<time() && $this->winfo['vip_level']>0)
			{
				$db->query("update ".tname('user_weixin')." set vip_level=vip_level-1 where weixin_id='".$this->weixinid."'");
			}
		}
	}
}
