<?php
namespace Home\Controller;
use Think\Controller;

/*   @   房源信息管理控制器
    列表或添加页面样式示例  : views里面的 list.html  和 add.html   
    大家写列表的时候注意样式  
    该控制器的模块方法已列出   显示页面为方法名加 .html
*/

class AppointmentController extends Controller {

     /**
      *   未处理信息
      **/
    public function undeal(){
       echo '未处理信息';
    }


    /**
      *  我处理的信息
      **/
    public function mydeal(){
       echo '我处理的信息';
    }
}