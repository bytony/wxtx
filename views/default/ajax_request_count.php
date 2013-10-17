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
</style>
   
  <div style="width:300px;" id="smembers">
<h3 style="cursor: move;" id="fctrl_smembers" class="flb">
<em>金币购买请求数</em>
<span><a href="javascript:hideWindow('smembers');" class="flbc"  title="关闭">关闭</a></span>
</h3>
<iframe style="display:none;" name="buyform"></iframe>
 <form method="post" action="index.php" target="buyform" class="buyform">
  <input type="hidden"  name="id" value="<?php echo $id;?>"  />
  <input type="hidden"  name="con" value="ajax"  />
  <input type="hidden"  name="act" value="requestcount"  />
  <input type="hidden"  name="commit" value="1"  />
  <INPUT TYPE="hidden" NAME="formhash" value="<?php echo formhash();?>">
       
            <table  class="ListProduct" width="100%" cellspacing="0" cellpadding="0" border="0" style=" margin-bottom:0">
   <tbody>
<tr>
<td class="norightborder" style="background-color:#FFF; border-bottom:0"><p>你当前的金币总数：<span class="red"><?php echo $winfo['money'];?></span></p>
<p>1金币购买5个请求资源，1元RMB=1000金币</p>
<p style=" margin-top:15px">要购买的请求数：<input type="input" class="px" id="tel" value="0" onchange="doiit(this.value);" name="tel"></p>
<p style="margin-top:10px">需要消耗金币数：<input type="input" class="px" id="jbnums" value="0"  onchange="doit(this.value);" name="jbnums">
</p>
  
  </td>
</tr>
<tr>
<td class="norightborder" align="right" style="background-color:#FFF"><button type="submit"  name="button"  class="btnGreen" >提交</button></td>
</tr>
</tbody>
</table>
          </form>
  </div>
<script>
var maxmoney=parseInt("<?php echo $winfo['money'];?>");
function doit(nums){
if(nums>maxmoney){
alert('你的金币不够!');
document.getElementById("jbnums").value = 0;
document.getElementById("tel").value = 0;
}else{
document.getElementById("tel").value = 5*nums;
}
}
function doiit(nums){
jf = parseInt(nums/5);

if(jf>maxmoney){
alert('你的金币不够!');
document.getElementById("jbnums").value = 0;
document.getElementById("tel").value = 0;
}else{
document.getElementById("jbnums").value = jf;
}
}

</script>

</div>
<?php include bidcms_template('footer_ajax');?>
