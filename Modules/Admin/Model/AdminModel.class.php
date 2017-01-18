<?php
namespace Admin\Model;
use Think\Model;
class AdminModel extends Model{
    protected $mediaPath;
    public  function __construct()
    {
        parent::__construct();
        $this->Admin=M('admin');
       	$this->User=M('user');
       	$this->Goods=M('goods');
       	$this->Service=M('service');
       	$this->AD=M('ad');
       	$this->Order=M('orders');
    }

	public function findPsd($adminName){
		$data["adminName"]=$adminName;
		$rs=$this->Admin->where($data)->field('id,adminPSD')->select();
		/*使用getField可以直接取出字段的值，之后不需要再使用select()*/
        return $rs;
    }
	
	/*从数据库中选出对应的用户信息，对应main页面的me页面*/
	public function loadAdminMessage($adminID){
		$data['id']=$adminID;
		$rs=$this->Admin->where($data)->field('nickname')->select();
        return $rs;
    }
    
    //-----------------------------------用户管理-------------------------------------------------------
	public function loadUserMessageList($userID){
		$data['id'] = $userID;
		if($userID==null){
			$rs=$this->User->field('id,nickname,headImgSrc,balance,birthday,introduction')->select();
		}else{
			$rs=$this->User->where($data)->select();
		}
        return $rs;
    }
    
    /*管理员删除用户实现*/
	public function deleteUser($userID) {
		$data['id'] = $userID;
		$rs = $this -> User -> where($data) -> delete();
		return $rs;
	}
    
    public function changeUserInfo($userID,$username,$nickname,$password,$introduction,$birthday,$email,$payPassword,$balance,$headImgSrc,$activeness) {
		$data['username'] = $username;
		$data['nickname'] = $nickname;
		$data['password'] = $password;
		$data['introduction'] = $introduction;
		$data['birthday'] = $birthday;
		$data['email'] = $email;
		$data['payPassword'] = $payPassword;
		$data['balance'] = $balance;
		$data['headImgSrc'] = $headImgSrc;
		$data['activeness'] = $activeness;
		if($userID=="add"){
			$rs = $this -> User -> add($data);	
		}else{
			$rs = $this -> User -> where('id="'.$userID.'"') -> save($data);
		}
		return $rs;
	}
    
     
  //-----------------------------------商品管理-------------------------------------------------------
	public function loadGoodMessageList($goodID){
		$data['id'] = $goodID;
		if($goodID==null){
			$rs=$this->Goods->field('id,name,img1,price,storage,monthlySale,description')->select();
		}else{
			$rs=$this->Goods->where($data)->select();
		}
        return $rs;
   }
    /*管理员删除套餐实现*/
	public function deleteSet($goodID) {
		$data['id'] = $goodID;
		$rs = $this -> Goods -> where($data) -> delete();
		return $rs;
	}
    
   public function changeGoodInfo($img1,$img2,$img3,$detailImg1,$detailImg2,$detailImg3,$goodID,$name,$price,$monthlySale,$storage,$brand,$deliverType,$use,$origin,$goodType) {
		$data['img1'] = $img1;
		$data['img2'] = $img2;
		$data['img3'] = $img3;
		$data['detailImg1'] = $detailImg1;
		$data['detailImg2'] = $detailImg2;
		$data['detailImg3'] = $detailImg3;
		$data['goodID'] = $goodID;
		$data['name'] = $name;
		$data['price'] = $price;
		$data['monthlySale'] = $monthlySale;
		$data['storage'] = $storage;
		$data['brand'] = $brand;
		$data['deliverType'] = $deliverType;
		$data['use'] = $use;
		$data['origin'] = $origin;
		$data['goodType'] = $goodType;
		if($goodID=="add"){
			$rs = $this -> Goods -> add($data);	
		}else{
			$rs = $this -> Goods -> where('id="'.$goodID.'"') -> save($data);
		}
		
		return $rs;
	}
    
    //------------------------------------------订单-----------------------------------------------
  	/*加载订单分类页面的各个商品Item*/
	public function loadOrderBizList($orderStatus) {
		$data['orderStatus'] = $orderStatus;
		$rs = $this -> Order ->group('order.id') ->join('sets ON sets.id=order.setID')->join('album ON album.orderID=order.id') -> where($data) ->field('album.id as albumID,order.id as orderID,coverImg,title,totalMoney,orderStatus')-> select();	
		return $rs;
	}
	/*订单确认页面加载订单信息*/
	public function loadConfirmOrder($orderID) {
		$data['order.id'] = $orderID;
		$rs = $this -> Order ->where($data) -> select();
		return $rs;
	}
	
	//-----------------------------------摄影师管理-------------------------------------------------------
	public function loadPhotographerList($photographerID){
		$data['id'] = $photographerID;
		if($photographerID==null){
			$rs=$this->Photographer->field('id,name,headImg,price,introduction,style')->select();
		}else{
			$rs=$this->Photographer->where($data)->select();
		}
        return $rs;
   }
    /*管理员删除用户实现*/
	public function deletePhotographer($photographerID) {
		$data['id'] = $photographerID;
		$rs = $this -> Photographer -> where($data) -> delete();
		return $rs;
	}
    
   public function changePhotographerInfo($photographerID,$name,$style,$price,$headImg,$introduction,$detailImg) {
		$data['id'] = $photographerID;
		$data['name'] = $name;
		$data['style'] = $style;
		$data['price'] = $price;
		$data['headImg'] = $headImg;
		$data['introduction'] = $introduction;
		$data['detailImg'] = $detailImg;
		if($photographerID=="add"){
			$rs = $this -> Photographer -> add($data);	
		}else{
			$rs = $this -> Photographer -> where('id="'.$photographerID.'"') -> save($data);
		}
		return $headImg;
	}
}