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
class tool_controller
{
	function tool_controller()
	{
		global $session;
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
			$this->winfo=$GLOBALS['db']->fetch_first("select * from ".tname('user_weixin')." where weixin_id='".$this->weixinid."'");
			if($this->winfo['lasttime']<time() && $this->winfo['vip_level']>0)
			{
				$GLOBALS['db']->query("update ".tname('user_weixin')." set vip_level=vip_level-1 where weixin_id='".$this->weixinid."'");
			}
		}
		include ROOT_PATH.'./models/common.php';
	}
	function mutilpic_action()
	{
		global $_G,$db;
		$keywords=trim(strip_tags($_REQUEST['keywords']));
		$ids=trim(strip_tags($_REQUEST['ids']));
		$id=array();
		if(!empty($ids))
		{
			$d=explode(',',$ids);
			foreach($d as $k=>$v)
			{
				$id[]=intval($v);
			}
		}
		$infolist=array();
		if(!empty($this->weixinid))
		{
			if($id[0]>0)
			{
				$sql="select title,id from ".tname('info')." where weixin_id='".$this->weixinid."' and info_type=1 and id in (".implode(',',$id).")";
			
			}
			else
			{
				$sql="select title,id from ".tname('info')." where weixin_id='".$this->weixinid."' and info_type=1";
				if(!empty($keywords))
				{
					$sql.=' and keywords like "%'.$keywords.'%"';
				}
				$sql.=' order by rand() limit 0,10';
			}
			$query=$db->query($sql);
			while($rows=$db->fetch_array($query))
			{
				$infolist[]=$rows;
			}
			
		}
		echo bidcms_encode($infolist);
	}
	function import_action()
	{
	}
	function export_action()
	{

	}
}
