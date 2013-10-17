<?php
/*
	[Phpup.Net!] (C)2009-2011 Phpup.net.
	This is NOT a freeware, use is subject to license terms

	$Id: global.func.php 2010-08-24 10:42 $
*/

if(!defined('IN_BIDCMS')) {
	exit('Access Denied');
}

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

function getUnicode($word) 
{
	//获取其字符的内部数组表示，所以本文件应用utf-8编码！
	if (is_array( $word))
	$arr = $word;
	else
	$arr = str_split($word);
	//此时，$arr应类似array(228, 189, 160)
	//定义一个空字符串存储
	$bin_str = '';
	//转成数字再转成二进制字符串，最后联合起来。
	foreach ($arr as $value)
	$bin_str .= decbin(ord($value));
	//此时，$bin_str应类似111001001011110110100000,如果是汉字"你"
	//正则截取
	$bin_str = preg_replace('/^.{4}(.{4}).{2}(.{6}).{2}(.{6})$/','$1$2$3', $bin_str);
	// 此时， $bin_str应类似0100111101100000,如果是汉字"你"
	return bindec($bin_str); //返回类似20320， 汉字"你"
	//return dechex(bindec($bin_str)); //如想返回十六进制4f60，用这句
}
function waptag($str)
{
	$source=array('<','>','\'','"','&','$','-');
	$dst=array('&lt','&gt','&apos','&quot','&amp','$$','&shy');
	return str_replace($source,$dst,$str);

}
/**
 * get user real ip
 *
 * @return  string
 */
function real_ip()
{
    static $realip = NULL;

    if ($realip !== NULL)
    {
        return $realip;
    }

    if (isset($_SERVER))
    {
        if (isset($_SERVER['HTTP_X_FORWARDED_FOR']))
        {
            $arr = explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']);

            foreach ($arr AS $ip)
            {
                $ip = trim($ip);

                if ($ip != 'unknown')
                {
                    $realip = $ip;

                    break;
                }
            }
        }
        elseif (isset($_SERVER['HTTP_CLIENT_IP']))
        {
            $realip = $_SERVER['HTTP_CLIENT_IP'];
        }
        else
        {
            if (isset($_SERVER['REMOTE_ADDR']))
            {
                $realip = $_SERVER['REMOTE_ADDR'];
            }
            else
            {
                $realip = '0.0.0.0';
            }
        }
    }
    else
    {
        if (getenv('HTTP_X_FORWARDED_FOR'))
        {
            $realip = getenv('HTTP_X_FORWARDED_FOR');
        }
        elseif (getenv('HTTP_CLIENT_IP'))
        {
            $realip = getenv('HTTP_CLIENT_IP');
        }
        else
        {
            $realip = getenv('REMOTE_ADDR');
        }
    }

    preg_match("/[\d\.]{7,15}/", $realip, $onlineip);
    $realip = !empty($onlineip[0]) ? $onlineip[0] : '0.0.0.0';

    return $realip;
}
//get real address
function ip2city($ip='', $ipdatafile='') 
{
	include ROOT_PATH.'/inc/curl.class.php';
	$curl=new curl();
	$ip=empty($ip)?real_ip():$ip;
	$api='http://int.dpool.sina.com.cn/iplookup/iplookup.php?format=text&ip='.$ip;
	$result=$curl->get($api);
	
	$arr=explode("\t",$result);
	
	if(isset($arr[5]))
	{
		$city=charset_encode($arr[5],$GLOBALS['charset'],'gbk');
		
		if(empty($city))
		{
			$city=!empty($_REQUEST['city'])?$_REQUEST['city']:'全国';
		}
	}
	else
	{
		$city='全国';
	}
	return $city;

}
function rad($d)
{
   return $d * M_PI/ 180.0;
} 
//ip转经纬度 
function getIPLoc()
{  
	$ip=real_ip();
	//$ip='116.255.170.112';
	$url = 'http://int.dpool.sina.com.cn/iplookup/iplookup.php?format=js&ip='.$ip;  
	$result=dfsockopen($url);
	return $result;
} 
//截取字符串
function sysSubStr($sourcestr,$cutlength)
{
	if(!$cutlength)
	{
		return $sourcestr;
	}
	$returnstr="";
	$i=0;
	$n=0;
	$str_length=strlen($sourcestr);    //字符串的字节数
	while (($n<$cutlength) and ($i<=$str_length))
	{
	$temp_str=substr($sourcestr,$i,1);
	$ascnum=Ord($temp_str); //得到字符串中第$i位字符的ascii码
	if ($ascnum>=224) //如果ASCII位高与224，
	{
	$returnstr=$returnstr.substr($sourcestr,$i,3); //根据UTF-8编码规范，将3个连续的字符计为单个字符
	$i=$i+3; //实际Byte计为3
	$n++; //字串长度计1
	}
	elseif ($ascnum>=192)//如果ASCII位高与192，
	{
	$returnstr=$returnstr.substr($sourcestr,$i,2); //根据UTF-8编码规范，将2个连续的字符计为单个字符
	$i=$i+2; //实际Byte计为2
	$n++; //字串长度计1
	}
	elseif ($ascnum>=65 && $ascnum<=90) //如果是大写字母，
	{
	$returnstr=$returnstr.substr($sourcestr,$i,1);
	$i=$i+1; //实际的Byte数仍计1个
	$n++; //但考虑整体美观，大写字母计成一个高位字符
	}
	else //其他情况下，包括小写字母和半角标点符号，
	{
	$returnstr=$returnstr.substr($sourcestr,$i,1);
	$i=$i+1;    //实际的Byte数计1个
	$n=$n+0.5;    //小写字母和半角标点等与半个高位字符宽…
	}
	}

	if ($str_length>$cutlength)
	{
	$returnstr = $returnstr . "";    //超过长度时在尾处加上省略号
	}

	return $returnstr;
}


//表前缀
function tname($table)
{
	global $bidcmsdbname,$bidcmstable_prefix;
	return '`'.$bidcmsdbname.'`.`'.$bidcmstable_prefix.$table.'`';
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

//错误
function messageError($message)
{
	exit($message);
}

//保存图片
function savethumb($filename,$url)
{
	if(!empty($url))
	{
		
		$image=imagecreatefromjpeg($url);
		$size = getimagesize($url);
		$image_p = imagecreatetruecolor($size[0], $size[1]);
		imagecopyresampled($image_p, $image, 0, 0, 0, 0, $size[0],$size[1], $size[0], $size[1]);
		mkdir2(dirname($filename));
		imagepng($image_p,$filename);
	}
}
//判断缓存时间
function checkfile($file,$cachetime=60)
{
	$file=ROOT_PATH.'/data/cache/'.$file.'.php';

	if(is_file($file))
	{
		if((filemtime($file)+$cachetime>time()) || !$cachetime)
		{
			return true; //不更新文件
		}
		else
		{
			return false;  //更新文件
		}
	}
	return false;
}
//写缓存内容
function write($file,$content,$dir='')
{
	$dir=ROOT_PATH.'/data/cache/'.$dir;
	if(!is_dir($dir))
	{
		mkdir2($dir);
	}
	$file=$dir.'/'.$file.'.php';
	if(is_array($content))
	{
		$content=var_export($content,1);
	}
	else
	{
		$content='array()';
	}
	$content=str_replace("=>","  =>  ",$content);
	$content=preg_replace("#[\s]{2,}#","",$content);
	$content='<?php if(!defined("IN_BIDCMS")){?>error<?php }?><?php $content='.$content.';?>';
	if(function_exists('file_put_contents'))
	{
		
		/*
		$content=str_replace(",    ",",",$content);
		$content=str_replace("(    ","(",$content);
		$content=str_replace("  )",")",$content);
		$content=str_replace("(\n","(",$content);
		$content=str_replace(" =>   ","=>",$content);
		*/
		file_put_contents($file,$content);
	}
	else
	{
		$fp=fopen($file,'w');
		fwrite($fp,$content);
		fclose($fp);
	}
}
//写文件
function writefile($file,$content)
{
	if(function_exists('file_put_contents'))
	{
		return file_put_contents($file,$content);
	}
	else
	{
		$fp=fopen($file,'w');
		return fwrite($fp,$content);
		fclose($fp);
	}
}
//读文件
function read($file,$dir='')
{
	$cachedir='data/cache';
	$file=ROOT_PATH.'/'.$cachedir.'/'.$dir.'/'.$file.'.php';
	include($file);
	return $content;
}
//删除文件
function deletef($file)
{
	$cachedir='data/cache';
	$file=ROOT_PATH.'/'.$cachedir.'/'.$file.'.php';
	if(is_file($file))
	{
		unlink($file);
	}
}
//扫描目录

function bidcmsscandir($dir)
{
	$dirs=array();
	if(!function_exists('scandir'))
	{
		if ($handle = opendir($dir)) {
			while (false !== ($file = readdir($handle))) {
				$dirs[]=$file;
			}
			closedir($handle);
		}
	}
	else
	{
		$dirs=scandir($dir);
	}
	return $dirs;
}
//清空缓存
function cleancache($type='php',$mdir='')
{
	$path=$mdir?$mdir:'data/cache';
	$path=ROOT_PATH.'/'.str_replace(ROOT_PATH,'',$path);
	if(!is_writable($path))
	{
		return 'nowrite';
	}
	$dir=bidcmsscandir($path);
	$nullfile='';
	if($type)
	{
		foreach($dir as $k=>$v)
		{
			$newfile=$path.'/'.$v;
			if($v!='.' && $v!='..' && is_file($newfile))
			{
				if(strpos($newfile,$type))
				{
					$a=unlink($newfile);
					$nullfile.=$newfile;
				}
			}
		}
	}
	else
	{
		foreach($dir as $k=>$v)
		{
			$newfile=$path.'/'.$v;

			if($v!='.' && $v!='..' && is_file($newfile))
			{
				$a=unlink($newfile);
				$nullfile.=$newfile;
			}
		}
	}
	if(empty($nullfile))
	{
		return 'null';
	}
	else
	{
		return $a;
	}
}

//清除js和style
function clearJs($str)
{
	$str=str_replace('<style','<div class="limengqitemp" style="display:none"',$str);
	$str=str_replace('</style>','</div>',$str);
	$str=str_replace('<script','<div class="limengqitemp" style="display:none"',$str);
	$str=str_replace('</script>','</div>',$str);
	$str=str_replace("\n",'',$str);
	$str=str_replace("\r",'',$str);
	return $str;
}

//实现多种字符编码方式
function charset_encode($input,$_output_charset='utf-8' ,$_input_charset ="gbk" ) {
	$output = $input;
	if(!isset($_output_charset) )$_output_charset  = $GLOBALS['charset'];
	if($_input_charset == $_output_charset || $input ==null ) {
		$output = $input;
	} elseif (function_exists("mb_convert_encoding")){
		$output = mb_convert_encoding($input,$_output_charset,$_input_charset);
	} elseif(function_exists("iconv")) {
		$output = iconv($_input_charset,$_output_charset,$input);
	}
	return $output;
}


//按指定字数分组
function chunksplit($data)
{
	return chunk_split(base64_encode($data),20);
}
//积分换算
function score($score)
{
	$s=array('1'=>50,'2'=>200);

	if($score>=0 && $score<50)
	{
		return 50-$score;
	}
	if($score>=50 && $score<200)
	{
		return 200-$score;
	}
}


//从内容中分出图片
function getUploadPic($content,$url='')
{
	$content=str_replace('\'','',$content);
	$content=str_replace('>',' width="">',$content);
	$pattern=preg_match_all('/<img.*src\s*=\s*[\"|\']?\s*([^>\"\'\s]*)/i' ,$content,$match);
	$pic=array();
	$nv='';
	if($match[1])
	{
		if(!empty($url))
		{
			$urls=parse_url($url);
		}
		foreach($match[1] as $v)
		{
			if(!empty($v))
			{
				
				if(strpos($v,'ttp://'))
				{
					$nv=$v;
				}
				else
				{
					$nv=$urls['scheme'].'://'.$urls['host'].'/'.$v;
				}
				$pic[md5($nv)]=$nv;
				
			}
		}
		return array_values($pic);
		
	}
	return $pic;
}
//建立目录
function mkdir2($dir)
{
	if(!is_dir(dirname($dir)))
	{
		mkdir2(dirname($dir));
	}
	return mkdir($dir);
}
//单个上传
function _upload($upfile,$uploaddir='',$customfile='',$thumbinfo=array(),$maxsize=1048600)
{
	include ROOT_PATH.'/inc/upload.class.php';
	$up=new upload($upfile);
	$up->max_upload=$maxsize;
	$thumb='';
	
	$up->updir=$uploaddir?$uploaddir:$GLOBALS['setting']['site_upload_dir'];
	if($up->checkFile())
	{
		if($file=$up->execute($customfile))
		{
			if($thumbinfo)
			{
				if($thumbinfo['width']>0)
				{
					$w=getimagesize($file);
					$width=$thumbinfo['width'];
					$pre=$w[0]>0?$thumbinfo['width']/$w[0]:1;
					if($thumbinfo['height']>0)
					{
						$height=$thumbinfo['height'];
					}
					else
					{
						$height=$w[1]*$pre;
					}
				}
				$up->setThumb($file,str_replace('.','_s.',$file),$width,$height);
				$thumb=str_replace('.','_s.',$file);
			}
			else
			{
				$thumb=$file;
			}
		}
	}
	return $thumb;
}


//批量上传
function _attach($upfile,$uploaddir='',$thumbinfo=array())
{
	$thumb=array();
	if($_FILES)
	{
		include ROOT_PATH.'/inc/upload.class.php';
		$count=count($_FILES[$upfile]['name']);
		foreach($_FILES[$upfile] as $k=>$v)
		{
			for($i=0;$i<$count;$i++)
			{
				$f['tmpupload'.$i][$k]=$v[$i];
			}

		}
		$_FILES=$f;


		foreach($f as $k=>$v)
		{
			$up=new upload($k);
			$up->updir=$uploaddir?$uploaddir:$GLOBALS['setting']['site_upload_dir'];
			if($up->checkFile())
			{
				if($file=$up->execute())
				{
					if($thumbinfo)
					{
						$up->setThumb($file,str_replace('.','_s.',$file),$thumbinfo['width'],$thumbinfo['height']);
					}
					$thumb[]=$file;
				}
			}
		}

	}
	return $thumb;
}
//执行一般sql,并写入缓存
function getData($sql)
{
	$cachefile=md52($sql);
	if(!checkfile($cachefile))
	{
		$data=array();
		$query=$GLOBALS['db']->query($sql);
		while($d=$GLOBALS['db']->fetch_array($query))
		{
			$data[]=$d;
		}
		write($cachefile,$data);
		return $data;
	}
	else
	{
		return read($cachefile);
	}
}
/*取出封面缩略图*/
function thumb($thumb,$small=false)
{
	$img=array('jpg','jpeg','gif','png');
	if($thumb)
	{
		$t=explode(',',$thumb);
		foreach($t as $k=>$v)
		{
			$c=explode('.',$v);
			if(is_file($v) && in_array($c[1],$img))
			{
				if($small)
				{
					$v=str_replace('.','_s.',$v);
				}
				$t[$k]=str_replace(SITE_ROOT,'',$v);
			}
			else
			{
				$t[$k]='data/nopicture.gif';
			}
		}
		return $t;
	}
	else
	{
		return array('data/nopicture.gif');
	}
}
/*生成url*/
function url($con='index',$act='index',$paramer=array())
{
	$url='http://'.str_replace('//','/',str_replace('http://','',(substr(SITE_ROOT,-1,1)=='/'?SITE_ROOT:SITE_ROOT.'/')));
	
	if($GLOBALS['setting']['seo_rewrite'])
	{
		$con=!empty($con)?$con:'index';
		if($paramer)
		{
			$p='';
			foreach($paramer as $k=>$v)
			{
				if(!empty($v))
				{
				$urlarr[$k]=str_replace('_','',str_replace('-','',$v));
				}
			}
		}
		$url.=$con.($act?'/'.$act:'');
		if($urlarr)
		{
			if(empty($act))
			{
				$url.='/index';
			}
			foreach($urlarr as $k=>$v)
			{
				$a[]=$k.'_'.$v;
			}
			$urltemp=implode('/',$a);
			$url.='/'.$urltemp;
		}
		$url.='.shtml';
	}
	else
	{
		if($con=='index' && $act=='index')
		{
			$url.='paishi.php';
		}
		elseif($con=='index')
		{
			$url.='paishi.php?act='.$act;
		}
		elseif($act=='index')
		{
			$url.='paishi.php?con='.$con;
		}
		else
		{
			$url.='paishi.php?con='.$con.'&act='.$act;
		}
		if($paramer)
		{
			$p='';
			foreach($paramer as $k=>$v)
			{
				if(!empty($v))
				{
				$p.='&'.$k.'='.$v;
				}
			}
			if(strpos($url,'?'))
			{
				$url.=$p;
			}
			else
			{
				$url.='?'.substr($p,1);
			}
		}
	}	
	return $url;
}
function bidcms_template($file,$tpldir = '',$stuffix='.php') {

	$tpldir = $tpldir ? $tpldir : 'views/'.TPL_DIR;
	$tplfile = ROOT_PATH.'./'.$tpldir.'/'.$file.$stuffix;
	if(!file_exists($tplfile)) {
		$tplfile = ROOT_PATH.'./views/default/'.$file.$stuffix;
		if(!$tplfile)
		{
			exit('views/default/'.$file.$stuffix.'文件不存在');
		}
	}
	
	return $tplfile;
}




//页面转向
function sheader($url,$time=0,$message='',$template='redirect',$admin=false)
{
	if($time>0)
	{
		include bidcms_template('redirect');
	}
	elseif(0==$time)
	{
		echo '<SCRIPT LANGUAGE="JavaScript">
		<!--
			window.open("'.$url.'","_top","");
		//-->
		</SCRIPT>';
	}
	else
	{
		echo '<SCRIPT LANGUAGE="JavaScript">
		<!--
			parent.msheader("'.$url.'","'.$time.'","'.urlencode($message).'");
		//-->	
		</SCRIPT>';
	}
	exit;
}




//打印格式化的数组
function print_rr($data)
{
echo "<pre>";
print_r($data);
echo "</pre>";
}

//编辑器
function edit($content='',$textareaid='content',$textareaname='content',$textwidth='800',$textheight='457',$showtextarea='mini')
{
	$str='<textarea name="'.$textareaname.'" style="width:'.$textwidth.'px;height:'.$textheight.'px;visibility:hidden;">'.htmlspecialchars($content).'</textarea><link rel="stylesheet" href="static/kindeditor/themes/default/default.css" />
	<link rel="stylesheet" href="static/kindeditor/plugins/code/prettify.css" />
	<script charset="utf-8" src="static/kindeditor/kindeditor.js"></script>
	<script charset="utf-8" src="static/kindeditor/lang/zh_CN.js"></script>
	<script charset="utf-8" src="static/kindeditor/plugins/code/prettify.js"></script>
	<script>
		KindEditor.ready(function(K) {
			var editor1 = K.create(\'textarea[name="'.$textareaname.'"]\', {
				cssPath : \'static/kindeditor/plugins/code/prettify.css\',
				uploadJson : \'static/kindeditor/php/upload_json.php\',
				fileManagerJson : \'static/kindeditor/php/file_manager_json.php\',
				allowFileManager : true,
				
			});
			prettyPrint();
		});
	</script>';
	return $str;
}
function parseIP($ip)
{
	$ip=explode('.',$ip);
	foreach($ip as $k=>$v)
	{
		if($k>1)
		{
			$ip[$k]='*';
		}
	}
	return implode('.',$ip);
}
function parseMobile($mobile)
{
	if($mobile)
	{
		$mobile1=substr($mobile,0,3);
		$mobile2=substr($mobile,7);
	}
	return $mobile1.'****'.$mobile2;
}

function parseDate($datetime)
{
	$diff=time()-$datetime;
	$days=floor($diff/86400);
	$str='';
	if($days>0)
	{
		$str=$days.'天前';
	}
	else
	{
		$hour=floor(($diff-$days*86400)/3600);
		if($hour>0)
		{
			$str=$hour.'小时前';
		}
		else
		{
			$minute=floor(($diff-$days*86400-$hour*3600)/60);
			if($minute>0)
			{
				$str=$minute.'分钟前';
			}
			else
			{
				$second=$diff-$days*86400-$hour*3600-$minute*60;
				$str=$second>10?$second.'秒前':'刚刚';
			}
		}
	}
	return $str;
}


//多维数组转化成一维数组
function array_multi2single($array){
 static $result_array=array();
 foreach($array as $value){
  if(is_array($value)){
   array_multi2single($value);
  }else{
  $result_array[]=$value;
  }
 }
 return $result_array;
}

function bidcms_encode($data)
{
	if(! function_exists('json_encode'))
	{
		include ROOT_PATH.'/inc/json.class.php';
		$json=new Services_JSON();
		return $json->encode($data);
	}
	else
	{
		return json_encode($data);
	}
}
function bidcms_decode($data)
{
	if(! function_exists('json_decode'))
	{
		include ROOT_PATH.'/inc/json.class.php';
		$json=new Services_JSON();
		return $json->decode($data);
	}
	else
	{
		return json_decode($data);
	}
}