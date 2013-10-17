<?php include "header.php";?>
<div id="aaa"></div>

<div id="wp" class="wp"><link href="index/css/style.css" rel="stylesheet" type="text/css">

 


 <!--中间内容-->
<div class="contentmanage">
    <div class="developer">
       <div class="appTitle normalTitle2">
        <?php include bidcms_template("user_top");?>
        <div class="clr"></div>
      </div> 
      <div class="tableContent">
      	
        <div class="content">
          <div class="cLineB"><h4>编辑语音回复</h4><a href="javascript:history.go(-1);" class="right btnGrayS vm" style="margin-top:-27px">返回</a></div> 
<div class="msgWrap">
  <form method="post" action="index.php">
 <input type="hidden" name="act" value="audiomodify">
 <input type="hidden" name="con" value="user">
 <input type="hidden" name="commit" value="1">
 <INPUT TYPE="hidden" NAME="formhash" value="<?php echo formhash();?>">
 <input type="hidden" name="updateid" value="<?php echo $info['id'];?>">
 
<table class="userinfoArea" style=" margin:20px 0 0 0;" border="0" cellspacing="0" cellpadding="0" width="100%">
<tbody>
<tr>
  <th valign="top"><label for="keyword">关键词：</label></th>
  <td><?php include "user_widget_keywords.php";?></td>
  <td>&nbsp;</td>
</tr>
<tr>
  <th valign="top"><span class="red">*</span><label for="Title">音乐标题：</label></th>
  <td><input type="input" class="px" id="Title" value="<?php echo $info['title'];?>" name="title" style="width:600px"><br>
  </td>
</tr>
<tr>
  <th valign="top"><span class="red">*</span><label for="MusicUrl">音乐链接：</label></th>
  <td><input type="input" class="px" id="MusicUrl" value="<?php echo $info['music'];?>" name="music" style="width:600px"><br>
                  </td>
</tr>
                            <tr>
  <th valign="top"><label for="HQMusicUrl">高品质音乐链接：</label></th>
  <td><input type="input" class="px" id="HQMusicUrl" value="<?php echo $info['hq_music'];?>" name="hq_music" style="width:600px"><br>高质量音乐链接，WIFI环境优先使用该链接播放音乐
</td>
</tr>
<tr>
  <th valign="top"><label for="Description">音乐描述：</label></th>
  <td><textarea class="px" id="Hfcontent" name="text" style="width:600px;"><?php echo $info['content'];?></textarea><br>请不要多于30字否则无法发送!
</td>
   
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