<?php
namespace Home\Controller;
use Think\Controller;

/*   @    房间默认设置管理控制器
    列表或添加页面样式示例  : views里面的 list.html  和 add.html   
    大家写列表的时候注意样式  
    该控制器的模块方法已列出   显示页面为方法名加 .html
*/

class HomeController extends Controller {
    /**
      *   房间特点标签
      **/
   public function tag(){
   	   echo '房间特点标签';
   }

   /**
      *   配置设施表
      **/
   public function config(){
   	   echo '配置设施表';
   }





}