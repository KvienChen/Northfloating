<?php
namespace Home\Controller;
use Think\Controller;

/*   @   其他管理控制器
    列表或添加页面样式示例  : views里面的 list.html  和 add.html   
    大家写列表的时候注意样式  
    该控制器的模块方法已列出   显示页面为方法名加 .html
*/

class PersonController extends Controller {
    /**
      *   最近登录信息
      **/
    public function loglog(){
        echo '最近登录信息';
    }

    /**
      *   密码管理
      **/
    public function pwdchange(){
        echo '密码管理';
    }
    
    /**
      *  人事调动  (超级管理员可以更改后台人员的角色)
      **/
    public function personchange(){
        echo '人事调动';
    }

    /**
      *  我的同事  (列表显示qq在线 方便联系)
      **/
    public function personlist(){
        echo '我的同事';
    }

    /**
      *  地区管理 
      **/
    public function city(){
        echo '地区管理';
    }

    /**
      *  联想搜索词汇管理 
      **/
    public function word(){
        echo '联想搜索词汇管理';
    }

}