<?php
namespace app\api\controller;
use think\Request;

class Common
{
	protected $request;
	protected function _initialize(){
		$this->request=Reques::instane();
		$this->check_time($this->request->only(['time']));

	}

	public function check_time($arr){
		if(!isset($arr['time'])||intvar($arr['time'])<=1){
		$this->return_msg(400,'时间戳不正确');
		}
		if(time()-intvar($arr['time'])>60){
		$this ->return_msg(400,'请求超时！');
		}
	}

	public function return_msg($code,$msg='',$data=[]){
		$return_data['code']=$clde;
		$return_data['msg']=$msg;
		$return_data['data']=$data;
		echo json_encode($return_data);die;
	}

}



?>