<?php
namespace Admin\Controller;
use Think\Controller;
class AdminController extends Controller {
	protected $adminPath;
	public function __construct() {
		parent::__construct();
		$this -> adminPath = new \Admin\Model\AdminModel();
	}


	public function login() {
		$adminName = $_POST["log_username"];
		$password = $_POST["log_psd"];
		$resData = array();
		$resData["message"] = "succ";
		$resData["code"] = "0000";
		/*调用model，传相关参数给model，并调用对应model下的方法进行数据库操作*/
		$rs = $this -> adminPath -> findPsd($adminName);
		/*比较提交密码与查询密码是否正确*/
		if ($password == $rs[0]["adminpsd"]) {
			$resData["data"]["login-status"] = "succ";
			$resData["data"]["userID"] = $rs[0]["id"];
		} else {
			$resData["data"]["login-status"] = "not-match";
		}
		/*返回结果集给前端*/
		if ($rs[0]["adminpsd"] == null) {
			$resData["data"]["login-status"] = "not-exist";
		}
		echo json_encode($resData);
	}

	public function loadAdminMessage() {
		$adminID = $_POST["adminID"];
		$resData = array();
		$resData["message"] = "succ";
		$resData["code"] = "0000";
		/*调用model，传相关参数给model，并调用对应model下的方法进行数据库操作*/
		$resData["data"] = $this -> adminPath -> loadAdminMessage($adminID);
		/*返回结果集给前端*/
		echo json_encode($resData);
	}
	//-----------------------------------用户管理-------------------------------------------------------
	public function loadUserMessageList() {
		$userID = $_POST["userID"];
		$resData = array();
		$resData["message"] = "succ";
		$resData["code"] = "0000";
		$resData["data"] = $this -> adminPath -> loadUserMessageList($userID);
		/*返回结果集给前端*/
		echo json_encode($resData);
	}
	
	public function deleteUser() {
		$userID = $_POST["userID"];
		/*设定结果集*/
		$resData["message"] = "succ";
		$resData["code"] = "0000";
		$resData["data"] = $this -> adminPath -> deleteUser($userID);
		/*返回结果给前端*/
		/*echo $resData;*/
		echo json_encode($resData);
	}
	
	public function changeUserInfo() {
		$userID = $_POST["userID"];
		$username = $_POST["username"];
		$nickname = $_POST["nickname"];
		$password = $_POST["password"];
		$introduction = $_POST["introduction"];
		$birthday = $_POST["birthday"];
		$email = $_POST["email"];
		$payPassword = $_POST["payPassword"];
		$balance = $_POST["balance"];
		$headImgSrc = $_POST["headImgSrc"];
		$activeness = $_POST["activeness"];
		$resData = array();
		$resData["message"] = "succ";
		$resData["code"] = "0000";		
		$resData["data"] = $this -> adminPath -> changeUserInfo($userID,$username,$nickname,$password,$introduction,$birthday,$email,$payPassword,$balance,$headImgSrc,$activeness);
		echo json_encode($balance);
	}
	
	
	//-----------------------------------商品管理-------------------------------------------------------
	
	public function loadGoodMessageList() {
		$goodID = $_POST["goodID"];
		$resData = array();
		$resData["message"] = "succ";
		$resData["code"] = "0000";
		$resData["data"] = $this -> adminPath -> loadGoodMessageList($goodID);
		
		/*返回结果集给前端*/
		echo json_encode($resData);
	}
	
	public function deleteGood() {
		$goodID = $_POST["goodID"];
		/*设定结果集*/
		$resData["message"] = "succ";
		$resData["code"] = "0000";
		$resData["data"] = $this -> adminPath -> deleteSet($goodID);
		/*返回结果给前端*/
		/*echo $resData;*/
		echo json_encode($resData);
	}
	
	

	public function changeGoodInfo() {
		$img1 = $_POST["img1"];
		$img2 = $_POST["img2"];
		$img3 = $_POST["img3"];
		$detailImg1 = $_POST["detailImg1"];
		$detailImg2 = $_POST["detailImg2"];
		$detailImg3 = $_POST["detailImg3"];
		$goodID = $_POST["goodID"];
		$name = $_POST["name"];
		$price = $_POST["price"];
		$monthlySale = $_POST["monthlySale"];
		$storage = $_POST["storage"];
		$brand = $_POST["brand"];
		$deliverType = $_POST["deliverType"];
		$use = $_POST["use"];
		$origin = $_POST["origin"];
		$goodType = $_POST["goodType"];
		$resData = array();
		$resData["message"] = "succ";
		$resData["code"] = "0000";	
		$resData["data"] = $this -> adminPath -> changeGoodInfo($img1,$img2,$img3,$detailImg1,$detailImg2,$detailImg3,$goodID,$name,$price,$monthlySale,$storage,$brand,$deliverType,$use,$origin,$goodType);
		echo json_encode($resData);
	}

//-----------------------------------------------订单管理部分-----------------------------------
	/*加载订单分类页面的订单list*/
	public function loadOrderBizList() {
		$orderStatus = $_POST["orderStatus"];
		/*设定结果集*/
		$resData["message"] = "succ";
		$resData["code"] = "0000";
		/*调用model，传相关参数给model，并调用对应model下的方法进行数据库操作*/
		$resData["data"] = $this -> adminPath -> loadOrderBizList($orderStatus);
		/*返回结果给前端*/
		echo json_encode($resData);
	}
	
	public function loadConfirmOrder() {
		$orderID = $_POST["orderID"];
		/*设定结果集*/
		$resData["message"] = "succ";
		$resData["code"] = "0000";
		/*调用model，传相关参数给model，并调用对应model下的方法进行数据库操作*/
		$resData["data"] = $this -> adminPath -> loadConfirmOrder($orderID);
		/*返回结果给前端*/
		echo json_encode($resData);
	}
	//-----------------------------------摄影师管理-------------------------------------------------------
	
	public function loadPhotographerList() {
		$photographerID = $_POST["photographerID"];
		$resData = array();
		$resData["message"] = "succ";
		$resData["code"] = "0000";
		$resData["data"] = $this -> adminPath -> loadPhotographerList($photographerID);
		
		/*返回结果集给前端*/
		echo json_encode($resData);
	}
	
	public function deletePhotographer() {
		$photographerID = $_POST["photographerID"];
		/*设定结果集*/
		$resData["message"] = "succ";
		$resData["code"] = "0000";
		$resData["data"] = $this -> adminPath -> deletePhotographer($photographerID);
		/*返回结果给前端*/
		echo json_encode($resData);
	}
	
	public function changePhotographerInfo() {
		$photographerID = $_POST["photographerID"];
		$name = $_POST["name"];
		$style = $_POST["style"];
		$price = $_POST["price"];
		$headImg = $_POST["headImg"];
		$introduction = $_POST["introduction"];
		$detailImg = $_POST["detailImg"];

		$resData = array();
		$resData["message"] = "succ";
		$resData["code"] = "0000";	
		$resData["data"] = $this -> adminPath -> changePhotographerInfo($photographerID,$name,$style,$price,$headImg,$introduction,$detailImg);
		echo json_encode($resData);
	}
}
