<?php include bidcms_template('header','views/wap');?>
<title><?php echo $cinfo['cate_name'];?></title>
<link href="views/wap/css/news.css" rel="stylesheet" type="text/css">
</head>

<body id="listhome2">
<?php include bidcms_template('widget_cate','views/wap');?>
<div class="Listpage">
<div class="top46"></div>



<div id="todayList">
<ul class="todayList">

<?php foreach($infolist['data'] as $k=>$v){?>      
<li>
<a href="index.php?con=wap&act=item&id=<?php echo $v['id'];?><?php echo $ext;?>">
<h2><?php echo $v['title'];?></h2>
</a>
</li>
<?php }?>
</ul>
</div>
<section id="Page_wrapper">
<div id="pNavDemo" class="c-pnav-con">
<section class="c-p-sec">
<div class="c-p-pre  c-p-grey  "><span class="c-p-p"><em></em></span><a href="index.php?con=wap&act=list<?php echo $ext;?>&page=<?php echo $infolist['page']->prevPage;?>">上一页</a></div>
<div class="c-p-cur">
<div class="c-p-arrow c-p-down"><span><?php echo $infolist['page']->absolutePage;?>/<?php echo $infolist['page']->total;?></span><span></span></div>
<select class="c-p-select" id="oppage" onchange="changepage()">
<?php for($i=0;$i<$infolist['page']->total;$i++){?>
<option value="<?php echo $i;?>">第<?php echo ($i+1);?>页</option>
<?php }?>
</select>
</div>
<div class="c-p-next  c-p-grey  "><a href="index.php?con=wap&act=list<?php echo $ext;?>&page=<?php echo $infolist['page']->nextPage;?>">下一页</a><span class="c-p-p"><em></em></span></div>
</section>
</div>
</section>
</div>
<script>
function dourl(url){
location.href= 'index.php'+url;
}
function changepage()
{
	p=document.getElementById('oppage').value;
	dourl('?con=wap&act=list<?php echo $ext;?>&page='+p);
}
</script>
<div style="display:none"> </div>



</body></html>