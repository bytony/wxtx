<ul id="nav-ul">
<div class="nav-header notopborder">基础设置</div>
<li rel="app" > <a href="index.php?con=user&act=app">功能管理</a> </li>

<li rel="notice"> <a href="index.php?con=user&act=notice">关注时自动回复</a> </li>
<li rel="none"> <a href="index.php?con=user&act=none">匹配不到回复</a> </li>
<li rel="page"> <a href="index.php?con=user&act=page">page+</a> </li>

<li rel="image"> <a href="index.php?con=user&act=image">图文自定义回复</a> </li>
<li rel="audio"> <a href="index.php?con=user&act=audio">语音自定义回复</a> </li>
<div class="nav-header">3G网站设置</div>
<li rel="cate"> <a href="index.php?con=user&act=cate">分类管理</a> </li>
<li rel="template"> <a href="index.php?con=user&act=template">模板管理</a> </li>
<div class="nav-header">VIP功能</div>
<li rel="menu"> <a href="index.php?con=menu">自定义菜单管理</a> </li>
<li rel="picplayer"> <a href="index.php?con=picplayer">首页幻灯片设置</a> </li>

<div class="nav-header">推广活动</div>
<li rel="usercard"> <a href="index.php?pluginid=vote">投票</a> </li>
<li rel="coupon"> <a href="index.php?pluginid=coupon">优惠券</a> </li>
<li class="guagua"> <a href="index.php?pluginid=guagua">刮刮卡</a> </li>
<li class="lottery"> <a href="index.php?pluginid=zhuanpan">幸运大转盘</a> </li>
<li class="lottery"> <a href="index.php?pluginid=lbs">LBS商家管理</a> </li>
<li class="lottery"> <a href="index.php?pluginid=order">生活服务预订</a> </li>
<li class="lottery"> <a href="index.php?pluginid=hotel">酒店预订</a> </li>

</ul>
<script type="text/javascript">
<!--
	function checkCurrent(app)
	{
		if(app!='')
		{
			jq('#nav-ul').find('li').each(function(i){
				if(jq(this).attr('rel')==app){jq(this).addClass('selected');}
				else{jq(this).removeClass('selected');}
			});
		}
	}
	checkCurrent('<?php echo $current;?>');
//-->
</script>