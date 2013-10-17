<?php include bidcms_template('header','views/wap');?>
<title><?php echo $uinfo['weixin_name'];?></title>
<link href="views/wap/css/news2.css" rel="stylesheet" type="text/css">
</head>
<body id="cate4">
<?php include bidcms_template('widget_picplayer','views/wap');?>


<div id="todayList">
<ul class="todayList">
<?php foreach($catelist as $k=>$v){?>
<li>
<a href="<?php echo $v['url'];?>">
<div class="img"><img src="<?php echo $v['cate_face'];?>" style="height:41px;"></div>
<h2><?php echo $v['cate_name'];?></h2>
<p class="onlyheight"><?php echo $v['cate_desc'];?></p>
<span class="icon">&nbsp;</span>
</a>
</li>
<?php }?> 	
</ul>
</div>
<?php include bidcms_template('widget_menu','views/wap');?>
<script>
function dourl(url){
location.href= 'index.php'+url;
}
</script>
<div style="display:none"><?php echo $uinfo_ext['weixin_statistics'];?></div>

</body></html>