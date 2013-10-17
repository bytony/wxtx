<?php include bidcms_template("header");?>
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
          <div class="cLineB"><h4>添加微信公众号</h4></div>
          <form method="post" action="index.php">
		 <input type="hidden" name="act" value="extmodify">
		 <input type="hidden" name="con" value="user">
		 <input type="hidden" name="commit" value="1">
		 <INPUT TYPE="hidden" NAME="formhash" value="<?php echo formhash();?>">
		<input type="hidden" name="updateid" value="<?php echo $updateid;?>">
          <div class="msgWrap">
            <table class="userinfoArea" border="0" cellspacing="0" cellpadding="0" width="100%">
              <tbody>
				<tr>
                  <th>地区</th>
                  <td>
                  <script src="views/js/pcasunzip.js" type="text/javascript"></script>
				  <div>
				  省: <select name="myprovince" id="Province"></select>
				   市: <select name="mycity" id="City"></select>
				   区: <select name="myarea" id="Area"></select>
				</div>
				<script type="text/javascript">
				<!--
					new PCAS("Province","City","Area","<?php echo $userinfo['weixin_province'];?>","<?php echo $userinfo['weixin_city'];?>","<?php echo $userinfo['weixin_area'];?>");
				//-->
				</script>
                  </td>
                </tr>
                
				<tr>
                  <th>账号评级：</th>
                  <td><input type="text" required="" name="level" value="<?php echo $userinfo['weixin_level'];?>" class="px" tabindex="1" size="25"></td>
                </tr>
				<tr>
                  <th>二维码地址：</th>
                  <td><input type="text" required="" name="qecode" value="<?php echo $userinfo['weixin_qe'];?>" class="px" tabindex="1" style="width:300px"></td>
                </tr>
				<tr>
                  <th>粉丝数：</th>
                  <td><input type="text" required="" name="wxfans" value="<?php echo $userinfo['weixin_fans'];?>" class="px" tabindex="1" size="25"></td>
                </tr>
                <tr>
                  <th>类型：</th>
                  <td><select id="type" name="type">
                   <option value="0">选择类型</option>
				   <?php foreach($GLOBALS['cate'] as $k=>$v){?>
                  <option value="<?php echo $k;?>" <?php echo $k==$userinfo['weixin_type']?'selected':'';?>><?php echo $v;?></option>
				  <?php }?>
                  </select></td>
                </tr>
				
				<tr>
                  <th>账号介绍：</th>
                  <td><textarea class="px" name="content" style="width:600px; height:100px;" maxlength="300"><?php echo $userinfo['weixin_content'];?></textarea></td>
                </tr>
                 <tr>
                  <th>图文页统计代码：</th>
                  <td><textarea class="px" name="tongji" style="width:600px; height:100px;" maxlength="300"><?php echo $userinfo['weixin_statistics'];?></textarea><br>建议使用<a href="http://www.cnzz.com/">站长站</a>，或者<a href="http://www.51.la/">51统计</a>,不超过300字符<br>例如&lt;img src="http://shopweb.51.la/8/3/83711.asp" /&gt;</td>
                </tr>
				</tbody>
                <tr>
                  <th></th>
                  <td><button type="submit" class="btnGreen" id="saveSetting">完善信息</button></td>
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
<li class="subCatalogList"> <a href="bbs/home.php?mod=spacecp">个人资料</a> </li>
<li class="subCatalogList"> <a href="index.php?con=user">我的公众号</a></li>
<li class="selected"> <a href="index.php?con=user&act=modify">添加公众号</a> </li>

            </ul>
          </div>
        </div>        
        <div class="clr"></div>
      </div>
    </div>
  </div>
  <!--底部-->
  	</div>
<?php include bidcms_template("footer");?>