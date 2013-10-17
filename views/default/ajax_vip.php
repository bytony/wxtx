<?php include bidcms_template('header_ajax');?>
<style type="text/css">
.xztw{
border: 1px solid #cccccc; padding; width:580px; margin-bottom:3px;border-radius: 2px 2px 2px 2px;
}
.xztw:hover{
background-color: #F0FFDC;
    border: 1px solid #64C269;
}
label {
    cursor: pointer;
    display: block;
    padding: 4px 0 4px 10px;
}
.buyform{ padding: 0 10px 10px 10px}
.setting-period{ width: 70px;}
#jbnums{ padding:0 10px;}
</style>
   
  <div style="width:400px;" id="smemberss">
<h3 style="cursor: move;" id="fctrl_smemberss" class="flb">
<em>金币购买vip</em>
<span><a href="javascript:hideWindow('smemberss');" class="flbc"  title="关闭">关闭</a></span>
</h3>
<iframe style="display:none;" name="buyform"></iframe>
 <form method="post" action="index.php" target="buyform" class="buyform">
  <input type="hidden"  name="id" value="<?php echo $id;?>"  />
  <input type="hidden"  name="con" value="ajax"  />
  <input type="hidden"  name="act" value="updatevip"  />
  <input type="hidden"  name="commit" value="1"  />
  <INPUT TYPE="hidden" NAME="formhash" value="<?php echo formhash();?>">

<table  class="ListProduct" width="100%" cellspacing="0" cellpadding="0" border="0" style=" margin-bottom:0">
<tbody>
<tr>
<td align="center">当前微信号级别</td>
<td align="center">VIP到期时间</td>
<td align="center" class="norightborder">你当前的金币总数</td>
</tr>
<tr>
<td align="center" style="background-color:#FFF">VIP<?php echo $winfo['vip_level'];?></td>
<td align="center" style="background-color:#FFF"><?php echo date('Y-m-d',$winfo['lasttime']);?></td>
<td align="center" class="norightborder" style="background-color:#FFF"><?php echo $winfo['money'];?></td>
</tr>
<tr>
<td colspan="3" align="center" class="norightborder green" style="background-color:#FFF">备注：1金币可以购买5个请求资源，1元RMB=1000金币</td>
</tr>
<tr>
<td colspan="3" align="center" class="norightborder">
            请选择要购买的VIP等级  <select class="setting-period" name="vip" id="vip" onchange="doit()" >
            <?php foreach($GLOBALS['vip'] as $k=>$v){?>
            <option value="<?php echo $v;?>">vip<?php echo $k;?></option>
			<?php }?>
            </select>
                选择购买月数 <select class="setting-period" name="period" id="period" onchange="doit()" >
            <option selected="selected" value="0">请选择</option>
			<?php foreach($GLOBALS['month'] as $k=>$v){?>
            <option value="<?php echo $v;?>"><?php echo $k;?></option>
			<?php }?>
            </select>
</td>
</tr>
<tr>
<td colspan="3" class="norightborder">		
              <div id="jbnums" ></div>
               </td>
 </tr>
 <tr>
<td colspan="3" align="right" class="norightborder" style="background-color:#FFF">	
                 
              
              
                 <button type="submit"  name="button"  id="sbmt" class="btnGreen" >提交</button>
                 </td>
 </tr>
          </tbody>
</table>
          </form>
<script>
function doit(){
var vip = parseInt("<?php echo $winfo['vip_level'];?>");
var enddate = '<?php echo $winfo["lasttime"];?>';
var maxmoney=parseInt("<?php echo $winfo['money'];?>");
var myDate = new Date();
var now = myDate.getTime(); 
now = parseInt(now/1000);
//alert(now);
var month =parseFloat(document.getElementById("period").value);

if(month==0) alert('请选择要开通的月数');
if(now>enddate){//接受时间小于当期时间
nums = parseFloat(document.getElementById("vip").value)*month;  
nums = parseInt(nums);

if(nums>maxmoney){
alert('你的金币不够!');

}
document.getElementById("jbnums").innerHTML = "<p class='red'>确定购买将扣除您"+nums+"金币，折合RMB是"+nums/1000+"元。</p>";
}else{//结束数据大于当前时间
var  ds = enddate - now;
var day = parseInt(ds/(3600*24))+1;
var arr = new Array();
<?php foreach($GLOBALS['vip'] as $k=>$v){?>
<?php echo 'arr['.$k.'] ='.$v.';';?>
<?php }?>
vip=vip<7 && vip>-1?vip:6;
var syjbs=  parseInt(arr[vip]*day);

nums = parseFloat(document.getElementById("vip").value)*month;  
nums = parseInt(nums);
var ajb = syjbs+maxmoney;

nums = nums-syjbs;
oldTime = myDate.getTime()+month*24*3600*1000;
var newTime = new Date(oldTime); //就得到普通的时间了  
info="<p>您原VIP等级是vip"+vip+"，距离原到期时间<?php echo date('Y-m-d',$winfo['lasttime']);?>还有"+day+"天</p><p>折算到现在可抵金币数为"+syjbs+"金币；</p><br><p>购买后VIP等级将调整为vip"+document.getElementById("vip").selectedIndex+"，到期时间调整为"+newTime.toLocaleDateString()+"</p>";
if(nums>=0)
{
	info+="<p class='red'>还需扣除"+nums+"金币，折合RMB是"+nums/1000+"元。</p>";
}
else
{
	if(month>0)
	{
		info+="<p class='red'>将返还"+Math.abs(nums)+"金币。</p>";
	}
}
document.getElementById("jbnums").innerHTML =info;
}



}
</script>

</div>
<?php include bidcms_template('footer_ajax');?>
