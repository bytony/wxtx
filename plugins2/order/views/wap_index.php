<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>本地生活</title>
<meta name="viewport" content="width=device-width,height=device-height,inital-scale=1.0,maximum-scale=1.0,user-scalable=no;">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<meta name="format-detection" content="telephone=no">
<meta charset="utf-8">
<link href="plugins/photo/views/photo.css" rel="stylesheet" type="text/css" />
</head>

<body id="photo">
<div class="qiandaobanner"> <a href="#" ><img src="plugins/order/views/order.jpg" ></a> </div>
<div id="todayList">
<ul  class="chatPanel">

<?php foreach($infolist as $k=>$v){?>
<li class="media mediaFullText">
<a href="index.php?pluginid=order&act=item&con=wap&id=<?php echo $v['id'];?>">
<div class="mediaPanel">
<div class="mediaHead"><span class="title"><?php echo $v['order_title'];?></span> 
<div class="clr"></div>
</div>
<div class="mediaImg"><img src="<?php echo $v['order_face'];?>">
</div>
<div class="mediaContent mediaContentP">
<p><?php echo $v['order_content'];?></p>
</div>

<div class="mediaFooter">
<span class="mesgIcon right"></span><span class="bt">我要预订</span>
<div class="clr"></div>
</div>
</div>
</a>
</li>
<?php }?>
</ul>



</div>
<!--页码-->

<script>
function dourl(url){
location.href= url;
}
</script>

</body>
</html>
