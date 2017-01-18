<?php
/**
 * Created by HBuilder.
 * User: HXW
 * Date: 16-12-9
 * Time: 下午14:55
 */
namespace Index\Model;
use Think\Model;
class AdModel extends Model{
    public  function __construct()
    {
        parent::__construct();
        $this->AD=M('ad');
    }


	/*postMedia方法用于插入media数据*/
    public function loadad($position){
    	/*将接受的数据打包成$data，这里data的下标名字，需要与表中字段名称对应*/
    	$data['position']=$position;
		/*返回被操作的id*/
		$rs=$this->AD->where($data)->field('img1,img2,img3')->select();
        return $rs;
    }

	
}