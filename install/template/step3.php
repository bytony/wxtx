<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML xmlns="http://www.w3.org/1999/xhtml"><HEAD>
<title>bidcmsV1.1-安装向导第三步,设置数据库</title>
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
	<TD><h1><A HREF="http://bidcms.com">安装向导第三步,设置数据库</A></h1></TD>
	<TD><h1 style="font-size:25px;">设置数据库</h1></TD>
</TR>
</TABLE>

<form method="post" action="index.php?step=4" id="loginform" name="loginform">
	<p>
		<label>数据库服务器<br>
		<input type="text" tabindex="10" size="20" value="localhost" class="input" id="user_login" name="dbhost"></label>
	</p>
	<p>
		<label>数据库用户名<br>
		<input type="text" tabindex="20" size="20" value="root" class="input" id="user_pass" name="dbuser"></label>
	</p>
	<p>
		<label>数据库密码<br>
		<input type="text" tabindex="20" size="20" value="" class="input" id="user_pass" name="dbpw"></label>
	</p>
	<p>
		<label>数据库名<br>
		<input type="text" tabindex="20" size="15" value="请在此指定数据库，服务器上必须包含此数据库" class="input" id="user_pass" name="dbname" onclick="this.select();"></label>
	</p>
	<p>
		<label>数据库表前缀<br>
		<input type="text" tabindex="20" size="20" value="bidcms_" class="input" id="user_pass" name="table_prefix"></label>
	</p>
	
	<p class="submit">
		<input type="submit" tabindex="100" value="下一步" id="wp-submit" name="wp-submit">
	</p>
</form>

</div>

<p id="backtoblog"><a title="不知道自己在哪？" href="index.php?step=1">安装向导第三步,设置数据库</a></p>
</body></html>