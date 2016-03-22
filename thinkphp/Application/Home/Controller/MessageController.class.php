<?php
namespace Home\Controller;
use Think\Controller;

/*   @    网站信息管理控制器
    列表或添加页面样式示例  : views里面的 list.html  和 add.html   
    大家写列表的时候注意样式  
    该控制器的模块方法已列出   显示页面为方法名加 .html
*/

class MessageController extends Controller {
    /**
      *   首页服务表管理
      **/
    public function service(){
        echo '首页服务表管理';
    }

    /**
      *   公司信息 (logo  网址 等)
      **/
    public function firmmessage(){
    	echo '公司信息 (logo  网址 等)';
    }

    /**
      *   合作商管理
      **/
    public function partner(){
    	echo '合作商管理';
    }

     /**
      *   首页广告管理
      **/
    public function advertisement(){
    	echo '首页广告管理';
    }

    /**
      *   首页导航栏管理
      **/
    public function nav(){
    	echo '首页导航栏管理';
    }

    /**
      *   前台图片错误处理
      **/
    public function photoerror(){
    	echo '前台图片错误处理';
    }




}