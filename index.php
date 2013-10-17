<?php
set_time_limit(1000);
if(!is_file(str_replace("\\",'/',dirname(__FILE__)).'/data/config.inc.php'))
{

	var_dump($_POST);
	echo '<SCRIPT LANGUAGE="JavaScript">
	<!--
		window.location="install/index.php";
	//-->
	</SCRIPT>';
	exit;
}
require('inc/common.inc.php');

//Î±¾²Ì¬
if($GLOBALS['setting']['seo_rewrite'] && !empty($_REQUEST['repparam']))
{
	$var=explode('/',$_REQUEST['repparam']);
	$_REQUEST['con']=isset($var[0])?$var[0]:'index';
	$_REQUEST['act']=isset($var[1])?$var[1]:'index';
	foreach($var as $p)
	{
		$param=explode('_',$p);
		$_REQUEST[$param[0]]=$param[1];
		$_GET[$param[0]]=$param[1];
	}
}

$controller=(empty($_REQUEST['con'])?'index':$_REQUEST['con']);
if(!empty($GLOBALS['setting']['adminpath']) && $GLOBALS['setting']['adminpath']!='admin' && $_REQUEST['con']=='admin' && empty($_REQUEST['pluginid']))
{
	$controller='index';
	$action='index';
}

$action=empty($_REQUEST['act'])?'index':$_REQUEST['act'];
if(!empty($_REQUEST['pluginid']))
{
	$pfile=ROOT_PATH.'/plugins/'.$_REQUEST['pluginid'].'/controls/'.$controller.'.class.php';
	
	//Plugins
	if(!is_file($pfile))
	{
		$controller='index';
		$action='index';
		require(ROOT_PATH.'/controls/'.$controller.'.class.php');
	}
	else
	{
		require($pfile);
	}
}
else
{
	//Program
	if(!is_file(ROOT_PATH.'/controls/'.$controller.'.class.php'))
	{
		$controller='index';
		$action='index';
	}

	require(ROOT_PATH.'/controls/'.$controller.'.class.php');
}
$conclass=$controller.'_controller';
$actfunc=$action.'_action';
$views=new $conclass;

$views->$actfunc();
