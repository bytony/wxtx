
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="viewport" content="width=device-width,height=device-height,inital-scale=1.0,maximum-scale=1.0,user-scalable=no;">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<meta name="format-detection" content="telephone=no">
<meta name="description" content="乐享微信">
<title>刮刮卡活动</title>
<link href="plugins/guagua/views/css/activity-style.css" rel="stylesheet" type="text/css">
</head>

<script type="text/javascript">
function loading(canvas,options){   
  this.canvas = canvas;   
  if(options){   
    this.radius = options.radius||12;   
    this.circleLineWidth = options.circleLineWidth||4;   
    this.circleColor = options.circleColor||'lightgray';   
    this.moveArcColor = options.moveArcColor||'gray';   
  }else{   
    this.radius = 12;   
    this.circelLineWidth = 4;   
    this.circleColor = 'lightgray';   
    this.moveArcColor = 'gray';   
  }   
}   
loading.prototype = {   
  show:function (){   
    var canvas = this.canvas;   
    if(!canvas.getContext)return;   
    if(canvas.__loading)return;   
    canvas.__loading = this;   
    var ctx = canvas.getContext('2d');   
    var radius = this.radius;   
    var me = this;   
    var rotatorAngle = Math.PI*1.5;   
    var step = Math.PI/6;   
    canvas.loadingInterval = setInterval(function(){   
      ctx.clearRect(0,0,canvas.width,canvas.height);   
      var lineWidth = me.circleLineWidth;   
      var center = {x:canvas.width/2,y:canvas.height/2};  

      ctx.beginPath();   
      ctx.lineWidth = lineWidth;   
      ctx.strokeStyle = me.circleColor;   
      ctx.arc(center.x,center.y+20,radius,0,Math.PI*2);   
      ctx.closePath();   
      ctx.stroke();   
      //在圆圈上面画小圆   
      ctx.beginPath();   
      ctx.strokeStyle = me.moveArcColor;   
      ctx.arc(center.x,center.y+20,radius,rotatorAngle,rotatorAngle+Math.PI*.45);   
      ctx.stroke();   
      rotatorAngle+=step;   
 
    },100);   
  },   
  hide:function(){   
    var canvas = this.canvas;   
    canvas.__loading = false;   
    if(canvas.loadingInterval){   
      window.clearInterval(canvas.loadingInterval);   
    }   
    var ctx = canvas.getContext('2d');   
    if(ctx)ctx.clearRect(0,0,canvas.width,canvas.height);   
  }   
};   
</script>
</head>

<body  data-role="page" class="activity-scratch-card-winning" >
  <script type="text/javascript">
var loadingObj = new loading(document.getElementById('loading'),{radius:20,circleLineWidth:8});   
    loadingObj.show();   

</script>
<script src="views/js/jquery.js" type="text/javascript"></script>
<script src="plugins/guagua/views//js/wScratchPad.js" type="text/javascript"></script>
<div class="main">
<div class="cover"   >
<img src="plugins/guagua/views/img/activity-scratch-card-bannerbg.png">
<div id="prize"></div>
<div id="scratchpad"></div>
</div>


<div class="content">
   
<div id="zjl"   style="display:none"   class="boxcontent boxwhite">
<div class="box">
<div class="title-red"><span>恭喜你中奖了</span></div>
<div class="Detail">
	<p>你中了：<span class="red">谢谢参与</span></p>
	<p>兑奖SN码：<span class="red" id="sncode" >null</span></p>
	<p class="red"> </p>
	<p>
	<input name=""  class="px" id="tel" value="" type="text" placeholder="用户请输入您的手机号">
	</p>             
	<p>
	<input class="pxbtn" name="提 交"  id="save-btn" type="button" value="用户提交">
	</p>
</div>
</div>
</div>
<div class="boxcontent boxwhite">
<div class="box">
<div class="title-brown"><span>奖项设置：</span></div>
<div class="Detail">
<?php if($guagua['id']>0){?>
<?php foreach($guagua_list as $k=>$v){?>
<p><?php echo $v['guagua_option'];?>：<?php echo $v['guagua_title'];?>。数量：<?php echo $v['guagua_num'];?> </p>  
<?php }}else{?>
<p>暂时还没有进行中的活动...</p>
<?php }?>
</div>
</div>
</div>
<div class="boxcontent boxwhite">
<div class="box">
<div class="title-brown">使用说明：</div>
<div class="Detail">
<?php if($guagua['id']>0){?>
<p> <span><span><?php echo $guagua['guagua_content'];?></span></span></p>
<?php } else{?>
<p>暂时还没有进行中的活动...</p>
<?php }?>
</div>
</div>
</div>
<div class="boxcontent boxwhite">
<div class="box">
<div class="title-brown">活动说明：</div>
<div class="Detail">
<?php if($guagua['id']>0){?>
<p> <span><?php echo $guagua['guagua_intro'];?></span></p>
<?php } else{?>
<p>暂时还没有进行中的活动...</p>
<?php }?>
</div>
</div>
</div>
</div>
<div style="clear:both;"></div>
</div>
<script src="plugins/guagua/views/js/alert.js" type="text/javascript"></script> 
<?php $rand=empty($guagua_rand['guagua_option'])?'谢谢参与':$guagua_rand['guagua_option'];?>
<script type="text/javascript">
window.sncode = "null";
window.prize = "<?php echo $rand;?>";

var zjl = false;
var num = 0;
var goon = true;
$(function(){
$("#scratchpad").wScratchPad({
width : 150,
height : 40,
color : "#a9a9a7",
scratchMove : function(){
num++;
if(num==2){
	document.getElementById('prize').innerHTML="<?php echo $rand;?>";
}

if(zjl&&num>5&&goon){
//$("#zjl").fadeIn();
goon = false;

$("#zjl").slideToggle(500);
//$("#outercont").slideUp(500)
}
}
});

//$("#prize").html("谢谢参与");
//loadingObj.hide();
//$(".loading-mask").remove();
});

$("#save-btn").bind("click",
function() {
var btn = $(this);
var tel = $("#tel").val();
if (tel == '') {
alert("请输入手机号");
return
}

var submitData = {
tid: 438,
code: $("#sncode").text(),
tel: tel,
action: "setTel"
};
$.post('index.php?ac=acw', submitData,
function(data) {
if (data.success == true) {
alert(data.msg);
return
} else {}
},
"json")
});

$("#save-btnn").bind("click",
function() {
//var btn = $(this);
var submitData = {
tid: 438,
code: $("#sncode").text(),
parssword:$("#parssword").val(),
action: "setTel"
};
$.post('index.php?ac=acw', submitData,
function(data) {
if (data.success == true) {
alert(data.msg);
if (data.changed == true) {
window.location.href=location.href;
}  
return
} else {}
},
"json")
});

</script>
</body>
</html>
