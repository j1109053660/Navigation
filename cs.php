<?php
    $host = "https://kuaidid.market.alicloudapi.com";
    $path = "/danhao";
    $method = "POST";
    $appcode = "bcdc86d09a064fcfae061ce440db4e26";
    $headers = array();
    array_push($headers, "Authorization:APPCODE " . $appcode);
    //����API��Ҫ�󣬶������Ӧ��Content-Type
    array_push($headers, "Content-Type".":"."application/x-www-form-urlencoded; charset=UTF-8");
    $bodys = "src=75331570841562";
    $url = $host . $path;

    $curl = curl_init();
    curl_setopt($curl, CURLOPT_CUSTOMREQUEST, $method);//������HTTP����ʱ������һ���ַ���GET��HEADʹ�á�
    curl_setopt($curl, CURLOPT_URL, $url);//����������PHPȡ�ص�URL��ַ����Ҳ��������curl_init()������ʼ��ʱ�������ѡ�
    curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);//����һ��header�д������ݵ����顣
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($curl, CURLOPT_FAILONERROR, false);//���������PHP�ڷ�������(HTTP���뷵�ش��ڵ���300)ʱ������ʾ���������ѡ��Ϊһ�˷���ֵ��Ĭ����Ϊ�Ƿ���һ������ҳ�����Դ��롣
    if (1 == strpos("$".$host, "https://"))
    {
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
    }
    curl_setopt($curl, CURLOPT_POSTFIELDS, $bodys);//����һ����ΪHTTP ��POST���������������ݵ��ַ���
	$res=json_decode(curl_exec($curl),true);
    if(empty($res['msg']['context'])){
        $arr=['status'=>0,'msg'=>'û�鵽�κο����Ϣ�����жϿ�ݵ����Ƿ���ȷ'];
		echo "<pre>";
		print_r($arr);
		echo "</pre>";
		
    }else{
		echo "<pre>";
		print_r($res);
		echo "</pre>";
        //return $res;
    }
