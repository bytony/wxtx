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
          <div class="cLineB"><h4>自定义菜单</h4><a href="javascript:addPic(0,0);" class="right btnGrayS vm" style="margin-top:-27px;">添加主菜单</a> </div> 
<div class="msgWrap">
<form method="post" action="index.php" onsubmit="return checkCount(1);">
<input type="hidden" name="act" value="modify">
<input type="hidden" name="con" value="menu">
<input type="hidden" name="commit" value="1">
<INPUT TYPE="hidden" NAME="formhash" value="<?php echo formhash();?>">
<div id="div_ptype">
<table class="ListProduct" border="0" cellspacing="0" cellpadding="0" width="100%">
<thead>
<tr>
<th style="width:70px;">显示顺序</th>
<th style="width:200px;">主菜单名称</th>
<th>触发关键字</th>
<th>链接地址</th>
<th style="width:50px;">启用</th>
<th style="width:120px;">操作</th>
</tr>
</thead>
                    
                      
<tbody>
<?php 
$j=0;
if(!empty($infolist)){foreach($infolist as $k=>$v){
if($v['level']==0)
{
	$j++;
}
?>
<tr id="<?php echo $v['layer'];?>" class="<?php echo $v['parent'];?>">
<td><input type="text" name="sortorder[<?php echo $v['layer'];?>]" style="width:90%" class="px" value="<?php echo $v['sortorder'];?>"></td>
<td><input type="text" name="title[<?php echo $v['layer'];?>]" style="width:<?php echo 90-$v['level']*30;?>%;float:right;" class="px" value="<?php echo $v['menu_name'];?>"></td>
<td><input type="text" name="key[<?php echo $v['layer'];?>]" style="width:90%" class="px" value="<?php echo $v['menu_key'];?>"></td>
<td><input type="text" name="url[<?php echo $v['layer'];?>]" style="width:90%" class="px" value="<?php echo $v['menu_url'];?>"></td>
<td><input type="checkbox" name="status[<?php echo $v['layer'];?>]" value="1"></td>
<td class="norightborder"><?php if($v['level']==0){?><a href="javascript:deleteParent('<?php echo $v['parent'];?>');">删除</a> <a href="javascript:addPic(1,'<?php echo $v['parent'];?>');">添加子菜单</a><?php } else{?><a href="javascript:deleteChild('<?php echo $v['layer'];?>');">删除</a><?php }?></td>
</tr>
<?php }}?>
<tr id="piclist"><td colspan="6"><button type="submit" name="button" class="btnGreen left">保存</button></td></tr>

</tbody>
</table>
</div>
</div>
</form>
<script type="text/javascript">
<!--
	i=0;
	j=<?php echo $j;?>;
	function addPic(l,p)
	{
		if(l>0)
		{
			i++;
			html='<tr id="'+p+'-'+i+'" class="'+p+'"><td><input type="text" name="sortorder['+p+'-'+i+']" style="width:90%" class="px" value=""></td><td><input type="text" class="px" name="title['+p+'-'+i+']" style="width:60%;float:right;" value=""></td><td><input type="text" class="px" style="width:90%" name="key['+p+'-'+i+']" value=""></td><td><input type="text" style="width:90%" class="px" name="url['+p+'-'+i+']" value=""></td><td><input type="checkbox" name="status['+p+'-'+i+']"></td><td class="norightborder"><a href="javascript:deleteChild(\''+p+'-'+i+'\');">删除</a></td></tr>';
			jq('#'+p).after(html);
		}
		else
		{
			j++;
			html='<tr id="'+j+'" class="'+j+'"><td><input type="text" name="sortorder['+j+']" style="width:90%" class="px" value=""></td><td><input type="text" class="px" name="title['+j+']" style="width:90%;float:right;" value=""></td><td><input type="text" class="px" style="width:90%" name="key['+j+']" value=""></td><td><input type="text" style="width:90%" class="px" name="url['+j+']" value=""></td><td><input type="checkbox" name="status['+j+']"></td><td class="norightborder"><a href="javascript:deleteParent(\''+j+'\');">删除</a>&nbsp;&nbsp;<a href="javascript:addPic(1,\''+j+'\');">添加子菜单</a></td></tr>';
			jq('#piclist').before(html);
		}
		
	}
	function deleteChild(obj)
	{
		if(confirm('删除后不可恢复，确认删除？'))
		{
			jq('#'+obj).remove();
		}
	}
	function deleteParent(obj)
	{
		if(confirm('子菜单将一并删除，删除后不可恢复，确认删除？'))
		{
			jq('.'+obj).remove();
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