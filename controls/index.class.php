	<?php
/*
	[02hk.com!] (C)2009-2011 Bidcms.com.
	This is NOT a freeware, use is subject to license terms
	$author limengqi
	$Id: index.class.php 2010-08-24 10:42 $
*/
if(!defined('IN_BIDCMS')) {
	exit('Access Denied');
}
class index_controller
{
	function index_controller()
	{
		include ROOT_PATH.'./models/common.php';
	}

	function index_action()
	{
		include bidcms_template('index_index');
	}
	function inter_action()
	{
		include bidcms_template('index_interface');
	}
	function intro_action()
	{
		include bidcms_template('index_intro');
	}
}
