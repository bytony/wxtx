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
class weibo
{
	function weibo()
	{
		$this->service_name='weibo';
		$this->wb_akey='832506430';
		$this->wb_skey='735243d058de886029e06732dc491875';
		$this->usertable='user';
		$this->uidfield='user_id';
		$this->uidsession='uid';
		include_once( 'weibo/saetv2.ex.class.php' );
	}
	function login()
	{
		$o = new SaeTOAuthV2($this->wb_akey ,$this->wb_skey);
		$code_url = $o->getAuthorizeURL($this->backurl);
		header("location:".$code_url);
	}
    function check()
	{
		$o = new SaeTOAuthV2( $this->wb_akey , $this->wb_skey,NULL,NULL );

		if (isset($_REQUEST['code'])) {
			$keys = array();
			$keys['code'] = $_REQUEST['code'];
			$keys['redirect_uri'] = $this->backurl;
			try {
				$token = $o->getAccessToken( 'code', $keys ) ;
			} catch (OAuthException $e) {
				sheader("index.php?con=user&act=siteregister",3,"微博绑定失败");
			}
		}
		if ($token) 
		{
			setcookie( 'weibojs_'.$o->client_id, http_build_query($token) );
			$c = new SaeTClientV2( $this->wb_akey , $this->wb_skey , $token['access_token']);
			$uid_get = $c->get_uid();
			
			$bind_uid=$uid_get['uid'];
			if(!empty($bind_uid))
			{
				//查询是否已经绑定
				$userinfo=$db->fetch_first("select * from ".tname('user_bind')." where bind_user_id='".$bind_uid."' and token='".$token['access_token']."' and service_name='".$this->service_name."'");
				if($userinfo['user_id']>0)
				{
					$user=$db->fetch_first("select `".$this->uidfield."` from `".$this->usertable."` where `".$this->uidfield."`=".$userinfo['user_id']);
					if($user[$this->uidfield])
					{
						//准备登录
						$session->set($this->uidsession,$user[$this->uidfield]);
					}
				}
				else
				{
					$user_message = $c->show_user_by_id($bind_uid);//根据ID获取用户等基本信息
					//准备绑定
					$db->query("insert into ".tname('user_bind')."(service_name,bind_user_id,bind_user,created_at,token,tsercet,avatar) values('weibo','".$bind_uid."','".$user_message['screen_name']."','".time()."','".$token['access_token']."','','".$user_message['avatar_large']."')");
					$session->set('bind_user_name',$user_message['screen_name']);
					$session->set('bind_user_avatar',$user_message['avatar_large']);
					$session->set('bind_user_id',$bind_uid);
				}
			}
		}

		function bind($uid)
		{
			$db->query("update ".tname('user_bind')." set user_id='".$uid."' where bind_user_id='".$session->get('bind_user_id')."' and service_name='".$this->service_name."'");
			//准备登录
			$session->set($this->uidsession,$uid);
		}
	}
	
}
