<?php
namespace Home\Controller;
use Think\Controller;

/*   @   房源信息管理控制器
    列表或添加页面样式示例  : views里面的 list.html  和 add.html   
    大家写列表的时候注意样式  
    该控制器的模块方法已列出   显示页面为方法名加 .html
*/

class IndexController extends Controller {
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
      *   登录  
      **/
    public function log(){
    	$this->display('add');
    }



    public function phone(){
    	$this->display('login');
    }
}