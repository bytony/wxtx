<?php include bidcms_template("header");?>
<div id="aaa"></div>

<div id="wp" class="wp">
<style type="text/css">
<!--
.main{float: left;}

#table {width:900px;background:#ffffff; overflow:auto;}
.menubg{float: left;width:184px;background: url(static/theme/default/img/current-.gif) repeat-y 170px top;height: 600px;
    overflow-x: hidden;
    overflow-y: auto;
}
.menu0{width:170px;clear:both;
float: left;
}
.menu0 div{
display:block;
float:left;
padding:4px 0px 5px 0px;
display:block;
width:170px;
text-align: left;
text-indent: 15px;
cursor:pointer;
color:  #000000;
border-bottom: 1px solid #EEEEEE;
font-size:14px;
}
.menu0 div.hover{
display:block;
float:left;
padding:4px 0px 5px 0px;
display:block;
text-align: left;
text-indent: 15px;
cursor:pointer;
color: #FFFFFF;
text-shadow: 0 1px 1px #467809;
font-weight:  bold;
width:184px;
border-bottom: 1px solid #FFFFFF;
background:#fff url(static/theme/default/img/current.gif) no-repeat right center;
}
#main0 div{margin:0px 20px 15px 18px;
display: none;text-decoration: none; word-wrap: break-word;
}
#main0 div.block{margin:22px 20px 15px 18px;
display: block;text-decoration: none;word-wrap: break-word;
}
h3{ font-size: 20px; color:#08a006}
.marginb{ margin-bottom:15px;display: block;width: 660px;}
#mediaplayer {
    background-color: #000000;
    color: #FFFFFF;
    height: 615px;
    position: relative;
    width: 820px;
top:0;
right:0;
}
.section p{padding-top:0;margin-top:0; font-size:16px;/*text-indent: 2em;*/}
-->
</style>
<script>
function setTab(m,n){
var tli=document.getElementById("menu"+m).getElementsByTagName("div");
var mli=document.getElementById("main"+m).getElementsByTagName("div");
for(i=0;i<tli.length;i++){
   tli[i].className=i==n?"hover":"";
   mli[i].style.display=i==n?"block":"none";
}
}
</script>
<!--中间内容-->
<div class="content">
        <div class="intro">
            <div class="normalTitle"><h2>微信机器人基本简介</h2></div>
            <div class="normalContent">
                <div class="section ">
                    <div>
                    	<img style="float:right;margin:0 0 15px 15px;" alt="微信公众号" src="static/theme/default/img/ewm2.jpg">
                        <p>
  微信机器人旨在帮助那些不懂技术的个人或企业建立属于自己的接口程序，让完全不懂技术的个人或企业通过简单的配置，即可拥有强大的功能。企业使用微信可以用低廉的成本实现智能客服机器人功能，淘宝店家可以轻松实现店铺商品和粉丝的关联与互动，我们也即将为微信地方号运维人员提供强大的地方运维的管理功能模块（如商家管理,店铺管理,会员管理,活动管理,优惠券管理,以及基于LBS的各种服务的开发!）</p><br>
                        <p>微信机器人不提供文章内容库，避免同质化的内容泛滥，同时微信对用户有门槛要求，必须拥有自己的域名空间。微信机器人为个人或企业提供了强大的自定义回复及图文信息分类功能，通过此功能能更好做出属于自己或企业特色的内容，并自动建立一个个人或企业手机3G网站，更好的服务于您的客户。</p><br>
<p>微信机器人还提供了一些便民查询和娱乐游戏功能供个人或企业使用，如：查天气，查快递，翻译，百科，人品计算，手机归属地查询，笑话，成语接龙，公交查询，谜语，百度问答，解梦，古诗欣赏等等，根据需求的不同选择某些功能，能更好的提高粉丝活跃度，忠诚度。</p><br>
<p>除了自定义库,也支持自定义关键词触发指定接口url处理业务(完美的兼容第三方微信接口和自己的业务接口)即可实现和你们自己的数据库的信息通信!  
                        </p>
                    </div>
                <p class="clr"></p>
            	</div>

<div class="section">
                    <div id="table">
                    <div class="menubg">
                        <div class="menu0" id="menu0">
                            <div class="hover" onclick="setTab(0,0)">1.天气查询(语音)</div>
                            <div class="" onclick="setTab(0,1)">2.快递查询</div>
                            <div class="" onclick="setTab(0,2)">3.手机归属地查询</div>
                            <div class="" onclick="setTab(0,3)">4.身份证查询</div>
                            <div class="" onclick="setTab(0,4)">5.公交查询</div>
                            <div class="" onclick="setTab(0,5)">6.火车查询</div>
                            <div class="" onclick="setTab(0,6)">7.健康指数查询</div>
                            <div class="" onclick="setTab(0,7)">8.实时翻译</div>
                            <div class="" onclick="setTab(0,8)">9.百度百科</div>
                            <div class="" onclick="setTab(0,9)">10.百度问答</div>
                            <div class="" onclick="setTab(0,10)">11.人品计算</div>
                            <div class="" onclick="setTab(0,11)">12.笑话</div>
                            <div class="" onclick="setTab(0,12)">13.糗事</div>
                            <div class="" onclick="setTab(0,13)">14.谜语</div>
                            <div class="" onclick="setTab(0,14)">15.解梦</div>
                            <div class="" onclick="setTab(0,15)">16.成语接龙</div>
                            <div class="" onclick="setTab(0,16)">17.成语字典</div>
                            <div class="" onclick="setTab(0,17)">18.陪聊</div>
                            <div class="" onclick="setTab(0,18)">19.机器人学习功能</div>
<div class="" onclick="setTab(0,19)">20.自定义图文回复</div>
<div class="" onclick="setTab(0,20)">21.藏头藏尾诗</div>
<div class="" onclick="setTab(0,21)">22.诗歌接龙</div>
<div class="" onclick="setTab(0,22)">23.诗歌赏析</div>
<div class="" onclick="setTab(0,23)">24.网络音乐搜索</div>
<div class="" onclick="setTab(0,24)">25.网络电影搜索</div>
<div class="" onclick="setTab(0,25)">26.文字转语音</div>
<div class="" onclick="setTab(0,26)">27.股票查询</div>
<div class="" onclick="setTab(0,27)">28.彩票查询</div>
<div class="" onclick="setTab(0,28)">29.英语4-6级(12年12月)</div>
                        </div>
                    </div>
                    <div class="main" id="main0">
                            <div style="display: block;">
                                <span class="marginb">
                                <h3>1.天气查询（语音播报天气）</h3>
                                <p>输入城市+天气，可以马上得到近五天的气情况，出行无忧。</p>
                                <p>例如：上海天气</p>
<p>备注：如果后台开启语音播报天气功能，回复就是语音播报，更有意思！</p>
                                </span>
                                <img alt="" src="static/theme/default/img/gn/gn001.jpg">
<img alt="" src="static/theme/default/img/gn/gn001-2.jpg">
                            </div>
                            <div style="display: none;">
                                <span class="marginb">
                                <h3>2.快递查询</h3>
                                <p>输入快递名称+运单号，可以快速查询快递的详细动态，收件从此不用愁。</p>
                                <p>例如：天天快递130004442691</p>
                                </span>
                                <img alt="" src="static/theme/default/img/gn/gn002.jpg">
                            </div>
                            <div style="display: none;">
                                <span class="marginb">
                                <h3>3.手机归属地查询</h3>
                                <p>输入手机号码即可获得该手机相关信息，有手机归属地，手机类型，手机区号，邮编等。</p>
                                <p>例如：13625008699</p>
                                </span>
                                <img alt="" src="static/theme/default/img/gn/gn003.jpg">
                            </div>
                            <div style="display: none;">
                                <span class="marginb">
                                <h3>4.身份证查询</h3>
                                <p>输入身份证号即可获得相关信息。</p>
                                <p>例如：342502198501250013</p>
                                </span>
                                <img alt="" src="static/theme/default/img/gn/gn004.jpg">
                            </div>
                            <div style="display: none;">
                                <span class="marginb"> 
                                <h3>5.公交查询</h3>
                                <p>输入城市+公交+车次，有3.6万线路</p>
                                <p>例如线路查询：厦门公交92路</p>
                                <p>站点到站点查询：厦门公交厦大医院到软件园二期</p>
                                <p>站点查询：厦门公交厦大医院站</p>
                                </span>
                                <img alt="" src="static/theme/default/img/gn/gn005.jpg">
                            </div>
                            <div style="display: none;">
                                <span class="marginb">
                                <h3>6.火车查询</h3>
                                <p>输入：火车 车次 或 火车 站点 站点，有4460列火车数据。</p>
                                <p>例如车次查询：火车k332 </p>
                                <p>站点到站点查询：火车 厦门 东乡</p>
                                </span>
                                <img alt="" src="static/theme/default/img/gn/gn006.jpg">
                                <img alt="" src="static/theme/default/img/gn/gn006-2.jpg">
                            </div>
                            <div style="display: none;">
                                <span class="marginb">
                                <h3>7.健康指数查询</h3>
                                <p>身高单位为cm 体重单位为公斤</p>
                                <p>输入：身高173 体重56  或输入：高173 重56</p>
                                </span>
                                <img alt="" src="static/theme/default/img/gn/gn007.jpg">
                            </div>
                            <div style="display: none;">
                                <span class="marginb">
                                <h3>8.实时翻译</h3>
                                <p>支持多种语言的实时翻译，中、英、日、韩、法、俄、西班牙文等全文翻译。</p>
<p>@+文字可以直接翻译中英日文，@我爱你　表示把中文翻译成英文</p>
<p>@おはようございます　表示把日文翻译成中文，@need you　表示把英文翻译成中文</p>
<p>@我爱你表示把中文翻译成英文，日语早上好　表示把中文翻译成日文</p>
<p>法语我爱你　表示把中文翻译成法语，俄语我爱你　表示把中文翻译成俄语</p>
<p>韩语我爱你　表示把中文翻译成韩语...</p>
                                </span>
                                <img alt="" src="static/theme/default/img/gn/gn008.jpg">
                                <img alt="" src="static/theme/default/img/gn/gn008-2.jpg">
                            </div>
                            <div style="display: none;">
                                <span class="marginb">
                                <h3>9.百度百科</h3>
                                <p>输入百科（bk）+要查询的词，即可得到相关信息。</p>
                                <p>例如：百科刘德华 或 bk刘德华</p>
                                </span>
                                <img alt="" src="static/theme/default/img/gn/gn009.jpg">
                                <img alt="" src="static/theme/default/img/gn/gn009-2.jpg">
                            </div>
                            <div style="display: none;">
                                <span class="marginb">
                                <h3>10.百度问答</h3>
                                <p>输入超过5个汉字自动回复相关问答内容。</p>
                                <p>例如：要怎么哄女人开心</p>
                                </span>
                                <img alt="" src="static/theme/default/img/gn/gn010.jpg">
                                <img alt="" src="static/theme/default/img/gn/gn010-2.jpg">
                            </div>
                            <div style="display: none;">
                                <span class="marginb">
                                <h3>11.人品计算</h3>
                                <p>输入人品+姓名，计算当天人品。</p>
                                <p>例如：李白人品</p>
                                </span>
                                <img alt="" src="static/theme/default/img/gn/gn011.jpg">
                            </div>
                            <div style="display: none;">
                                <span class="marginb">
                                <h3>12.笑话</h3>
                                <p>输入任何数字：0-9或者笑话或者笑脸的表情</p>
                                <p>可以随机查看笑话，有2.6万数据。</p>
                                </span>
                                <img alt="" src="static/theme/default/img/gn/gn012.jpg">
                                <img alt="" src="static/theme/default/img/gn/gn012-2.jpg">
                            </div>
                            <div style="display: none;">
                                <span class="marginb">
                                <h3>13.糗事</h3>
                                <p>输入糗事或者任意字母，可以随机查看糗事，有51.5万数据。</p>
                                <p>例如：糗事 或者 q</p>
                                </span>
                                <img alt="" src="static/theme/default/img/gn/gn013.jpg">
                                <img alt="" src="static/theme/default/img/gn/gn013-2.jpg">
                            </div>
                            <div style="display: none;">
                                <span class="marginb">
                                <h3>14.谜语</h3>
                                <p>输入谜语，即可玩猜谜语游戏，有5万数据。</p>
                                <p>查答案可输入答案谜语编号，例如：谜语 232</p>
                                </span>
                                <img alt="" src="static/theme/default/img/gn/gn014.jpg">
                            </div>
                            <div style="display: none;">
                                <span class="marginb">
                                <h3>15.解梦</h3>
                                <p>输入梦见发财或者梦到发财，立刻获得解梦信息。</p>
                                <p>例如：梦见我发财了</p>
                                </span>
                                <img alt="" src="static/theme/default/img/gn/gn015.jpg">
                            </div>
                            <div style="display: none;">
                                <span class="marginb">
                                <h3>16.成语接龙</h3>
                                <p>输入正确的成语即可</p>
                                <p>例如：肝肠寸断</p>
                                </span>
                                <img alt="" src="static/theme/default/img/gn/gn016.jpg">
                            </div>
                            <div style="display: none;">
                                <span class="marginb">
                                <h3>17.成语字典</h3>
                                <p>输入例如：成语 半死不活，得到该成语的解释。</p>
                                </span>
                                <img alt="" src="static/theme/default/img/gn/gn017.jpg">
                            </div>
                            <div style="display: none;">
                                <span class="marginb">
                                <h3>18.陪聊</h3>
                                <p>开启陪聊功能可以自动跟用户智能聊天</p>
                                <p>目前仅1000条陪聊库，在不断完善中...</p>
                                </span>
                                <img alt="" src="static/theme/default/img/gn/gn018.jpg">
                            </div>
                            <div style="display: none;">
                                <span class="marginb">
                                <h3>19.机器人学习功能</h3>
                                <p>用手机直接发送：问 关键词 答 内容，这样教机器人回答问题，机器人就学会了。</p>
                                <p>例如：问 你是谁 答 我是欧阳啊！</p>
                                </span>
                                <img alt="" src="static/theme/default/img/gn/gn019.jpg">
                            </div>
<div style="display: none;">
                                <span class="marginb">
                                <h3>20.自定义图文回复</h3>
                                <p>在微信后台设置关键词，编辑对应的回复内容，以图文形式显示。</p>
<p>还有关联的图文展示，推荐阅读。</p>
                                <p>效果更好，用户体验更佳。</p>
                                </span>
                                <img alt="" src="static/theme/default/img/gn/gn020.jpg" style="vertical-align: top">
<img alt="" src="static/theme/default/img/gn/gn020-2.jpg">
                            </div>
                    		<div style="display: none;">
                                <span class="marginb">
                                <h3>21.藏头藏尾诗</h3>
                                <p>输入：藏头诗 我爱你香港 或者 cts 我爱你香港 或者</p>
<p>藏尾诗 我爱你香港 或者 cws 我爱你香港</p>
<p>会根据输入的内容自动生成藏头诗或者藏尾诗，非常有意思。</p>
<p>例如：cts 我爱你香港 或者 cws 我爱你香港</p>
                                </span>
                                <img alt="" src="static/theme/default/img/gn/gn021.jpg">
                            </div>
<div style="display: none;">
                                <span class="marginb">
                                <h3>22.诗歌接龙</h3>
                                <p>输入诗词的任意一句，会自动回复下一句。</p>
<p>例如：床前明月光</p>
                                </span>
                                <img alt="" src="static/theme/default/img/gn/gn022.jpg">
                            </div>
<div style="display: none;">
                                <span class="marginb">
                                <h3>23.诗歌赏析</h3>
                                <p>输入：古诗+诗名或者古诗+诗名+作者，可以欣赏这首完整的诗歌。</p>
<p>例如：古诗 黄鹤楼</p>
                                </span>
                                <img alt="" src="static/theme/default/img/gn/gn023.jpg">
                            </div>
<div style="display: none;">
                                <span class="marginb">
                                <h3>24.网络音乐搜索</h3>
                                <p>输入：音乐+歌手+歌名 或者 音乐+歌名 可以欣赏这首歌曲。</p>
<p>例如：音乐 谢霆锋谢谢你的爱</p>
<p>还可以输入：播放音乐|来首歌|来首音乐|放歌|音乐|mp3|点首歌|点歌|我要听歌</p>
<p>来随机播放音乐</p>
<p>还可以输入：陈奕迅的歌或者播放浮夸</p>
                                </span>
                                <img alt="" src="static/theme/default/img/gn/gn024.jpg">
<img alt="" src="static/theme/default/img/gn/gn024-2.jpg">
                            </div>
<div style="display: none;">
                                <span class="marginb">
                                <h3>25.网络电影搜索</h3>
                                <p>输入：电影+名称 可以欣赏这部电影了，当然有的电影是搜不到的，电影库会慢慢增加。</p>
<p>例如：电影 功夫熊猫</p>
                                </span>
                                <img alt="" src="static/theme/default/img/gn/gn025.jpg">
                            </div>
<div style="display: none;">
                                <span class="marginb">
                                <h3>26.文字转语音</h3>
                                <p>输入：朗读+文字，就可以把文字转成语音播放。</p>
<p>例如：朗读你好，欢迎你！</p>
                                </span>
                                <img alt="" src="static/theme/default/img/gn/gn026.jpg">
                            </div>
                     		<div style="display: none;">
                                <span class="marginb">
                                <h3>27.股票查询</h3>
                                <p>输入：股票+股票代号或名称或拼音缩写，股票二字可以用gp缩写</p>
<p>例如：股票601088 或者 股票西藏天路 或者 股票dqtl 或者 gp601088</p>
                                </span>
                                <img alt="" src="static/theme/default/img/gn/gn027.jpg">
                            </div>
<div style="display: none;">
                                <span class="marginb">
                                <h3>28.彩票查询</h3>
                                <p>输入彩票+名称</p>
<p>可以查询彩票有：双色球、大乐透、七星彩、排列3、排列5、体彩22选5、胜负彩14场、任选9场、4场进球、6场半全场、老11选5、11选5、新11选5、双色球</p>
<p>例如：彩票双色球</p>
                                </span>
                                <img alt="" src="static/theme/default/img/gn/gn028.jpg">
<img alt="" src="static/theme/default/img/gn/gn028-2.jpg">
                            </div>
<div style="display: none;">
                                <span class="marginb">
                                <h3>29.英语4-6级查询(12年12月)</h3>
                                <p>查询例子:cet杨奕352011122103023</p>
                                </span>
                                <img alt="" src="static/theme/default/img/gn/gn029.jpg">
                            </div>
                        
                    </div>
                    </div>
                	<p class="clr"></p>
            	</div>
        	</div>
    	</div>
    </div>
<!--底部-->	</div>

<?php include bidcms_template("footer");?>