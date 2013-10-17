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
class user_controller
{
	function user_controller()
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
				$GLOBALS['db']->query("update ".tname('user_weixin')." set vip_level=vip_level-1,lasttime=".(time()+2592000)." where weixin_id='".$this->weixinid."'");
			}
		}
		include ROOT_PATH.'./models/common.php';
	}
	function index_action()
	{
		global $db,$_G;
		
		$uid=$GLOBALS['bidcms_uid'];
		$pagetitle='管理中心';
		$infolist=array();
		$query=$db->query("select * from ".tname('user_weixin')." where uid=".$uid);

		while($rows=$db->fetch_array($query))
		{
			$infolist[]=$rows;
		}
		include bidcms_template('user_home');
	}
	function del_action()
	{
		global $db,$_G;
		$uid=$GLOBALS['bidcms_uid'];
		$updateid=intval($_REQUEST['updateid']);
		
		$infolist=array();
		$c=$db->fetch_first("select id from ".tname('user_weixin')." where uid=".$uid." and id=".$updateid);
		if($c['id']>0)
		{
			$db->query("delete from ".tname('user_weixin')." where uid=".$uid." and id=".$updateid);
		}
		sheader('index.php?con=user',3,'操作成功');
		include bidcms_template('user_home');
	}
	function modify_action()
	{
		global $db,$_G;
		$data_mod=new common('user_weixin');
		$uid=$GLOBALS['bidcms_uid'];
		$updateid=intval($_REQUEST['updateid']);
		$pagetitle='微信公众号配置';
		
		if(submitcheck('commit'))
		{
			$widstr=trim($_POST['wxid']);
			if(substr($widstr,0,2)=='gh')
			{
				$wid=explode('_',$widstr);
				$data['weixin_id']=$wid[0].'_'.$wid[1];
			}
			else
			{
				sheader("index.php?con=user",3,"原始号格式为:gh_12个字母数字的组合");
			}
			$data['weixin_num']=trim($_POST['weixin']);
			$data['weixin_name']=trim($_POST['wxname']);
			$data['weixin_avatar']=trim($_POST['headerpic']);
			$data['weixin_home']=trim($_POST['homepic']);
			$data['weixin_api']=trim($_POST['apiurl']);
			$data['weixin_user_api']=trim($_POST['userapiurl']);
			$data['weixin_token']=trim($_POST['token']);
			$data['weixin_qq']=trim($_POST['qq']);
			$data['weixin_weibo']=trim($_POST['weibo']);
			if($updateid>0)
			{
				$insertid=$data_mod->UpdateData($data,'and uid='.$uid.' and id='.$updateid);
				sheader("index.php?con=user",3,"帐号更新成功");
			}
			else
			{
				$c=$db->fetch_first("select count(id) as total from ".tname('user_weixin')." where uid=".$uid);
				if($c['total']<5)
				{
					$old=$db->fetch_first("select id from ".tname('user_weixin')." where weixin_id='".$data['weixin_id']."'");
					if($old['id'])
					{
						sheader("index.php?con=user",3,"微信ID已经存在。");
					}
					$data['vip_level']=0;
					$data['starttime']=time();
					$data['lasttime']=time()+604800;
					$data['free_count']=10000;
					$data['given_count']=10000;
					$data['price_count']=0;
					$data['text_count']=2000;
					$data['image_count']=2000;
					$data['audio_count']=2000;
					$data['uid']=$uid;
					$insertid=$data_mod->InsertData($data);
					sheader("index.php?con=user",3,"帐号创建成功");
				}
				else
				{
					sheader("index.php?con=user",3,"帐号已达到上限");
				}
			}
		}
		else
		{
			if($updateid>0)
			{
				$userinfo=$db->fetch_first("select * from ".tname('user_weixin')." where id=".$updateid." and uid=".$uid);
			}
			include bidcms_template('user_homeform');
		}
		
	}
	function extmodify_action()
	{
		global $db,$_G;
		$pagetitle='微信公众号完善资料';
		
		$data_mod=new common('user_weixin_ext');
		$uid=$GLOBALS['bidcms_uid'];
		$updateid=intval($_REQUEST['updateid']);
		
		if($updateid>0)
		{
			$wxinfo=$db->fetch_first("select id from ".tname('user_weixin')." where id=".$updateid." and uid=".$uid);
			$userinfo=$db->fetch_first("select * from ".tname('user_weixin_ext')." where uwxid=".$updateid);
		}
		if($wxinfo['id']<1)
		{
			sheader("index.php?con=user",3,"权限不足");
		}
		if(submitcheck('commit'))
		{
			$data['weixin_qe']=trim($_POST['qecode']);
			$data['weixin_province']=trim($_POST['myprovince']);
			$data['weixin_city']=trim($_POST['mycity']);
			$data['weixin_area']=trim($_POST['myarea']);
			$data['weixin_level']=trim($_POST['level']);
			$data['weixin_content']=trim($_POST['content']);
			$data['weixin_fans']=trim($_POST['wxfans']);
			$data['weixin_type']=intval($_POST['type']);
			$data['weixin_statistics']=trim($_POST['tongji']);
			if($userinfo['uwxid']>0)
			{
				$insertid=$data_mod->UpdateData($data,'and uwxid='.$updateid);
				
			}
			else
			{
				$data['uwxid']=$updateid;
				$insertid=$data_mod->InsertData($data);
			}
			sheader("index.php?con=user&act=extmodify&updateid=".$updateid,3,"信息补充成功");
		}
		else
		{
			include bidcms_template('user_home_extform');
		}
	}
	function app_action()
	{
		global $db,$_G;
		$pagetitle='61微信公众号功能列表';
		
		if(empty($this->weixinid))
		{
			sheader('index.php?con=user',3,'请先选择一个微信进行操作');
		}
		$current='app';
		$winfo=$this->winfo;
		//得到所有的插件
		$plugins=$myplugins=array();
		$query=$db->query('select `plugins_id`, `plugins_title`, `plugins_intro`, `plugins_level`, `plugins_status` from '.tname('weixin_plugins'));
		while($rows=$db->fetch_array($query))
		{
			$plugins[$rows['plugins_id']]=$rows;
		}
		//得到我开通的插件
		$query=$db->query('select `plugins_id` from '.tname('user_plugins').' where weixin_id="'.$this->weixinid.'"');
		while($rows=$db->fetch_array($query))
		{
			if($plugins[$rows['plugins_id']]['plugins_level']>$winfo['vip_level'])
			{
				$db->query("delete from ".tname('user_plugins')." where weixin_id='".$this->weixinid."' and plugins_id=".$rows['plugins_id']);
			}
			else
			{
				$myplugins[]=$rows['plugins_id'];
			}
		}
		include bidcms_template('user_manage_app');
	}
	function appmodify_action()
	{
		global $db;
		//取出所有插件
		$query=$db->query('select `plugins_id`, `plugins_title`, `plugins_intro`, `plugins_level`, `plugins_status` from '.tname('weixin_plugins'));
		while($rows=$db->fetch_array($query))
		{
			$plugins[$rows['plugins_id']]=$rows;
		}
		$id=intval($_GET['id']);
		$type=trim($_GET['type']);
		if(!empty($this->weixinid) && $id>0 && $plugins[$id]['plugins_level']<=$this->winfo['vip_level'])
		{
			$p=$db->fetch_first('select `plugins_id` from '.tname('user_plugins').' where plugins_id='.$id.' and weixin_id="'.$this->weixinid.'"');
			if($p['plugins_id']>0 && $type=='del')
			{
				$db->query('delete from '.tname('user_plugins').' where plugins_id='.$id.' and weixin_id="'.$this->weixinid.'"');
			}
			elseif($p['plugins_id']<1 && $type=='add')
			{
				$db->query('insert into '.tname('user_plugins').'(weixin_id,plugins_id) values("'.$this->weixinid.'",'.$id.')');
			}
		}
	}
	function login_action()
	{
		echo 'login';
	}
	function notice_action()
	{
		
		global $db,$_G;
		$pagetitle='61微信公众号关注提醒';
		if(empty($this->weixinid))
		{
			sheader('index.php?con=user',3,'请先选择一个微信进行操作');
		}
		$winfo=$this->winfo;
		$current='notice';
		$data_mod=new common('notice_info');
		$uid=$GLOBALS['bidcms_uid'];
		if($uid>0)
		{
			$info=$db->fetch_first('select uid,content,home from '.tname('notice_info').' where uid='.$uid." and weixin_id='".$this->weixinid."'");
		}
		else
		{
			
		}
		if(submitcheck('commit'))
		{
			if($GLOBALS['bidcms_uid']>0)
			{
				$data['content']=trim(strip_tags($_POST['info']));
				$data['home']=intval($_POST['home']);
				$data['weixin_id']=$this->weixinid;
				if($info['uid']>0)
				{
					$id=$data_mod->UpdateData($data,' and uid='.$uid." and weixin_id='".$this->weixinid."'");
				}
				else
				{
					$data['uid']=$uid;
					$id=$data_mod->InsertData($data);
				}
				sheader("index.php?con=user&act=notice",3,"操作成功");
			}
			else
			{
				sheader("index.php?con=user&act=notice",3,"操作失败");
			}

		}
		else
		{
			include bidcms_template('user_manage_notice');
		}
	}
	function infodel_action()
	{
		global $db,$_G;
		$pagetitle='61微信公众号功能列表';
		$uid=$GLOBALS['bidcms_uid'];
		$updateid=intval($_REQUEST['updateid']);
		$url=array('text','image','audio');
		if($updateid>0 && $uid>0)
		{
			$info=$db->fetch_first('select uid,content,keywords,id,info_type from '.tname('info').' where id='.$updateid.' and uid='.$uid);
			if($info['id']>0)
			{
				$db->query("delete from ".tname('info')." where id=".$updateid);
				$db->query("delete from ".tname('info_keywords')." where info_id=".$updateid);
				$field=array('text_count','image_count','audio_count');
				if(isset($field[$info['info_type']]))
				{
					$db->query("update ".tname('user_weixin')." set `".$field[$info['info_type']]."`=`".$field[$info['info_type']]."`+1 where weixin_id='".$data['weixin_id']."'");
				}
			}

			sheader("index.php?con=user&act=".$url[$info['info_type']],3,"删除成功");	
		}
		else
		{
			sheader("index.php?con=user&act=".$url[$info['info_type']],3,"删除失败");
		}
	}
	function randinfodel_action()
	{
		global $db,$_G;
		$pagetitle='61微信公众号回答不上时提醒';
		$uid=$GLOBALS['bidcms_uid'];
		$updateid=intval($_REQUEST['updateid']);
		if($updateid>0 && $uid>0)
		{
			$info=$db->fetch_first('select id from '.tname('rand_info').' where id='.$updateid.' and uid='.$uid);
			if($info['id']>0)
			{
				$db->query("delete from ".tname('rand_info')." where id=".$updateid);
			}

			sheader("index.php?con=user&act=none",3,"删除成功");	
		}
		else
		{
			sheader("index.php?con=user&act=none",3,"删除失败");
		}
	}
	function catedel_action()
	{
		global $db,$_G;
		$uid=$GLOBALS['bidcms_uid'];
		$updateid=intval($_REQUEST['updateid']);
		if($updateid>0 && $uid>0)
		{
			$info=$db->fetch_first('select uid,cate_id from '.tname('cate').' where cate_id='.$updateid.' and uid='.$uid);
			if($info['cate_id']>0)
			{
				$db->query("delete from ".tname('cate')." where cate_id=".$updateid);
				
			}

			sheader("index.php?con=user&act=cate",3,"删除成功");	
		}
		else
		{
			sheader("index.php?con=user&act=cate",3,"删除失败");
		}
	}
	function page_action()
	{
		global $db,$_G;
		$pagetitle='61微信公众号信息';
		$current='image';
		$data_mod=new common('page');
		$uid=$GLOBALS['bidcms_uid'];
		if(empty($this->weixinid))
		{
			sheader('index.php?con=user',3,'请先选择一个微信进行操作');
		}
		$winfo=$this->winfo;
		$query=$db->query("select * from ".tname('cate')." where weixin_id='".$this->weixinid."' and uid=".$uid." order by sortorder desc");
		while($rows=$db->fetch_array($query))
		{
			$catelist[]=$rows;
		}
		$container=' and weixin_id="'.$this->weixinid.'" and info_type=1 and uid='.$uid;
		$showpage = array ('isshow' => 1, 'currentpage' => intval ( $_REQUEST ['page'] ), 'pagesize' => 20, 'url' => 'index.php?con=user&act=image' . $ext, 'example' => 3 );
		$infolist=$data_mod->GetPage($showpage,$container,"",array(),"order by id desc");
		include bidcms_template('user_manage_page');
	}

	function pagemodify_action()
	{
		global $db,$_G;
		$pagetitle='61微信公众号信息';
		$current='image';
		if(empty($this->weixinid))
		{
			sheader('index.php?con=user',3,'请先选择一个微信进行操作');
		}
		$winfo=$this->winfo;
		
		$data_mod=new common('page');
		$uid=$GLOBALS['bidcms_uid'];
		$updateid=intval($_REQUEST['updateid']);
 
		if(submitcheck('commit'))
		{
			$data['uid']=$uid;
			$data['keywords']=implode(' ',$_POST['keywords']);
			$data['intro']=strip_tags(trim($_POST['text']));
			$data['content']=trim($_POST['content']);
			$data['title']=strip_tags(trim($_POST['title']));
			$data['cateid']=intval($_POST['classid']);
			$data['face']=strip_tags(trim($_POST['pic']));
			$data['showindex']=intval($_POST['showpic']);
			$data['ext_info']=implode($_POST['ext_info']);
			$data['ext_recommend']=implode($_POST['ext_recommend']);
			$data['url']=strip_tags(trim($_POST['url']));
			$data['updatetime']=time();
			$data['info_type']=1;
			
			if($updateid>0)
			{
				$doid=$data_mod->UpdateData($data,' and id='.$updateid.' and uid='.$uid);
				$this->_insertKey($_POST,$updateid,$db);
			}
			else
			{
				$data['weixin_id']=trim($this->weixinid);
				$checkcount=$db->fetch_first("select image_count from ".tname('user_weixin')." where weixin_id='".$data['weixin_id']."'");
				if($checkcount['image_count']>0)
				{
					$doid=$data_mod->InsertData($data);
					$this->_insertKey($_POST,$doid,$db);
					$db->query("update ".tname('user_weixin')." set image_count=image_count-1 where weixin_id='".$data['weixin_id']."'");
				}
				else
				{
					sheader("index.php?con=user&act=image",3,"图文自定义额度已经用完了");
				}
			}
			if($doid>0)
			{
				sheader("index.php?con=user&act=image",3,"操作修改成功");
			}
			else
			{
				sheader("index.php?con=user&act=image",3,"操作修改失败");
			}
		}
		else
		{
			if($updateid>0)
			{
				$query=$db->query('select * from '.tname('info_keywords').' where info_id='.$updateid);
				while($rows=$db->fetch_array($query))
				{
					$info_keywords[]=$rows;
				}
				$info=$db->fetch_first('select * from '.tname('info').' where id='.$updateid);
			}
			$query=$db->query("select * from ".tname('cate')." where weixin_id='".$this->weixinid."' and uid=".$uid." order by sortorder desc");
			while($rows=$db->fetch_array($query))
			{
				$catelist[]=$rows;
			}
			include bidcms_template('user_manage_pageform');
		}
	}
	
	function textmodify_action()
	{
		global $db,$_G;
		if(empty($this->weixinid))
		{
			sheader('index.php?con=user',3,'请先选择一个微信进行操作');
		}
		$winfo=$this->winfo;
		$pagetitle='61微信公众号文字信息';
		$current='text';
		$data_mod=new common('info');
		$extdata_mod=new common('info_keywords');
		$uid=$GLOBALS['bidcms_uid'];
		$updateid=intval($_REQUEST['updateid']);
		
		if(submitcheck('commit'))
		{
			$data['uid']=$uid;
			$data['content']=strip_tags(trim($_POST['text']));
			$data['keywords']=implode(' ',$_POST['keywords']);
			$data['updatetime']=time();
			if($updateid>0)
			{
				$doid=$data_mod->UpdateData($data,' and id='.$updateid.' and uid='.$uid);
				$this->_insertKey($_POST,$updateid,$db);
			}
			else
			{
				$data['weixin_id']=trim($this->weixinid);
				$checkcount=$db->fetch_first("select text_count from ".tname('user_weixin')." where weixin_id='".$data['weixin_id']."'");
				if($checkcount['text_count']>0)
				{
					$doid=$data_mod->InsertData($data);
					$this->_insertKey($_POST,$doid,$db);
					$db->query("update ".tname('user_weixin')." set text_count=text_count-1 where weixin_id='".$data['weixin_id']."'");
				}
				else
				{
					sheader("index.php?con=user&act=text",3,"文本自定义额度已经用完了");
				}
			}
			if($doid>0)
			{
				sheader("index.php?con=user&act=text",3,"操作成功");
			}
			else
			{
				sheader("index.php?con=user&act=text",3,"操作失败");
			}
		}
		else
		{
			if($updateid>0)
			{
				$query=$db->query('select * from '.tname('info_keywords').' where info_id='.$updateid);
				while($rows=$db->fetch_array($query))
				{
					$info_keywords[]=$rows;
				}
				$info=$db->fetch_first('select * from '.tname('info').' where id='.$updateid);
			}
			include bidcms_template('user_manage_textform');
		}
	}
	function none_action()
	{
		global $db;
		$pagetitle='61微信公众号信息';
		if(empty($this->weixinid))
		{
			sheader('index.php?con=user',3,'请先选择一个微信进行操作');
		}
		$winfo=$this->winfo;
		$current='none';
		$data_mod=new common('rand_info');
		$uid=$GLOBALS['bidcms_uid'];
		$container='  and weixin_id="'.$this->weixinid.'" and uid='.$uid;
		$showpage = array ('isshow' => 1, 'currentpage' => intval ( $_REQUEST ['page'] ), 'pagesize' => 20, 'url' => 'index.php?con=user&act=none' . $ext, 'example' => 3 );
		$infolist=$data_mod->GetPage($showpage,$container,"",array(),"order by id desc");
		include bidcms_template('user_manage_none');
	}
	
	function nonemodify_action()
	{
		global $db,$_G;
		$pagetitle='61微信公众号信息';
		if(empty($this->weixinid))
		{
			sheader('index.php?con=user',3,'请先选择一个微信进行操作');
		}
		$winfo=$this->winfo;
		
		$current='none';
		$data_mod=new common('rand_info');
		$uid=$GLOBALS['bidcms_uid'];
		$updateid=intval($_REQUEST['updateid']);
		
		if(submitcheck('commit'))
		{
			$data['uid']=$uid;
			$data['content']=strip_tags(trim($_POST['text']));
			$data['updatetime']=time();
			if($updateid>0)
			{
				$doid=$data_mod->UpdateData($data,' and id='.$updateid.' and uid='.$uid);
			}
			else
			{
				$data['weixin_id']=trim($this->weixinid);
				$doid=$data_mod->InsertData($data);
			}
			if($doid>0)
			{
				sheader("index.php?con=user&act=none",3,"操作成功");
			}
			else
			{
				sheader("index.php?con=user&act=none",3,"操作失败");
			}
		}
		else
		{
			if($updateid>0)
			{
				$info=$db->fetch_first('select * from '.tname('rand_info').' where id='.$updateid);
			}
			include bidcms_template('user_manage_noneform');
		}
	}
	function image_action()
	{
		global $db,$_G;
		$pagetitle='61微信公众号信息';
		$current='image';
		$data_mod=new common('info');
		$uid=$GLOBALS['bidcms_uid'];
		if(empty($this->weixinid))
		{
			sheader('index.php?con=user',3,'请先选择一个微信进行操作');
		}
		$winfo=$this->winfo;
		$query=$db->query("select * from ".tname('cate')." where weixin_id='".$this->weixinid."' and uid=".$uid." order by sortorder desc");
		while($rows=$db->fetch_array($query))
		{
			$catelist[]=$rows;
		}
		$container=' and weixin_id="'.$this->weixinid.'" and info_type=1 and uid='.$uid;
		$showpage = array ('isshow' => 1, 'currentpage' => intval ( $_REQUEST ['page'] ), 'pagesize' => 20, 'url' => 'index.php?con=user&act=image' . $ext, 'example' => 3 );
		$infolist=$data_mod->GetPage($showpage,$container,"",array(),"order by id desc");
		include bidcms_template('user_manage_image');
	}
	
	function imagemodify_action()
	{
		
		global $db,$_G;
		$pagetitle='61微信公众号信息';
		$current='image';
		if(empty($this->weixinid))
		{
			sheader('index.php?con=user',3,'请先选择一个微信进行操作');
		}
		$winfo=$this->winfo;
		
		$data_mod=new common('info');
		$uid=$GLOBALS['bidcms_uid'];
		$updateid=intval($_REQUEST['updateid']);
		
		if(submitcheck('commit'))
		{
			$data['uid']=$uid;
			$data['keywords']=implode(' ',$_POST['keywords']);
			$data['intro']=strip_tags(trim($_POST['text']));
			$data['content']=trim($_POST['content']);
			$data['title']=strip_tags(trim($_POST['title']));
			$data['cateid']=intval($_POST['classid']);
			$data['face']=strip_tags(trim($_POST['pic']));
			$data['showindex']=intval($_POST['showpic']);
			$data['ext_info']=implode($_POST['ext_info']);
			$data['ext_recommend']=implode($_POST['ext_recommend']);
			$data['url']=strip_tags(trim($_POST['url']));
			$data['updatetime']=time();
			$data['info_type']=1;
			
			if($updateid>0)
			{
				$doid=$data_mod->UpdateData($data,' and id='.$updateid.' and uid='.$uid);
				$this->_insertKey($_POST,$updateid,$db);
			}
			else
			{
				$data['weixin_id']=trim($this->weixinid);
				$checkcount=$db->fetch_first("select image_count from ".tname('user_weixin')." where weixin_id='".$data['weixin_id']."'");
				if($checkcount['image_count']>0)
				{
					$doid=$data_mod->InsertData($data);
					$this->_insertKey($_POST,$doid,$db);
					$db->query("update ".tname('user_weixin')." set image_count=image_count-1 where weixin_id='".$data['weixin_id']."'");
				}
				else
				{
					sheader("index.php?con=user&act=image",3,"图文自定义额度已经用完了");
				}
			}
			if($doid>0)
			{
				sheader("index.php?con=user&act=image",3,"操作修改成功");
			}
			else
			{
				sheader("index.php?con=user&act=image",3,"操作修改失败");
			}
		}
		else
		{
			if($updateid>0)
			{
				$query=$db->query('select * from '.tname('info_keywords').' where info_id='.$updateid);
				while($rows=$db->fetch_array($query))
				{
					$info_keywords[]=$rows;
				}
				$info=$db->fetch_first('select * from '.tname('info').' where id='.$updateid);
			}
			$query=$db->query("select * from ".tname('cate')." where weixin_id='".$this->weixinid."' and uid=".$uid." order by sortorder desc");
			while($rows=$db->fetch_array($query))
			{
				$catelist[]=$rows;
			}
			include bidcms_template('user_manage_imageform');
		}
	}
	function audio_action()
	{
		if(empty($this->weixinid))
		{
			sheader('index.php?con=user',3,'请先选择一个微信进行操作');
		}
		$pagetitle='61微信公众号信息';
		$winfo=$this->winfo;
		
		$current='audio';
		$data_mod=new common('info');
		$uid=$GLOBALS['bidcms_uid'];
		
		$container=' and weixin_id="'.$this->weixinid.'" and info_type=2 and uid='.$uid;
		$showpage = array ('isshow' => 1, 'currentpage' => intval ( $_REQUEST ['page'] ), 'pagesize' => 20, 'url' => 'index.php?con=user&act=audio' . $ext, 'example' => 3 );
		$infolist=$data_mod->GetPage($showpage,$container,"",array(),"order by id desc");
		include bidcms_template('user_manage_audio');
	}
	
	function audiomodify_action()
	{
		
		global $db,$_G;
		$pagetitle='61微信公众号信息';
		$current='audio';
		if(empty($this->weixinid))
		{
			sheader('index.php?con=user',3,'请先选择一个微信进行操作');
		}
		$winfo=$this->winfo;
		
		$data_mod=new common('info');
		$uid=$GLOBALS['bidcms_uid'];
		$updateid=intval($_REQUEST['updateid']);
		
		if(submitcheck('commit'))
		{
			$data['uid']=$uid;
			$data['keywords']=implode(' ',$_POST['keywords']);
			$data['content']=strip_tags(trim($_POST['text']));
			$data['title']=strip_tags(trim($_POST['title']));
			$data['music']=strip_tags(trim($_POST['music']));
			$data['hq_music']=strip_tags(trim($_POST['hq_music']));
			$data['updatetime']=time();
			$data['info_type']=2;
			if($updateid>0)
			{
				$doid=$data_mod->UpdateData($data,' and id='.$updateid.' and uid='.$uid);
				$this->_insertKey($_POST,$updateid,$db);
			}
			else
			{
				$data['weixin_id']=trim($this->weixinid);
				$checkcount=$db->fetch_first("select audio_count from ".tname('user_weixin')." where weixin_id='".$data['weixin_id']."'");
				if($checkcount['audio_count']>0)
				{
					$doid=$data_mod->InsertData($data);
					$this->_insertKey($_POST,$doid,$db);
					$db->query("update ".tname('user_weixin')." set audio_count=audio_count-1 where weixin_id='".$data['weixin_id']."'");
				}
				else
				{
					sheader("index.php?con=user&act=audio",3,"语音自定义额度已经用完了");
				}
			}
			if($doid>0)
			{
				sheader("index.php?con=user&act=audio",3,"操作修改成功");
			}
			else
			{
				sheader("index.php?con=user&act=audio",3,"操作修改失败");
			}
		}
		else
		{
			if($updateid>0)
			{
				$query=$db->query('select * from '.tname('info_keywords').' where info_id='.$updateid);
				while($rows=$db->fetch_array($query))
				{
					$info_keywords[]=$rows;
				}
				$info=$db->fetch_first('select * from '.tname('info').' where id='.$updateid);
			}
			include bidcms_template('user_manage_audioform');
		}
	}
	
	function custommodify_action()
	{
		$current='cate';
		global $db,$_G;
		$pagetitle='61微信公众号信息';
		if(empty($this->weixinid))
		{
			sheader('index.php?con=user',3,'请先选择一个微信进行操作');
		}
		$uid=$GLOBALS['bidcms_uid'];
		$content=trim(strip_tags($_REQUEST['info']));
		if(!empty($content))
		{
			$info=$db->fetch_first("select id from ".tname('rand_info')." where weixin_id='".$this->weixinid."'");
		
			if($info['id']>0)
			{
				$db->query("update ".tname('rand_info')." set content='".$content."' where id=".$info['id']);
			}
			else
			{
				$db->query("insert into ".tname('rand_info')."(content,weixin_id,uid) values('".$content."','".$this->weixinid."',".$uid.")");
			}
			echo '<script type="text/javascript">
			<!--
				alert("修改成功");
			//-->
			</script>';
		}
	}
	function cate_action()
	{
		$current='cate';
		global $db,$_G;
		$pagetitle='61微信公众号分类管理';
		if(empty($this->weixinid))
		{
			sheader('index.php?con=user',3,'请先选择一个微信进行操作');
		}
		$uid=$GLOBALS['bidcms_uid'];
		
		$winfo=$this->winfo;
		$query=$db->query("select * from ".tname('cate')." where weixin_id='".$this->weixinid."' and uid=".$uid." order by sortorder desc");
		while($rows=$db->fetch_array($query))
		{
			$catelist[]=$rows;
		}
		include bidcms_template('user_manage_cate');
	}
	function catemodify_action()
	{
		
		global $db,$_G;
		$current='cate';
		$pagetitle='61微信公众号分类管理';
		if(empty($this->weixinid))
		{
			sheader('index.php?con=user',3,'请先选择一个微信进行操作');
		}
		$winfo=$this->winfo;
		
		$data_mod=new common('cate');
		$uid=$GLOBALS['bidcms_uid'];
		$updateid=intval($_REQUEST['updateid']);
		
		if(submitcheck('commit'))
		{
			$data['cate_name']=strip_tags(trim($_POST['cate_name']));
			$data['cate_desc']=strip_tags(trim($_POST['cate_desc']));
			$data['cate_face']=strip_tags(trim($_POST['cate_face']));
			$data['cate_url']=strip_tags(trim($_POST['cate_url']));
			$data['sortorder']=intval($_POST['sortorder']);
			if($updateid>0)
			{
				$doid=$data_mod->UpdateData($data,' and cate_id='.$updateid.' and uid='.$uid);
			}
			else
			{
				$data['weixin_id']=trim($this->weixinid);
				$data['uid']=$uid;
				$doid=$data_mod->InsertData($data);
			}
			if($doid>0)
			{
				sheader("index.php?con=user&act=cate",3,"操作成功");
			}
			else
			{
				sheader("index.php?con=user&act=cate",3,"操作失败");
			}
		}
		else
		{
			if($updateid>0)
			{
				$info=$db->fetch_first('select * from '.tname('cate').' where cate_id='.$updateid.' and uid='.$uid);
			}
			include bidcms_template('user_manage_cateform');
		}
	}
	function template_action()
	{
		global $db,$_G;
		$current='template';
		$pagetitle='3G网站模板';
		if(empty($this->weixinid))
		{
			sheader('index.php?con=user',3,'请先选择一个微信进行操作');
		}
		$winfo=$this->winfo;
		
		$uid=$GLOBALS['bidcms_uid'];
		
		$info=$db->fetch_first("select * from ".tname('weixin_template')." where weixin_id='".$this->weixinid."'");
		if(submitcheck('commit'))
		{
			$index_tpl=intval($_POST['optype']);
			$list_tpl=intval($_POST['optype2']);
			$article_tpl=intval($_POST['optype3']);
			if(!empty($info['weixin_id']))
			{
				$db->query("update ".tname('weixin_template')." set index_tpl=".$index_tpl.",list_tpl=".$list_tpl.",article_tpl=".$article_tpl." where weixin_id='".$this->weixinid."'");
			}
			else
			{
				$db->query("insert into ".tname('weixin_template')."(weixin_id,index_tpl,list_tpl,article_tpl) values('".$this->weixinid."',".$index_tpl.",".$list_tpl.",".$article_tpl.")");
			}
			echo '<script type="text/javascript">
			<!--
				alert("模板设置成功");
			//-->
			</script>';
		}
		else
		{
			include bidcms_template('user_manage_template');
		}
	}

	function _insertKey($data,$updateid,$db)
	{
		if(!empty($data['keywords']))
		{
			$db->query("delete from ".tname('info_keywords')." where info_id=".$updateid);
			foreach($data['keywords'] as $k=>$v)
			{
				$sql="insert into ".tname('info_keywords')."(info_id,keyword,mattch,weixin_id,api_type) values(".$updateid.",'".$v."',".intval($data['matchs'][$k]).",'".$this->weixinid."',".$data['api_type'][$k].")";
				$db->query($sql);
			}
		}
	}
}
