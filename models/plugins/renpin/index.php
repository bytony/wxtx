<?php
header("content-type:text/html;charset=utf-8");
$name=!empty($_GET['data'])?$_GET['data']:'';

$f=mb_substr($name,0,1,'utf-8');
$s=mb_substr($name,1,1,'utf-8');
$w=mb_substr($name,2,1,'utf-8');
$n=(ord($f)+ord($s)+ord($w))%100;
$addd='';
if(empty($name))
{
    $addd="大哥不要玩我啊，名字都没有你想算什么！";
}elseif($name=='xxxx' || $name=='zyn')
{
	$addd="你的人品已经过 100 人品计算器已经甘愿认输，3秒后人品计算器将自杀啊";
} elseif ($n <= 0) {
$addd ="你一定不是人吧？怎么一点人品都没有？！";
} elseif($n > 0 && $n <= 5) {
$addd ="算了，跟你没什么人品好谈的...";
} elseif($n > 5 && $n <= 10) {
$addd ="是我不好...不应该跟你谈人品问题的...";
} elseif($n > 10 && $n <= 15) {
$addd ="杀过人没有?放过火没有?你应该无恶不做吧?";
} elseif($n > 15 && $n <= 20) {
$addd ="你貌似应该三岁就偷看隔壁大妈洗澡的吧..."; 
} elseif($n > 20 && $n <= 25) {
$addd ="你的人品之低下实在让人惊讶啊..."; 
} elseif($n > 25 && $n <= 30) {
$addd ="你的人品太差了。你应该有干坏事的嗜好吧?";
} elseif($n > 30 && $n <= 35) {
$addd ="你的人品真差!肯定经常做偷鸡摸狗的事...";
} elseif($n > 35 && $n <= 40) {
$addd ="你拥有如此差的人品请经常祈求佛祖保佑你吧...";
} elseif($n > 40 && $n <= 45) {
$addd ="老实交待..那些论坛上面经常出现的偷拍照是不是你的杰作?"; 
} elseif($n > 45 && $n <= 50) {
$addd ="你随地大小便之类的事没少干吧?";
} elseif($n > 50 && $n <= 55) {
$addd ="你的人品太差了..稍不小心就会去干坏事了吧?"; 
} elseif($n > 55 && $n <= 60) {
$addd ="你的人品很差了..要时刻克制住做坏事的冲动哦.."; 
} elseif($n > 60 && $n <= 65) {
$addd ="你的人品比较差了..要好好的约束自己啊.."; 
} elseif($n > 65 && $n <= 70) {
$addd ="你的人品勉勉强强..要自己好自为之.."; 
} elseif($n > 70 && $n <= 75) {
$addd ="有你这样的人品算是不错了..";
} elseif($n > 75 && $n <= 80) {
$addd ="你有较好的人品..继续保持.."; 
} elseif($n > 80 && $n <= 85) {
$addd ="你的人品不错..应该一表人才吧?";
} elseif($n > 85 && $n <= 90) {
$addd ="你的人品真好..做好事应该是你的爱好吧.."; 
} elseif($n > 90 && $n <= 95) {
$addd ="你的人品太好了..你就是当代活雷锋啊...";
} elseif($n > 95 && $n <= 99) {
$addd ="你是世人的榜样！";
} elseif($n > 100 && $n < 105) {
$addd ="天啦！你不是人！你是神！！！"; 
} elseif($n > 999) {
$addd ="你的人品竟然负溢出了...我对你无语.."; 
}
echo "你的人品分数为：".$n."\n".$addd;