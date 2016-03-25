<?php
namespace Home\Model;
use Think\Model;
class PersonaboutModel extends Model {
	/*
	*	实现数据信息的查询
	*/
	public function personabout(){
		return $this->Table("personabout")->select();
	}


	/*
	*	实现信息的完善功能
	*/
	public function addpersonabout($sesname){
		//接收id
		$id = $_POST['id'];
		//接收表单信息
		$uname = $_POST['uname'];
		$phone = $_POST['phone'];
		$qq = $_POST['qq'];
		$email = $_POST['email'];

		//接收头像信息
		$upload = new \Think\Upload();// 实例化上传类
		$upload->maxSize   =     3145728 ;// 设置附件上传大小
		$upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
		$upload->rootPath="./";
		$upload->savePath  =      '/Uploads/'; // 设置附件上传目录
		// 上传文件
		$info   =   $upload->upload();

		$img=$info['img']['savepath'].$info['img']['savename'];
		$img2=substr($img,9);
		$data=array("uname"=>$uname,"img"=>$img,"phone"=>$phone,"qq"=>$qq,"email"=>$email);
		if($info) {
			return $this->Table("personabout")->where("id=$id")->save($data);
		}

	}
}
?>