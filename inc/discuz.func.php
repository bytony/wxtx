<?php
if(!defined('IN_BIDCMS')) {
	exit('Access Denied');
}
function bidcms_getusergroup($type='')
{
	$sql='SELECT `groupid`, `grouptitle`,`type` FROM '.DB::table('common_usergroup');
	if(in_array($type,array('system','member','special')))
	{
		$sql.=" where `type`='".$type."'";
	}

	$query = DB::query($sql);
	$data=array();
	while($value=DB::fetch($query)) {
		$data[] = array($value['groupid'], $value['grouptitle'], $value['type']);
	}
	return $data;
}