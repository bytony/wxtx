<!doctype html>
<html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]> <html class="no-js"> <![endif]-->
<head>
    <meta charset="utf-8"><!--[if IE]> <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"><![endif]-->

    <title>Metro Mobile Wordpress</title>
    <meta content="Your meta description" name="description">
    <meta content="No HTML is allowed in here." name="keywords">
    <meta content="yes" name="apple-mobile-web-app-capable">
    <meta content="black" name="apple-mobile-web-app-status-bar-style">
    <meta content="initial-scale=1.0, user-scalable=no" name="viewport">
    
    <!--[if IE]><link rel="stylesheet" type="text/css" href="css/font-awesome-ie7.css"><![endif]-->
    
    <!-- Shortcut Logos -->
    <link href="images/demo_content/metroentrance1.jpg" rel="apple-touch-icon-precomposed" sizes="114x114">
    <link href="images/demo_content/metroentrance57.jpg" rel="shortcut icon">
    <!-- /Shortcut Logos -->
    
    <!-- Splash screens -->
        <!-- iPhone 320x460 -->
        <link href="images/demo_content/splashscreens/apple-touch-startup-image-320x460.png" media="(device-width: 320px) and (device-height: 480px) and (-webkit-device-pixel-ratio: 1)" rel="apple-touch-startup-image">
        <!-- iPhone (Retina) 640x920 -->
        <link href="images/demo_content/splashscreens/apple-touch-startup-image-640x920.png" media="(device-width: 320px) and (device-height: 480px) and (-webkit-device-pixel-ratio: 2)" rel="apple-touch-startup-image">
        <!-- iPhone 5 640x1096-->
        <link href="images/demo_content/splashscreens/apple-touch-startup-image-640x1096.png" media="(device-width: 320px) and (device-height: 568px) and (-webkit-device-pixel-ratio: 2)" rel="apple-touch-startup-image">
        <!-- iPad 768x1004 / 748x1024-->
        <link href="images/demo_content/splashscreens/apple-touch-startup-image-768x1004.png" media="(device-width: 768px) and (device-height: 1024px) and (orientation: portrait) and (-webkit-device-pixel-ratio: 1)" rel="apple-touch-startup-image">
        <link href="images/demo_content/splashscreens/apple-touch-startup-image-748x1024.png" media="(device-width: 768px) and (device-height: 1024px) and (orientation: landscape) and (-webkit-device-pixel-ratio: 1)" rel="apple-touch-startup-image">
        <!-- iPad (Retina) 1536x2008 / 1496x2048 -->
        <link href="images/demo_content/splashscreens/apple-touch-startup-image-1536x2008.png" media="(device-width: 768px) and (device-height: 1024px) and (orientation: portrait) and (-webkit-device-pixel-ratio: 2)" rel="apple-touch-startup-image">
        <link href="images/demo_content/splashscreens/apple-touch-startup-image-1496x2048.png" media="(device-width: 768px) and (device-height: 1024px) and (orientation: landscape) and (-webkit-device-pixel-ratio: 2)" rel="apple-touch-startup-image">
  	<!-- / Splash Screens -->

    
    <link href='css/style.css' id='styles-css' media='all' rel='stylesheet' type='text/css'><!-- General Style -->
    
    <!-- Scripts -->
    <script src='http://code.jquery.com/jquery-1.8.0.min.js' type='text/javascript'></script>
    <script src='js/jquery.easing.1.3.js'></script>
    <script src='js/bootstrap.min.js' type='text/javascript'></script>
    <script src='js/spinner.js' type='text/javascript'></script>
    <script src='js/jquery.mobile.customized.min.js' type='text/javascript'></script>
    <script src='js/vendor/modernizr-2.6.1.min.js' type='text/javascript'></script>
    <!-- / Scripts -->
    
</head>

<body>
     

    <div class="wrapper">
    	<!-- Scrollable -->
    	<div class="scrollable">
        <!-- Webbu Tiles -->
        <div class="webbutiles">
        <!-- Quadro Horizontal / Quadro Vertical Tile Sample -->
        <div class='tile white quadro-box image'>
            <div class='boxContent'><img alt='' src='images/demo_content/metroentrance.jpg'></div>

        	<div class='tilename'><div class='name'></div></div>
        </div>
        <!-- / Quadro Horizontal / Quadro Vertical Tile Sample --> 
        
		
        <!-- Slider Tile Files -->
		<script src='js/camera.js' type='text/javascript'></script> 
        <link href='css/camera.css' id='camera-css' media='all' rel='stylesheet' type='text/css'>
		<script>
		jQuery(function(){jQuery('.cameracontainer').camera({height: 'auto',loader: 'bar',pagination: false,thumbnails: false,time: 5000,transPeriod: 1500,});});
        </script>
		<!-- / Slider Tile Files -->
        
        
        <!-- Slider Tile Sample / Double Horizontal Tile Sample (double-box) = double H / Double v Box-->
        <div class='tile white double-box'>
       	 <div class='boxContent cameracontainer camera_wrap' style='padding:0px;'>
        	<!-- Slider Image 1 -->
            <div data-src='images/demo_content/slider1.jpg'></div>
            <!-- Slider Image 2 -->
            <div data-src='images/demo_content/slider2.jpg'></div>
            <!-- Slider Image 3 -->
            <div data-src='images/demo_content/slider3.jpg'></div>
          </div>
        </div>
        <!-- Slider Tile Sample End -->
        
        
        <!-- Blue Tile Sample -->
        <a class='tile TBlue iconmain' href='/index.php?con=wap&act=item&id=68&cid=0'>
        <div class='boxContent'><i class='icon-group'></i></div>
            <!-- Tile Name -->
            <div class='tilename'>
                <div class='name'>产品简介</div>
            </div>
        </a>
        <!-- / Blue Tile Sample -->


        <!-- Dark Green Tile Sample -->
        <a class='tile TDarkGreen iconmain' href='blog.html'>
        <div class='boxContent'>
            <!-- Tile Icon -->
            <i class='icon-comments-alt'></i>
        </div>
            
        <div class='tilename'>
        	<!-- Tile Name -->
            <div class='name'>在线交流</div>
        </div>
        </a>
        <!-- / Dark Green Tile Sample -->
        
        
        <!-- Orange Tile Sample -->
        <a class='tile TOrange double iconmain' href='/index.php?con=wap&act=list&id=66&cid=73'>
        <div class='boxContent'>
        	<!-- Tile Icon -->
        	<i class='icon-reorder'></i>
        </div>
           
        <div class='tilename'>
             <!-- Tile Name -->
            <div class='name'>合作案例</div>
        </div>
        </a>
     
        <!-- Dark Blue Tile -->
     
        <!-- /Dark Blue Tile -->
        
        
        <!-- Dark Red Tile -->
        <a class='tile TDarkRed iconmain' href='/views/app/rotate/'>
        <div class='boxContent'>
            <!-- Tile Icon -->
            <i class='icon-heart'></i>
        </div>
        
        <div class='tilename'>
        	<!-- Tile Name -->
            <div class='name'>大转盘</div>
        </div>
        </a>
        <!-- / Dark Red Tile -->
        
        
        <!-- Twitter Blue Tile -->
        <a class='tile TTwitterBlue iconmain' href='http://weibo.com/u/1806742014'>
        <div class='boxContent'>
            <!-- Tile Icon -->
            <i class='icon-twitter'></i>
        </div>
        
        <div class='tilename'>
        	<!-- Tile Name -->
            <div class='name'>微博</div>
        </div>
        </a>
        <!-- / Twitter Blue Tile -->
        
        
        <!-- Green Tile -->
       
        <!-- / Green Tile -->
        
        
        <!-- Brown Tile -->
        <a class='tile TBrown iconmain' href='portfolio.html'>
        <div class='boxContent'>
            <!-- Image Icon Sample -->
            <img src='images/demo_content/galleryicon.png' class='resimgicon' alt=''/>
        </div>
        
        <div class='tilename'>
        	<!-- Tile Name -->
            <div class='name'>相册</div>
        </div>
        </a>
        <!-- / Brown Tile -->
        
        
       
        <!-- / Image Tile Sample-->
        
        
        <!-- Facebook Blue Tile Sample-->
        <a class='tile TFacebookBlue iconmain' href='video.html'>
        <div class='boxContent'>
            <!-- Tile Icon -->
            <i class='icon-facetime-video'></i>
        </div>
        
        <div class='tilename'>
        	<!-- Tile Name -->
            <div class='name'>Video</div>
        </div>
        </a>
        <!-- / Facebook Blue Tile Sample-->
        
        
        <!-- Dark Grey Tile Sample-->
        <a class='tile TDarkGrey iconmain' href='/views/app/vip/'>
        <div class='boxContent'>
            <!-- Tile Icon -->
            <i class='icon-envelope'></i>
        </div>
        
        <div class='tilename'>
        	<!-- Tile Name -->
            <div class='name'>会员卡</div>
        </div>
        </a>
        <!-- / Dark Grey Tile Sample-->
        
        
        <!-- Dark Purple Tile Sample / Phone Call Link -->
        <a class='tile TDarkPurple iconmain' href='tel:+18329038009'>
        <div class='boxContent'>
        	<!-- Tile Icon -->
        	<i class='icon-phone'></i>
        </div>
        
        <div class='tilename'>
            <!-- Tile Name -->
            <div class='name'>联系我们</div>
        </div>
        </a>
        <!-- / Dark Purple Tile Sample / Phone Call Link -->
        
        
        <!-- Thumblr Blue Tile Sample / Mail Link -->
        <a class='tile TThumblrBlue iconmain' href='http://user.qzone.qq.com/6218796/infocenter#!app=334&via=QZ.HashRefresh'>
        <div class='boxContent'>
            <!-- Tile Icon -->
            <i class='icon-edit'></i>
        </div>
        
        <div class='tilename'>
            <!-- Tile Name -->
            <div class='name'>留言板</div>
        </div>
        </a>
        <!-- / Thumblr Blue Tile Sample / Mail Link -->
        
		
        <!-- Facebook Tile Sample -->
        <div class='tile TFacebookBlue iconmain'>
            <div class='boxContent'>
                <!-- Tile Icon -->
                <i class='icon-facebook-sign'></i>
            </div>
            
            <div class='tilename'>刮刮卡<div class='name'></div></div>
        </div>
 
        
        
        
        <!-- Map Tile Tile Sample-->
        <a class='tile white double image' href='#'>
        <div class='boxContent'>
        	<!-- Map -->
        	<iframe class="maptile" scrolling="no" src="http://sp0.map.bdimg.com/it?qt=spg&c=289&coord=E|13523363.34,3640978.00;13523314.90,3641488.14;13523629.28,3640940.55;13523505.16,3641367.16;"></iframe>
        </div>
        </a>
        <!-- / Map Tile Tile Sample-->
        
 
        <!-- TLightPurple Tile -->
        <a class='tile TLightPurple iconmain' href='/index.php?con=wap&act=index&wx_id=gh_423dwjkeww5'>
        <div class='boxContent'>
            <!-- Tile Icon -->
            <i class='icon-reorder'></i>
        </div>
        
        <div class='tilename'>
        	<!-- Tile Name -->
            <div class='name'>模板演示</div>
        </div>
        </a>
        <!-- / TLightPurple Tile -->
        
        
        
        
        <!-- TLightOrange Tile -->
        <a class='tile TLightOrange iconmain' href='columns-desktop.html'>
        <div class='boxContent'>
            <!-- Tile Icon -->
            <i class='icon-columns'></i>
        </div>
        
        <div class='tilename'>
        	<!-- Tile Name -->
            <div class='name'>12 Columns</div>
        </div>
        </a>
        <!-- / TLightOrange Tile -->
        
        
       </div>
       <!-- / Webbu Tiles -->
       </div>
       <!-- / Scrollable -->
    </div>
	<!-- / Wrapper -->
    
    
	<script src='js/loadanim.js' type='text/javascript'></script><!-- Loading Animation -->
	<script src='js/main.js' type='text/javascript'></script><!-- Main Styles -->
	<script src='js/vendor/zepto.min.js' type='text/javascript'></script>
    
    <!-- Add home bubble -->
    <link href='css/add2home.css' id='add2home-css' media='all' rel='stylesheet' type='text/css'>
    <script src='js/add2home.js' type='text/javascript'></script>
    <!-- / Add home bubble -->
    
    
    <!--  Google Analytic Code for use
    <script>
    var _gaq=[['_setAccount','0'],['_trackPageview']];
    (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
    g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
    s.parentNode.insertBefore(g,s)}(document,'script'));
    </script>
    -->
    
</body>
</html>