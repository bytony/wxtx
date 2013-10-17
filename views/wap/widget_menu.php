<?php if($menus){?>
<style type="text/css">
#custommenu{position:fixed;left:46px;bottom:0px;width:100%;height:43px;background:url(views/wap/img/custombg.png);z-index:1000;overflow:hidden;}
#customkey{position:fixed;bottom:0px;left:0px;background:url(views/wap/img/ckeyboard.png);width:46px;height:43px;z-index:1000;}
#custommenu .cmenu{color:#fff;background:url(views/wap/img/custommenu.png) no-repeat center right;padding-left:10px;padding-right:15px;height:43px;line-height:43px;text-align:center;float:left;}
.dropmenu {position: relative;	display:block;margin: 0 auto;padding: 5px; background-color: rgba(47, 47, 47, 1);border-radius: 7px;border: 1px solid rgba(0,0,0,0.15);	box-shadow:0 0 10px 2px rgba(0, 0, 0, 0.15);	-moz-box-shadow:0 0 10px 2px rgba(0, 0, 0, 0.15);	-webkit-box-shadow:0 0 10px 2px rgba(0, 0, 0, 0.15);cursor: pointer;outline: none;	list-style: none outside none;}
.dropmenu:after {content: "";width: 0;height: 0;position: absolute;bottom: -6px;right: 42px;border-width: 6px 6px 0 6px;border-style: solid;border-color: rgba(47, 47, 47, 0.9) transparent;}
.dropmenu:before {content: "";width: 0;height: 0;position: absolute;bottom: -8px;right: 40px;border-width: 8px 8px 0 8px;border-style: solid;border-color: rgba(0,0,0,0.1) transparent;}
.dropmenu li {background-color: rgba(58, 58, 58, 1);display: block;float: left;height: 37px;width: 100%;}
.dropmenu li span{border-color: #494949 #181818 #181818 #494949;border-left: 1px solid #494949;border-style: solid;border-width: 1px;color: #FFFFFF;	line-height: 37px;display: block;font-size: 15px;height: 37px;text-align: center;text-shadow: 0 2px 2px #000000;width: 100%;}
.dropmenu li:hover {background-color: rgba(0, 0, 0, 0.9);}
.menuwin{position:fixed;bottom:50px;width: 100px;margin:0 0 0 -100px;display:none;z-index: 500;}
</style>
<script>
function showMenu(index)
{
	var oWin = document.getElementById("menuwin"+index);
	var oBtn = document.getElementById("popmenu"+index);
	if(oWin.style.display == "block")
	{
		hideall();
	}
	else
	{
		hideall();
		var w=oBtn.offsetWidth;
		oWin.style.display = "block";
		oWin.style.left = (index*w+56)+'px';
	}
}
function hideall()
{
	var c=document.getElementsByClassName('menuwin');
	len=c.length;
	for(i=0;i<len;i++)
	{
		c[i].style.display='none';
	}
}
</script>

<div style="margin-bottom:50px;"></div>
<?php
  foreach($menus as $k=>$v){?>
<div id="menuwin<?php echo $k;?>" class="menuwin">
<ul class="dropmenu">
<?php foreach($v['child'] as $key=>$val){?>
<li><a href="<?php echo $val['menu_url'];?>"><span><?php echo $val['menu_name'];?></span></a></li>
<?php }?>
<div class="clr"></div>
</ul>
</div>
<?php }?>
<div id="customkey" onclick="hideall()"></div>
<div id="custommenu"><div style="width:1600px;">
<?php foreach($menus as $k=>$v){?>
<span class="cmenu" id='popmenu<?php echo $k;?>' onclick="showMenu('<?php echo $k;?>');"><?php echo $v['parent']['menu_name'];?></span>
<?php }?>
</div><div>
 <?php //}?>