<?php include bidcms_template('header','views/wap');?>
<title><?php echo $cinfo['cate_name'];?></title>
<link href="views/wap/css/news2.css" rel="stylesheet" type="text/css">
</head>
<body id="listhome3">
<?php include bidcms_template('widget_cate','views/wap');?>
<div class="Listpage">
<div class="top46"></div>

<div id="todayList">
<ul class="chatPanel">
      
<?php foreach($infolist['data'] as $k=>$v){?>
<li class="media mediaFullText">
<a href="index.php?con=wap&act=item&id=<?php echo $v['id'];?><?php echo $ext;?>">
<div class="mediaPanel">
<div class="mediaHead"><span class="title"><?php echo $v['title'];?></span><span class="time"><?php echo date('Y-m-d',$v['updatetime']);?></span>
<div class="clr"></div>
</div>
<div class="mediaImg"><img src="<?php echo $v['face'];?>"></div>
<div class="mediaContent mediaContentP">
<p><?php echo $v['intro'];?></p>
</div>
<div class="mediaFooter">
<span class="mesgIcon right"></span><span style="line-height:50px;" class="left">查看全文</span>
<div class="clr"></div>
</div>
</div>
</a>
</li>
<?php }?> 	

</ul>
</div>
<div class="pagination">
<div class=" disabled "><a href="index.php?con=wap&act=list<?php echo $ext;?>&page=<?php echo $infolist['page']->prevPage;?>">上一页</a></div>
<div class="allpage">
<div class="currentpage"><?php echo $infolist['page']->absolutePage;?>/<?php echo $infolist['page']->total;?></div>

<select id="dropdown-select" name="select" onchange="changepage()">
<?php for($i=0;$i<$infolist['page']->total;$i++){?>
<option value="<?php echo $i;?>">第<?php echo ($i+1);?>页</option>
<?php }?>
</select>
</div>
<div class=" "><a href="index.php?con=wap&act=list<?php echo $ext;?>&page=<?php echo $infolist['page']->nextPage;?>">下一页</a></div>
</div>
</div>
<script>
function dourl(url){
location.href= url;
}
function changepage()
{
	p=document.getElementById('oppage').value;
	location.href='?con=wap&act=list<?php echo $ext;?>&page='+p;
}
</script>
<div style="display:none"> </div>



</body></html>