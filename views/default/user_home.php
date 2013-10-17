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
		<div class="usercontent">
		<ul>
		<li>
		<div class="vipuser" style="width:142px; height: 45px; padding: 10px;">
		<div class="logo">
		<a href="bbs/home.php?mod=spacecp&amp;ac=profile"><?php echo avatar($_G['uid'],'small');?></a>
		</div>
		<div id="nickname"><strong><?php echo $_G['username'];?></strong></div>
		<div><a href="bbs/home.php?mod=spacecp&amp;ac=profile&amp;op=password">修改密码</a>　</div>
		<div class="clr"></div>
		</div>
		</li>
	<!-- 	<li><a href="bbs/home.php?mod=spacecp&amp;ac=credit&amp;op=base" class="gold" title="查看金币历史记录"><p><strong>账户金币总数：</strong><?php echo getuserprofile('extcredits4');?></p><p>已消费金币数：<?php echo getuserprofile('extcredits5');?></p></a></li>
		<li><a href="bbs/home.php?mod=spacecp&amp;ac=credit&amp;op=buy" title="支付宝在线充值" class="goldbuy">支付宝在线充值</a></li>
		<li><a href="http://www.im
      .com/home.php?mod=spacecp&amp;ac=promotion" title="推广赚金币" class="goldwinning">推广赚金币</a></li> -->
		<li><div class="qqqun" title="官网QQ群96841988"></div></li>
		<li class="addli"><a class="addwx" title="添加微信公众号" onclick="location.href='index.php?con=user&act=modify';">添加微信公众号</a></li>
		<div class="addwxinfo"><p>你可以创建 5 个号，已创建 <?php echo count($infolist);?> 个</p><p>每消费100RMB可以多创建1个号</p></div>			
		</ul>
        <div class="clr"></div>
      </div>
  

          
          <div class="msgWrap">
            <table class="ListProduct" border="0" cellspacing="0" cellpadding="0" width="100%">
              <thead>
                <tr>
                  <th>公众号名称</th>
                  <th>VIP等级</th>
                  <th>创建时间/到期时间</th>
                   <th>已定义/上限</th>
                   <th>请求数</th>
                    <th>剩余付费资源</th>
   <th>本月状态</th>
                  <th>操作</th>
                </tr>
              </thead>
              <tbody>
                <tr></tr>
                
                <?php foreach($infolist as $k=>$v){?>
                <tr>
                  <td><p><img src="<?php echo $v['weixin_avatar'];?>" height="40"></p><p><?php echo $v['weixin_name'];?></p></td>
                  <td align="center"><?php echo $v['vip_level'];?></td>
                  <td><p>创建时间:<?php echo date('Y-m-d',$v['starttime']);?></p><p>到期时间:<?php echo date('Y-m-d',$v['lasttime']);?></p><p><a href="javascript:void(0)" onclick="showWindow(this.id,'index.php?con=ajax&act=updatevip&id=<?php echo $v['id'];?>&rand='+Math.random(), 'get', 0);" id="smemberss" class="green"><em>升降级vip续费</em></a></p></td>
                  <td><p>文本：<?php echo 2000-$v['text_count'];?>/2000</p><p>图文：<?php echo 2000-$v['image_count'];?>/2000</p><p>语音：<?php echo 2000-$v['audio_count'];?>/2000</p></td>
                   <td><p>总请求数:<?php echo $v['all_send'];?></p><p> 本月请求数:<?php echo $v['month_send'];?></p></td>
                   <td><p>付费资源剩余：<?php echo $v['price_count'];?></p><p><a href="javascript:void(0)" onclick="showWindow(this.id,'index.php?con=ajax&act=requestcount&id=<?php echo $v['id'];?>&rand='+Math.random(), 'get', 0);" id="smembers" class="green"><em>购买请求数</em></a></p></td>
   <td><p>赠送总量：<?php echo $v['given_count'];?></p><p>免费资源数剩余：<?php echo $v['free_count'];?></p></td>
                  <td class="norightborder"><a href="index.php?con=user&act=extmodify&updateid=<?php echo $v['id'];?>">完善</a>　<a href="index.php?con=user&act=modify&updateid=<?php echo $v['id'];?>">编辑</a>　<a href="index.php?con=user&act=del&updateid=<?php echo $v['id'];?>" onclick="return confirm('确认删除帐号？');">删除</a>　<a href="index.php?con=user&act=app&wxid=<?php echo $v['weixin_id'];?>" target="_blank" class="btnGreens">功能管理</a></td>
                </tr>
                                 
			 <?php }?>
              </tbody>
            </table>
            
          </div>
          
          <div class="cLine">
            <div class="pageNavigator right">
              <div class="pages"></div>
            </div>
            <div class="clr"></div>
          </div>
        </div>
        
        <!--左侧功能菜单-->
        <div class="sideBar">
          <div class="catalogList">
            <ul>
            	<li class="subCatalogList"> <a href="bbs/home.php?mod=spacecp">个人资料</a> </li>
<li class="selected"> <a href="index.php?con=user">我的公众号</a></li>
<li class=" subCatalogList "> <a href="index.php?con=user&act=modify">添加公众号</a> </li>
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