<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<meta name="viewport" content="width=device-width, minimum-scale=1, maximum-scale=1">

 <link rel="stylesheet" href="http://code.jquery.com/mobile/1.3.1/jquery.mobile-1.3.1.min.css" />
<script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="http://code.jquery.com/mobile/1.3.1/jquery.mobile-1.3.1.min.js"></script>

<script type="text/javascript" src="js/jQueryRotateCompressed.2.2.js"></script>
<script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
<style type="text/css">
#caibao {background: url('caibao.jpg') repeat;}
.demo{width:80%; height:auto; position:relative; margin:50px auto;}
#disk{width:100%; height: 100%;}
#start{width:40%; height:50%; position:absolute; top:11.2%; left:30.29%;}
#diskimg{width:100%}
#msg{width:90%;height:20px;border:1px solid #ff9830; margin: 30px auto; font-size: 14px; text-align: center;padding: 5px;border-radius: 5px;background:#fefeb4;}
#start img{cursor:pointer; width:100%;}
#info{width:90%;border:1px solid #ff9830; color: black; margin: 30px auto;font-size: 14px;text-align: left;padding: 5px;border-radius: 5px;background:#fefeb4; }
#info p {text-indent: 2em;}
#infotype{width: 65px;height: 20px;border:1px solid #ff9830;}
</style>
<script type="text/javascript">
var prize_arr = [
    {'id': 0,'min': 1,'max': 29,'prize': '一等奖','v': 1}, 
    {'id': 1,'min': 302,'max': 328,'prize': '二等奖','v': 2}, 
    {'id': 2,'min': 242,'max': 268,'prize': '三等奖','v': 5}, 
    {'id': 3,'min': 182,'max': 208,'prize': '四等奖','v': 7}, 
    {'id': 4,'min': 122,'max': 148,'prize': '五等奖','v': 10}, 
    {'id': 5,'min': 62,'max': 88,'prize': '六等奖','v': 25}, 
    {'id': 6,'min': [32,92,152,212,272,332], 'max': [58,118,178,238,298,358],'prize': '七等奖','v': 50}
]; 
//for (key in prize_arr) alert(prize_arr[key]);

$(function(){
  var arr = [];
  for (key in prize_arr) {
    var val = prize_arr[key];
    arr[val['id']] = val['v'];
  }
  
  $("#startbtn").rotate({
		bind:{
			click:function(){
			  var rid = get_rand(arr);
			  var res = prize_arr[rid];
			  var min = res['min'];
			  var max = res['max'];
			  var angle = 0;
			  if (rid == 6) {
			    var i = mt_rand(0, 5);
				angle = mt_rand(min[i], max[i]);
			  } else angle = mt_rand(min, max);
			  var prize = res['prize'];

			  $(this).rotate({
			 	duration:3000,
			 	angle: 0, 
            	animateTo:1800+angle,
				easing: $.easing.easeOutSine,
				callback: function(){
					alert(prize);
				}
			 });
		  }
		}
	});
});

function mt_rand (min, max) {
  return Math.floor(Math.random() * (max - min + 1)) + min;
}

function get_rand(proArr) { 
    //概率数组的总概率精度 
	var proSum = 0;
	for (var i = 0; i < proArr.length; i++) proSum += proArr[i];
 
    //概率数组循环 
	for (var i = 0; i < proArr.length; i++) {
	  var randNum = mt_rand(1, proSum);
	  if (randNum <= proArr[i]) return i;
	  else proSum -= proArr[i];
	}
} 
</script>
<title>欢乐大转盘</title>
</head>
<body>

  
<div data-role="page">
	<div  id="caibao">
  <div data-role="header">
    <h1>欢乐大转盘</h1>
  </div>
  <div id="msg">130****1234号码中了一等奖</div>
  <div data-role="content" class="demo"> 
    <div id="disk"> <img src="disk.jpg" id="diskimg"/>
    <div id="start"><img src="start.png" id="startbtn"></div> 
	</div>
  </div>
  <div id="info">
  	<div id="infotype">奖项说明:</div>
	<p>一等奖</p>
  </div>
  <div data-role="footer">
    Power by bytony
  </div>
  </div>
</body>