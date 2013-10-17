<?php
/*
	[Phpup.Net!] (C)2009-2011 Phpup.net.
	This is NOT a freeware, use is subject to license terms

	$Id: email.php 2010-08-24 10:42 $
*/

if(!defined('IN_BIDCMS')) {
	exit('Access Denied');
}
class email
{
	function email($info='')
	{
		$emailinfo['smtp']=$GLOBALS['setting']['email_smtp'];
		$emailinfo['port']=$GLOBALS['setting']['email_port'];
		$emailinfo['account']=$GLOBALS['setting']['email_user'];
		$emailinfo['pass']=$GLOBALS['setting']['email_password'];
		$emailinfo['email']=$GLOBALS['setting']['email'];
		$emilinfo=$info?$info:$emailinfo;
		
		include (ROOT_PATH.'/inc/email.class.php');
		$smtpserver = $emilinfo['smtp'];//SMTP服务器
		$smtpserverport =$emilinfo['port'];//SMTP服务器端口
		$smtpuser =$emilinfo['account'];//SMTP服务器的用户帐号
		$smtppass = $emilinfo['pass'];//SMTP服务器的用户密码
		if($smtpserver && $smtpserverport && $smtpuser && $smtppass && $emilinfo['email'])
		{
			$this->smtp = new smtp($smtpserver,$smtpserverport,true,$smtpuser,$smtppass);//这里面的一个true是表示使用身份验证,否则不使用身份验证.
			$this->smtpusermail=$emilinfo['email'];
		}
		else
		{
			$this->smtp=false;
		}
		
	}
	function send($smtpemailto,$smtpusermail,$mailsubject,$mailbody,$mailtype="HTML")
	{
		if($this->smtp && $smtpemailto)
		{
		$smtpusermail=!empty($smtpusermail)?$smtpusermail:$this->smtpusermail;
		$this->smtp->debug = false;//是否显示发送的调试信息
		return $this->smtp->sendmail($smtpemailto, $smtpusermail, $mailsubject, $mailbody, $mailtype);
		}
		return false;
	}
	
}