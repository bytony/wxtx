<?php
header("content-type:text/html;charset=utf-8");
//ip接口
/*http://api.qunar.com/ips.jcp*/
$content=file_get_contents('http://train.qunar.com/qunar/stationtostation.jsp?format=json&from=%E5%8C%97%E4%BA%AC&to=%E4%B8%8A%E6%B5%B7&type=oneway&date=20130726&ver=1374572386622&ex_track=&cityname=123456');
$result=json_decode($content);

/*if(!empty($result->trainInfo))
{
	foreach($result->trainInfo as $k=>$v)
	{
		echo $k."\t";
		foreach($v as $key=>$val)
		{
			echo $val->deptCity."->".$val->arriStation."\t";
		}
		echo "\n";
	}
}
*/
if(!empty($result->ticketInfo))
{
	foreach($result->ticketInfo as $k=>$v)
	{
		echo $k."\t";
		foreach($v as $key=>$val)
		{
			echo $val->type."-".$val->pr."\t";
		}
		echo "\n";
	}
}