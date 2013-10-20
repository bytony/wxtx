<?php

$post_data='{
     "button":[
     {  
          "type":"view",
          "name":"我是VIP",
          "url":"http://wxtx8888.com/index.php?con=wap&act=vipcard&wx_id=gh_afcb2af9dfe1"
      },
      {
           "type":"view",
           "name":"主页",
           "url":"http://wxtx8888.com/index.php?con=wap&act=index&wx_id=gh_afcb2af9dfe1"
      },
      {
           "name":"更多",
           "sub_button":[
            {
               "type":"view",
               "name":"我们的荣耀",
               "url":"http://wxtx8888.com/index.php?con=wap&act=item&id=71&cid=0"
            },
            {
               "type":"view",
               "name":"大转盘",
               "url":"http://wxtx8888.com/views/app/rotate/"
            },
            {
               "type":"view",
               "name":"优惠活动",
               "url":"http://wxtx8888.com/index.php?con=wap&act=item&id=72&cid=0"
            },
            {
               "type":"view",
               "name":"关于全部",
               "url":"http://wxtx8888.com/index.php?con=wap&act=item&id=70&cid=0"
            }
            ]
       }]
 }';
  
    $url = "api.weixin.qq.com/cgi-bin/menu/create?access_token=6ifgUskw_Wywfw-DdvvC3VWPf2Fzi28QRlZnesc18p2RRcNSAKw2FcI3qkEZCI-9NxqaNaSU3qBmuc_myfjP2IuMIKy7wK8neYaFLWeFoJ4_cmU3HiJb33apCZ_iFpE5aZVs1U2bzwO4UOaACLlfpA";
    //$url = "127.0.0.1/wxapi.php";
    //$post_data = '12';
    $ch = curl_init();  
    curl_setopt($ch, CURLOPT_POST, 1);  
    curl_setopt($ch, CURLOPT_URL,$url);  
    curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);  
    ob_start();  
    curl_exec($ch);  
    $result = ob_get_contents() ;  
    ob_end_clean(); 
    var_dump($result);
    echo $result;  
  
  


//$url = "http://wxtx8888.com/userapi/wxapi.php";
//$url = "http://127.0.0.1/userapi/wx_sample.php";//接收XML地址
//$header = "Content-type: text/xml";//定义content-type为xml
// $xml_data= "<xml>
//  <ToUserName><![CDATA[gh_423dwjkeww3]]></ToUserName>
//  <FromUserName><![CDATA[gh_423dwjkeww3324]]></FromUserName> 
//  <CreateTime>1348831860</CreateTime>
//  <MsgType><![CDATA[text]]></MsgType>
//  <Content><![CDATA[主页]]></Content>
//  <MsgId>1234567890123456</MsgId>
//  </xml>"; 


	// //	$header[] = "Content-type: text/xml";//定义content-type为xml
 //        $ch = curl_init(); //初始化curl
 //        curl_setopt($ch, CURLOPT_URL, $url);//设置链接
 //        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);//设置是否返回信息
 //        //curl_setopt($ch, CURLOPT_HTTPHEADER, $header);//设置HTTP头
 //        curl_setopt($ch, CURLOPT_POST, 1);//设置为POST方式
 //        curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);//POST数据
 //        $response = curl_exec($ch);//接收返回信息
 //       // if(curl_errno($ch)){//出错则显示错误信息
 //        //     print curl_error($ch);
 //      //  }
 //         curl_close($ch); //关闭curl链接
 //        echo  $response;
?>