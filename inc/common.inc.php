<?php
error_reporting(0);
define('ROOT_PATH',str_replace('\\','/',substr(dirname(__FILE__),0,-3)));
define('IN_BIDCMS',1);
define('DISCUZ_PATH',ROOT_PATH.'/bbs');
require(DISCUZ_PATH.'/source/class/class_core.php');

$discuz = & discuz_core::instance();
$discuz->cachelist = $cachelist;
$discuz->init();

if(PHP_VERSION < '4.1.0') {
	$_GET = &$HTTP_GET_VARS;
	$_POST = &$HTTP_POST_VARS;
	$_COOKIE = &$HTTP_COOKIE_VARS;
	$_SERVER = &$HTTP_SERVER_VARS;
	$_ENV = &$HTTP_ENV_VARS;
	$_FILES = &$HTTP_POST_FILES;
}

if (isset($_REQUEST['GLOBALS']) OR isset($_FILES['GLOBALS'])) {
	exit('Request tainting attempted.');
}

define('VERSION','BidCms_PINS_1.0');
define('BIDCMS_CLIENT_SESSION','im61');
require(ROOT_PATH.'/data/config.inc.php');
header("Content-type:text/html;charset=".$bidcmscharset);
require(ROOT_PATH.'/inc/mysql.class.php');
require(ROOT_PATH.'/inc/session/session_operator_native.class.php');
$session=new session_operator_native();
$session->session_start();
require(ROOT_PATH.'/inc/rep.inc.php');
require(ROOT_PATH.'/inc/global.func.php');

$_REQUEST=global_addslashes($_REQUEST);
$_GET=global_addslashes($_GET);
$_POST=global_addslashes($_POST);
//初始化数据连接
$db=new bidcms_mysql();

$db->connect($bidcmsdbhost,$bidcmsdbuser,$bidcmsdbpw,$bidcmsdbname);
if(!empty($_REQUEST['fromuser']))
{
	$session->set('fromuser',$_REQUEST['fromuser']);
}
if(!empty($_REQUEST['touser']))
{
	$session->set('touser',$_REQUEST['touser']);
}
if(!checkfile('setting',0))
{
	$query=$db->query('select variable,content from '.tname('setting'));
	while($rows=$db->fetch_array($query))
	{
		$setting[$rows['variable']]=$rows['content'];
	}
	write('setting',$setting);
}
else
{
	$setting=read('setting');
}

$bidcms_uid=$_G['uid'];

$setting["adminpath"]=!empty($setting["adminpath"])?$setting["adminpath"]:'admin';
define('TPL_DIR',!empty($setting['site_template_dir'])?$setting['site_template_dir']:'default');

define('SITE_ROOT',$GLOBALS['setting']['site_url']);
define('STATIC_ROOT',$GLOBALS['setting']['site_imgurl']);
define('ADMIN_ROOT',$GLOBALS["setting"]["adminpath"]);

require(ROOT_PATH.'/inc/sql.inc.php');
require(ROOT_PATH.'/inc/page.class.php');
require(ROOT_PATH.'/inc/cache.inc.php');

