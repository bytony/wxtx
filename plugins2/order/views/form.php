<?php include bidcms_template("header");?>
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
          <div class="cLineB"><h4>编辑预订服务</h4><a href="javascript:history.go(-1);" class="right btnGrayS vm" style="margin-top:-27px">返回</a></div> 
<div class="msgWrap">
  <form method="post" action="index.php">
 <input type="hidden" name="act" value="modify">
 <input type="hidden" name="pluginid" value="order">
 <input type="hidden" name="commit" value="1">
 <INPUT TYPE="hidden" NAME="formhash" value="<?php echo formhash();?>">
 <input type="hidden" name="updateid" value="<?php echo $info['id'];?>">
 <style type="text/css">
	.keys{height:30px;line-height:30px;background-color:#69b310;color:#fff;padding-left:10px;margin:3px;}
	.keys span{cursor:pointer;}
</style>

<table class="userinfoArea" style=" margin:20px 0 0 0;" border="0" cellspacing="0" cellpadding="0" width="100%">
<tbody>
<tr>
  <th valign="top"><span class="red">*</span><label for="Title">关键字：</label></th>
  <td>
  <input type="input" class="px" id="Title" value="<?php echo $info['keywords'];?>" name="keywords" style="width:600px"><br/>
  多个请用逗号隔开
  </td>
</tr>
<tr>
  <th valign="top"><span class="red">*</span><label for="Title">服务名称：</label></th>
  <td>
  <input type="input" class="px" id="Title" value="<?php echo $info['order_title'];?>" name="title" style="width:600px">
  </td>
</tr>
<tr>
  <th valign="top"><label for="Title">商家地址：</label></th>
  <td><input type="input" class="px" id="Title" value="<?php echo $info['order_address'];?>" name="address" style="width:600px"><br>
  </td>
</tr>
<tr>
<th valign="top"><label for="starttime">商家电话：</label></th>
<td>
	<input type="text" class="px"  value="<?php echo $info['order_tel'];?>" name="tel" class="input-text" style="width:600px">
</td>
</tr>
<tr>
<th valign="top"><label for="starttime">服务类型：</label></th>
<td>
	<textarea class="px" id="Hfcontent" name="ordertype" style="width:400px;height:200px;"><?php echo $info['order_type'];?></textarea><br>每行一个
</td>
</tr>
<tr>
<th valign="top"><label for="starttime">服务门店：</label></th>
<td>
	<textarea class="px" id="Hfcontent" name="shop" style="width:400px;height:200px;"><?php echo $info['order_shop'];?></textarea><br>每行一个
</td>
</tr>
<tr>
  <th valign="top"><label for="Description">服务说明：</label></th>
  <td><textarea class="px" id="Hfcontent" name="content" style="width:600px;height:200px;"><?php echo $info['order_content'];?></textarea><br>请不要多于300字!
</td>
</tr>
<tr>
  <th valign="top"><label for="Description">头部图片：</label></th>
  <td><input type="text" class="px"  value="<?php echo $info['order_face'];?>" name="face" class="input-text" style="width:600px"><br>图片地址!
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