<?php
header("content-type:text/html;charset=utf-8");
$expresses=array (
  'aae'=>'AAE快递','anjie'=>'安捷快递','anxinda'=>'安信达快递','aramex'=>'Aramex国际快递','benteng'=>'成都奔腾国际快递','cces'=>'CCES快递','changtong'=>'长通物流','chengguang'=>'程光快递','chengji'=>'城际快递','chengshi100'=>'城市100','chuanxi'=>'传喜快递','chuanzhi'=>'传志快递','citylink'=>'CityLinkExpress','coe'=>'东方快递','cszx'=>'城市之星','datian'=>'大田物流','dayang'=>'大洋物流快递','debang'=>'德邦物流','dechuang'=>'德创物流','dhl'=>'DHL快递','diantong'=>'店通快递','dida'=>'递达快递','disifang'=>'递四方速递','dpex'=>'DPEX快递','dsu'=>'D速快递','ees'=>'百福东方物流','ems'=>'EMS快递','fanyu'=>'凡宇快递','fardar'=>'Fardar','fedex'=>'国际Fedex','fedexcn'=>'Fedex国内','feibang'=>'飞邦物流','feibao'=>'飞豹快递','feihang'=>'原飞航物流','feihu'=>'飞狐快递','feiyuan'=>'飞远物流','fengda'=>'丰达快递','fkd'=>'飞康达快递','gdyz'=>'广东邮政物流','gnxb'=>'邮政国内小包','gongsuda'=>'共速达物流|快递','guotong'=>'国通快递','haihong'=>'山东海红快递','haimeng'=>'海盟速递','haosheng'=>'昊盛物流','hebeijianhua'=>'河北建华快递','henglu'=>'恒路物流','huaqi'=>'华企快递','huaxialong'=>'华夏龙物流','huayu'=>'天地华宇物流','huiqiang'=>'汇强快递','huitong'=>'汇通快递','hwhq'=>'海外环球快递','jiaji'=>'佳吉快运','jiayi'=>'佳怡物流','jiayunmei'=>'加运美快递','jinda'=>'金大物流','jingguang'=>'京广快递','jinyue'=>'晋越快递','jixianda'=>'急先达物流','jldt'=>'嘉里大通物流','kangli'=>'康力物流','kcs'=>'顺鑫(KCS)快递','kuaijie'=>'快捷快递','kuayue'=>'跨越快递','lejiedi'=>'乐捷递快递','lianhaotong'=>'联昊通快递','lijisong'=>'成都立即送快递','longbang'=>'龙邦快递','minbang'=>'民邦快递','mingliang'=>'明亮物流','minsheng'=>'闽盛快递','nengda'=>'港中能达快递','ocs'=>'OCS快递','pinganda'=>'平安达','pingyou'=>'中国邮政平邮','pinsu'=>'品速心达快递','quanchen'=>'全晨快递','quanfeng'=>'全峰快递','quanjitong'=>'全际通快递','quanritong'=>'全日通快递','quanyi'=>'全一快递','rpx'=>'RPX保时达','rufeng'=>'如风达快递','saiaodi'=>'赛澳递','santai'=>'三态速递','scs'=>'伟邦(SCS)快递','shengan'=>'圣安物流','shengfeng'=>'盛丰物流','shenghui'=>'盛辉物流','shentong'=>'申通快递（可能存在延迟）','shunfeng'=>'顺丰快递','suijia'=>'穗佳物流','sure'=>'速尔快递','tiantian'=>'天天快递','tnt'=>'TNT快递','tongcheng'=>'通成物流','tonghe'=>'通和天下物流','ups'=>'UPS','usps'=>'USPS快递','wanjia'=>'万家物流','weitepai'=>'微特派','xianglong'=>'祥龙运通快递','xinbang'=>'新邦物流','xinfeng'=>'信丰快递','xiyoute'=>'希优特快递','yad'=>'源安达快递','yafeng'=>'亚风快递','yibang'=>'一邦快递','yinjie'=>'银捷快递','yishunhang'=>'亿顺航快递','yousu'=>'优速快递','ytfh'=>'北京一统飞鸿快递','yuancheng'=>'远成物流','yuantong'=>'圆通快递','yuanzhi'=>'元智捷诚','yuefeng'=>'越丰快递','yunda'=>'韵达快递','yuntong'=>'运通中港快递','ywfex'=>'源伟丰','zhaijisong'=>'宅急送快递','zhima'=>'芝麻开门快递','zhongtian'=>'济南中天万运','zhongtie'=>'中铁快运','zhongtong'=>'中通快递','zhongxinda'=>'忠信达快递','zhongyou'=>'中邮物流',);
if(!empty($_GET['data']))
{
	$d=$_GET['data'];
	preg_match("#(.*?)快递([0-9a-zA-Z]+)#",$d,$m);
	if(isset($m[2]))
	{
		$name=$m[1];
		$t='';
		foreach($expresses as $k=>$v)
		{
			
			if(strpos('#'.$v.'#',trim($name))>0 || strpos('#'.$v.'#',$k)>0)
			{
				$com=$k;
				break;
			}
		}
		$nu=$m[2];
	}
	if(!empty($com) && !empty($nu))
	{
		$url='http://api.ickd.cn/?id=F4CF4246A092F227A93660322084845C&com='.$com.'&nu='.$nu.'&encode=json&type=utf8';
		$content=str_replace("\n","",getContent($url));
		$data= json_decode(iconv('gbk','utf-8',$content));
		foreach($data->data as $k=>$v)
		{
			echo $v->time." ".$v->context."\n";
		}
	}
	else
	{
		echo '未查询到 '.$d.' 的信息,参考格式：圆通快递23094385';
	}
}
function getContent($url)
{
	$content=@file_get_contents($url);
	if(empty($content))
	{
		include "../../../inc/http/curlHttp.class.php";
		$http=new curlHttp();
		//$http->setHeader('Referer','http://api.showji.com/Locating/www.showji.com.aspx?m=13900008888&output=json');
		$content=$http->get($url);
	}
	if(empty($content))
	{
		include "../../../inc/http/fsockopenHttp.class.php";
		$http=new fsockopenHttp();
		//$http->setHeader('Referer','http://api.showji.com/Locating/www.showji.com.aspx?m=13900008888&output=json');
		$content=$http->get($url);
	}
	return $content;
}
