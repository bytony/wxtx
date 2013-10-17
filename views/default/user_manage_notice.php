<?php include "header.php";?>
<div id="aaa"></div>

<div id="wp" class="wp">
<script type="text/javascript">
<!--
	function checkstatus(status)
	{
		if('success'==status)
		{
			alert('回复设置成功');
		}
		else if('null'==status)
		{
			alert('用户未登录');
		}
	}
//-->
</script>
  <!--中间内容-->
  <script src="index/js/jquery.min.js" type="text/javascript"></script>
  <div class="contentmanage">
    <div class="developer">
       <div class="appTitle normalTitle2">
        <?php include bidcms_template("user_top");?>
        <div class="clr"></div>
      </div> 
      <div class="tableContent">
        <div class="content">

<div class="cLineB">
  <h4>关注时自动回复内容 <span class="FAQ">可参考右边的范例来写，拷贝到输入框后修改！</span></h4>
 </div>
         <div class="zdhuifu">
                  <form method="post" action="index.php">
                  <input type="hidden" name="act" value="notice">
				<input type="hidden" name="con" value="user">
				<INPUT TYPE="hidden" NAME="formhash" value="<?php echo formhash();?>">
				<input type="hidden" name="commit" value="1">
  <table cellspacing="0" cellpadding="0" border="0" width="100%">
  <tbody><tr><td height="5"></td><td></td></tr>
<tr>
<td valign="top" width="420"><textarea class="px" style="width:420px; height:280px; margin:5px 0" id="Hfcontent" name="info"><?php echo $info['content'];?></textarea> <input name="home" type="checkbox" <?php echo $info['home']>0?'checked':'';?> value="1">勾选此项默认回复首页！ 如果设置了图文者优先考虑自定义图文!</td>
<td valign="top">
     	<div class="zdhuifu" style="margin-left:20px">
<h4>参考范例：</h4>
谢谢关注！功能如下：<br>
     		查天气-请输入：无锡 天气<br>
     		查快递-请输入：圆通快递 1933731260<br>
     		翻译-请输入：@我爱你<br>
     		糗事-请输入：糗事<br>
     		笑话-请输入：笑话<br>
     		百科-请输入：百科毛泽东<br>
     		成语接龙-请输入：兴高采烈<br>
     		成语词典-请输入：成语 半死不活<br>
     		解梦-请输入：梦到XX<br>
     		人品计算-请输入：李白人品<br>
     		手机归属地查询-请直接输入手机号码<br>
</div></td>
</tr>
<tr>
<td height="50">
       
<input type="submit" value="保存" name="sbmt" class="btnGreen left">　<a href="index.php?con=user&act=image" class="btnGray vm">切换到图文模式</a>
<div class="right">
<ul>
<li class="biaoqing"><span>表情</span>
<?php include bidcms_template("face");?>
</li>
</ul>
</div>
<script type="text/javascript">
function jsbq(srt){
document.getElementById("Hfcontent").value=document.getElementById("Hfcontent").value+"/"+srt;
}
</script>


</td><td valign="top">
</td></tr>

<tr>
<td colspan="2">备注：要实现关注时回复图文形式，只需添加关键词Hello2BizUser和对应回复，<br>
可以重复定义关键词Hello2BizUser不同的回复内容，系统随机抽取！</td>
</tr>
</tbody></table>
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
  <script>
$(document).ready( function(){ 
$('.checkall').click(function(){

$('.checkitem').each(function(){
$(this).attr('checked',$('.checkall').attr('checked'));
});
});

});
  </script>
  <!--底部-->
  	</div>
<?php include "footer.php";?>