<?php
namespace Index\Model;
use Think\Model;
class ShopcartModel extends Model {
	public function __construct() {
		parent::__construct();
		$this -> Shopcart = M('shopcart');
		$this -> Order = M('orders');
		$this -> User = M('user');
		$this -> Receive = M('receive');
	}

	/*加入购物车功能的实现*/
	public function addToshopcart($userID, $goodID) {
		$data['goodID'] = $goodID;
		$data['customerID'] = $userID;

		if ($this -> Shopcart -> where($data) -> find()) {
			$rs = "repeat";
		} else {
			$rs = $this -> Shopcart -> add($data);
		}
		return $rs;
	}

	/*移除购物车商品的实现*/
	public function removeShopcartItem($userID, $goodID) {
		$data['goodID'] = $goodID;
		$data['customerID'] = $userID;
		$rs = $this -> Shopcart -> where($data) -> delete();
		return $rs;
	}

	/*生成新的订单信息的实现*/
	public function makeNewList($userID, $goodsIDArr, $total, $listMadeTime) {
		$data['orderID'] = getRandChar(8);
		//生成8位订单随机号
		$data['totalMoney'] = $total;
		$data['customerID'] = $userID;
		$data['orderStatus'] = 0;
		//订单状态，0为已下单未付款
		$data['orderTime'] = $listMadeTime;
		//每个用户下单，orderID、customerID、orderTime三者确定一张订单
		foreach ($goodsIDArr as $goodID) {
			$data['goodID'] = $goodID;
			$this -> Order -> add($data);
		}
		//删除掉已经提交的购物车商品
		foreach ($goodsIDArr as $goodID) {
			$data2['goodID'] = $goodID;
			$data2['customerID'] = $userID;
			$this -> Shopcart -> where($data2) -> delete();
		}

		return $data['orderID'];
	}

	/*加载订单确认页面的各个商品Item*/
	public function loadConfirmList($userID, $orderID, $type) {
		$data['orderID'] = $orderID;
		$data['customerID'] = $userID;
		$data['orderStatus'] = 0;
		if ($type == "goods") {
			$rs = $this -> Order -> join('goods ON goods.id=orders.goodID') -> where($data) -> select();
		} else {
			$rs = $this -> Order -> join('service ON service.id=orders.goodID') -> where($data) -> select();
		}
		return $rs;
	}

	/*进行支付功能，校验支付密码*/
	public function checkPayPassword($userID, $payPassword) {
		$data['userID'] = $userID;
		$data['payPassword'] = $payPassword;
		/*注意给数据库传送字段的时候，字符串的都需要加上双引号，负责会出现数据库字段不存在错误*/
		$rs = $this -> User -> where($data) -> find();
		/*使用getField可以直接取出字段的值，之后不需要再使用select()*/
		return $rs;
	}
	//对用户进行扣款，检验扣款是否成功
	public function deduct($userID,$total) {
		$data['id'] = $userID;
		$userBanlance = $this -> User -> where($data) -> getField('balance');
		//这里的$userBanlance为一个临时的比较值
		if(intval($userBanlance)>intval($total)){	
			$data1["balance"]=intval($userBanlance)-intval($total);
			$rs = $this -> User -> where('id='.$userID) -> save($data1);
		}else{
			$rs=0;
		}
		return $rs;
	}

	public function changeListStatus($orderID,$userID) {
		$data1['userID'] = $userID;
		$data1['default'] = 1;
		$rs1 = $this -> Receive -> where($data1) -> getField('receiveID');
		$data['orderStatus'] = 1;//订单状态为1,意思为已经付款，未发货
		$data['receiveID'] = $rs1;
		$rs = $this -> Order -> where('orderID="'.$orderID.'"') -> save($data);
		return $rs;
	}

	/*加载订单分类页面的各个商品Item*/
	public function loadOrderBizList($orderStatus,$type) {
		$data['orderStatus'] = $orderStatus;
		if ($type == "goods") {
			$rs = $this -> Order -> group('orderID')->join('goods ON goods.id=orders.goodID') -> where($data) -> field('orderid,img1,name,totalmoney')->select();
		} else {
			$rs = $this -> Order -> group('orderID')-> join('service ON service.id=orders.goodID') -> where($data) ->field('orderid,img1,name,totalmoney')-> select();
		}
		return $rs;
	}

	/*移除订单列表删除的实现*/
	public function removeOrderListItem($orderID) {
		$data['orderID'] = $orderID;
		$rs = $this -> Order -> where($data) -> delete();
		return $rs;
	}
	
	
	//计算各个状态的订单的数目，并显示
	public function countOrderStatusNum($userID) {
		/*$data['userID'] = $userID;*/
		/*$data['orderStatus'] = 1;*/
		$rs = $this -> Order -> query('select orderstatus,count(distinct orderid) as num  from orders where customerID="'.$userID.'" group by orderstatus');
		return $rs;
	}

}
