<?php
	namespace Home\Model;
	use Think\Model;
	class NavModel extends Model {
		/*
		*	实现信息的添加功能（郭旭峰）
		*/
		public function addnav(){
			//接收信息
			$name = $_POST['name'];
			$link = $_POST['link'];
			$order = $_POST['order'];
			$status = $_POST['status'];
			//回收站功能默认显示1
			$del = "1";
			$data = array("name"=>$name,"link"=>$link,"order"=>$order,"status"=>$status,"del"=>$del);
			return $this->Table("nav")->add($data);
		}


		/*
		*	实现分页的查询
		*/
		public function searc_a(){
			//获取当前页
			$page=$_GET['page']?$_GET['page']:1;
			$page_size=5;
			$limit=($page-1)*$page_size;

			$num=$this->Table("nav")->count();
			//echo $num;die;
			$yeshu=ceil($num/$page_size);
			//echo $yeshu;die;

			$data=$this->Table("nav")->where("del=1")->limit($limit,$page_size)->select();
			$arr=array($yeshu,$data);
			return $arr;
		}



		/*
		*	实现分页的查询
		*/
		public function searc_b(){
			//获取当前页
			$page=$_GET['page']?$_GET['page']:1;
			$page_size=5;
			$limit=($page-1)*$page_size;

			$num=$this->Table("nav")->count();
			//echo $num;die;
			$yeshu=ceil($num/$page_size);
			//echo $yeshu;die;

			$data=$this->Table("nav")->where("del=0")->limit($limit,$page_size)->select();
			$arr=array($yeshu,$data);
			return $arr;
		}


		/*
		*	实现回收站功能
		*/
		public function savenavstatus(){
			//修改字段
			$model = D(nav);
			$arr = $model->execute("update nav set del=0 where del=1");
			return $arr;
		}



		/*
		*	实现启用状态的修改
		*/
		public function savetrue(){
			//接收id
			$id = $_GET['id'];
			//修改字段
			$model = D(nav);
			$arr = $model->execute("update nav set status=0 where id=$id");
			return $arr;
		}


		public function savefalse(){
			//接收id
			$id = $_GET['id'];
			//修改字段
			$model = D(nav);
			$arr = $model->execute("update nav set status=1 where id=$id");
			return $arr;
		}


		/*
		*	回收站
		*/
		public function bin(){
			return $this->Table("nav")->where("del=0")->select();
		}


		//恢复使用
		public function saveuse(){
			//接收id
			$id = $_GET['id'];
			//修改字段
			$model = D(nav);
			$arr = $model->execute("update nav set del=1 where id=$id");
			return $arr;
		}


		/*
		*	信息详情
		*/
		public function navabout($id){
			return $this->Table("nav")->where("id=$id")->select();
		}


		/*
		*	实现导航详情的修改
		*/
		public function savenavabout($id){
			//接收信息
			$name = $_POST['name'];
			$link = $_POST['link'];
			$order = $_POST['order'];
			$status = $_POST['status'];
			$data = array("name"=>$name,"link"=>$link,"order"=>$order,"status"=>$status);
			return $this->Table("nav")->where("id=$id")->save($data);
		}
	}
?>