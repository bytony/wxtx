<?php
header("content-type:text/html;charset=utf-8");
define('ROOT_PATH',str_replace("\\",'/',dirname(dirname(__FILE__))));
define('IN_BIDCMS',1);
$step=!empty($_GET['step'])?intval($_GET['step']):1;
if(is_file(ROOT_PATH.'/data/install.lock'))
{
	include ROOT_PATH."/install/template/step8.php"; //安装过了
	exit;
}
switch($step)
{
	case 1:
		include ROOT_PATH."/install/template/step1.php"; //协议说明
	break;
	case 2:
		if($_GET['agree'])
		{
			$filelist=array('data','data/cache','data/upload','data/logo');
		
			if(function_exists('gd_info'))
			{
				$v=gd_info();
				$gd_v=$v["GD Version"];
			}
			else
			{
				$gd_v=false;
			}
			$d=dirname(dirname(__FILE__));
			$disk_total=intval(disk_free_space($d)/1024/1024).'M';
			include ROOT_PATH."/install/template/step2.php"; //文件检测
		}
		else
		{
			echo "<script language='javascript'>alert('必须同意协议规定才能继续安装');window.location='index.php?step=1';</script>";
		}
	break;
	case 3:
		if(isset($_POST['error']))
		{
			echo "<script language='javascript'>alert('有未解决的错误');window.location='index.php?step=2&agree=1';</script>";
		}
		else
		{
			include ROOT_PATH."/install/template/step3.php"; //配置信息
		}
	break;
	case 4:
		if($_POST)
		{
			$dbhost=trim(strip_tags($_POST['dbhost']));
			$dbuser=trim(strip_tags($_POST['dbuser']));
			$dbpw=trim(strip_tags($_POST['dbpw']));
			
			//初始化数据连接
			$link=@mysql_connect($dbhost,$dbuser,$dbpw);
			if($link)
			{
			$query=mysql_query('show databases');
			$exists=0;
			while($databases=mysql_fetch_array($query))
			{
				$exi[]=$databases['Database'];
			}
			if(!in_array(trim(strip_tags($_POST['dbname'])),$exi))
			{
				echo "<script language='javascript'>alert('数据库不存在');window.location='index.php?step=3';</script>";
				exit;
			}
			elseif(is_file('install.sql') && is_readable('install.sql'))
			{
$sql=readf('install.sql');

$config=<<<EOF
<?php
/*
	[Phpup.Net!] (C)2009-2011 Phpup.net.
	This is NOT a freeware, use is subject to license terms

	\$Id: config.inc.php 2010-08-24 10:42 \$
*/

if(!defined('IN_BIDCMS')) {
	exit('Access Denied');
}
//数据库服务器
\$bidcmsdbhost="{dbhost}";\n
//数据库用户名
\$bidcmsdbuser="{dbuser}";\n
//数据库密码
\$bidcmsdbpw="{dbpw}";\n
//数据库名
\$bidcmsdbname="{dbname}";\n
//数据库编码
\$bidcmsdbcharset="utf8";\n
//数据表前缀
\$bidcmstable_prefix="{table_prefix}";\n
//网站编码
\$bidcmscharset="utf-8";\n
//session前缀
\$bidcmssession_prefix='bidcms_';\n
//网站申请的KEY
\$bidcmskey='';\n
EOF;
				$config=str_replace('{dbhost}',$dbhost,$config);
				$config=str_replace('{dbuser}',$dbuser,$config);
				$config=str_replace('{dbpw}',$dbpw,$config);
				$config=str_replace('{dbname}',trim(strip_tags($_POST['dbname'])),$config);
				$config=str_replace('{table_prefix}',trim(strip_tags($_POST['table_prefix'])),$config);
				if(function_exists('file_put_contents'))
				{
					file_put_contents(ROOT_PATH.'/data/config.inc.php',$config);
				}
				else
				{
					$fp=fopen(ROOT_PATH.'/data/config.inc.php','w');
					fwrite($fp,$config);
					fclose($fp);
				}
				$sql=str_replace('{tableprefix}',trim(strip_tags($_POST['table_prefix'])),str_replace('{dataname}',trim(strip_tags($_POST['dbname'])),$sql));
				$sql=explode(';',$sql);
				include ROOT_PATH."/install/template/step4.php"; //安装数据库
				$error='';
				foreach($sql as $k=>$v)
				{
					if(mysql_query($v))
					{
						$error.=!mysql_error()?'数据表创建成功\r\n':mysql_error();
					}
				}
				echo "<script language='javascript'>document.getElementById('user_login').value='".$error."';document.getElementById('wp-submit').disabled='';</script>";
			}
			}
			
			else
			{
				echo "<script language='javascript'>alert('数据库连接错误');window.location='index.php?step=3';</script>";
				exit;
			}
		}
		else
		{
			include ROOT_PATH."/install/template/step3.php"; //配置信息
		}
		echo "</body></html>";
	break;
	case 6:
		include ROOT_PATH."/install/template/step6.php"; //协议说明
	break;
	case 7:
		include ROOT_PATH."/data/config.inc.php"; //配置信息
		$link=mysql_connect($bidcmsdbhost,$bidcmsdbuser,$bidcmsdbpw);
		mysql_query('use `'.$bidcmsdbname.'`');
		mysql_query('set names '.$bidcmsdbcharset);
		if(mysql_error())
		{

			echo "<SCRIPT LANGUAGE='JavaScript'>window.location='index.php';</SCRIPT>";
		}
		else
		{
			$sql[]="insert into {$bidcmstable_prefix}setting(variable,content) values('site_title','".addslashes(trim(strip_tags($_POST['site_title'])))."'),('site_url','".addslashes(trim(strip_tags($_POST['site_url'])))."'),('site_imgurl','".$_POST['img_url']."'),('site_charset','utf-8'),('adminpath','admin');";

			/*$sql[]="replace INTO `{$bidcmstable_prefix}admin` (`username`, `email`, `passwd`,`usertype`) VALUES('".addslashes(trim(strip_tags($_POST['administr'])))."', '".addslashes(trim(strip_tags($_POST['email'])))."', '".md52($_POST['adminpassword'])."', 'adminuser')";
			*/
			if(!empty($sql))
			{
				foreach($sql as $v)
				{
					mysql_query($v) or die(mysql_error());
				}
			}
			touch(ROOT_PATH.'/data/install.lock');
			include ROOT_PATH."/install/template/step7.php"; //协议说明
		}
	break;
	default:
		include ROOT_PATH."/install/template/step1.php"; //协议说明
	break;
}

//md5加密
function md52($str)
{
	$str=substr(md5($str),3,20);
	return $str;
}

//读取文件内容
function readf($file)
{
	if(function_exists('file_get_contents'))
	{
		$content=file_get_contents($file);
	}
	else
	{
		$fp=fopen($file,'r');
		while(!feof($fp))
		{
			$content=fgets($fp,1024);
		}
		fclose($fp);
	}
	return $content;
}
