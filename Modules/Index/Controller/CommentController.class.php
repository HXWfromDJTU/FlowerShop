<?php
namespace Index\Controller;
use Think\Controller;
class CommentController extends Controller {
	public function __construct() {
		parent::__construct();
		$this -> commentPath = new \Index\Model\CommentModel();
	}
	
	public function loadComment() {
		$goodID=$_POST["goodID"];
		$type = $_POST["type"];
		$resData = array();
		$resData["message"] = "succ";
		$resData["code"] = "0000";
		/*调用model，传相关参数给model，并调用对应model下的方法进行数据库操作*/
		$resData["data"]= $this -> commentPath -> loadComment($goodID,$type);
		
		
		/*返回结果集给前端*/
		echo json_encode($resData);
	}
	
	
	public function pushComment() {
		$goodID = $_POST["goodID"];
		$type = $_POST["type"];
		$userID = $_POST["userID"];
		$content = $_POST["content"];
		/*记录当前存储时间*/
		$datetime = new \DateTime;
		$commentTime=$datetime->format('Y-m-d H:i:s');
		$resData = array();
		$resData["message"] = "succ";
		$resData["code"] = "0000";
		/*调用model，传相关参数给model，并调用对应model下的方法进行数据库操作*/
		$resData["data"] = $this -> commentPath -> pushComment($goodID,$userID,$content,$commentTime,$type);
		/*返回结果集给前端*/
		echo json_encode($resData);
	}


}
