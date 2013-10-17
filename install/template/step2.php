<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML xmlns="http://www.w3.org/1999/xhtml"><HEAD>
<title>bidcmsV1.1-安装向导第二步,环境检测</title>
<META http-equiv=X-UA-Compatible content=IE=EmulateIE7>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<META http-equiv=expires content=0>
<META content="bidcms开源竞拍系统V1.1" name=keywords>
<META content="bidcms开源竞拍系统V1.1" name=description>
<link rel="stylesheet" type="text/css" href="template/css/login.css">
</HEAD>
<BODY class="login">
<div id="login">

<TABLE>
<TR>
	<TD><h1><A HREF="http://bidcms.com">安装向导第二步,环境检测</A></h1></TD>
	<TD><h1 style="font-size:25px;">环境检测</h1></TD>
</TR>
</TABLE>

<form method="post" action="index.php?step=3" id="loginform" name="loginform">
	<p>
		<label><h2>环境检测:</h2>
		
		<TABLE >
		<TR>
			<TH>项目</TH>
			<TH>所需配置</TH>
			<TH>最佳配置</TH>
			<TH>当前配置</TH>
		</TR>
		<TR>
			<TD>操作系统</TD>
			<TD>不限</TD>
			<TD>Linux/Unix</TD>
			<TD><?php echo PATH_SEPARATOR==':'?'Linux/Unix':'windows';?></TD>
		</TR>
		<TR>
			<TD>PHP版本</TD>
			<TD>4.0以上</TD>
			<TD>5.0</TD>
			<TD><?php echo PHP_VERSION;?></TD>
		</TR>
		<TR>
			<TD>GD支持</TD>
			<TD>1.0</TD>
			<TD>2.0</TD>
			<TD><?php echo $gd_v?$gd_v:'<span style="color:#ff0000;">不支持</span><input type="hidden" name="error[]" value="1"/>';?></TD>
		</TR>
		<TR>
			<TD>磁盘空间</TD>
			<TD>1M</TD>
			<TD>10M</TD>
			<TD><?php echo $disk_total;?></TD>
		</TR>
		</TABLE>
		</label>
		<label><h2>文件夹权限检测:</h2>
		
		<TABLE >
		<TR>
			<TH>文件</TH>
			<TH>所需状态</TH>
			<TH>当前状态</TH>
		</TR>
		<?php foreach($filelist as $k=>$v){?>
		<TR>
			<TD><?php echo $v;?></TD>
			<TD>可写</TD>
			<TD><?php 
			
			if(is_dir(ROOT_PATH.'/'.$v))
			{
				@chmod(ROOT_PATH.'/'.$v,0777);
				echo is_writable(ROOT_PATH.'/'.$v)?'<font style="color:#339900">可写</font>':'<font style="color:#ff6600">不可写</font><input type="hidden" name="error[]" value="1"/>';
			}
			else
			{
				@mkdir(ROOT_PATH.'/'.$v,0777);
				echo '文件不存在<input type="hidden" name="error[]" value="1"/>';
			}
			
			?></TD>
		</TR>
		<?php }?>
		</TABLE>
		</label>
		<label><h2>所需函数检测:</h2>
		
		<TABLE >
		<TR>
			<TH>函数名</TH>
			<TH>检测结果</TH>
			<TH>建议</TH>
		</TR>
		
		<TR>
			<TD>mysql_connect</TD>
			<TD><?php echo function_exists('mysql_connect')?'<font style="color:#339900">支持':'<input type="hidden" name="error[]" value="1"/><font style="color:#ff6600">不支持';?></font></TD>
			<TD></TD>
		</TR>
		
			<TR>
			<TD>fsockopen</TD>
			<TD><?php echo function_exists('fsockopen')?'<font style="color:#339900">支持':'<input type="hidden" name="error[]" value="1"/><font style="color:#ff6600">不支持';?></font></TD>
			<TD>需开启socket支持</TD>
		</TR>
		<TR>
			<TD>xml_parser_create</TD>
			<TD><?php echo function_exists('xml_parser_create')?'<font style="color:#339900">支持':'<input type="hidden" name="error[]" value="1"/><font style="color:#ff6600">不支持';?></font></TD>
			<TD>需开启XML支持</TD>
		</TR>
		</TABLE>
		</label>
	</p>
	
	<p class="submit">
		<input type="submit" tabindex="100" value="下一步" id="wp-submit" name="wp-submit">
	</p>
</form>

</div>

<p id="backtoblog"><a title="不知道自己在哪？" href="index.php?step=1">安装向导第二步,环境检测</a></p>
</body></html>
