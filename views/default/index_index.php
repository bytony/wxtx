 <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>微信天下 微信客服 微信开放平台 微信接口 企业微信</title>
<meta name="keywords" content="微信平台,微信智能客服,智能聊天,微信开放平台" />
<meta name="description" content="微信天下客服是一个提供微信公众号第三方服务的微信平台，全部傻瓜化操作只要注册绑定公众号你的微信号立即成为一个智能化的机器人，更方便的为您的用户服务，增加用户粘性，目前已上线会员卡，优惠券，抽奖，智能聊天等功能" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="baidu-site-verification" content="gvfmLk83Ws" />
<meta http-equiv="MSThemeCompatible" content="Yes" />
<link href="static/theme/default/css/common.css" rel="stylesheet" type="text/css" />
<link href="static/theme/default/css/style.css" rel="stylesheet" type="text/css" />
<link href="static/theme/default/css/style2.css" rel="stylesheet" type="text/css" />
<link href="http://fonts.googleapis.com/css?family=PT+Sans:400,700,400italic" rel="stylesheet" type="text/css" />
<link href="http://fonts.googleapis.com/css?family=Dosis:200,300" rel="stylesheet" type="text/css" />
<script src="bbs/static/js/common.js?ELt" type="text/javascript"></script>
<script type="text/javascript">var STYLEID = '1', STATICURL = 'bbs/static/', IMGDIR = 'bbs/static/image/common', VERHASH = 'ELt', charset = 'utf-8', discuz_uid = '0', cookiepre = 'KwFG_2132_', cookiedomain = '', cookiepath = '/', showusercard = '1', attackevasive = '0', disallowfloat = 'newthread', creditnotice = '1|威望|,2|金钱|,3|贡献|,4|金币|,5|已消费|', defaultstyle = '', REPORTURL = 'aHR0cDovL2ltNjEuY29tL2Jicy9tZW1iZXIucGhwP21vZD1yZWdpc3Rlcg==', SITEURL = 'http://im61.com/', JSPATH = 'static/js/';</script>
<script type="text/javascript" src="static/theme/default/js/global.js"></script>
<script language="javascript" src="views/js/jquery.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script type="text/javascript" src="static/theme/default/js/jquery.lavalamp.min.js"></script>
<script type="text/javascript" src="static/theme/default/js/fade-in-jquery.js"></script>
<script type="text/javascript" src="static/theme/default/js/jquery.easing.min.js"></script>
<script type="text/javascript" src="static/theme/default/js/jquery.jcarousel.min.js"></script>
<script type="text/javascript" src="static/theme/default/js/feature_carousel.js"></script>
<script type="text/javascript" src="static/theme/default/js/common.js"></script>
<!--  Javascript files for Individual Project Slides in Recent Projects  -->
<script type="text/javascript" src="static/theme/default/js/jquery.cycle.all.js"></script>

<!--  accordian  -->
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	slider();
	pageTab();
	video();
	jqueryCycle();
	jcarouselVertical();
	socialIcon();
	back2top();
	lavaLamp();
});
</script>


<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>

<body>
    <!--////////header////////-->
    <div class="header">
    	<div class="wrap">
            <div class="company-logo">
                <div class="logo"><a href="index.html">home</a></div>
            </div>
             <div class="menu-container">
             	<div class="nav">
                	<ul id="main_menu">
                        <li class="current"><a href="index.html" id="home"> Home</a></li>
                        <li><a href="http://<?php echo $_SERVER['SERVER_NAME'];?>/index.php?act=intro">功能介绍</a></li>
                        <li><a href="#">配置接口</a>
                            <ul>
                                <li><a href="http://<?php echo $_SERVER['SERVER_NAME'];?>/index.php?con=user&act=app&wxid=<?php   echo $_SESSION['im61']['current_weixin_id'];?>">管理</a></li>
                                <li><a href="#">Themes &rsaquo;</a>
                                    <ul>
                                        <li><a href="../marketplace/index.html">Marketplace</a></li>
                                        <li><a href="../google_play/index.html">Play Store</a></li>
                                        <li><a href="../appstore/index.html">App Store</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li><a href="contact.html">管理</a></li>
                        <li><a href="blog.html">论坛交流</a></li>
                        <li><a href="http://<?php echo $_SERVER['SERVER_NAME'];?>/bbs/member.php?mod=logging&action=login">登录</li>
                        <li><a href="http://<?php echo $_SERVER['SERVER_NAME'];?>/bbs/member.php?mod=register">立即注册</a></li>
                    </ul>
                </div><!-- end nav -->
             </div><!-- end menu-container -->
      	</div><!-- end wrap -->
    </div>
    <!--////////header end////////-->
        
    <!-- //////banner//////// -->
    <div class="banner">
    	<div class="banner_container">
            <div id="banner_rotator">
                <div class="banner-content-left">
                    <div class="banner-title">
                            微行天下
                            <br />
                            您身边的微信专家
                    </div>
                <h5> 微行天下 </h5>
                    <ul>
                        <li> 丰富的微网站模板</li>
                        <li> Vel scelerisque nisl consectetur et.</li>
                        <li> Donec sed odio dui etiam porta sem.</li>
                    </ul>
                    <div class="primary_btn">
                        <a href="http://<?php echo $_SERVER['SERVER_NAME'];?>/index.php?act=inter" class="italic">立即配置</a>
                    </div>
                </div><!-- End banner-2 -->
                
                <div class="banner-content-left">
                    <div class="banner-title">
                            微行天下
                            <br />
                            微网站
                    </div>
                <h5> 微行天下 </h5>
                    <ul>
                        <li> Praesent commodo cursus magna.</li>
                        <li> Vel scelerisque nisl consectetur et.</li>
                        <li> Donec sed odio dui etiam porta sem.</li>
                    </ul>
                    <div class="primary_btn">
                        <a href="http://<?php echo $_SERVER['SERVER_NAME'];?>/index.php?act=inter" class="italic">立即配置</a>
                    </div>
                </div><!-- End banner-1 -->
                
                <div class="banner-content-left">
                    <div class="banner-title">
                            Best Mobile App 
                            <br />
                            2013 winner
                    </div>
                <h5> 微行天下 </h5>
                    <ul>
                        <li> Praesent commodo cursus magna.</li>
                        <li> Vel scelerisque nisl consectetur et.</li>
                        <li> Donec sed odio dui etiam porta sem.</li>
                    </ul>
                    <div class="primary_btn">
                        <a href="http://<?php echo $_SERVER['SERVER_NAME'];?>/index.php?act=inter" class="italic">立即配置</a>
                    </div>
                </div><!-- End banner-1 -->
            </div>
            
            <div id="phone">
                <div id="mobile_carousel">
                    <div class="carousel-feature"><a href="#"><img alt="" src="static/theme/default/images/iphone_ban_1.png" class="carousel-image" /></a></div>
                    <div class="carousel-feature"><a href="#"><img alt="" src="static/theme/default/images/iphone_ban_2.png" class="carousel-image" /></a></div>
                    <div class="carousel-feature"><a href="#"><img alt="" src="static/theme/default/images/iphone_ban_3.png" class="carousel-image" /></a></div>
                </div>
                <div id="ratings">
                    <div class="stars">
                        <div class="one-star"></div>
                        <div class="one-star"></div>
                        <div class="one-star"></div>
                        <div class="one-star"></div>
                        <div class="half-star"></div>
                    </div>
                    <div class="rating-text">
                        <a href="#">Absolutely Stunning!, – Mobileapp.com</a>
                    </div>
                </div><!-- End ratings -->
            </div><!-- End phone -->
        </div><!-- End wrap -->     
    </div>
    <!--////////banner end //////// -->
     
    <!-- //////wrapper (main content) //////// -->
</body>
</html>

