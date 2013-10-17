<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title><?php echo $vote['vote_title'];?></title>
<meta name="viewport" content="width=device-width,height=device-height,inital-scale=1.0,maximum-scale=1.0,user-scalable=no;">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<meta name="format-detection" content="telephone=no">
<link href="plugins/vote/views/css/vote.css" rel="stylesheet" type="text/css">
<link href="plugins/vote/views/css/square.css" rel="stylesheet">
<link href="plugins/vote/views/css/flat.css" rel="stylesheet">
<script src="views/js/jquery.js" type="text/javascript"></script>
<script src="plugins/vote/views/js/jquery.icheck.min.js" type="text/javascript"></script>
</head>
<body id="<?php echo $vote_type[intval($vote['vote_type'])];?>">
<div class="vote">
<?php if(!empty($vote)){?>
<?php if($result==0){?>
<form class="form" method="post" action="index.php">
<input type="hidden" name="con" value="wap">
<input type="hidden" name="act" value="modify">
<input type="hidden" name="pluginid" value="vote">
<input type="hidden" name="commit" value="1">
<input type="hidden" name="voteid" value="<?php echo $vote['id'];?>">
<input type="hidden" name="fromuser" value="<?php echo $fromuser;?>">
<INPUT TYPE="hidden" NAME="formhash" value="<?php echo formhash();?>">
<?php }?>
<div class="votecontent">
<h2><?php echo $vote['vote_title'];?></h2>
<span class="date"><?php echo date('Y-m-d',$vote['updatetime']);?></span>
<p class="content"><p>
<?php echo $vote['vote_content'];?>
</p></p>
<p class="modus"><?php echo $vote_option[$vote['vote_option']];?>投票，<span class="number">共有<?php echo $vote['vote_total'];?>人参与投票</span></p>
<ul class="list" id="list">
<?php foreach($votelist as $k=>$v){?>
<li>
<label for="square-checkbox-<?php echo $k;?>">
<?php if($vote['vote_type']==1){?>
<p class="voteimg2"><img src="<?php echo $v['vote_img'];?>"></p>
<?php }?>
<input class="ckbx" tabindex="9" name="id[]" value="<?php echo $v['id'];?>" type="radio" <?php echo $checkrepeat['position_id']==$v['id']?'checked':'';?> id="square-checkbox-<?php echo $k;?>" >
<span><?php echo $v['vote_title'];?></span></label>
<?php if($result==1){?>
<div id="voteshow<?php echo $k;?>" class="votebar"><div class="pbg"><div style="width: <?php echo $v['total']/$vote['vote_total'];?>%; background-color:<?php echo $color[$k];?>" class="pbr"></div></div>
<span class="percentage" style="color:<?php echo $color[$k];?>"><?php echo $v['total']/$vote['vote_total'];?>%<span class="user">(<?php echo $v['total'];?>)</span></span></div>
<?php }?>
</li>
<?php }?>
</ul>
<?php if($result==0){?>
<input class="pxbtn" type="submit" id="sssss" value="确认提交" >
<?php }?>
</div>
<?php if($result==0){?>
</form>
<?php }?>
<?php } else{?>
<div class="votecontent">
<h2>投票还未开始</h2>
<span class="date"></span>
<p class="content">暂无投票</p>
</div>
<?php }?>
</div>
<script>
$(document).ready(function(){
$('input').iCheck({
checkboxClass: 'icheckbox_flat',
radioClass: 'iradio_flat'
});
$("ins").click(function(){
var i=0;
$(".checked").each(function(){
	i++;
});
if(i>2){
	$(this).click();
}
});
$("label").click(function(){
var i=0;
$(".checked").each(function(){
i++;
});
if(i>2){
$(this).click();
}
});
});
</script>
</body>
</html>