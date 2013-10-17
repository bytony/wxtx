
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>相册展示</title>
<meta name="viewport" content="width=device-width,height=device-height,inital-scale=1.0,maximum-scale=1.0,user-scalable=no;">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<meta name="format-detection" content="telephone=no">
<meta charset="utf-8">
<link href="plugins/photo/views/photo.css" rel="stylesheet" type="text/css" />
<link href="plugins/photo/views/photoswipe.css" type="text/css" rel="stylesheet" />
<script src="plugins/photo/views/klass.min.js" type="text/javascript"></script>
<script src="plugins/photo/views/code.photoswipe-3.0.5.min.js" type="text/javascript"></script>
<script type="text/javascript">
(function(window, PhotoSwipe){
document.addEventListener('DOMContentLoaded', function(){
var
options = {},
instance = PhotoSwipe.attach( window.document.querySelectorAll('#Gallery a'), options );
}, false);
}(window, window.Code.PhotoSwipe));
</script>
</head>

<body id="photo">
<div class="qiandaobanner"> <a href="http://wxapi.cn/wx/wxapi.php?ac=photo&tid=650"><img src="plugins/photo/views/header.jpg" ></a> </div>
<div  id="main" role="main">
      <ul id="Gallery" class="gallery">
        
        <li><a href="http://bcs.duapp.com/baeimg/U6HIZkgZFs.jpg"><img src="http://bcs.duapp.com/baeimg/U6HIZkgZFs.jpg" alt="  "></a></li>
   
        <li><a href="http://bcs.duapp.com/baeimg/WOFiMNM13z.jpg"><img src="http://bcs.duapp.com/baeimg/WOFiMNM13z.jpg" alt="  "></a></li>
   
        <li><a href="http://bcs.duapp.com/baeimg/THSDhyF1Ev.jpg"><img src="http://bcs.duapp.com/baeimg/THSDhyF1Ev.jpg" alt="  "></a></li>
   
        <li><a href="http://bcs.duapp.com/baeimg/sUuuAclp8l.jpg"><img src="http://bcs.duapp.com/baeimg/sUuuAclp8l.jpg" alt="  "></a></li>
   
        <li><a href="http://bcs.duapp.com/baeimg/VYiryt0zYS.jpg"><img src="http://bcs.duapp.com/baeimg/VYiryt0zYS.jpg" alt="  "></a></li>
   
        <li><a href="http://bcs.duapp.com/baeimg/hM909ZWel7.jpg"><img src="http://bcs.duapp.com/baeimg/hM909ZWel7.jpg" alt="  "></a></li>
   
        <li><a href="http://bcs.duapp.com/baeimg/L2AQWcsR5k.jpg"><img src="http://bcs.duapp.com/baeimg/L2AQWcsR5k.jpg" alt="  "></a></li>
   
        <li><a href="http://bcs.duapp.com/baeimg/c1MFZ9VHzD.jpg"><img src="http://bcs.duapp.com/baeimg/c1MFZ9VHzD.jpg" alt="  "></a></li>
   
        <li><a href="http://bcs.duapp.com/baeimg/mHi1Kz7rSt.jpg"><img src="http://bcs.duapp.com/baeimg/mHi1Kz7rSt.jpg" alt="  "></a></li>
   
        <li><a href="http://bcs.duapp.com/baeimg/WDlqog9b3o.jpg"><img src="http://bcs.duapp.com/baeimg/WDlqog9b3o.jpg" alt="  "></a></li>
   
        <li><a href="http://bcs.duapp.com/baeimg/IoOr8tX9ym.jpg"><img src="http://bcs.duapp.com/baeimg/IoOr8tX9ym.jpg" alt="  "></a></li>
   
        <li><a href="http://bcs.duapp.com/baeimg/tyoQxbmnY3.jpg"><img src="http://bcs.duapp.com/baeimg/tyoQxbmnY3.jpg" alt="  "></a></li>
   
      </ul>
</div>

<!--jquery.min-->
<script src="plugins/photo/views/jquery.min.js" type="text/javascript"></script>
<!--下面是瀑布流js-->
<script src="plugins/photo/views/jquery.imagesloaded.js" type="text/javascript"></script>
<script src="plugins/photo/views/jquery.wookmark.min.js" type="text/javascript"></script>
<script type="text/javascript">
    (function ($){
      $('#Gallery').imagesLoaded(function() {
        // Prepare layout options.
        var options = {
          autoResize: true, // This will auto-update the layout when the browser window is resized.
          container: $('#main'), // Optional, used for some extra CSS styling
          offset: 4, // Optional, the distance between grid items
          itemWidth: 150 // Optional, the width of a grid item
        };

        // Get a reference to your grid items.
        var handler = $('#Gallery li');

        // Call the layout function.
        handler.wookmark(options);

       
      });
    })(jQuery);
  </script>
</body>
</html>
