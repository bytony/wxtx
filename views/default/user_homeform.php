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
		 <input type="hidden" name="act" value="modify">
		 <input type="hidden" name="con" value="user">
		 <input type="hidden" name="commit" value="1">
		 <INPUT TYPE="hidden" NAME="formhash" value="<?php echo formhash();?>">
		<input type="hidden" name="updateid" value="<?php echo $updateid;?>">
          <div class="msgWrap">
            <table class="userinfoArea" border="0" cellspacing="0" cellpadding="0" width="100%">
              <tbody>
				<tr>
                  <th>公众号名称：</th>
                  <td><input type="text" required="" class="px" name="wxname" value="<?php echo $userinfo['weixin_name'];?>" tabindex="1" size="25"> 比如：微信机器人
                  </td>
                </tr>
                <tr>
                  <th>公众号原始id：</th>
                  <td><input type="text" required="" name="wxid" value="<?php echo $userinfo['weixin_id'];?>" onmouseup="this.value=this.value.replace('_430','')" class="px" tabindex="1" size="25">　比如：gh_423dwjkeww3 <a href="bbs/forum.php?mod=viewthread&amp;tid=6&amp;extra=page%3D1" target="_blank"><img src="static/theme/default/img/index/help.png" class="vm" title="帮助"></a></td>
                </tr>
                <tr>
                  <th>微信号：</th>
                  <td><input type="text" required="" name="weixin" value="<?php echo $userinfo['weixin_num'];?>" class="px" tabindex="1" size="25">　比如：im61 </td>
                </tr>
                <tr>
                  <th>头像地址（url）:</th>
                  <td><br><?php if(!empty($userinfo['weixin_avatar'])){?><img src="<?php echo $userinfo['weixin_avatar'];?>" id="hdpic" ><br><?php }?><input class="px" name="headerpic" value="<?php echo $userinfo['weixin_avatar'];?>" onchange="document.getElementById('hdpic').src=this.value" size="60"> <a href="bbs/forum.php?mod=viewthread&tid=31" target="_blank"><img src="static/theme/default/img/index/help.png" class="vm" title="帮助"></a></td>
                </tr>
                <tr>
                  <th id="headpic">首页封面图片（url）:</th>
                  <td><br><?php if(!empty($userinfo['weixin_home'])){?><img src="<?php echo $userinfo['weixin_home'];?>" id="homepic" ><br><?php }?><input class="px" name="homepic" value="<?php echo $userinfo['weixin_home'];?>" onchange="document.getElementById('homepic').src=this.value" size="60"> <a href="bbs/forum.php?mod=viewthread&tid=31" target="_blank"><img src="static/theme/default/img/index/help.png" class="vm" title="帮助"></a></td>
                </tr>
                <tr>
                  <th>接口地址</th>
                  <td><input type="text" name="apiurl" value="<?php echo empty($userinfo['weixin_api'])?'http://bidcms.duapp.com/wxapi.php':$userinfo['weixin_api'];?>" class="px" tabindex="1" size="40">　<a href="bbs/forum.php?mod=viewthread&tid=29" target="_blank"><img src="static/theme/default/img/index/help.png" class="vm" title="帮助"></a>http://你自己域名/wxapi.php也可以使用默认地址 </td>
                </tr>
                <!--<tr>
                  <th>第三方接口地址</th>
                  <td><input type="text" name="userapiurl" value="<?php echo $userinfo['weixin_user_api'];?>" class="px" tabindex="1" size="40">　此处的地址用于在第三方接口开启后，回复信息时会优先从些接口获取内容 <a href='#'>查看接口配置规则</a> </td>
                </tr>-->
                 <tr>
                  <th>TOKEN</th>
                  <td><input type="text" name="token" value="<?php echo !empty($userinfo['weixin_token'])?$userinfo['weixin_token']:'weixin';?>" class="px" tabindex="1" size="40">　此处token和中转接口以及腾讯平台必须一致，为保证你的资源不被他人盗用，可以自己将中转接口的token值改为当前你设定的值!</td>
                </tr>
				<tr>
                  <th>公众号QQ：</th>
                  <td><input type="text" required="" class="px" tabindex="1" value="<?php echo $userinfo['weixin_qq'];?>" name="qq" size="25"></td>
                </tr>
				<tr>
                  <th>官方微博：</th>
                  <td><input type="text" required="" class="px" tabindex="1" value="<?php echo $userinfo['weixin_weibo'];?>" name="weibo" size="25"></td>
                </tr>
                </tbody>
				
                <tr>
                  <th></th>
                  <td><button type="submit" class="btnGreen" id="saveSetting">保存</button></td>
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