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
          <div class="cLineB"><h4>首页幻灯片</h4><a href="javascript:addPic();" class="right btnGrayS vm" style="margin-top:-27px;">添加幻灯片</a> </div> 
<div class="msgWrap">
<form method="post" action="index.php" onsubmit="return checkCount(1);">
<input type="hidden" name="act" value="modify">
<input type="hidden" name="con" value="picplayer">
<input type="hidden" name="commit" value="1">
<INPUT TYPE="hidden" NAME="formhash" value="<?php echo formhash();?>">
<div id="div_ptype">
<table class="ListProduct" border="0" cellspacing="0" cellpadding="0" width="100%">
<thead>
<tr>
<th style="width:200px;">标题</th>
<th>图片地址</th>
<th>链接地址</th>
<th style="width:70px;">操作</th>
</tr>
</thead>
                    
                      
<tbody>
<?php if(!empty($infolist)){foreach($infolist as $k=>$v){?>
<tr id="oldl<?php echo $k;?>">
<td><input type="text" name="title[]" style="190px" class="px" value="<?php echo $v['pic_title'];?>"></td>
<td><input type="text" name="url[]" style="width:90%" class="px" value="<?php echo $v['pic_url'];?>"></td>
<td><input type="text" name="link[]" style="width:90%" class="px" value="<?php echo $v['pic_link'];?>"></td>
<td class="norightborder"><a href="javascript:deleteParent('oldl<?php echo $k;?>');">删除</a></td>
</tr>
<?php }}?>
<tr id="piclist"><td colspan="4"><button type="submit" name="button" class="btnGreen left">保存</button>　<a href="index.php?con=user&act=none" class="btnGray vm">取消</a></td></tr>

</tbody>
</table>
</div>
</div>
</form>
<script type="text/javascript">
<!--
	i=0;
	function addPic()
	{
		if(checkCount(0))
		{
			jq('#piclist').before('<tr id="newl'+i+'"><td><input type="text" class="px" name="title[]" style="190px" value=""></td><td><input type="text" class="px" style="width:90%" name="url[]" value=""></td><td><input type="text" style="width:90%" class="px" name="link[]" value=""></td><td class="norightborder"><a href="javascript:deleteParent(\'newl'+i+'\');">删除</a></td></tr>');
		}
		i++;
	}
	
	function checkCount(id)
	{
		count=id==0?5:6;
		if(jq('.ListProduct>tbody').find('tr').length>count)
		{
			alert('最多只能添加5条记录');
			return false;
		}
		return true;
	}
	function deleteParent(obj)
	{
		if(confirm('删除后不可恢复，确认删除？'))
		{
			jq('#'+obj).remove();
		}
	}
//-->
</script>
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