<?php include "header.php";?>
<div id="aaa"></div>

<div id="wp" class="wp">


 <!--中间内容-->
<div class="contentmanage">
    <div class="developer">
       <div class="appTitle normalTitle2">
        <?php include bidcms_template("user_top");?>
        <div class="clr"></div>
      </div> 
      <div class="tableContent">
      	
        <div class="content">
          <div class="cLineB"><h4>编辑区匹配时内容</h4><a href="javascript:history.go(-1);" class="right btnGrayS vm" style="margin-top:-27px">返回</a></div> 
<div class="msgWrap">
<form method="post" action="index.php"  enctype="multipart/form-data">
<input type="hidden" name="act" value="nonemodify">
<input type="hidden" name="con" value="user">
<input type="hidden" name="commit" value="1">
<INPUT TYPE="hidden" NAME="formhash" value="<?php echo formhash();?>">
<input type="hidden" name="updateid" value="<?php echo $info['id'];?>">
<style type="text/css">
	.keys{height:30px;line-height:30px;background-color:#69b310;color:#fff;width:260px;padding-left:10px;margin:3px;}
	.keys span{cursor:pointer;}
</style>

<table class="userinfoArea" style=" margin:20px 0 0 0;" border="0" cellspacing="0" cellpadding="0" width="100%">
<tbody>

<tr>
  <th valign="top"><label for="text">内容或简介：</label></th>
  <td><textarea class="px" id="Hfcontent" name="text" style="width:500px; height:150px"><?php echo $info['content'];?></textarea><br>请不要多于1000字否则无法发送!


</td>
  <td rowspan="2" valign="top"><div style="margin-left:20px" class="zdhuifu">
  	<h4>文字加超链接范例：</h4>
  	以微信为例，输入<br>
请关注&lt;a href="http://www.wxapi.cn"&gt;微信&lt;/a&gt;<br>
<br>
效果如下：<br>
<img src="static/theme/default/img/index/chaolianjie.jpg" alt="文字超链接效果">	
</div></td>
   
</tr><tr>
  <th></th>
  <td><button type="submit" name="button" class="btnGreen left">保存</button>　<a href="index.php?con=user&act=none" class="btnGray vm">取消</a>
  	<div class="right" style="margin-right:10px">
  		<ul>
  			<li class="biaoqing"><span>表情</span>
  				<?php include bidcms_template("face");?>
  		</div><div class="clr"></div>
  	<script type="text/javascript">
function jsbq(srt){
document.getElementById("Hfcontent").value=document.getElementById("Hfcontent").value+"/"+srt;
}
</script></td>
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