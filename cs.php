<?php
    $host = "https://kuaidid.market.alicloudapi.com";
    $path = "/danhao";
    $method = "POST";
    $appcode = "bcdc86d09a064fcfae061ce440db4e26";
    $headers = array();
    array_push($headers, "Authorization:APPCODE " . $appcode);
    //根据API的要求，定义相对应的Content-Type
    array_push($headers, "Content-Type".":"."application/x-www-form-urlencoded; charset=UTF-8");
    $bodys = "src=75331570841562";
    $url = $host . $path;

    $curl = curl_init();
    curl_setopt($curl, CURLOPT_CUSTOMREQUEST, $method);//当进行HTTP请求时，传递一个字符被GET或HEAD使用。
    curl_setopt($curl, CURLOPT_URL, $url);//这是你想用PHP取回的URL地址。你也可以在用curl_init()函数初始化时设置这个选项。
    curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);//设置一个header中传输内容的数组。
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($curl, CURLOPT_FAILONERROR, false);//如果你想让PHP在发生错误(HTTP代码返回大于等于300)时，不显示，设置这个选项为一人非零值。默认行为是返回一个正常页，忽略代码。
    if (1 == strpos("$".$host, "https://"))
    {
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
    }
    curl_setopt($curl, CURLOPT_POSTFIELDS, $bodys);//传递一个作为HTTP “POST”操作的所有数据的字符串
	$res=json_decode(curl_exec($curl),true);
    if(empty($res['msg']['context'])){
        $arr=['status'=>0,'msg'=>'没查到任何快递信息，请判断快递单号是否正确'];
		echo "<pre>";
		print_r($arr);
		echo "</pre>";
		
    }else{
		echo "<pre>";
		print_r($res);
		echo "</pre>";
        //return $res;
    }
