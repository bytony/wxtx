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
class menu_controller
{
	function menu_controller()
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
		$current='menu';
		$uid=$GLOBALS['bidcms_uid'];
		$infolist=array();
		if($uid>0)
		{
			$query=$db->query('select * from '.tname('widget_menu').' where weixin_id="'.$this->weixinid.'" and uid='.$uid.' order by layer asc');
			while($rows=$db->fetch_array($query))
			{
				$p=explode('-',$rows['layer']);
				$rows['parent']=$p[0];
				$infolist[]=$rows;
			}
		}
		include bidcms_template('widget_menu');
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
				$db->query("delete from ".tname('widget_menu')." where weixin_id='".$this->weixinid."' and uid=".$uid);
				//$sql="insert into ".tname('widget_menu')."(pic_title,pic_url,pic_link,weixin_id,uid) values ";
				foreach($_POST['title'] as $k=>$v)
				{
					if(!empty($v))
					{
						$kc=explode('-',$k);
						$level=count($kc);
						$level=$level>=1?$level-1:0;
						$title=$v;
						$url=$_POST['url'][$k];
						$key=$_POST['key'][$k];
						$status=intval($_POST['status'][$k]);
						$order=intval($_POST['sortorder'][$k]);
						$db->query("insert into ".tname('widget_menu')."(menu_name,menu_url,menu_key,menu_status,sortorder,weixin_id,uid,layer,level) values('".$title."','".$url."','".$key."',".$status.",".$order.",'".$this->weixinid."',".$uid.",'".$k."',".$level.")");
					}
				}
				
				sheader("index.php?con=menu",3,"操作成功");
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
