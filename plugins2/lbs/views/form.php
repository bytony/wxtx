<?php include bidcms_template("header");?>
<div id="aaa"></div>

<div id="wp" class="wp">

<script type="text/javascript" src="http://api.map.baidu.com/api?v=1.5&ak=5f24164715675cffd7aa9d94c7032889"></script>


 <!--中间内容-->
<div class="contentmanage">
    <div class="developer">
       <div class="appTitle normalTitle2">
        <?php include bidcms_template("user_top");?>
        <div class="clr"></div>
      </div> 
      <div class="tableContent">
      	
        <div class="content">
          <div class="cLineB"><h4>编辑LBS回复</h4><a href="javascript:history.go(-1);" class="right btnGrayS vm" style="margin-top:-27px">返回</a></div> 
<div class="msgWrap">
  <form method="post" action="index.php">
 <input type="hidden" name="act" value="modify">
 <input type="hidden" name="pluginid" value="lbs">
 <input type="hidden" name="commit" value="1">
 <INPUT TYPE="hidden" NAME="formhash" value="<?php echo formhash();?>">
 <input type="hidden" name="updateid" value="<?php echo $info['id'];?>">
 
<table class="userinfoArea" style=" margin:20px 0 0 0;" border="0" cellspacing="0" cellpadding="0" width="100%">
<tbody>
<tr>
  <th valign="top"><span class="red">*</span><label for="Title">商家名称：</label></th>
  <td><input type="input" class="px" id="Title" value="<?php echo $info['title'];?>" name="title" style="width:600px"><br>
  </td>
</tr>
<tr>
  <th valign="top"><span class="red">*</span><label for="MusicUrl">商家图片：</label></th>
  <td><input type="input" class="px" id="MusicUrl" value="<?php echo $info['logo'];?>" name="logo" style="width:600px"><br>
   </td>
</tr>
<tr>
  <th valign="top"><span class="red">*</span><label for="MusicUrl">电话：</label></th>
  <td><input type="input" class="px" id="MusicUrl" value="<?php echo $info['tel'];?>" name="tel" style="width:600px"><br>
   </td>
</tr>
<tr>
<th valign="top"><label for="HQMusicUrl">标签：</label></th>
<td><input type="input" class="px" id="HQMusicUrl" value="<?php echo $info['tag'];?>" name="tag" style="width:600px">
</td>
</tr>
<tr>
  <th valign="top"><label for="Description">地址：</label></th>
  <td>
  <input type="text" class="px" id="address" name="address" value="<?php echo $info['address'];?>" style="width:400px;"/>
  <div id="r-result">
	<style type="text/css">
		.tangram-suggestion-main{background:#fff;cursor:pointer;}
	</style>
	输入地址查询：<input type="text" id="suggestId" class="px" style="width:400px;"/></div>
	<div id="allmap" style="width:400px;height:400px;"></div>
	<script type="text/javascript" src="views/js/map.js"></script>
  </div>
</td>
</tr>
<tr>
<th valign="top"><label for="HQMusicUrl">经纬度：</label></th>
<td><input type="input" class="px" id="lng" value="<?php echo $info['lng'];?>" name="lng" style="width:100px"><input type="input" class="px" id="lat" value="<?php echo $info['lat'];?>" name="lat" style="width:100px"> 点击地图上的定位获取
</td>
</tr>

<tr>
  <th valign="top"><label for="info">详细介绍：</label></th>
  <td><?php echo edit($info['content']);?></td>
</tr>
</tr><tr>
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