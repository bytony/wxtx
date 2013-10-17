<?php include "header.php";?>
<div id="aaa"></div>

<div id="wp" class="wp"><link href="index/css/style.css" rel="stylesheet" type="text/css">

 
  <!--中间内容-->
  <div class="contentmanage">
    <div class="developer">
       <div class="appTitle normalTitle" style="padding: 20px;">
        <h2>管理平台</h2>
        <div class="accountInfo">
         
        </div>
        <div class="clr"></div>
      </div>
      <div class="tableContent">
        <div class="content">
          <div class="cLineB"><h4>请如实填写您的个人信息<span class="FAQ"></span></h4></div>
          <form method="post" action="index.php?ac=editinfo" enctype="multipart/form-data">
          <div class="msgWrap">
            <table class="userinfoArea" border="0" cellspacing="0" cellpadding="0" width="100%">
              <thead>
                <tr>
                  <th><span class="red">*</span><label for="name">真实姓名：</label></th>
                  <td><input type="input" class="px" id="name" value="" name="name">
                  </td>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <th><span class="red">*</span><label for="tel">联系电话</label></th>
                  <td><input type="input" class="px" id="tel" value="" name="tel">　为确保消息畅通，请确认联系电话填写无误。</td>
                </tr>
                <tr>
                	<th><span class="red">*</span><label for="QQ">常用QQ号码</label></th>
                	<td><input type="input" class="px" id="QQ" value="" name="QQ">　为确保消息畅通，请确认QQ号码填写无误。</td>
                	</tr>
                  <tr>
                  	<th><span class="red">*</span>所在地区</th>
                  	<td>
                  		<script src="index/js/jsAddress.js" type="text/javascript"></script><div>
                  			省：<select id="Select1" name="province"><option value="北京">北京</option><option value="上海">上海</option><option value="天津">天津</option><option value="重庆">重庆</option><option value="四川">四川</option><option value="贵州">贵州</option><option value="云南">云南</option><option value="西藏">西藏</option><option value="河南">河南</option><option value="湖北">湖北</option><option value="湖南">湖南</option><option value="广东">广东</option><option value="广西">广西</option><option value="陕西">陕西</option><option value="甘肃">甘肃</option><option value="青海">青海</option><option value="宁夏">宁夏</option><option value="新疆">新疆</option><option value="河北">河北</option><option value="山西">山西</option><option value="内蒙古">内蒙古</option><option value="江苏">江苏</option><option value="浙江">浙江</option><option value="安徽">安徽</option><option value="福建">福建</option><option value="江西">江西</option><option value="山东">山东</option><option value="辽宁">辽宁</option><option value="吉林">吉林</option><option value="黑龙江">黑龙江</option><option value="海南">海南</option><option value="台湾">台湾</option><option value="香港">香港</option><option value="澳门">澳门</option></select>
                  			市：<select id="Select2" name="city"><option value="市辖区">市辖区</option><option value="县">县</option></select>
                  			区：<select id="Select3" name="county"><option value="东城区">东城区</option><option value="西城区">西城区</option><option value="崇文区">崇文区</option><option value="宣武区">宣武区</option><option value="朝阳区">朝阳区</option><option value="丰台区">丰台区</option><option value="石景山区">石景山区</option><option value="海淀区">海淀区</option><option value="门头沟区">门头沟区</option><option value="房山区">房山区</option><option value="通州区">通州区</option><option value="顺义区">顺义区</option><option value="昌平区">昌平区</option><option value="大兴区">大兴区</option><option value="怀柔区">怀柔区</option><option value="平谷区">平谷区</option></select>
                  			<script type="text/javascript">
addressInit('Select1', 'Select2', 'Select3',"","","");
</script>
                  			</div>
                  		</td>
                  	</tr>
                <tr></tr>
                 <tr>
                 	<th></th>
                 	<td><button type="submit" name="button" class="btnGreen">提交</button></td>
                 	</tr>
              </tbody>
            </table>
            
          </div>
          </form>
          
        </div>
        
        <!--左侧功能菜单-->
<div class="sideBar">
          <div class="catalogList">
            <ul>
            <li class="selected"> <a href="index.php?ac=editinfo">个人资料</a> </li>
<li class="subCatalogList"> <a href="index.php?ac=home">我的公众号 ()</a> </li>
<li class="subCatalogList"> <a href="index.php?ac=addwx">添加公众号</a> </li>

            </ul>
          </div>
        </div>        
        <div class="clr"></div>
      </div>
    </div>
  </div>
  <!--底部-->
  	</div>
<?php include "footer.php";?>