<?php
namespace Home\Model;
use Think\Model;
class CheckoneModel extends Model{
    public function checkall(){
        //获取当前页
        $page=$_GET['page']?$_GET['page']:1;
        //每页显示的页数
        $page_size=2;
        //设置偏移量
        $limit=($page-1)*$page_size;
        //查看总条数
        $count=$this->Table("checkone")->count();
//        echo $num;die;
        //计算总页数
        $page_list=ceil($count/$page_size);
//        echo $yeshu;die;

        //查询全部的初步审核数据
        $data = $this->Table('checkone')->join('admin_user on checkone.admin_id=admin_user.u_id')->join('user on checkone.user_id=user.u_id')->where("pass_status=1")->limit($limit,$page_size)->select();
        $arr=array($page_list,$data);
        return $arr;
    }

    public function checktwo(){
        //获取当前页
        $page=$_GET['page']?$_GET['page']:1;
        //每页显示的页数
        $page_size=2;
        //设置偏移量
        $limit=($page-1)*$page_size;
        //查看总条数
        $count=$this->Table("checkone")->count();

        //计算总页数
        $page_list=ceil($count/$page_size);

        //查询全部的审核中的数据
        $re = $this->Table('checktwo')->join('admin_user on checktwo.admin_id=admin_user.u_id')->where("is_pass=1")->select();
        return $re;
    }

    public function checkthree(){
        //查询全部的终审的数据
        $row = $this->Table('checkthree')->join('admin_user on checkthree.admin_id=admin_user.u_id')->where("is_pass=1")->select();
        return $row;
    }
}