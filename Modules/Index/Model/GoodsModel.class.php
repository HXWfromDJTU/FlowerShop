<?php
namespace Index\Model;
use Think\Model;
class GoodsModel extends Model{
    public  function __construct()
    {
        parent::__construct();
        $this->Goods=M('goods');
		$this->Service=M('service');
    }

	/*推荐商品+服务的方法*/
	public function loadRecommend($type){
		if($type=="goods"){
			$rs=$this->Goods->query("select * from Goods order by monthlySale desc limit 0,5");
		}else{
			$rs=$this->Service->query("select * from Service order by monthlySale desc limit 0,5");
		}
		/*$rs = $this->Goods->join("service")->order("monthlySale desc")->limit(5)->select();*/
        return $rs;
    }
	
	
	
	public function loadGoods($goodType){
		$data["goodType"]=$goodType;
		$rs=$this->Goods->where($data)->select();
        return $rs;
    }
	
	
	public function loadService($serviceType){
		$data["serviceType"]=$serviceType;
		$rs=$this->Service->where($data)->select();
        return $rs;
    }

	/*加载商品+服务详情页面的方法*/
	public function loadGoodDetail($ID,$type){
		$data["id"]=$ID;
		if($type=="goods"){
			$rs=$this->Goods->where($data)->select();
		}else{
			$rs=$this->Service->where($data)->select();
		}
        return $rs;
    }
	
	
	public function loadShopcart($goodType,$userID){
		$data["customerID"]=$userID;
		if($goodType=="goods"){
			$rs=$this->Goods->join("shopcart ON goods.id=shopcart.goodID")->where($data)->select();
		}else if($goodType=="service"){
			$rs=$this->Service->join("shopcart ON service.id=shopcart.goodID")->where($data)->select();
		}
        return $rs;
    }
}