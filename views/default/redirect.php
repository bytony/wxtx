<?php
/*  
	[Phpup.Net!] (C)2009-2011 Phpup.net.
	This is NOT a freeware, use is subject to license terms

	$Id: order.class.php 2010-08-24 10:42 $
*/

if(!defined('IN_BIDCMS')) {
	exit('Access Denied');
}
?>
<html xmlns="http://www.w3.org/1999/xhtml"><head>

<meta content="text/html; charset=<?php echo $GLOBALS['bidcmscharset'];?>" http-equiv="Content-Type">
<meta content="all" name="robots">
<meta content="" name="author">
<meta content="<?php echo $time;?>; URL=<?php echo $url;?>" http-equiv="Refresh">
<title><?php echo $message;?></title>
<STYLE TYPE="text/css">
/* 全局CSS定义 */
body{ margin:0; padding:0;}
img{ border:none;}
.wait{height:475px; text-align:center; margin-top:8px;}
.wait div{ padding-top:50px; font-size:14px; margin-left:auto; margin-right:auto;}
.wait .pops{ width:500px;  background:#fdfcfc; border-right:1px solid #efefef;border-bottom:1px solid #efefef; margin-top:15px; line-height:30px; border-top:1px solid #fff; border-left:1px solid #fff; padding-top:15px; padding-bottom:20px;}
.wait .pops img{ margin-top:15px;}

.red{color:#ff0000;font-size:14px;}
.blue{color:#3333FF;font-size:14px;}
</STYLE>
</head><body>

<div class="wait">
<div style="clear: both;"></div>
<div style="clear: both;"></div>

	<div><img src="views/js/i/load.gif"></div>
	<div><span class="red"><?php echo $message;?></span>&nbsp;<span class="blue">
	<?php echo $time;?>秒</span>&nbsp;后自动跳转&nbsp;</div>
	<div style="padding-top: 30px;"><a href="<?php echo $url;?>"><img src="views/js/i/jump.gif"></a></div>

<div style="clear: both;"></div>
</div>
</body></html>