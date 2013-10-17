<?php
/*
	[Phpup.Net!] (C)2009-2011 Phpup.net.
	This is NOT a freeware, use is subject to license terms

	$Id: getinfo.php 2010-08-24 10:42 $
*/
error_reporting(0);
define('IN_BIDCMS',1);

date_default_timezone_set('Asia/Shanghai');
define('BIDCMS_CLIENT_SESSION','bidcms');
define('ROOT_PATH',str_replace('inc','',str_replace('\\','/',dirname(__FILE__))));
include ROOT_PATH.'/data/config.inc.php';
header("Content-type:text/html;charset=".$bidcmscharset);
include ROOT_PATH.'/data/cache/setting.php';
require(ROOT_PATH.'/inc/session/session_operator_native.class.php');
$session=new session_operator_native();
$session->session_start();
$setting=$content;
define('TPL_DIR',!empty($setting['site_template_dir'])?$setting['site_template_dir']:'default');
$_REQUEST=global_addslashes($_REQUEST);
$_GET=global_addslashes($_GET);
$_POST=global_addslashes($_POST);
$serverset = 'character_set_connection='.$bidcmsdbcharset.', character_set_results='.$bidcmsdbcharset.', character_set_client=binary';
$link=mysql_pconnect($bidcmsdbhost,$bidcmsdbuser,$bidcmsdbpw);
mysql_query('use '.$bidcmsdbname,$link);
$version=mysql_get_server_info($link);
$serverset .= $version> '5.0.1' ? ((empty($serverset) ? '' : ',').'sql_mode=\'\'') : '';
$serverset && mysql_query("SET $serverset", $link);
function stripslashes_deep($value)
{
	if (get_magic_quotes_gpc())
	{
		$value = is_array($value) ? array_map('stripslashes_deep', $value) : stripslashes($value);
	}
	return str_replace('\\','',$value);
}

function global_addslashes($string, $force = 1)
{
	if($force)
	{
		$string=stripslashes_deep($string);
		if(is_array($string))
		{
			foreach($string as $key => $val)
			{
				$string[$key] = global_addslashes($val, $force);
			}
		}
		else
		{
			$string = addslashes($string);
		}
	}
	else
	{
		$string=stripslashes_deep($string);
	}
	return $string;
}