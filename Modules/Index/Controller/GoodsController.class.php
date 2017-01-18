<?php
namespace Index\Controller;
use Think\Controller;
class GoodsController extends Controller {
	public function __construct() {
		parent::__construct();
		$this -> goodsPath = new \Index\Model\GoodsModel();
	}



	public function loadRecommend() {
		$type = $_POST["type"];
		$resData = array();
		$resData["message"] = "succ";
		$resData["code"] = "0000";
		$resData["data"]= $this -> goodsPath->loadRecommend($type);
		echo json_encode($resData);
	}
	public function loadGoods() {
		$goodType = $_POST["goodType"];
		$resData = array();
		$resData["message"] = "succ";
		$resData["code"] = "0000";
		$resData["data"]= $this -> goodsPath->loadGoods($goodType);
		echo json_encode($resData);
	}
	
	public function loadService() {
		$serviceType = $_POST["serviceType"];
		$resData = array();
		$resData["message"] = "succ";
		$resData["code"] = "0000";
		$resData["data"]= $this -> goodsPath->loadService($serviceType);
		echo json_encode($resData);
	}
	
	public function loadGoodDetail() {
		$ID = $_POST["goodID"];
		$type = $_POST["type"];
		$resData = array();
		$resData["message"] = "succ";
		$resData["code"] = "0000";
		$resData["data"]= $this -> goodsPath->loadGoodDetail($ID,$type);
		echo json_encode($resData);
	}
	
	
	public function loadShopcart() {
		$goodType = $_POST["type"];
		$userID = $_POST["userID"];
		$resData = array();
		$resData["message"] = "succ";
		$resData["code"] = "0000";
		$resData["data"]= $this -> goodsPath->loadShopcart($goodType,$userID);
		echo json_encode($resData);
	}

}
