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
class wap_controller
{
	function wap_controller()
	{
		global $session;
		// if(strpos($_SERVER['HTTP_USER_AGENT'],'MicroMessenger')<1)
		// {
		// 	exit('<script type="text/javascript">alert("请在微信中打开此页面");</script>');
		// }
		// $this->fromuser=$session->get('fromuser');
		// $this->touser=$session->get('touser');
		$this->fromuser = "gh_423dwjkeww3";
		$this->touser = "gh_423dwjkeww3";
		if(empty($this->fromuser) || empty($this->touser))
		{
			exit('<script type="text/javascript">alert("用户参数无效,请在微信中回复首页重新打开");</script>');
		}
		include ROOT_PATH.'./models/common.php';
			
	}

	function index_action()
	{
		global $db;
		$wxid=intval($_GET['id']);

		if(($wxid)||($_GET['wx_id']));
		{	

			$uinfo=$db->fetch_first("select * from ".tname('user_weixin')." where id=".$wxid);

		    if(!$uinfo)
		    {   
		    
		    $uinfo=$db->fetch_first("select * from ".tname('user_weixin')." where weixin_id='".$_GET['wx_id']."'");
		   
		    }
			if($uinfo['id'])

			{	
				 
				//到出用户其它信息
				$uinfo_ext=$db->fetch_first("select * from ".tname('user_weixin_ext')." where uwxid=".$uinfo['id']);
				//取出首页模板
				$tpl=$db->fetch_first("select * from ".tname('weixin_template')." where weixin_id='".$uinfo['weixin_id']."'");
				$template='wap_index'.$tpl['index_tpl'];
				
				//取出分类
				$query=$db->query("select * from ".tname('cate')." where weixin_id='".$uinfo['weixin_id']."' order by sortorder desc");
				while($rows=$db->fetch_array($query))
				{
					$rows['url']=!empty($rows['cate_url'])?$rows['cate_url']:'index.php?con=wap&act=list&cid='.$rows['cate_id'];
					$catelist[]=$rows;
				}
				//取出幻灯片
				$picplayer=array();
				$query=$db->query("select * from ".tname('widget_picplayer')." where weixin_id='".$uinfo['weixin_id']."'");
				while($rows=$db->fetch_array($query))
				{
					$picplayer[]=$rows;
				}
				//取出自定义菜单
				$menus=array();
				$query=$db->query("select * from ".tname('widget_menu')." where weixin_id='".$uinfo['weixin_id']."' and menu_status=1 order by layer asc");
				 	
				while($rows=$db->fetch_array($query))
				{
					$p=explode('-',$rows['layer']);
					$rows['parent']=$p[0];
					if($rows['level']==0)
					{
						$menus[$rows['parent']]['parent']=$rows;
					}
					else
					{
						$menus[$rows['parent']]['child'][]=$rows;
					}
				}
		 
				include bidcms_template($template,'views/wap');
			}
		}
	}




	function list_action()
	{
		global $db;
		$id=intval($_GET['cid']);
		if($id>0)
		{
			$cinfo=$db->fetch_first("select * from ".tname('cate')." where cate_id=".$id);

			$container='and cateid='.$id;
			$ext='&cid='.$id;
			$data_mod=new common('info');
			//取出列表模板
			$tpl=$db->fetch_first("select * from ".tname('weixin_template')." where weixin_id='".$cinfo['weixin_id']."'");
			
			$template='wap_list'.$tpl['list_tpl'];
			$winfo=$db->fetch_first("select * from ".tname('user_weixin')." where weixin_id='".$cinfo['weixin_id']."'");
			
			$showpage = array ('isshow' => 1, 'currentpage' => intval ( $_REQUEST ['page'] ), 'pagesize' => 10, 'url' => 'index.php?con=wap&act=list' . $ext, 'example' => 3 );
			
			$infolist = $data_mod->GetPage ( $showpage, $container );
			include bidcms_template($template,'views/wap');
		}
	}

	function page_action()
	{
		global $db;
		$id=intval($_GET['id']);

		if($id>0)
		{
			$pagesize=intval($_GET['size']);
			$ext='';
	 
			//取出内容
			$info=$db->fetch_first("select * from ".tname('info')." where id=".$id);
 		 	 
			$page=explode('[CDATA[im61]]',$info['content']);
	 		
			$recommendinfo=array();
			if(!empty($info['ext_recommend']))
			{
				$query=$db->query("select * from ".tname('info')." where id in (".$info['ext_recommend'].") order by rand()");
				while($rows=$db->fetch_array($query))
				{
					$recommendinfo[]=$rows;
				}
			}
			$winfo=$db->fetch_first("select * from ".tname('user_weixin')." where weixin_id='".$info['weixin_id']."'");
			
			//取出列表模板
			$tpl=$db->fetch_first("select * from ".tname('weixin_template')." where weixin_id='".$info['weixin_id']."'");
			$template='wap_page'.$tpl['article_tpl'];
			
			include bidcms_template($template,'views/wap');
		}
	}

	function item_action()
	{

		global $db;
		$id=intval($_GET['id']);

		if($id>0)
		{
			$pagesize=intval($_GET['size']);
			$ext='';
	 
			//取出内容
			$info=$db->fetch_first("select * from ".tname('info')." where id=".$id);
 		 
			$page=explode('[CDATA[im61]]',$info['content']);
	 		
			$recommendinfo=array();
			if(!empty($info['ext_recommend']))
			{
				$query=$db->query("select * from ".tname('info')." where id in (".$info['ext_recommend'].") order by rand()");
				while($rows=$db->fetch_array($query))
				{
					$recommendinfo[]=$rows;
				}
			}
			$winfo=$db->fetch_first("select * from ".tname('user_weixin')." where weixin_id='".$info['weixin_id']."'");
			
			//取出列表模板
			$tpl=$db->fetch_first("select * from ".tname('weixin_template')." where weixin_id='".$info['weixin_id']."'");
			$template='wap_article'.$tpl['article_tpl'];
	
			include bidcms_template($template,'views/wap');
		}
	}
	

	function vipcard_action()
	{
		
		$template='wap_vipcard';
		include bidcms_template($template,'views/wap');
	}

	/*------------------------------------------------*/
	
}