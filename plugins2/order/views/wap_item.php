<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title><?php echo $orderinfo['order_title'];?></title>
<meta name="viewport" content="width=device-width,height=device-height,inital-scale=1.0,maximum-scale=1.0,user-scalable=no;">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<meta name="format-detection" content="telephone=no">
<link href="plugins/order/views/onlinebooking.css" rel="stylesheet" type="text/css">
<script src="http://libs.baidu.com/jquery/2.0.0/jquery.min.js" type="text/javascript"></script>

</head>
<body id="onlinebooking" >
<div class="qiandaobanner"><?php if(!empty($orderinfo['order_face'])){?><img  src="<?php echo $orderinfo['order_face'];?>"/><?php }?> </div>
<div class="cardexplain">
  <!--普通用户登录时显示-->
     <!--后台可控制是否显示-->
<ul class="round">
<li>
<h2>服务说明</h2>
<div class="text">
<?php echo $orderinfo['order_content'];?></div>
</li>
</ul>

<!--后台可控制是否显示-->
<ul class="round">
<li class="addr"><a href="#"><span><?php echo $orderinfo['order_address'];?></span></a></li>
<li class="tel"><a href="tel:<?php echo $orderinfo['order_tel'];?>"><span><?php echo $orderinfo['order_tel'];?> 电话预订</span></a></li>
</ul>

<ul class="round">
<li class="userinfo"><a href="index.php?pluginid=customer&con=wap"><span>请完善个人资料再下订单</span></a></li>
</ul>
<iframe name="checksn" style="display:none;"></iframe>
 <form method="post" id="checkform" action="index.php" target="checksn">
 <input type="hidden" name="con" value="wap">
 <input type="hidden" name="act" value="item">
 <input type="hidden" name="pluginid" value="order">
 <input type="hidden" name="commit" value="1">
 <input type="hidden" name="id" value="<?php echo $orderinfo['id'];?>">
 <INPUT TYPE="hidden" NAME="formhash" value="<?php echo formhash();?>">  
<ul class="round">
<li class="title mb"><span class="none">请认真填写在线订单</span></li>
<li class="nob">
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="kuang">
<tr>
<th>联系人</th>
<td><input name="truename"  type="text" class="px" id="truename" value="<?php echo !empty($checkorder['cus_user'])?$checkorder['cus_user']:$customer['cus_realname'];?>" placeholder="请输入您的真实姓名"></td>
</tr>
</table>
</li>
<li class="nob">
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="kuang">
<tr>
<th>联系电话</th>
<td><input name="tel"  class="px" id="tel" value="<?php echo !empty($checkorder['cus_tel'])?$checkorder['cus_tel']:$customer['cus_tel'];?>"  type="text" placeholder="请输入您的电话"></td>
</tr>
</table>
</li>
<li class="nob">
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="kuang">
<tr>
<th>预订日期</th>
<td>  
<select name="dateline"  id="dateline" class="dropdown-select">
<?php if($checkorder['cus_dateline']){?><option value="<?php echo $checkorder['cus_dateline'];?>"><?php echo date('Y-m-d',$checkorder['cus_dateline']);?></option><?php }?>
	<?php for($i=1;$i<=10;$i++){
	$t=time()+86400*$i;
	?>
	<option value="<?php echo $t;?>"><?php echo date('Y-m-d',$t);?></option>
	<?php }?>
</select>  
</td>
</tr>
</table>
</li>
        
<li class="nob">
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="kuang">
<tr>
<th>预订人数</th>
<td><input name="total"  class="px" id="txt1" value="<?php echo $checkorder['cus_total'];?>"  type="text" placeholder="请输入预订人数"></td>
</tr>
</table>
</li>
                                                                  
<?php if(!empty($orderinfo['order_type'])){?>
<li class="nob">
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="kuang">
<tr>
<th>服务类型</th>
<td><select name="type" class="dropdown-select" id="select1">
<option value="">请选择服务类型</option>
<?php
$type=explode("\n", $orderinfo['order_type']);
foreach($type as $k=>$v){
?>
<option value="<?php echo $v;?>" <?php echo $v==$checkorder['cus_type']?'selected':'';?>><?php echo $v;?></option>
<?php }?>
</select></td>
</tr>
</table>
</li>
<?php }?>
<?php if(!empty($orderinfo['order_shop'])){?>
<li class="nob">
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="kuang">
<tr>
<th>服务门店</th>
<td><select name="shop" class="dropdown-select" id="select2">
 <option   value="">请选择门店</option>
<?php
$shops=explode("\n", $orderinfo['order_shop']);
foreach($shops as $k=>$v){
?>
<option value="<?php echo $v;?>" <?php echo $v==$checkorder['cus_shop']?'selected':'';?>><?php echo $v;?></option>
<?php }?>
</select></td>
</tr>
</table>
</li>
<?php }?>                                   
<li class="nob">
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="kuang">
<tr>
<th valign="top" class="thtop">备注</th>
<td><textarea name="info" class="pxtextarea" style=" height:99px;overflow-y:visible" id="info"  placeholder="请输入备注信息"><?php echo $checkorder['cus_content'];?></textarea></td>
</tr>
</table>
</li>
</ul>
<?php if($checkorder['id']>0){?> 
<div class="footReturn">
<input type="button" class="del" value="订单已经提交"/> 
<div class="window" id="windowcenter">
<div id="title" class="wtitle">状态提示<span class="close" id="alertclose"></span></div>
<div class="content">
<div id="txt">当前预订状态为：<?php echo $checkorder['order_status'];?></div>
</div>
</div>
</div>
<?php } else{?>
<div class="footReturn">
<input type="button" onclick="$('#checkform').submit();" class="submit" value="提交订单"/> 
<div class="window" id="windowcenter">
<div id="title" class="wtitle">操作提示<span class="close" id="alertclose"></span></div>
<div class="content">
<div id="txt"></div>
</div>
</div>
</div>
<?php }?>
</form>
<script type="text/javascript"> 
var oLay = document.getElementById("overlay");	
$(document).ready(function () { 


$("#showcard").click(function () {

 if($("#txt1").val()==''){alert('预订人数 不能为空');return;}  
    
      
    
  
 
  
if($("#tel").val()==''){alert('电话不能为空');return;} 
if($("#truename").val()==''){alert('名字不能为空');return;} 
if($("#dateline").val()==''){alert('请选择时间');return;}

oLay.style.display = "block";
}); 
}); 




$("#windowclosebutton").click(function () { 
$("#windowcenter").slideUp(500);
oLay.style.display = "none";

}); 
$("#alertclose").click(function () { 
$("#windowcenter").slideUp(500);
oLay.style.display = "none";

}); 

function alert(title){ 
//var windowHeight; 
//var windowWidth; 
//var popWidth;  
//var popHeight; 
//windowHeight=$(window).height(); 
//windowWidth=$(window).width(); 
//popHeight=$(".window").height(); 
//popWidth=$(".window").width(); 
//var popY=(windowHeight-popHeight)/2; 
//var popX=(windowWidth-popWidth)/2; 
//$("#windowcenter").css("top",popY).css("left",popX).slideToggle("slow"); 
$("#windowcenter").slideToggle("slow"); 
$("#txt").html(title);
//$("#windowcenter").hide("slow"); 
setTimeout('$("#windowcenter").slideUp(500)',4000);
} 

</script> 
</div>
</body>
</html>
