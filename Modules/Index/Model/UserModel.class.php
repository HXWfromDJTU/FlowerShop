<?php
/**
 * Created by HBuilder.
 * User: HXW
 * Date: 16-12-9
 * Time: 下午14:55
 */
namespace Index\Model;
use Think\Model;
class UserModel extends Model {
	public function __construct() {
		parent::__construct();
		$this -> User = M('user');
		$this -> Receive = M('receive');
	}

	/*检查用户是否已经存在*/
	public function checkRepeat($username) {
		/*返回被操作的id*/
		$rs = $this -> User -> where('username="' . $username . '"') -> find();
		return $rs;
	}

	/*postMedia方法用于插入media数据*/
	public function register($username, $password, $email, $birth, $introduction, $nickname) {
		/*将接受的数据打包成$data，这里data的下标名字，需要与表中字段名称对应*/
		$data['username'] = $username;
		$data['password'] = $password;
		$data['email'] = $email;
		$data['birthday'] = $birth;
		$data['introduction'] = $introduction;
		$data['nickname'] = $nickname;
		/*返回被操作的id*/
		$rs = $this -> User -> add($data);
		return $rs;
	}

	public function findPsd($username) {
		/*将接受的数据打包成$data，这里data的下标名字，需要与表中字段名称对应*/
		$data['username'] = $username;
		$rs = $this -> User -> where($data) -> field('id,password') -> select();
		/*使用getField可以直接取出字段的值，之后不需要再使用select()*/
		return $rs;
	}
	//增加活跃度的方法
	public function addActiveness($userID) {
		$data['userID'] = $userID;
		$activeness = $this -> User -> where($data) -> getField('activeness');
		$data1["activeness"]=intval($activeness)+5;//每次成功登陆增加5活跃度
		$rs = $this -> User -> where('id='.$userID) -> save($data1);
		return $rs;
	}

	public function findMail($username) {
		/*将接受的数据打包成$data，这里data的下标名字，需要与表中字段名称对应*/
		$data['username'] = $username;
		/*注意给数据库传送字段的时候，字符串的都需要加上双引号，负责会出现数据库字段不存在错误*/
		$rs = $this -> User -> where($data) -> field('password,email') -> select();
		/*使用getField可以直接取出字段的值，之后不需要再使用select()*/
		return $rs;
	}

	public function loadUserMessage($userID) {
		$data['id'] = $userID;
		$rs = $this -> User -> where($data) -> select();
		return $rs;
	}

	public function loadAddressMSG($userID) {
		$data['userID'] = $userID;
		$rs = $this -> Receive -> where($data) -> select();
		return $rs;
	}
	
	public function changeReceiveDefault($receiveID,$userID) {
		$data['default'] = 0;
		$data['userID'] = $userID;
		$rs = $this -> Receive -> where('userID='.$userID) -> save($data);
		$data1["receiveID"]=$receiveID;
		$data1['default'] = 1;
		$rs = $this -> Receive -> where('receiveID='.$receiveID) -> save($data1);
		return $rs;
	}
	
	public function removeReceiveItem($receiveID) {
		$data['receiveID'] = $receiveID;
		$rs = $this -> Receive -> where($data) -> delete();
		return $rs;
	}
	
	
	public function changeUserInfo($userID,$nickname,$password,$introduction,$birthday,$email) {
		$data['nickname'] = $nickname;
		$data['password'] = $password;
		$data['introduction'] = $introduction;
		$data['birthday'] = $birthday;
		$data['email'] = $email;
		$rs = $this -> User -> where('id="'.$userID.'"') -> save($data);
		return $userID;
	}
}
