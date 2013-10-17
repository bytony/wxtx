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
class auth
{
    
	//绑定第三方数据
	function bind()
	{
		echo "insert into bidcms_user_bind(service_name,bind_user_id,bind_user,created_at,avatar,token,tsercet) values('".$this->service_name."','".$this->bind_uid."','".$this->screen_name."','".time()."''".$this->avatar."',,'".$this->access_token."','".$this->access_sercet."')";
	}
	//查询是否绑定
	function binded()
	{
		echo "select * from ".tname('user_bind')." where bind_user_id='".$this->bind_uid."' and token='".$this->access_token."' and service_name='".$this->service_name."'";
	}
	//解绑
	function unbind()
	{
		echo "delete from ".tname('user_bind')." where user_id='".$this->user_uid."' and service_name='".$this->service_name."'";
	}
	
}
