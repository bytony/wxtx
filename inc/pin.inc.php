<?php
/*
	[Bidcms.com!] (C)2009-2011 Bidcms.com.
	This is NOT a freeware, use is subject to license terms
	$author limengqi
	$Id: pin.inc.php 2010-08-24 10:42 $
*/
if(!defined('IN_BIDCMS')) {
	exit('Access Denied');
}
function getcate()
{
	global $db;
	$query=$db->query("select * from ".tname('cate'));
	while($rows=$db->fetch_array($query))
	{
		$cate[]=array('id'=>$rows['cateindex'],'name'=>$rows['catename'],'nav_link'=>(!empty($rows['customurl'])?$rows['customurl']:$rows['cateindex']),'group'=>$rows['group']);
	}
	return $cate;
}
function getpin($pin_id,$haveuser=1,$haveviauser=0,$havevia=0,$haveorigin=0,$haveboard=1,$havepn=0,$havecomments=1)
{
	global $db,$session;
	$sessionuid=$session->get('uid');
	$query="select * from ".tname('pin')." where pin_id=".$pin_id;
	$pin=$db->fetch_first($query);
	if($pin['pin_id']>0)
	{
		$pin['file']=getfile($pin['file_id']);
		$uid=$pin['user_id'];
		$boards=$GLOBALS['initboards'];
		$pin['board']=$haveboard && isset($pin['board_id']) && $pin['board_id']>1?getboard($pin['board_id']):$boards[$pin['board_id']];
		if($havepn>0)
		{
			$sql="select * from ".tname('pin')." where pin_id>".$pin_id;
			$nsql="select * from ".tname('pin')." where pin_id<".$pin_id;
			if(!empty($pin['board_id']))
			{
				$sql.=" and board_id=".$pin['board_id'];
				$nsql.=" and board_id=".$pin['board_id'];
			}
			$sql.=' order by pin_id asc';
			$nsql.=' order by pin_id desc';
			$prev=$db->fetch_first($sql);
			if(!empty($prev))
			{
				$prev['file']=getfile($prev['file_id']);
				$pin['prev']=$prev;
				unset($prev);
			}
			$next=$db->fetch_first($nsql);
			if(!empty($next))
			{
				$next['file']=getfile($next['file_id']);
				$pin['next']=$next;
				unset($next);
			}
		}
		$liked=$db->fetch_first("select notice_id from ".tname('notice_pin')." where pin_id='".$pin_id."' and user_id='".$sessionuid."' and mylike=1");
		$pin['liked']=$liked['notice_id']>0?1:0;
		if($havecomments>0)
		{
			$pin['comments']=getcomments($pin['pin_id']);
		}
		$pin['text_meta']=!empty($pin['text_meta'])?unserialize($pin['text_meta']):array();
		$pin['commodity']=isset($pin['text_meta']['commodity'])?getcommodity($pin['pin_id']):null;
		$pin['user']=$haveuser && isset($pin['user_id']) && $pin['user_id']>0?getuser($pin['user_id']):null;
		$pin['via_user']=$haveviauser && isset($pin['via_user_id']) && $pin['via_user_id']>0?getuser($pin['via_user_id']):null;
		$pin['via_pin']=$havevia && isset($pin['via']) &&  $pin['via']>0?getpin($pin['via'],1):null;
		$pin['original_pin']=$haveorigin && isset($pin['original']) && $pin['original']>0?getpin($pin['original'],1):null;
		return $pin;
	}
	return array();
}
function getcomments($pin_id)
{
	global $db;
	$comments=array();
	if($pin_id>0)
	{
		$query=$db->query("select * from ".tname('comments')." where pin_id=".$pin_id);
		while($rows=$db->fetch_array($query))
		{
			$comment=$rows;
			$comment['user']=getuser($rows['user_id']);
			$comments[]=$comment;
		}

	}
	return $comments;
}

function getcommodity($pin_id)
{
	global $db;
	$commodity=array();
	if($pin_id>0)
	{
		$commodity=$db->fetch_first("select * from ".tname('commodity')." where pin_id=".$pin_id);
		if(isset($commodify['commodity_id']) && $commodify['commodity_id']>0)
		{
			$extra=$db->fetch_first("select * from ".tname('commodity_extra')." where commodity_id=".$commodify['commodity_id']);
			$commodity['extra']['sku']=array("created"=>$extra['created'], "modified"=>$extra['modified'], "outer_id"=>$extra['outer_id'], "price"=>$extra['price'], "properties"=>$extra['properties'], ""=>$extra['properties_name'], "quantity"=>$extra['quantity'], "sku_id"=>$extra['sku_id']);
			$commodity['extra']['click_url']=$extra['click_url'];
		}
	}
	return $commodity;
}
function getfile($file_id)
{
	global $db,$bidcmskey;
	$file=array();
	if($file_id>0)
	{
		$query="select bidcms_key as `key`,bidcms_type as `type`,width,height from ".tname('file')." where file_id=".$file_id;
		$file=$db->fetch_first($query);
		if(empty($file))
		{
			$file=array("key"=>$bidcmskey,"type"=>"image/jpeg","width"=>"180","height"=>"180");
		}
	}
	else
	{
		$file=array("key"=>$bidcmskey,"type"=>"image/jpeg","width"=>"180","height"=>"180");

	}
	$file['farm']='farm1';
	$file['bucket']='hbimg';
	$file['frames']=1;
	return $file;
}
function getuser($user_id,$haveavatar=1,$havecount=0,$havebind=0,$haveprofile=0,$havestatus=0)
{
	global $db;
	$user=array();
	if($user_id>0)
	{
		$userfield="user_id,username,urlname,created_at,avatar_id,email";
		if($havecount>0)
		{
			$userfield.=",location,board_count,pin_count,like_count,follower_count,following_count,following,rating ";
		}
		$query="select ".$userfield." from ".tname('user')." where user_id=".$user_id;
		
		$user=$db->fetch_first($query);
		if(isset($user['user_id']) && $user['user_id']>0)
		{
			if($haveavatar && $user['avatar_id']>0)
			{
				$user['avatar']=getfile($user['avatar_id']);
				$user['avatar']['farm']='farm1';
				$user['avatar']['bucket']='hbimg';
				$user['avatar']['frames']=1;
			}
			if($havebind>0)
			{
				$query=$db->query('SELECT `bind_id`, `user_id`, `service_name`, `bind_user_id`, `bind_user`, `bind_email`, `avatar_id`, `created_at` FROM '.tname('user_bind').' WHERE user_id='.$user['user_id']);
				$bindings=array();
				while($rows=$db->fetch_array($query))
				{
					$bindings[$rows['service_name']]=array('bind_id'=>$rows['bind_id'],'user_id'=>$rows['user_id'],'service_name'=>$rows['service_name']);
					$bindings[$rows['service_name']]['user_info']=array('id'=>$rows['bind_user_id'],'username'=>$rows['bind_user'],'email'=>$rows['bind_email']);
					if($rows['avatar_id'])
					{
						$bindavatar=getfile($user['avatar_id']);
						$bindavatar['farm']='farm1';
						$bindavatar['bucket']='hbimg';
						$bindavatar['frames']=1;
						$bindings[$rows['service_name']]['user_info']['avatar']=$bindavatar;
						unset($bindavatar);
					}
				}
				$user['bindings']=!empty($bindings)?$bindings:array();
			}
			if($haveprofile)
			{
				$profile=$db->fetch_first("select location,url,about from ".tname('user_profile')." where user_id=".$user['user_id']);
				$user['profile']=!empty($profile)?$profile:array();
			}
			if($havestatus)
			{
				$status=$db->fetch_first("select lr,default_board,invites,share,hide_douban from ".tname('user_status')." where user_id=".$user['user_id']);
				$user['status']=!empty($status)?$status:array();
			}
		}
		else
		{
			$user=array('status'=>array(),'profile'=>array(),'bindings'=>array());
		}
	}
	return $user;
}
function getboard($board_id)
{
	//$board=array("board_id"=>1728600, "user_id"=>178258, "title"=>"海报广告", "description"=>"", "category_id"=>"design", "seq"=>49, "pin_count"=>96, "follow_count"=>17, "created_at"=>"1345434656", "updated_at"=>1354500845, "is_private"=>0);
	global $db;
	$board=array();
	if($board_id>1)
	{
		$query="select board_id,user_id,title,description,category_id,category_name,seq,pin_count,follow_count,created_at,updated_at,is_private from ".tname('board')." where board_id=".$board_id;
		$board=$db->fetch_first($query);
	}
	else
	{
		$board=isset($GLOBALS['initboards'][$board_id])?$GLOBALS['initboards'][$board_id]:array();
	}
	return $board;
}
function getboards($cursor=0,$container='',$order='',$pagesize=10)
{
	//$board=array("board_id"=>1728600, "user_id"=>178258, "title"=>"海报广告", "description"=>"", "category_id"=>"design", "seq"=>49, "pin_count"=>96, "follow_count"=>17, "created_at"=>"1345434656", "updated_at"=>1354500845, "is_private"=>0);
	global $db,$session;
	$boards=array();
	$sessionuid=$session->get('uid');
	
	$sql="select board_id,user_id,title,description,category_id,seq,pin_count,follow_count,created_at,updated_at,is_private from ".tname('board');
	if(!empty($container))
	{
		$sql.=" where 1 ".$container;
	}
	if(!empty($order))
	{
		$sql.=' '.$order;
	}
	else
	{
		$sql.=' order by board_id desc ';
	}
	$sql.=" limit ".($cursor*$pagesize).",".$pagesize;
	$query=$db->query($sql);
	while($rows=$db->fetch_array($query))
	{
		$follow=$db->fetch_first("select notice_id from ".tname("notice_board")." where user_id='".$sessionuid."' and board_id='".$rows['board_id']."' and follow=1");
	
		$rows['following']=$follow['notice_id']>0?1:0;
		$rows['pins']=getboardpins($rows['board_id']);
		$boards[]=$rows;
	}
	return $boards;
}
function getallpins($cursor=0,$container='',$order='',$pagesize=20)
{
	global $db;
	$pins=array();
	$sql="select pin_id from ".tname('pin');
	if(!empty($container))
	{
		$sql.=" where 1 ".$container;
	}
	if(!empty($order))
	{
		$sql.=' '.$order;
	}
	else
	{
		$sql.=' order by pin_id desc ';
	}
	$sql.=" limit ".($cursor*$pagesize).",".$pagesize;
	$query=$db->query($sql); //这里是所有的pins
	while($rows=$db->fetch_array($query))
	{
		$pin=getpin($rows['pin_id'],1,1);
		if($pin)
		{
			$pins[]=$pin;
		}
	}
	return $pins;
}

function getpromotions()
{
	global $db;
	//$ptype=array('3'=>'promotion','4'=>'img_promotions','5'=>'imgtxt_promotions','6'=>'user_promotions');
	$prom=array('img_promotions'=>array(),'promotion'=>array(),'imgtxt_promotions'=>array(),'user_promotions'=>array());
	$query=$db->query("select * from ".tname('promotion'));
	while($rows=$db->fetch_array($query))
	{
		if($rows['file_id']>0)
		{
			$rows['file']=getfile($rows['file_id'],1);
			$rows['file']['bucket']='hbfile';
		}
		if($rows['promotion_type']==4)
		{
			$prom['promotion'][]=$rows;
		}
		if($rows['promotion_type']==4)
		{
			$prom['img_promotions'][]=$rows;
		}
		if($rows['promotion_type']==5)
		{
			$prom['imgtxt_promotions'][]=$rows;
		}
		if($rows['promotion_type']==6)
		{
			if($rows['user_id']>0)
			{
				$rows['user']=getuser($rows['user_id'],1,1);
			}
			$prom['user_promotions'][]=$rows;
		}
		
	}
	return $prom;
}
function getboardpins($board_id,$pagesize=9)
{
	global $db;
	$pins=array();
	$query=$db->query("select * from ".tname('pin')." where board_id=".$board_id." limit 0,".$pagesize);
	while($rows=$db->fetch_array($query))
	{
		$rows['file']=getfile($rows['file_id']);
		$pins[]=$rows;
	}
	return $pins;
}
function getfeeds($user_id)
{
	global $db;
	$feeds=array();
	if($user_id>0)
	{
		$query=$db->query("select * from ".tname('feeds')." where user_id=".$user_id);
		while($rows=$db->fetch_array($query))
		{
			$feed=array('feed_id'=>$rows['feed_id'],'user_id'=>$rows['user_id'],'created_at'=>$rows['created_at'],'content'=>array('type'=>$rows['feedtype'],'pin_id'=>$rows['feedpid']));
			if($rows['feedpid']>0)
			{
				$feed['pin']=getpin($rows['feedpid'],1,1,1);
			}
			$feeds[]=$feed;
		}
	}
	return $feeds;
}