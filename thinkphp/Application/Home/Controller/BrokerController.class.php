<?php
namespace Home\Controller;
use Think\Controller;

/*   @    网站信息管理控制器
    列表或添加页面样式示例  : views里面的 list.html  和 add.html   
    大家写列表的时候注意样式  
    该控制器的模块方法已列出   显示页面为方法名加 .html
*/

class BrokerController extends Controller {

	/**
	  *   我的 评价(评价我的信息)
	  */
    public function mycomment(){
    	echo '我的评价';
    }

    /**
	  *   经纪人排行
	  */
    public function brokerlist(){
    	echo '经纪人排行';
    }

     /**
	  *   我的信息  (broker表)
	  */
    public function mymes(){
    	echo '我的信息';
    }

     /**
	  *   已成交  
	  */
    public function rebuy(){
    	echo '已成交';
    }


     /**
	  *   已带看  
	  */
    public function relook(){
    	echo '已带看';
    }




}