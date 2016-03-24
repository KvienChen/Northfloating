<?php
namespace Home\Controller;
use Think\Controller;

/*   @   房源信息管理控制器
    列表或添加页面样式示例  : views里面的 list.html  和 add.html   
    大家写列表的时候注意样式  
    该控制器的模块方法已列出   显示页面为方法名加 .html
*/

class IndexController extends  Controller {
    /**
      *   显示主界面
      **/
    public function index(){
        $this->display();
    }

    /**
     *   审核房源信息列表显示
     **/
    public function unservice(){

        // 首次审查实例化model

        // $one = D('checkone');

        // 调用初审表model

        // $check_all = $one->checkall();

        // print_r($check_all);die;

        $db = M('checkone');

        // 分页

        $count      = $db->where('pass_status=0')->count();// 查询满足要求的总记录数

        $Page       = new \Think\Page($count,1);// 实例化分页类 传入总记录数和每页显示的记录数(25)

        $show       = $Page->show();// 分页显示输出

        $list = $db->join('admin_user on checkone.admin_id=admin_user.u_id')->join('user on checkone.user_id=user.u_id')->where('pass_status=0')->order('h_id desc')->limit($Page->firstRow.','.$Page->listRows)->select();

        $this->assign('arr',$list);// 赋值数据集

        $this->assign('page',$show);// 赋值分页输出


        $two = M('checktwo');

        // 分页

        $count      = $two->where('is_pass=0')->count();// 查询满足要求的总记录数

        $Page2       = new \Think\Page($count,1);// 实例化分页类 传入总记录数和每页显示的记录数(25)

        $show       = $Page2->show();// 分页显示输出

        $list = $two->join('admin_user on checktwo.admin_id=admin_user.u_id')->where('is_pass=0')->order('h_id desc')->limit($Page2->firstRow.','.$Page2->listRows)->select();


        $this->assign('re',$list);// 赋值数据集

        $this->assign('page2',$show);// 赋值分页输出


        $three = M('checkthree');

        // 分页

        $count      = $three->where('is_pass=0')->count();// 查询满足要求的总记录数

        $Page3       = new \Think\Page($count,1);// 实例化分页类 传入总记录数和每页显示的记录数(25)

        $show       = $Page3->show();// 分页显示输出

        $list = $three->join('config on checkthree.configid=config.id')->join('tag on checkthree.tag_id=tag.id')->join('admin_user on checkthree.admin_id=admin_user.u_id')->where('is_pass=0')->order('h_id desc')->limit($Page3->firstRow.','.$Page3->listRows)->select();


        $this->assign('row',$list);// 赋值数据集

        $this->assign('page3',$show);// 赋值分页输出


        // 跳转地址

        $this->display('index/unservice');
    }

    /**
     *   首次审核房源信息是否
     **/
    public function updatastatus(){

        //实例化表

        $db = M("checkone");

        // 接收id

        $id = $_GET['id'];

        //echo $id;

        $arr = $db->where("h_id=$id")->select();

        //print_r($arr[0]['pass_status']);

        // 如果pass_status等于0，则修改为1

        if($arr[0]['pass_status']==0){

            $db->pass_status = 1;

            $row = $db->where("h_id=$id")->save();

            echo $row;die;

        }else{

            $db->pass_status = 0;

            $row = $db->where("h_id=$id")->save();

            echo $row;die;
        }



    }

    /**
     *   是否通过二次审核房源信息
     **/
    public function updatatwo(){

        //实例化表

        $db = M("checktwo");

        $id = $_GET['id'];

        //echo $id;

        $arr = $db->where("h_id=$id")->select();

        // print_r($arr[0]['is_pass']);

        // 如果is_pass等于0，则修改为1

        if($arr[0]['is_pass']==0){

            $db->is_pass = 1;

            $row = $db->where("h_id=$id")->save();

            echo $row;die;

        }else{

            $db->is_pass = 0;

            $row = $db->where("h_id=$id")->save();

            echo $row;die;
        }


    }

    /**
     *   是否通过最终审核房源信息是否
     **/
    public function updatathree(){

        //实例化表

        $db = M("checkthree");

        // 接收id

        $id = $_GET['id'];

        //echo $id;

        $arr = $db->where("h_id=$id")->select();

        // print_r($arr[0]['is_pass']);

        // 如果is_pass等于0，则修改为1

        if($arr[0]['is_pass']==0){

            $db->is_pass = 1;

            $row = $db->where("h_id=$id")->save();

            echo $row;die;

        }else{

            $db->is_pass = 0;

            $row = $db->where("h_id=$id")->save();

            echo $row;die;
        }


    }

     /**
      *   我审核的房源信息
      **/
    public function myservice(){
        //实例化model
         $one = D('checkone');
        //调用初审表model
        $check_all = $one->checkall();

        //显示页数
        $page_list = $check_all[0];
        //查询信息
        $arr = $check_all[1];

        //获取当前页
        $page=$_GET['page']?$_GET['page']:1;

        //首页
        $first="<a href='javascript:void(0)' onclick='pag(1)'>首页|</a>";
        //上一页
        if($page-1<1){
            $a=1;
        }else{
            $a=$page-1;
        }
        $prev="<a href='javascript:void(0)' onclick='pag($a)'>上一页|</a>";
        //下一页
        if($page+1>$page_list){
            $b = $page_list;
        }else{
            $b = $page+1;
        }
        $next="<a href='javascript:void(0)' onclick='pag($b)'>下一页|</a>";
        //尾页
        $last="<a href='javascript:void(0)' onclick='pag($page_list)'>尾页</a>";

        //返回页数
        $page=$first.$prev.$next.$last;

        //调用审核中表model
        $check_two = $one->checktwo();

        //调用终审表model
        $check_three = $one->checkthree();

        $this->assign("check_all",$arr);
        $this->assign("page",$page);
        $this->assign("check_two",$check_two);
        $this->assign("check_three",$check_three);
        $this->display('index/myservice');
    }

    
    /**
      *   显示验证码 
      **/
    public function verify(){
     $Verify = new \Think\Verify();
     $Verify->length=2;
     $Verify->entry();
    }

     /**
      *   核实验证码   核实登录信息
      **/
    public function add_pro(){
        $verify = new \Think\Verify();  
        $re = $verify->check($_POST['verifycode'], $id);
        if(!$re){
          $this->error('验证码错误');
        }else{
          $AdminUser=D('AdminUser');
          $re = $AdminUser->testpwd();
          if($re){
           $username = I('post.u_name');
           session(user,$re); 
           $this->success('登陆成功',__APP__.'/Home/index/index');
          }else{
            $this->error('登陆失败');
          }
        }
     }
   
     /**
      *   显示登录页面  
      **/
    public function log(){
      $this->display('login');
    }

}