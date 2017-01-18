<?php
namespace Index\Controller;
use Think\Controller;
class UserController extends Controller {
	protected $userPath;
	public function __construct() {
		parent::__construct();
		$this -> userPath = new \Index\Model\UserModel();
	}

	/*检查用户重复问题*/
	public function checkRepeat($username) {
		/*调用model，传相关参数给model，并调用对应model下的方法进行数据库操作*/
		$rs = $this -> userPath -> checkRepeat($username);
		/*返回结果集给前端*/
		return $rs;
	}

	/*postMedia()方法用于插入发表的媒体内容*/
	public function register() {
		$username = $_POST["reg_username"];
		$password = $_POST["reg_psd1"];
		$email = $_POST["reg_email"];
		$birth = $_POST["reg_birth"];
		$introduction = $_POST["reg_introduction"];
		$nickname = $_POST["reg_nickname"];
		$resData = array();
		$resData["message"] = "succ";
		$resData["code"] = "0000";
		/*调用用户名重复校验方法*/
		if ($this -> checkRepeat($username) == null) {
			/*调用model，传相关参数给model，并调用对应model下的方法进行数据库操作*/
			$rs = $this -> userPath -> register($username, $password, $email, $birth, $introduction, $nickname);
			$resData["data"]["reg-status"] = "succ";
		} else {
			$resData["data"]["reg-status"] = "repeat";
		}
		/*返回结果集给前端*/
		echo json_encode($resData);
	}

	/*postMedia()方法用于插入发表的媒体内容*/
	public function login() {
		$username = $_POST["log_username"];
		$password = $_POST["log_psd"];
		$resData = array();
		$resData["message"] = "succ";
		$resData["code"] = "0000";
		/*调用model，传相关参数给model，并调用对应model下的方法进行数据库操作*/
		$rs = $this -> userPath -> findPsd($username);
		/*比较提交密码与查询密码是否正确*/
		if ($password == $rs[0]["password"]) {
			$resData["data"]["login-status"] = "succ";
			$resData["data"]["userID"] = $rs[0]["id"];
			$this->addActiveness($rs[0]["id"]);
		} else {
			$resData["data"]["login-status"] = "not-match";
		}
		/*返回结果集给前端*/
		if ($rs[0]["password"] == null) {
			$resData["data"]["login-status"] = "not-exist";
		}
		echo json_encode($resData);
	}
	//增加活跃度的方法
	public function addActiveness($userID) {
		
		$rs = $this -> userPath -> addActiveness($userID);
		/*返回结果集给前端*/
		return $rs;
	}

	/*postMedia()方法用于插入发表的媒体内容*/
	public function findback() {
		$username = $_POST["find_username"];
		$find_mail = $_POST["find_mail"];
		$resData = array();
		$resData["message"] = "succ";
		$resData["code"] = "0000";
		/*调用model，传相关参数给model，并调用对应model下的方法进行数据库操作*/
		$rs = $this -> userPath -> findMail($username);
		/*比较提交密码与查询密码是否正确*/
		if ($find_mail == $rs[0]["email"]) {
			/*$this -> add($find_mail,"正在找回密码","您的账号是：".$username."密码是：".$rs[0]["password"]);*/
			if (SendMail($find_mail, "正在找回密码", "您的账号是：" . $username . "密码是：" . $rs[0]["password"])) {
				$resData["data"]["find-status"] = "succ";
			} else {
				$resData["data"]["find-status"] = "mail-fail";
			}
		} else {
			$resData["data"]["find-status"] = "not-match";
		}
		/*返回结果集给前端*/
		echo json_encode($resData);
	}
	
	public function loadUserMessage() {
		$userID = $_POST["userID"];
		$resData = array();
		$resData["message"] = "succ";
		$resData["code"] = "0000";
		/*调用model，传相关参数给model，并调用对应model下的方法进行数据库操作*/
		$resData["data"] = $this -> userPath -> loadUserMessage($userID);
		/*返回结果集给前端*/
		echo json_encode($resData);
	}

	public function loadAddressMSG() {
		$userID = $_POST["userID"];
		$resData = array();
		$resData["message"] = "succ";
		$resData["code"] = "0000";
		/*调用model，传相关参数给model，并调用对应model下的方法进行数据库操作*/
		$resData["data"] = $this -> userPath -> loadAddressMSG($userID);
		/*返回结果集给前端*/
		echo json_encode($resData);
	}


	public function changeReceiveDefault() {
		$receiveID = $_POST["receiveID"];
		$userID = $_POST["userID"];
		$resData = array();
		$resData["message"] = "succ";
		$resData["code"] = "0000";
		/*调用model，传相关参数给model，并调用对应model下的方法进行数据库操作*/
		$resData["data"] = $this -> userPath -> changeReceiveDefault($receiveID, $userID);
		/*返回结果集给前端*/
		echo json_encode($resData);
	}
	
	public function removeReceiveItem() {
		$receiveID = $_POST["receiveID"];
		$resData = array();
		$resData["message"] = "succ";
		$resData["code"] = "0000";
		
		$resData["data"] = $this -> userPath -> removeReceiveItem($receiveID);
		
		echo json_encode($resData);
	}
	
	
	public function changeUserInfo() {
		$userID = $_POST["userID"];
		$nickname = $_POST["nickname"];
		$password = $_POST["password"];
		$introduction = $_POST["introduction"];
		$birthday = $_POST["birthday"];
		$email = $_POST["email"];
		$resData = array();
		$resData["message"] = "succ";
		$resData["code"] = "0000";
		
		$resData["data"] = $this -> userPath -> changeUserInfo($userID,$nickname,$password,$introduction,$birthday,$email);
		
		echo json_encode($resData);
	}

}
