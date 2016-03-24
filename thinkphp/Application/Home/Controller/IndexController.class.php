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
      *   未审核房源信息
      **/
    public function unservice(){
        echo '未审核房源信息';
    }

     /**
      *   我审核的房源信息
      **/
    public function myservice(){
        echo '我审核的房源信息';
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