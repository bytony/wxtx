<?php include bidcms_template("header");?>
<script language="javascript" src="views/js/calendar.js"></script>
<div id="aaa"></div>
<!--中间内容-->
<div class="contentmanage">
    <div class="developer">
       <div class="appTitle normalTitle2">
        <?php include bidcms_template("user_top");?>
        <div class="clr"></div>
      </div> 
      <div class="tableContent">
      	
        <div class="content">
          <div class="cLineB"><h4>编辑优惠券</h4><a href="javascript:history.go(-1);" class="right btnGrayS vm" style="margin-top:-27px">返回</a></div> 
<div class="msgWrap">
  <form method="post" action="index.php">
 <input type="hidden" name="act" value="modify">
 <input type="hidden" name="pluginid" value="coupon">
 <input type="hidden" name="commit" value="1">
 <INPUT TYPE="hidden" NAME="formhash" value="<?php echo formhash();?>">
 <input type="hidden" name="updateid" value="<?php echo $info['id'];?>">
 <style type="text/css">
	.keys{height:30px;line-height:30px;background-color:#69b310;color:#fff;padding-left:10px;margin:3px;}
	.keys span{cursor:pointer;}
</style>
<script type="text/javascript">
<!--
	var i=0;
	function domattch()
	{
		var kwords=document.getElementById('keyword');
		
		if(kwords.value!='')
		{
			strtype="数量：<input type='text' style='width:100px;' name='keywordsimg[key"+i+"]' value=''/>";
			str="<div id='key"+i+"' class='keys'><input type='text' style='width:100px;' name='keywords[key"+i+"]' value='"+kwords.value+"'/> "+strtype+" &nbsp;&nbsp;<span onclick='removeKey(\"key"+i+"\")'>清除</span></div>";
			jq('#mattch').append(str);
			kwords.value="";
			i++;
		}
	}
	function removeKey(id)
	{
		document.getElementById(id).remove();
	}
//-->
</script>
<table class="userinfoArea" style=" margin:20px 0 0 0;" border="0" cellspacing="0" cellpadding="0" width="100%">
<tbody>
<tr>
  <th valign="top"><span class="red">*</span><label for="Title">优惠券标题：</label></th>
  <td><input type="input" class="px" id="Title" value="<?php echo $info['coupon_title'];?>" name="title" style="width:600px">
  </td>
</tr>

<tr>
  <th valign="top"><span class="red">*</span><label for="keyword">优惠券设置：</label></th>
  <td><input type="input" class="px" id="keyword" style="width:200px"><a href="javascript:domattch();" class="btnGray vm" style="padding-top:3px;padding-bottom:3px;">添加</a><div id="mattch"><?php if(!empty($info_keywords)){foreach($info_keywords as $k=>$v){?><div id='oldkey<?php echo $k;?>' class='keys'><input type='text' style="width:100px;" name='keywords[oldkey<?php echo $k;?>]' value='<?php echo $v['coupon_title'];?>'/> 数量：<input type='text' style='width:100px;' name='keywordsimg[oldkey<?php echo $k;?>]' value='<?php echo $v['coupon_num'];?>'/>&nbsp;&nbsp;<span onclick='removeKey("oldkey<?php echo $k;?>")'>清除</span></div><?php }}?></div></td>
  <td>&nbsp;</td>
</tr>
<tr>
  <th valign="top"><label for="Title">领取人数：</label></th>
  <td><input type="input" class="px" id="Title" value="<?php echo $info['coupon_total'];?>" name="total"><br>
  </td>
</tr>
<tr>
<th valign="top"><label for="starttime">开始时间：</label></th>
<td>
	<input type="text" class="px"  value="<?php  echo !empty($info['coupon_starttime'])?date("Y-m-d H:i:s",$info['coupon_starttime']):date('Y-m-d H:i:s',time()+7200);?>" name="starttime" id="starttime" class="input-text"><input type="button" class="button" onclick="HS_setDate(document.getElementById('starttime'))" value="选择">
</td>
</tr>
<tr>
<th valign="top"><label for="lasttime">失效时间：</label></th>
<td>
	<input type="text" class="px"  value="<?php  echo !empty($info['coupon_lasttime'])?date("Y-m-d H:i:s",$info['coupon_lasttime']):date('Y-m-d H:i:s',time()+86400);?>" name="lasttime" id="lasttime" class="input-text"><input type="button" class="button" onclick="HS_setDate(document.getElementById('lasttime'))" value="选择">
</td>
</tr>
<tr>
  <th valign="top"><label for="Description">使用说明：</label></th>
  <td><textarea class="px" id="Hfcontent" name="content" style="width:600px;height:200px;"><?php echo $info['coupon_content'];?></textarea><br>请不要多于300字!
</td>
</tr>
<tr>
  <th valign="top"><label for="Description">活动说明：</label></th>
  <td><textarea class="px" id="Hfcontent" name="intro" style="width:600px;height:200px;"><?php echo $info['coupon_intro'];?></textarea><br>请不要多于300字!
</td>
   
</tr>
<tr>
  <th></th>
  <td><button type="submit" name="button" class="btnGreen left">保存</button>　<a href="index.php?ac=mp3list&amp;id=3699" class="btnGray vm">取消</a>
  <div class="clr"></div>
</td>
</tr>
  </tbody>
</table>
  </form>



  </div> 

        </div>
        
        <!--左侧功能菜单-->
 <div class="sideBar">
          <div class="catalogList">
			<?php include bidcms_template("left");?>
          </div>
        </div>        
        <div class="clr"></div>
      </div>
    </div>
  </div> 

<!--底部-->
  	</div>
<?php include "footer.php";?>