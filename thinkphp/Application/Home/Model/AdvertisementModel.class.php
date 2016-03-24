<?php
	namespace Home\Model;
	use Think\Model;
	class AdvertisementModel extends Model {
		/*
		*	首页广告管理（郭旭峰）
		*/
		public function addadvertisement(){
		  //接收表传过来的信息
	      $adv_name = $_POST['adv_name'];
	      $adv_title = $_POST['adv_title'];
	      $adv_start = $_POST['adv_start'];
	      $adv_end = $_POST['adv_end'];
	      $adv_del = $_POST['adv_del'];
		      

		    //图片
		    $upload = new \Think\Upload();// 实例化上传类
			$upload->maxSize   =     3145728 ;// 设置附件上传大小
			$upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
			$upload->rootPath="./";
			$upload->savePath  =      './Public/Uploads/'; // 设置附件上传目录
			// 上传文件
			$info   =   $upload->upload();

			$img=$info['adv_img']['savepath'].$info['adv_img']['savename'];
			$img2=substr($img,9);
			$data=array("adv_name"=>$adv_name,"adv_title"=>$adv_title,"adv_img"=>$img2,"adv_start"=>$adv_start,"adv_end"=>$adv_end,"adv_del"=>$adv_del);
			if($info) {
				return $this->Table("advertisement")->add($data);
			}
		}




		/*
		*	实现分页的查询
		*/
		public function searc_a(){
			//获取当前页
			$page=$_GET['page']?$_GET['page']:1;
			$page_size=5;
			$limit=($page-1)*$page_size;

			$num=$this->Table("advertisement")->count();
			//echo $num;die;
			$yeshu=ceil($num/$page_size);
			//echo $yeshu;die;

			$data=$this->Table("advertisement")->limit($limit,$page_size)->select();
			$arr=array($yeshu,$data);
			return $arr;
		}



		/*
		*	实现删除功能
		*/
		public function advertisementdel(){
			//接收id
			$id=I("get.id");
			//执行删除
			return $this->Table("advertisement")->where("adv_id=$id")->delete();
		}
	}