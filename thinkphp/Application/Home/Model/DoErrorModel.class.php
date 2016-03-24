<?php
	namespace Home\Model;
	use Think\Model;
	class DoErrorModel extends Model {
		//实现查询数据库信息判断
		public function errorsele(){
			return $this->Table("do_error")->select();
		}


		//图片上传
		public function adderror(){
			//图片
		    $upload = new \Think\Upload();// 实例化上传类
			$upload->maxSize   =     3145728 ;// 设置附件上传大小
			$upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
			$upload->rootPath="./";
			$upload->savePath  =      './Public/Uploads/'; // 设置附件上传目录
			// 上传文件
			$info   =   $upload->upload();

			$img=$info['img1']['savepath'].$info['img1']['savename'];
			$img2=substr($img,9);
			$img3 = $info['img2']['savepath'].$info['img2']['savename'];
			$img4=substr($img3,9);
			$data=array("index_error"=>$img2,"homeimg_error"=>$img4);
			if($info) {
				return $this->Table("do_error")->add($data);
			}
		}


		/*
		*	实现分页的查询
		*/
		public function searc_b(){
			//获取当前页
			$page=$_GET['page']?$_GET['page']:1;
			$page_size=5;
			$limit=($page-1)*$page_size;

			$num=$this->Table("do_error")->count();
			//echo $num;die;
			$yeshu=ceil($num/$page_size);
			//echo $yeshu;die;

			$data=$this->Table("do_error")->limit($limit,$page_size)->select();
			$arr=array($yeshu,$data);
			return $arr;
		}


		//实现删除功能
		public function errordele(){
			//接收id
			$id = $_GET['id'];
			return $this->Table("do_error")->where("id=$id")->delete();
		}

		/*
		*	实现详情功能
		*/
		public function errorabout($id){
			return $this->Table("do_error")->where("id=$id")->select();
		}

		/*
		*	实现修改
		*/
		public function updateerror($id){

			//图片
		    $upload = new \Think\Upload();// 实例化上传类
			$upload->maxSize   =     3145728 ;// 设置附件上传大小
			$upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
			$upload->rootPath="./";
			$upload->savePath  =      './Public/Uploads/'; // 设置附件上传目录
			// 上传文件
			$info   =   $upload->upload();

			$img=$info['img1']['savepath'].$info['img1']['savename'];
			$img2=substr($img,9);
			$img3 = $info['img2']['savepath'].$info['img2']['savename'];
			$img4=substr($img3,9);
			$data=array("index_error"=>$img2,"homeimg_error"=>$img4);
			if($info) {
				return $this->Table("do_error")->where("id=$id")->save($data);

			}
		}
	}
?>