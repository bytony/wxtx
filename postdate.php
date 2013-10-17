<?php

$url = "http://127.0.0.1/wxapi.php";//接收XML地址
//$header = "Content-type: text/xml";//定义content-type为xml
$xml_data= "<xml>
 <ToUserName><![CDATA[gh_423dwjkeww3]]></ToUserName>
 <FromUserName><![CDATA[gh_423dwjkeww3]]></FromUserName> 
 <CreateTime>1348831860</CreateTime>
 <MsgType><![CDATA[text]]></MsgType>
 <Content><![CDATA[this is a test]]></Content>
 <MsgId>1234567890123456</MsgId>
 </xml>"; 
$post_data = array (
    "Content" => $xml_data,
    "query" => "Nettuts",
    "action" => "Submit"
);
//var_dump($post_data);

		 $header[] = "Content-type: text/xml";//定义content-type为xml
        $ch = curl_init(); //初始化curl
        curl_setopt($ch, CURLOPT_URL, $url);//设置链接
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);//设置是否返回信息
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);//设置HTTP头
        curl_setopt($ch, CURLOPT_POST, 1);//设置为POST方式
        curl_setopt($ch, CURLOPT_POSTFIELDS, $xml_data);//POST数据
        $response = curl_exec($ch);//接收返回信息
        if(curl_errno($ch)){//出错则显示错误信息
             print curl_error($ch);
        }
         curl_close($ch); //关闭curl链接
        echo  $response;
?>