<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="viewport" content="width=device-width,height=device-height,inital-scale=1.0,maximum-scale=1.0,user-scalable=no;">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<meta name="format-detection" content="telephone=no">
<meta name="description" content="微信优惠券">
<title>恭喜你中奖了</title>
<link href="plugins/coupon/views/css/activity-style.css" rel="stylesheet" type="text/css">
</head>
<body class="activity-coupon-winning">
<script src="views/js/jquery.js" type="text/javascript"></script>
<script src="plugins/coupon/views/js/alert.js" type="text/javascript"></script> 

<div class="main">
<div class="banner"> <a href="#" ><img  id="zjpic" src="plugins/coupon/views/img/activity-coupon-winning.jpg"   ></a> </div>
<div class="content" style=" margin-top:-5px">
<div class="boxcontent boxwhite">
<div class="box">
<?php if($coupon_log['position_id']>0){?>
<div class="title-red"><span>中奖了</span></div>
<div class="Detail">
	<p>你抢到：<span class="red"><?php echo $coupon_rand['coupon_title'];?></span></p>
	<p>SN码：<span class="red" id="sncode" ><?php echo $coupon_log['customer_sn'];?></span></p>
	<iframe style="display:none;" name="checksn"></iframe>
	<form method="post" action="index.php" target="checksn">
		 <input type="hidden" name="con" value="wap">
		 <input type="hidden" name="act" value="modify">
		 <input type="hidden" name="pluginid" value="coupon">
		 <input type="hidden" name="commit" value="1">
		 <input type="hidden" name="updateid" value="<?php echo $coupon_log['coupon_id'];?>">
		 <INPUT TYPE="hidden" NAME="formhash" value="<?php echo formhash();?>">
		<p>
		<input name="tel"  class="px" id="tel" value="<?php echo $coupon_log['customer_tel'];?>" type="text" placeholder="用户请输入您的手机号">
		</p>           
		<p>
		<input class="pxbtn" type="submit" value="用户提交">
		</p>
		<!--<p>
		<input name=""  class="px" id="parssword" type="password"  value="" placeholder="商家输入兑奖密码">
		</p>
		<p>
		<input class="pxbtn" name="提 交"  id="save-btnn" type="button" value="商家提交">
		</p>-->
	</form>
</div>

<?php } else{?>
<div class="title-red"><span>真遗憾！</span></div>
<div class="Detail">
	<p><span class="red">给自己一份坚持的正能量！</span></p>
</div>
<?php }?>
</div>
</div>
<script type="text/javascript">


$("#save-btn").bind("click",
function() {
var btn = $(this);
var tel = $("#tel").val();
if (tel == '') {
alert("请输入手机号");
return
}
});

$("#save-btnn").bind("click",
function() {

});

</script>
<div class="boxcontent boxwhite">
<div class="box">

<div class="title-red"><span>优惠券设置：</span></div>
<div class="Detail">
<?php if($coupon['id']>0){?>
<?php foreach($coupon_list as $k=>$v){?>
<p>优惠券名称：<?php echo $v['coupon_title'];?>。数量：<?php echo $v['coupon_num'];?> </p>  
<?php }}else{?>
<p>暂时还没有进行中的活动...</p>
<?php }?>
</div>
</div>
</div>
<div class="boxcontent boxwhite">
<div class="box">
<div class="title-red">使用说明：</div>
<div class="Detail">
<?php if($coupon['id']>0){?>
<p> <span><span><?php echo $coupon['coupon_content'];?></span></span></p>
<?php } else{?>
<p>暂时还没有进行中的活动...</p>
<?php }?>
</div>
</div>
</div>
<div class="boxcontent boxwhite">
<div class="box">
<div class="title-red">活动说明：</div>
<div class="Detail">
<?php if($coupon['id']>0){?>
<p> <span><?php echo $coupon['coupon_intro'];?></span></p>
<?php } else{?>
<p>暂时还没有进行中的活动...</p>
<?php }?>
</div>
</div>
</div>
</div>
 </div>
</body>
</html>