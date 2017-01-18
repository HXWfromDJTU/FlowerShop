<?php
namespace Index\Controller;
use Think\Controller;
class ShopcartController extends Controller {
	public function __construct() {
		parent::__construct();
		$this -> shopcartPath = new \Index\Model\ShopcartModel();
	}

	/*加入购物车功能的实现*/
	public function addToshopcart() {
		$userID = $_POST["userID"];
		$goodID = $_POST["goodID"];
		/*设定结果集*/
		$resData["message"] = "succ";
		$resData["code"] = "0000";
		/*调用model，传相关参数给model，并调用对应model下的方法进行数据库操作*/
		$resData["data"] = $this -> shopcartPath -> addToshopcart($userID, $goodID);
		/*返回结果给前端*/
		/*echo $resData;*/
		echo json_encode($resData);
	}

	/*移除购物车商品的实现*/
	public function removeShopcartItem() {
		$userID = $_POST["userID"];
		$goodID = $_POST["goodID"];
		/*设定结果集*/
		$resData["message"] = "succ";
		$resData["code"] = "0000";
		/*调用model，传相关参数给model，并调用对应model下的方法进行数据库操作*/
		$resData["data"] = $this -> shopcartPath -> removeShopcartItem($userID, $goodID);
		/*返回结果给前端*/
		echo json_encode($resData);
	}

	/*从购物车选择商品生成新订单功能的实现*/
	public function makeNewList() {
		$userID = $_POST["userID"];
		$goodsIDArr = $_POST["goodsIDArr"];
		$total = $_POST["total"];
		$datetime = new \DateTime;
		$listMadeTime = $datetime -> format('Y-m-d H:i:s');
		/*设定结果集*/
		$resData["message"] = "succ";
		$resData["code"] = "0000";
		/*调用model，传相关参数给model，并调用对应model下的方法进行数据库操作*/
		$resData["data"]["orderID"] = $this -> shopcartPath -> makeNewList($userID, $goodsIDArr, $total, $listMadeTime);
		$resData["data"]["orderTime"] = $listMadeTime;
		/*返回结果给前端*/
		/*echo $resData;*/
		echo json_encode($resData);
	}

	/*确认订单页面加载商品/服务的实现*/
	public function loadConfirmList() {
		$userID = $_POST["userID"];
		$orderID = $_POST["orderID"];
		$type = $_POST["type"];
		/*设定结果集*/
		$resData["message"] = "succ";
		$resData["code"] = "0000";
		/*调用model，传相关参数给model，并调用对应model下的方法进行数据库操作*/
		$resData["data"] = $this -> shopcartPath -> loadConfirmList($userID, $orderID, $type);
		/*返回结果给前端*/
		echo json_encode($resData);
	}

	/*进行支付功能，校验支付密码*/
	public function checkPayPassword() {
		$userID = $_POST["userID"];
		$payPassword = $_POST["payPassword"];
		$orderID = $_POST["orderID"];
		$total = $_POST["total"];
		$resData = array();
		$resData["message"] = "succ";
		$resData["code"] = "0000";
		/*调用model，传相关参数给model，并调用对应model下的方法进行数据库操作*/
		$rs = $this -> shopcartPath -> checkPayPassword($userID, $payPassword);
		$deductRS = $this -> shopcartPath -> deduct($userID, $total);
		/*比较提交密码与查询密码是否正确*/
		if ($rs == null) {
			$resData["data"]["pay-status"] = "fail";
		} else {
			if ($deductRS == 1) {
				$resData["data"]["pay-status"] = "succ";
				//支付成功后进行订单的状态修改
				if ($this -> changeListStatus($orderID,$userID)) {
					$resData["data"]["change-list-status"] = "succ";
				} else {
					$resData["data"]["change-list-status"] = "fail";
				}
			} else {
				$resData["data"]["pay-status"] = "notEnough";
			}

		}
		echo json_encode($resData);
	}
	//从余额中扣除的方法
	public function deduct($userID, $total) {
		$rs = $this -> shopcartPath -> deduct($userID, $total);
		return $rs;
	}
	//支付成功后进行订单的状态修改
	public function changeListStatus($orderID,$userID) {
		$rs = $this -> shopcartPath -> changeListStatus($orderID);
		return $rs;
	}
	
	
	
	/*加载订单分类页面的订单list*/
	public function loadOrderBizList() {
		$orderStatus = $_POST["orderStatus"];
		$goodType = $_POST["goodType"];
		/*设定结果集*/
		$resData["message"] = "succ";
		$resData["code"] = "0000";
		/*调用model，传相关参数给model，并调用对应model下的方法进行数据库操作*/
		$resData["data"] = $this -> shopcartPath -> loadOrderBizList($orderStatus,$goodType);
		/*返回结果给前端*/
		echo json_encode($resData);
	}
	
	
	
	/*移除订单列表的条目的实现*/
	public function removeOrderListItem() {
		$orderID = $_POST["orderID"];
		/*设定结果集*/
		$resData["message"] = "succ";
		$resData["code"] = "0000";
		/*调用model，传相关参数给model，并调用对应model下的方法进行数据库操作*/
		$resData["data"] = $this -> shopcartPath -> removeOrderListItem($orderID);
		/*返回结果给前端*/
		/*echo $resData;*/
		echo json_encode($resData);
	}
	
	
	//计算各个状态的订单的数目，并显示
	public function countOrderStatusNum() {
		$userID = $_POST["userID"];
		/*设定结果集*/
		$resData["message"] = "succ";
		$resData["code"] = "0000";
		/*调用model，传相关参数给model，并调用对应model下的方法进行数据库操作*/
		$resData["data"] = $this -> shopcartPath -> countOrderStatusNum($userID);
		/*返回结果给前端*/
		echo json_encode($resData);
	}
}
