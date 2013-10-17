<style type="text/css">
#popmenu{display:block;position:relative;text-align:center;width:200px;margin:0 auto}
#popmenu:after {content:"";width:0;height:0;position:absolute;right:50px;top:50%;margin-top:-2px;border-width:5px 5px 0 5px;border-style:solid;border-color:#ffffff transparent;}
.dropdown {/* Size and position */position: relative;display:block;margin: 0 auto;padding: 5px;/* Styles */background-color: rgba(47, 47, 47, 1);border-radius: 7px;border: 1px solid rgba(0,0,0,0.15);box-shadow:0 0 10px 2px rgba(0, 0, 0, 0.15);-moz-box-shadow:0 0 10px 2px rgba(0, 0, 0, 0.15);-webkit-box-shadow:0 0 10px 2px rgba(0, 0, 0, 0.15);cursor: pointer;outline: none;list-style: none outside none;}
.dropdown:after {content: "";width: 0;height: 0;position: absolute;bottom: 100%;right: 90px;border-width: 0 6px 6px 6px;border-style: solid;border-color: rgba(47, 47, 47, 0.9) transparent;}
.dropdown:before {content: "";width: 0;height: 0;position: absolute;bottom: 100%;right: 88px;border-width: 0 8px 8px 8px;border-style: solid;border-color: rgba(0,0,0,0.1) transparent;}
.dropdown li {background-color: rgba(58, 58, 58, 1);display: block;float: left;height: 37px;width: 50%;}
.dropdown li span{border-color: #494949 #181818 #181818 #494949;border-left: 1px solid #494949;border-style: solid;border-width: 1px;color: #FFFFFF;line-height: 37px;display: block;font-size: 15px;height: 37px;text-align: center;text-shadow: 0 2px 2px #000000;width: 100%;}
.dropdown li:hover {background-color: rgba(0, 0, 0, 0.9);}
#win{position:absolute;top:55px;left:50%;width: 200px;margin:0 0 0 -100px;display:none;z-index: 5;}
</style>

<div id="ui-header">
<div class="fixed">
<a class="ui-title" id="popmenu">选择分类</a>
<a class="ui-btn-left_pre" href="javascript:window.history.go(-1);"></a>
<a class="ui-btn-right" href="javascript:window.location.reload();"></a>
</div>
</div>
<div id="win">
<ul class="dropdown"> 
<li><a href="http://item.taobao.com/item.htm?spm=686.1000925.1000774.6.7x8aUD&id=23612444203"><span>T恤定制</span></a></li>
 
<li><a href="http://item.taobao.com/item.htm?spm=686.1000925.1000774.26.7x8aUD&id=18704979197"><span>马克杯定制</span></a></li>
 
<li><a href="http://spshdiy.duapp.com/wxapi.php?ac=listhome1&tid=4793"><span>旧物改造DIY</span></a></li>
 
<li><a href="http://spshdiy.duapp.com/wxapi.php?ac=listhome1&tid=4794"><span>手工制作DIY</span></a></li>
 
<li><a href="http://spshdiy.duapp.com/wxapi.php?ac=listhome1&tid=5848"><span>美容DIY</span></a></li>
 
<li><a href="http://book.3g.cn/"><span>尚·书房</span></a></li>
 
<li><a href="http://blog.sina.com.cn/imhappyhome"><span>公益救助</span></a></li>
 
<li><a href="http://spshdiy.duapp.com/wxapi.php?ac=listhome1&tid=4790"><span>查询功能</span></a></li>
 
<li><a href="http://spshdiy.duapp.com/wxapi.php?ac=listhome1&tid=9388"><span>游戏</span></a></li>
 
<li><a href="http://user.qzone.qq.com/839308005/infocenter#!app=334&url=http%3A%2F%2Fcnc.qzs.qq.com%2Fqzone%2Fmsgboard%2Fmsgbcanvas.html%23page%3D1"><span>留言板</span></a></li>
 <?php 
echo $infolist;
 ?>
<div class="clr"></div>
</ul>
</div>
<script type="text/javascript">
<!--
window.onload=function()
{
document.getElementById("popmenu").onclick = function ()
{
	var oWin = document.getElementById("win");
	oWin.style.display = oWin.style.display=="block"?'none':'block';
};
}
//-->
</script>