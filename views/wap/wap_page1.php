<?php include bidcms_template('header','views/wap');?>
<title><?php echo $info['title'];?></title>
<link href="views/wap/css/news2.css" rel="stylesheet" type="text/css" />
  <script src="views/wap/js/audio.min.js" type="text/javascript"></script>
   
    <script>
      audiojs.events.ready(function() {
        audiojs.createAll();
      });
    </script>
</head> 

<body id="news2">
<?php include bidcms_template('widget_cate','views/wap');
 
?>
<div class="Listpage">
<div class="top46"></div>
<div class="page-bizinfo">
<div class="header" style="position: relative;">
<h1 id="activity-name"><?php echo $info['title'];?></h1>
<span id="post-date"><?php  echo date('Y-m-d',$info['updatetime']);?></span>　<span class="commentNum">浏览次数:<?php echo $info['viewtimes'];?></span>
</div>

<a id="biz-link" class="btn" href="index.php?con=wap&id=<?php echo $winfo['id'];?><?php echo $ext;?>" data-transition="slide">
<div class="arrow">
<div class="icons arrow-r"></div>
</div>
<div class="logo">
<div class="circle"></div>
<img id="img" src="<?php  echo $winfo['weixin_avatar'];?>">
</div>
<div id="nickname">
<?php echo $winfo['weixin_name'];?></div>
<div id="weixinid">微信号:<?php echo $winfo['weixin_num'];?></div>
</a>

<?php if($info['showindex'] && !empty($info['face'])){?>
<div class="showpic"><img src="<?php echo $info['face'];?>"></div>
<?php }?>
<div class="text" id="content">
<?php echo $page[$pagesize];?>
</div>

 <script src="views/wap/js/play.js" type="text/javascript"></script>
   
 <script>

function dourl(url){
location.href= url;
}
</script>
<div class="page-content" >

</div>

<?php if(isset($page[1])){?>
<div class="pagination">
	<?php foreach($page as $k=>$v){?>
		<a href="index.php?con=wap&act=item&id=<?php echo $info['id'];?>&size=<?php echo $k;?><?php echo $ext;?>"><?php echo $k+1;?></a>
	<?php }?>
</div>
<?php }?>

</div>	

<div class="list">
<div id="olload">
<span>推荐阅读</span>
</div>


<div id="oldlist">
<?php if(!empty($recommendinfo)){?>
<ul>
<?php foreach($recommendinfo as $k=>$nextinfo){?>    
<li class="newsmore">
<a href="index.php?con=wap&act=item&id=<?php echo $nextinfo['id'];?><?php echo $ext;?>">
<div class="olditem">
<div class="title"><?php echo $nextinfo['title'];?></div> 
</div>
</a>
</li>
<?php }?>
</ul>
<?php }?>
   <a class="more" href="index.php?con=wap&id=<?php echo $winfo['id'];?><?php echo $ext;?>">更多精彩内容</a>	
 </div>
</div>
    
<a class="footer" href="#news2" target="_self"><span class="top">返回顶部</span></a>



</div>
</div>
</body>
</html>