
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>在线订房</title>
<meta name="viewport" content="width=device-width,height=device-height,inital-scale=1.0,maximum-scale=1.0,user-scalable=no;">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<meta name="format-detection" content="telephone=no">
<link href="plugins/hotel/views/hotels.css" rel="stylesheet" type="text/css">
<script src="http://libs.baidu.com/jquery/2.0.0/jquery.min.js" type="text/javascript"></script>
<script src="index/js/iscroll.js" type="text/javascript"></script>
<SCRIPT type=text/javascript>
var myScroll;

function loaded() {
myScroll = new iScroll('wrapper', {
snap: true,
momentum: false,
hScrollbar: false,
onScrollEnd: function () {
document.querySelector('#indicator > li.active').className = '';
document.querySelector('#indicator > li:nth-child(' + (this.currPageX+1) + ')').className = 'active';
}
 });
 

}

document.addEventListener('DOMContentLoaded', loaded, false);
</SCRIPT>
</head>

<body id="hotelsorder" >
<div class="banner">
<div id="wrapper">
<div id="scroller">
<ul id="thelist">
               
<li><p></p><img src="http://bcs.duapp.com/baeimg/XpVSvoOf3I.jpg"></li>
 

</ul>
</div>
</div>
<div id="nav">
<div id="prev" onClick="myScroll.scrollToPage('prev', 0,400,1);return false">&larr; prev</div>
<ul id="indicator">
            
<li   >1</li>
 
</ul>
<div id="next" onClick="myScroll.scrollToPage('next', 0);return false">next &rarr;</div>
</div>
<div class="clr"></div>
</div>


<div class="cardexplain">


<!--酒店房价及类型-->
<ul class="round">
<li class="biaotou bradius pad"><table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
<td>房间类型</td>
<td class="yuanjia">原价</td>
<td class="youhuijia">优惠价</td>
</tr>
</table></li>
<li><span class="noneorder">
<table class="jiagebiao" width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
<td>商务套房</td>
<td class="yuanjia">￥288.0</td>
<td class="youhuijia">￥188.0</td>
</tr>
</table>
</span>
</li>

</ul>

<!--后台可控制是否显示-->
<ul class="round">
<li>
<h2>配套设施</h2>
<div class="text">
卫生间 &nbsp;无线宽带 ！</div>
</li>
<li class="tel"><a href="tel:13696991570"><span>13696991570 电话预订</span></a></li>
</ul>

<ul class="round">
<li class="userinfo"><a href="index.php?ac=fans&amp;c=o7MB9jmVhL6SFTsKkwAMouZ3BqtA&amp;tid=650"><span>请完善个人资料再下订单</span></a></li>
</ul>

   <input type="hidden" name="formhash" id="formhash" value="8a364f4a" />

<ul class="round">
<li class="title mb"><span class="none">请认真填写在线订单</span></li>
<li class="nob">
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="kuang">
<tr>
<th>入住人</th>
<td><input name="truename"  type="text" class="px" id="truename" value="小丸" placeholder="请输入您的真实姓名"></td>
</tr>
</table>
</li>
<li class="nob">
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="kuang">
<tr>
<th>联系电话</th>
<td><input name="tel"  type="text"  class="px" id="tel" value="13254632158" placeholder="请输入您的电话"></td>
</tr>
</table>
</li>
<li class="nob">
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="kuang">
<tr>
<th>入住时间</th>
<td> <select name="dateline" id="dateline"  class="dropdown-select"  >
                    
                      <option   value=2013-06-27  >2013-06-27 </option><option   value=2013-06-28  >2013-06-28 </option><option   value=2013-06-29  >2013-06-29 </option><option   value=2013-06-30  >2013-06-30 </option><option   value=2013-07-01  >2013-07-01 </option><option   value=2013-07-02  >2013-07-02 </option><option   value=2013-07-03  >2013-07-03 </option><option   value=2013-07-04  >2013-07-04 </option><option   value=2013-07-05  >2013-07-05 </option><option   value=2013-07-06  >2013-07-06 </option><option   value=2013-07-07  >2013-07-07 </option><option   value=2013-07-08  >2013-07-08 </option><option   value=2013-07-09  >2013-07-09 </option><option   value=2013-07-10  >2013-07-10 </option><option   value=2013-07-11  >2013-07-11 </option><option   value=2013-07-12  >2013-07-12 </option><option   value=2013-07-13  >2013-07-13 </option><option   value=2013-07-14  >2013-07-14 </option><option   value=2013-07-15  >2013-07-15 </option><option   value=2013-07-16  >2013-07-16 </option><option   value=2013-07-17  >2013-07-17 </option><option   value=2013-07-18  >2013-07-18 </option><option   value=2013-07-19  >2013-07-19 </option><option   value=2013-07-20  >2013-07-20 </option><option   value=2013-07-21  >2013-07-21 </option><option   value=2013-07-22  >2013-07-22 </option><option   value=2013-07-23  >2013-07-23 </option><option   value=2013-07-24  >2013-07-24 </option><option   value=2013-07-25  >2013-07-25 </option><option   value=2013-07-26  >2013-07-26 </option><option   value=2013-07-27  >2013-07-27 </option> 
                       </select> </td>
</tr>
</table>
</li>
<li class="nob">
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="kuang">
<tr>
<th>离店时间</th>
<td> <select name="dateline2"  id="dateline2"  class="dropdown-select"  >
                    
                      <option   value=2013-06-27  >2013-06-27 </option><option   value=2013-06-28  >2013-06-28 </option><option   value=2013-06-29  >2013-06-29 </option><option   value=2013-06-30  >2013-06-30 </option><option   value=2013-07-01  >2013-07-01 </option><option   value=2013-07-02  >2013-07-02 </option><option   value=2013-07-03  >2013-07-03 </option><option   value=2013-07-04  >2013-07-04 </option><option   value=2013-07-05  >2013-07-05 </option><option   value=2013-07-06  >2013-07-06 </option><option   value=2013-07-07  >2013-07-07 </option><option   value=2013-07-08  >2013-07-08 </option><option   value=2013-07-09  >2013-07-09 </option><option   value=2013-07-10  >2013-07-10 </option><option   value=2013-07-11  >2013-07-11 </option><option   value=2013-07-12  >2013-07-12 </option><option   value=2013-07-13  >2013-07-13 </option><option   value=2013-07-14  >2013-07-14 </option><option   value=2013-07-15  >2013-07-15 </option><option   value=2013-07-16  >2013-07-16 </option><option   value=2013-07-17  >2013-07-17 </option><option   value=2013-07-18  >2013-07-18 </option><option   value=2013-07-19  >2013-07-19 </option><option   value=2013-07-20  >2013-07-20 </option><option   value=2013-07-21  >2013-07-21 </option><option   value=2013-07-22  >2013-07-22 </option><option   value=2013-07-23  >2013-07-23 </option><option   value=2013-07-24  >2013-07-24 </option><option   value=2013-07-25  >2013-07-25 </option><option   value=2013-07-26  >2013-07-26 </option><option   value=2013-07-27  >2013-07-27 </option> 
                       </select> </td>
</tr>
</table>
</li>
<li class="nob">
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="kuang">
<tr>
<th>房间类型</th>
<td><input   class="px"   value="商务套房"  type="text" readonly></td>
</tr>
</table>
</li>
<li class="nob">
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="kuang">
<tr>
<th>预订数量</th>
<td><select name="nums" class="dropdown-select" id="nums" onChange="dothis(this.value)">
<option value="1" >1间</option>
<option value="2">2间</option>
<option value="3">3间</option>
<option value="4">4间</option>
<option value="5">5间</option>
<option value="6">6间</option>
<option value="7">7间</option>
<option value="8">8间</option>
<option value="9">9间</option>
<option value="10">10间</option>
                        <option value="11" >11间</option>
<option value="12">12间</option>
<option value="13">13间</option>
<option value="14">14间</option>
<option value="15">15间</option>
<option value="16">16间</option>
<option value="17">17间</option>
<option value="18">18间</option>
<option value="19">19间</option>
<option value="20">20间</option>
</select></td>
</tr>
</table>
</li>
<li class="nob">
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="kuang">
<tr>
<th>原价</th>
<td class="userinfo" id="price1" >￥288.0</td>
</tr>
</table>
</li>
<li class="nob">
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="kuang">
<tr>
<th>现价</th>
<td class="userinfo price" id="price2" >￥188.0</td>
</tr>
</table>
</li>
<li class="nob">
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="kuang">
<tr>
<th>为你节省</th>
<td class="userinfo price2" id="price3">￥100</td>
</tr>
</table>
</li>
<li class="nob">
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="kuang">
<tr>
<th valign="top" class="thtop">备注</th>
<td><textarea name="info" class="pxtextarea" style=" height:99px;overflow-y:visible" id="info"  placeholder="请输入备注信息"></textarea></td>
</tr>
</table>
</li>
</ul>

<div class="footReturn">
<a id="showcard"  class="submit" href="javascript:void(0)">提交订单</a>
<div class="window" id="windowcenter">
<div id="title" class="wtitle">提交成功<span class="close" id="alertclose"></span></div>
<div class="content">
<div id="txt"></div>
</div>
</div>
</div>
<script type="text/javascript"> 

function dothis(nums){
 
var str1 = 288.0*nums;
var str2 = 188.0*nums;
var str3 = 100*nums;
$("#price1").text("￥"+str1);
$("#price2").text("￥"+str2);
$("#price3").text("￥"+str3);
}

var oLay = document.getElementById("overlay");	
$(document).ready(function () { 


$("#showcard").click(function () {

if($("#tel").val()==''){alert('电话不能为空');return;} 
if($("#truename").val()==''){alert('名字不能为空');return;} 
if($("#dateline").val()==''){alert('请选择时间');return;}
 
var submitData = {
wxname: "o7MB9jmVhL6SFTsKkwAMouZ3BqtA",
truename: $("#truename").val(),
info: $("#info").val(),
formhash: $("#formhash").val(),
tel: $("#tel").val(),
nums: $("#nums").val(),
dateline: $("#dateline").val(),
dateline2: $("#dateline2").val(),
action: "setTel"
};
$.post('index.php?ac=hotelsorder&tid=2&c=o7MB9jmVhL6SFTsKkwAMouZ3BqtA', submitData,
function(data) {
if (data.success == true) {
alert(data.msg);
setTimeout("window.location.href='index.php?ac=hotelslist&tid=1&c=o7MB9jmVhL6SFTsKkwAMouZ3BqtA'",2000);
return
} else {
alert("保存失败。"); 
}
},
"json")
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

$("#windowcenter").slideToggle("slow"); 
$("#txt").html(title);
setTimeout('$("#windowcenter").slideUp(500)',4000);
} 


var count = $("#thelist img").size();
$("#thelist img").css("width",document.body.clientWidth);
$("#scroller").css("width",document.body.clientWidth*count);
 setInterval(function(){
myScroll.scrollToPage('next', 0,400,count);
},3500 );
window.onresize = function(){ 
 
  $("#thelist img").css("width",document.body.clientWidth);
  $("#scroller").css("width",document.body.clientWidth*count);
} 

</script>
</div>
</body>
</html>
