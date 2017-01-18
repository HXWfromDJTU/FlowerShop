<?php

namespace Index\Model;
use Think\Model;
class CommentModel extends Model{
    public  function __construct()
    {
        parent::__construct();
        $this->Comment=M('comment');
		$this->User=M('user');
    }
	/*检查用户是否已经存在*/
	public function loadComment($goodID,$type){
		$data["toGoodID"]=$goodID;
		$data['goodType']=$type;
		/*返回被操作的id*/
		$rs=$this->Comment->join("user ON user.id=comment.fromUserID")->order('commenttime desc')->field('toGoodID,user.id,headImgSrc,nickname,content,commentTime')->where($data)->select();
        return $rs;
    }
	
	
	public function pushComment($goodID,$userID,$content,$commentTime,$type){
		$data['toGoodID']=$goodID;
		$data['fromUserID']=$userID;
		$data['content']=$content;
		$data['commentTime']=$commentTime;
		$data['goodType']=$type;
		/*注意给数据库传送字段的时候，字符串的都需要加上双引号，负责会出现数据库字段不存在错误*/
		$rs	=	$this->Comment->add($data);
		$userInfo =$this->User->where('id='.$userID)->field('id,nickname,headImgSrc')->select();
		/*使用getField可以直接取出字段的值，之后不需要再使用select()*/
        return $userInfo;
    }
	
}