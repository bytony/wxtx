<?php include "header.php";?>
<div id="aaa"></div>

<div id="wp" class="wp"><link href="index/css/style.css" rel="stylesheet" type="text/css">

 
<script src="index/js/jquery.min.js" type="text/javascript"></script>


 <!--中间内容-->
<div class="contentmanage">
    <div class="developer">
       <div class="appTitle normalTitle2">
        <?php include bidcms_template("user_top");?>
        <div class="clr"></div>
      </div> 
      <div class="tableContent">
      	
        <div class="content">
          <div class="cLineB"><h4>配置手机淘宝客<span class="FAQ">必须先配置好手机淘宝客后才能获取推广链接。</span></h4><a href="http://bidcms.duapp.com/wxapi.php?ac=taobao&amp;tid=3699" target="_blank" class="right btnGrayS vm" style="margin-top:-27px">查看淘客页</a></div> 
<div class="msgWrap">
                        <input type="hidden" value="3699" name="id">
<table class="userinfoArea" style=" margin:20px 0 0 0;" border="0" cellspacing="0" cellpadding="0" width="100%">
  <tbody>
                          <tr>
  <th valign="top"><label for="appkey">appkey：</label></th>
  <td><input type="input" class="px" id="appkey" value="" name="appkey" style="width:260px"><a href="forum.php?mod=viewthread&amp;tid=173&amp;extra=page%3D1" target="_blank"><img src="static/theme/default/img/index/help.png" class="vm" title="帮助"></a><br>
                 </td>
</tr>
<tr>
  <th valign="top"><label for="secretKey">secretKey：</label></th>
  <td><input type="input" class="px" id="secretKey" value="" name="secretKey" style="width:260px"><br>
                  </td>
</tr>
                            <tr style="display:none">
  <th valign="top"><label for="cid">默认类目：</label></th>
  <td>
                  </td>
</tr>
                              <tr>
  <th valign="top"><label for="dfkey">默认关键词：</label></th>
  <td><input type="input" class="px" id="dfkey" value="" name="dfkey" style="width:120px">
                  </td>
</tr>
                            <tr>
  <th valign="top"><label for="StartCouponRate">最低折扣率：</label></th>
  <td><input type="input" class="px" id="StartCouponRate" value="" name="StartCouponRate" style="width:260px">2000标准折扣20%
                  </td>
</tr>
                            <tr>
  <th valign="top"><label for="EndCouponRate">最高折扣率：</label></th>
  <td><input type="input" class="px" id="EndCouponRate" value="" name="EndCouponRate" style="width:260px">8000标准折扣 80%
                  </td>
</tr>
                             <tr>
  <th valign="top"><label for="StartCredit">店铺信誉最低级别：</label></th>
  <td><select name="StartCredit"> 
                   
                        
                                    <option value="1heart">一心</option>
                        
                     <option value="2heart">两心</option>
                        
                     <option value="3heart">三心</option>
 		     <option value="4heart">四心</option>
                        
                     <option value="5heart">五心</option>
                        
                     <option value="1diamond">一钻</option>
                        
                     <option value="2diamond">两钻</option>
                        
                     <option value="3diamond">三钻</option>
 		     <option value="4diamond">四钻</option>
                        
                     <option value="5diamond">五钻</option>
  <option value="1crown">一冠</option>
                        
                     <option value="2crown">两冠</option>
                        
                     <option value="3crown">三冠</option>
 		     <option value="4crown">四冠</option>
                        
                     <option value="5crown">五冠</option>
                     <option value="1goldencrown">一黄冠</option>
                        
                     <option value="2goldencrown">两黄冠</option>
                        
                     <option value="3goldencrown">三黄冠</option>
 		     <option value="4goldencrown">四黄冠</option>
                        
                     <option value="5goldencrown">五黄冠</option>        
                    </select>

                  </td>
</tr>
                             <tr>
  <th valign="top"><label for="EndCredit">店铺信誉最高级别：</label></th>
  <td><select name="EndCredit"> 
                   
                        
                     <option value="1heart">一心</option>
                        
                     <option value="2heart">两心</option>
                        
                     <option value="3heart">三心</option>
 		     <option value="4heart">四心</option>
                        
                     <option value="5heart">五心</option>
                        
                     <option value="1diamond">一钻</option>
                        
                     <option value="2diamond">两钻</option>
                        
                     <option value="3diamond">三钻</option>
 		     <option value="4diamond">四钻</option>
                        
                     <option value="5diamond">五钻</option>
  <option value="1crown">一冠</option>
                        
                     <option value="2crown">两冠</option>
                        
                     <option value="3crown">三冠</option>
 		     <option value="4crown">四冠</option>
                        
                     <option value="5crown">五冠</option>
                     <option value="1goldencrown">一黄冠</option>
                        
                     <option value="2goldencrown">两黄冠</option>
                        
                     <option value="3goldencrown">三黄冠</option>
 		     <option value="4goldencrown">四黄冠</option>
                        
                     <option value="5goldencrown">五黄冠</option>           
                    </select>  
                  </td>
</tr>
                             <tr>
  <th valign="top"><label for="StartCommissionRate">起始佣金比率：</label></th>
  <td><input type="input" class="px" id="StartCommissionRate" value="" name="StartCommissionRate" style="width:260px">建议填写500 起始佣金比率选项，如：1234表示12.34% 
                  </td>
</tr>
                              <tr>
  <th valign="top"><label for="EndCommissionRate">最高佣金比率：</label></th>
  <td><input type="input" class="px" id="EndCommissionRate" value="" name="EndCommissionRate" style="width:260px"> 建议填写5000 起始佣金比率选项，如：5000表示50.00% 
                  </td>
</tr>
                             <tr>
  <th valign="top"><label for="desc">默认排序：</label></th>
  <td><select name="desc"> 
                     <option value="default">默认排序</option>
                        
                     <option value="price_desc">折扣价格从高到低</option>
                        
                     <option value="price_asc">折扣价格从低到高</option>
 		     <option value="credit_desc">信用等级从高到低</option>
                        
                     <option value="credit_asc">信用等级从低到高</option>
                     <option value="commissionRate_desc">佣金比率从高到低</option>
                     <option value="commissionRate_asc">佣金比率从低到高</option>
                     <option value="volume_desc">成交量成高到低</option>
                     <option value="volume_asc">成交量从低到高</option>        
                    </select>  default(默认排序), price_desc(折扣价格从高到低), price_asc(折扣价格从低到高), credit_desc(信用等级从高到低), credit_asc(信用等级从低到高), commissionRate_desc(佣金比率从高到低), commissionRate_asc(佣金比率从低到高), volume_desc(成交量成高到低), volume_asc(成交量从低到高) 
                  </td>
</tr>
                              		<tr>
  <th></th>
  <td><button type="submit" name="button" onclick="alert('没达到vip2级,无法使用此功能') " class="btnGreen left">保存</button>　<a href="index.php?ac=mp3list&amp;id=3699" class="btnGray vm">取消</a>
  <div class="clr"></div>
</td>
</tr>
  </tbody>

</table>
 
      
  
<div class="cLineB" style="margin-top:10px"><h4>获取推广链接<span class="FAQ">可以生成N个推广链接，结合3G网站和图文功能，可以发挥更好的效果。</span></h4></div> 
<div class="msgWrap">
<table class="userinfoArea" style=" margin:20px 0 0 0;" border="0" cellspacing="0" cellpadding="0" width="100%">
<tbody>
<tr>
<th>类目推广url生成：</th>
<td><select onchange="sccid(this.value)" name="cat"><option selected="" value="0">所有分类</option><option value="50008907">手机号码/套餐/增值业务</option><option value="99">网络游戏点卡</option><option value="23">古董/邮币/字画/收藏</option><option value="50007216">鲜花速递/花卉仿真/绿植园艺</option><option value="50004958">移动/联通/电信充值中心</option><option value="50005700">品牌手表/流行手表</option><option value="50011740">流行男鞋</option><option value="16">女装/女士精品</option><option value="50006843">女鞋</option><option value="50006842">箱包皮具/热销女包/男包</option><option value="1625">女士内衣/男士内衣/家居服</option><option value="50010404">服饰配件/皮带/帽子/围巾</option><option value="50011397">珠宝/钻石/翡翠/黄金</option><option value="28">ZIPPO/瑞士军刀/眼镜</option><option value="33">书籍/杂志/报纸</option><option value="34">音乐/影视/明星/音像</option><option value="50017300">乐器/吉他/钢琴/配件</option><option value="29">宠物/宠物食品及用品</option><option value="2813">成人用品/避孕/计生用品</option><option value="50012029">运动鞋new</option><option value="50013864">饰品/流行首饰/时尚饰品新</option><option value="50018252">电子凭证</option><option value="50014442">交通票</option><option value="50014811">网店/网络服务/软件</option><option value="50016891">网游垂直市场根类目</option><option value="50023724">其他</option><option value="50017652">TP服务商大类</option><option value="50019379">合作商家</option><option value="50023575">房产/租房/新房/二手房/委托服务</option><option value="50023717">OTC药品/医疗器械/隐形眼镜/计生用品</option><option value="50023878">自用闲置转让</option><option value="50024186">保险</option><option value="50024449">淘花娱乐</option><option value="50024451">外卖/外送/订餐服务</option><option value="50024612">外卖/外送/订餐服务（垂直市场）</option><option value="50024971">新车/二手车</option><option value="50025004">个性定制/设计服务/DIY</option><option value="50025110">电影/演出/体育赛事</option><option value="50025111">本地化生活服务</option><option value="50025705">洗护清洁剂/卫生巾/纸/香薰</option><option value="50025968">司法拍卖拍品专用</option><option value="50026316">茶/酒/冲饮</option><option value="50023804">装修设计</option><option value="50026523">休闲娱乐/购物卡</option><option value="50026800">保健品/膳食营养补充剂</option><option value="50050359">水产肉类/新鲜蔬果/熟食</option><option value="26">汽车/用品/配件/改装/摩托</option><option value="50020808">家居饰品</option><option value="50020857">特色手工艺</option><option value="50025707">景点门票/度假线路/旅游服务</option><option value="30">男装</option><option value="50008164">住宅家具</option><option value="50020611">商业/办公家具</option><option value="50023904">国货精品数码</option><option value="50010788">彩妆/香水/美妆工具</option><option value="1801">美容护肤/美体/精油</option><option value="50023282">美发护发/假发</option><option value="1512">手机</option><option value="14">数码相机/单反相机/摄像机</option><option value="1201">MP3/MP4/iPod/录音笔</option><option value="1101">笔记本电脑</option><option value="50019780">平板电脑/MID</option><option value="50018222">台式机/一体机/服务器</option><option value="11">电脑硬件/显示器/电脑周边</option><option value="50018264">网络设备/网络相关</option><option value="50008090">3C数码配件</option><option value="50012164">闪存卡/U盘/存储/移动硬盘</option><option value="50007218">办公设备/耗材/相关服务</option><option value="50018004">电子词典/电纸书/文化用品</option><option value="20">电玩/配件/游戏/攻略</option><option value="50022703">大家电</option><option value="50011972">影音电器</option><option value="50012100">生活电器</option><option value="50012082">厨房电器</option><option value="50002768">个人护理/保健/按摩器材</option><option value="27">家装主材</option><option value="50020332">基础建材</option><option value="50020485">五金/工具</option><option value="50020579">电子/电工</option><option value="50011949">特价酒店/特色客栈/公寓旅馆</option><option value="21">居家日用/婚庆/创意礼品</option><option value="50016349">厨房/餐饮用具</option><option value="50016348">清洁/卫浴/收纳/整理用具</option><option value="50008163">床上用品/布艺软饰</option><option value="35">奶粉/辅食/营养品</option><option value="50014812">尿片/洗护/喂哺/推车床</option><option value="50022517">孕妇装/孕产妇用品/营养</option><option value="50008165">童装/童鞋/亲子装</option><option value="50020275">传统滋补营养品</option><option value="50002766">零食/坚果/特产</option><option value="50016422">粮油米面/南北干货/调味品</option><option value="50008075">餐饮美食/面包券</option><option value="40">腾讯QQ专区</option><option value="50010728">运动/瑜伽/健身/球迷用品</option><option value="50013886">户外/登山/野营/旅行用品</option><option value="50011699">运动服/运动包/颈环配件</option><option value="25">玩具/模型/动漫/早教/益智</option><option value="50011665">网游装备/游戏币/帐号/代练</option></select></td>
</tr>
<tr>
<th>关键词：</th>
<td><input type="text" value="输入关键词" class="px" onchange="sckey(this.value)" id="key"></td>
</tr>
<tr>
<th>推广链接：</th>
<td><script>
function sccid(cid){

document.getElementById("out").innerHTML='<a href="http://bidcms.duapp.com/wxapi.php?ac=taobao&tid=3699&c='+cid+'"  target="_blank" class="green">http://bidcms.duapp.com/wxapi.php?ac=taobao&tid=3699&c='+cid+'</a>';
}

function sckey(key){
key = encodeURIComponent(key);
document.getElementById("out").innerHTML='<a href="http://bidcms.duapp.com/wxapi.php?ac=taobao&tid=3699&k='+key+'"  target="_blank"  class="green">http://bidcms.duapp.com/wxapi.php?ac=taobao&tid=3699&k='+key+'</a>';
}
</script>
<div id="out"></div></td>
</tr>
</tbody>
</table>
  



  </div> 
</div>
        </div>
       

      
        <!--左侧功能菜单-->
 <div class="sideBar">
          <div class="catalogList">
  <ul>
  <div class="nav-header notopborder">基础设置</div>
               <li class="subCatalogList"> <a href="index.php?ac=fun&amp;id=3699">功能管理</a> </li>
              
                  	<li class="subCatalogList"> <a href="index.php?ac=focus&amp;id=3699">关注时自动回复</a> </li>
                	<li class="subCatalogList"> <a href="index.php?ac=importtxt&amp;id=3699">文本自定义回复</a> </li>
                  
                <li class="subCatalogList"> <a href="index.php?ac=import&amp;id=3699">图文自定义回复</a> </li>
   <li class="subCatalogList"> <a href="index.php?ac=mp3list&amp;id=3699">语音自定义回复</a> </li>
                  <div class="nav-header">3G网站设置</div>
                    <li class="subCatalogList"> <a href="index.php?ac=catemanage&amp;id=3699">文章分类管理</a> </li>
                    
                      <li class="subCatalogList"> <a href="index.php?ac=style&amp;id=3699">模板管理</a> </li>
                       <div class="nav-header">VIP功能</div>
                       <li class="selected "> <a href="index.php?ac=taobaoke&amp;id=3699">淘宝客配置</a> </li>

 <li class="subCatalogList"> <a href="index.php?ac=apilist&amp;id=3699">融合第三方接口</a> </li>
 
 <div class="nav-header">推广活动<span>以下功能还在设计中，勿问！</span></div>
 <li class="subCatalogList"> <a href="index.php?ac=activity-coupon-list&amp;id=3699">优惠券</a> </li>
 <li class="subCatalogList"> <a href="index.php?ac=activity-scratch-card-list&amp;id=3699">刮刮卡</a> </li>
 <li class="subCatalogList"> <a href="index.php?ac=activity-lottery-list&amp;id=3699">幸运大转盘</a> </li>
 
 <div class="nav-header">统计分析</div>
 <li class="subCatalogList"> <a href="index.php?ac=RequestDetails&amp;id=3699">帐号请求数详情</a> </li>
             
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