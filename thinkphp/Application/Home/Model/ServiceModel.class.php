<?php
	namespace Home\Model;
	use Think\Model;
	class ServiceModel extends Model{
			//查询服务项目
		public function index(){
     		 //获取当前页
     		$page=$_GET['page']?$_GET['page']:1;
     		$page_size=3;
     		$limit=($page-1)*$page_size;

     		$num=$this->Table("service")->count();
     		//echo $num;die;
     		$yeshu=ceil($num/$page_size);
     		//echo $yeshu;die;

     		$data=$this->Table("service")->limit($limit,$page_size)->select();
     		$arr=array($yeshu,$data);
     		return $arr;
    	}
		//删除服务项目
		public function del(){
			$ser_id = $_GET['ser_id'];
        	$arr = $this->Table('service')->where("ser_id=$ser_id")->delete();
        	//返回控制器
        	return $arr;
		}
		//显示企业信息
		public function firm_show(){
			$arr = $this->Table('firm_message')->select();
			//返回数据给控制器
			return $arr;
		}
		//查询企业信息
		public function firmmessage_update(){
			$id = $_GET['id'];
			$totalname = $_POST['totalname'];
			$site = $_POST['site'];
			$phone = $_POST['phone'];
			$number = $_POST['number'];
			$bnumber = $_POST['bnumber'];


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
			$data1=array("index_error"=>$img2,"homeimg_error"=>$img4);
			if($info) {
				//实例化表
			$user = M("firm_message"); 
			$date['totalname'] = $totalname;
			$date['site'] = $site;
			$date['phone'] = $phone;
			$date['logo'] = $date1;
			$date['number'] = $number;
			$date['bnumber'] = $bnumber;
			//执行修改语句
			$arr = $user->where("id=$id")->save($date);
			}

			
			return $arr;
		}
		//查询合作商
		public function partner(){
			 //获取当前页
     		$page=$_GET['page']?$_GET['page']:1;
     		$page_size=3;
     		$limit=($page-1)*$page_size;

     		$num=$this->Table("partner")->count();
     		//echo $num;die;
     		$yeshu=ceil($num/$page_size);
     		//echo $yeshu;die;

     		$data=$this->Table("partner")->limit($limit,$page_size)->select();
     		$arr=array($yeshu,$data);
     		return $arr;
		}
		//修改是否显示
		public function partner_1(){
			$id=$_GET['id'];
			$user = M("partner"); 
			$arr = $user->where("id=$id")->select();
			if ($arr[0]['status']==1) {
				$data['status'] = 0;
				$arr = $user->where("id=$id")->save($data);
				if($arr){
					return 0;
				}else{
					return 2;   //修改失败
				}
				
			}else{
				$data['status'] = 1;
				$arr = $user->where("id=$id")->save($data);
				if($arr){
					return 1;
				}else{
					return 2;   //修改失败
				}
			}
		}
		//查询是否删除
		public function partner_del(){
			$id=$_GET['id'];
			$user = M("partner"); 
			$arr = $user->where("id=$id")->select();
			if ($arr[0]['del']==1) {
				$data['del'] = 0;
				$arr = $user->where("id=$id")->save($data);
				if($arr){
					return 0;
				}else{
					return 2;   //修改失败
				}
				
			}else{
				$data['del'] = 1;
				$arr = $user->where("id=$id")->save($data);
				if($arr){
					return 1;
				}else{
					return 2;   //修改失败
				}
			}
		}
		//ajax删除
		public function partner_del1(){
			$id=$_GET['id'];
			$user = M("partner"); 
			$arr = $user->where("id=$id")->delete();
			return 1;
		}
		//即点即改(合作商name)
		public function partner_upda(){
			$val = $_GET['val'];
			$id = $_GET['id'];
			$user = M("partner");
			$data['name'] = $val;
			$arr = $user->where("id=$id")->save($data);
			return $arr;
		}
		//通过id查询显示修改数据
		public function partner_update(){
			$id = $_GET['id'];
			$arr = $this->Table('partner')->where("id=$id")->select();
			return $arr;
		} 
		//执行修改
		public function partner_update1(){
			$name = $_POST['name'];
			$name = $_POST['name'];
			
		}
	}
?>