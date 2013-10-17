<input type="input" class="px" id="keyword" style="width:200px"><a href="javascript:domattch();" class="btnGray vm" style="padding-top:3px;padding-bottom:3px;">添加</a><div>可添加多个关键词</div>
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
			str="<div id='key"+i+"' class='keys'><input type='text' name='keywords[key"+i+"]' value='"+kwords.value+"'/> <input type='checkbox'  name='matchs[key"+i+"]' value='1'/> 开启全匹配&nbsp;&nbsp;接口：<select name='api_type[key"+i+"]'><option value='0' selected>本站<option value='1'>第三方</select>&nbsp;&nbsp;<span onclick='removeKey(\"key"+i+"\")'>清除</span></div>";
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
  <div id="mattch"><?php if(!empty($info_keywords)){foreach($info_keywords as $k=>$v){?><div id='oldkey<?php echo $k;?>' class='keys'><input type='text' name='keywords[oldkey<?php echo $k;?>]' value='<?php echo $v['keyword'];?>'/> <input type='checkbox'  name='matchs[oldkey<?php echo $k;?>]' <?php echo $v['mattch']==1?'checked':'';?> value='1'/> 开启全匹配&nbsp;&nbsp;接口：<select name='api_type[oldkey<?php echo $k;?>]'><option value='0' <?php echo $v['api_type']==0?'selected':'';?>>本站<option value='1'  <?php echo $v['api_type']==1?'selected':'';?>>第三方</select>&nbsp;&nbsp;<span onclick='removeKey("oldkey<?php echo $k;?>")'>清除</span></div><?php }}?></div>