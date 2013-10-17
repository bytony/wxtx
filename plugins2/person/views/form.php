<html><head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>个人资料</title>
<meta name="viewport" content="width=device-width,height=device-height,inital-scale=1.0,maximum-scale=1.0,user-scalable=no;">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<meta name="format-detection" content="telephone=no">
<link href="plugins/person/views/fans.css" rel="stylesheet" type="text/css">
</head>

<body id="fans">
<div class="qiandaobanner"> <img src="plugins/person/views/person.jpg"> </div>
<div class="cardexplain">
<iframe style="display:none;" name="tempframe"></iframe>
<form method="post" action="index.php" target="tempframe" id="customerform">
<input type="hidden" name="pluginid" value="person">
<input type="hidden" name="commit" value="1">
<input type="hidden" name="fromuser" value="<?php echo $fromuser;?>">
<INPUT TYPE="hidden" NAME="formhash" value="<?php echo formhash();?>">
<ul class="round">
<li>
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="kuang">
<tbody><tr>
<th>微信名称</th>
<td><textarea name="wxname" style="height:40px;" class="px" id="wxname" placeholder="请输入您的微信名称"><?php echo $customer['cus_weixin'];?></textarea></td>
</tr>
</tbody></table>
</li>
<li>
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="kuang">
<tbody><tr>
<th>真实姓名</th>
<td><textarea name="truename" style="height:40px;" class="px" id="truename" placeholder="请输入您的真实姓名"><?php echo $customer['cus_realname'];?></textarea></td>
</tr>
</tbody></table>
</li>
</ul>
<ul class="round">
<li>
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="kuang">
<tbody><tr>
<th>联系电话</th>
<td><textarea name="tel" style="height:40px;" class="px" id="tel" placeholder="请输入您的电话"><?php echo $customer['cus_tel'];?></textarea></td>
</tr>
</tbody></table>
</li>
<li>
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="kuang">
<tbody><tr>
<th>QQ号码</th>
<td><textarea name="qq" style="height:40px;" class="px" id="qq" placeholder="请输入您的QQ号码"><?php echo $customer['cus_qq'];?></textarea></td>
</tr>
</tbody></table>
</li>
</ul>
<ul class="round">
<li>
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="kuang">
<tbody><tr>
<th>性别</th>
<td><select name="sex" class="dropdown-select" id="sex">
<option class="dropdown-option" value="0">请选择你的性别</option>
<option value="1" <?php echo $customer['cus_sex']=='1'?'selected':'';?>>男</option>
<option value="2" <?php echo $customer['cus_sex']=='2'?'selected':'';?>> 女</option>
</select></td>
</tr>
</tbody></table>
</li>
<li>
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="kuang">
<tbody><tr>
<th>年龄</th>
<td><textarea name="age" style="height:40px;" class="px" id="age" placeholder="请输入您的年龄"><?php echo $customer['cus_age'];?></textarea></td>
</tr>
</tbody></table>
</li>
<li>
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="kuang">
<tbody><tr>
<th>生日</th>
<td><textarea name="birthday" style="height:40px;" class="px" id="birthday" placeholder="请输入您的日期"><?php echo $customer['cus_birthday'];?></textarea></td>
</tr>
</tbody></table>
</li>
</ul>
<ul class="round">
<li>
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="kuang">
<tbody><tr>
<th valign="top" class="thtop">地址</th>
<td><textarea name="address" class="pxtextarea" style=" height:57px;overflow-y:visible" id="address" placeholder="请输入您的地址"><?php echo $customer['cus_address'];?></textarea></td>
</tr>
</tbody></table>
</li>
<li>
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="kuang">
<tbody><tr>
<th valign="top" class="thtop">备注</th>
<td><textarea name="info" class="pxtextarea" style=" height:99px;overflow-y:visible" id="info" placeholder="请输入备注信息"><?php echo $customer['cus_mark'];?></textarea></td>
</tr>
</tbody></table>
</li>
</ul>

</form>
<div class="footReturn">
<button id="showcard" class="receive" onclick="saveData()" style="width:100%;">保 存</button>
<div class="window" id="windowcenter">
<div id="title" class="wtitle">保存成功<span class="close" id="alertclose" onclick="hideNotice();"></span></div>
<div class="content">
<div id="txt"></div>
</div>
</div>
</div>

</div>

<script type="text/javascript">
<!--
	function showNotice(info)
	{
		document.getElementById('windowcenter').style.display='block';
		document.getElementById('txt').innerHTML=info;
		document.getElementById('showcard').innerHTML='保 存';
		document.getElementById('showcard').removeAttribute('disabled');
	}
	function hideNotice()
	{
		document.getElementById('windowcenter').style.display='none';
	}
	function saveData()
	{
		document.getElementById('showcard').innerHTML='正在保存，请稍候...';
		document.getElementById('showcard').setAttribute('disabled','true');
		document.getElementById('customerform').submit();
	}
//-->
</script>
</body></html>