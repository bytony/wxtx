<?php
$pic=$_GET['picurl'];
if(!empty($pic))
{
$url='http://www.google.com.hk/searchbyimage?image_url='.$pic.'&btnG=%E6%8C%89%E5%9B%BE%E7%89%87%E6%90%9C%E7%B4%A2&image_content=&filename=&newwindow=1&safe=strict&hl=zh-CN&bih=345&biw=1600';
echo '<a href='.$url.'>²é¿´ÏàËÆÍ¼Æ¬</a>';
}