<?php
namespace Index\Controller;
use Think\Controller;
class AdController extends Controller {
	public function __construct() {
		parent::__construct();
		$this -> ADPath = new \Index\Model\AdModel();
	}

	/*postMedia()方法用于插入发表的媒体内容*/
	public function loadad() {
		$position = $_POST["position"];
		$resData = array();
		$resData["message"] = "succ";
		$resData["code"] = "0000";
		/*调用model，传相关参数给model，并调用对应model下的方法进行数据库操作*/
		$resData["data"] = $this -> ADPath -> loadad($position);

		/*返回结果集给前端*/
		echo json_encode($resData);
	}
	
}
