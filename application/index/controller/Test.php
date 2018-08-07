<?php
namespace app\index\controller;

class Test{
	public function index(){
	$host = "yzxyzm.market.alicloudapi.com";
    $path = "/yzx/verifySms";
    $method = "POST";
    $appcode = "13b170695dd143e6bd2ff75f2fe735a2";
    $headers = array();
    array_push($headers, "Authorization:APPCODE " . $appcode);
    $querys = "phone=150xxxxxxxx&templateId=TP18040314&variable=code%3A123456";
    //$querys = "phone=135XXXX9999&templateId=TP18040314&variable=code%3A1234";
    $bodys = "";
    $url = $host . $path . "?" . $querys;

    $curl = curl_init();
    curl_setopt($curl, CURLOPT_CUSTOMREQUEST, $method);
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($curl, CURLOPT_FAILONERROR, false);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_HEADER, false);
    if (1 == strpos("$".$host, "https://"))
    {
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
    }
    //var_dump(curl_exec($curl)); 
    $res = curl_exec($curl);
    curl_close($curl);
    if ($res['return_code'] !== '10000') {
            $this->returnMsg(400, $xsend['msg']);
        } else {
            $this->returnMsg(200, '手机验证码发送成功，每天发送5次，请在十分钟内验证！');
        }
	}
}


?>