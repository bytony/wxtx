<?php
/*
	[Phpup.Net!] (C)2009-2011 Phpup.net.
	This is NOT a freeware, use is subject to license terms

	$Id: email.php 2010-08-24 10:42 $
*/

if(!defined('IN_BIDCMS')) {
	exit('Access Denied');
}
class fetion
{
	function send($uid,$content)
	{
		global $_G;
		if($uid>0 && !empty($content))
		{
			require_once(DISCUZ_ROOT.'/source/plugin/smstong/smstong.func.php');
			loadcache('plugin');
			$member = DB::fetch(DB::query("SELECT cv.mobile,cmp.mobile as telphone FROM ".DB::table('common_verifycode')." as cv left join ".DB::table('common_member_profile')." as cmp on cv.reguid=cmp.uid WHERE cv.reguid='$uid'"));
			
			if(!empty($member['mobile']) && $member['mobile']==$member['telphone']) {
				$ret = sendsms($_G['cache']['plugin']['smstong']['smsusername'], $_G['cache']['plugin']['smstong']['smspassword'], $mobile, $content);
				return $ret;
			}
		}
		return false;
	}
}