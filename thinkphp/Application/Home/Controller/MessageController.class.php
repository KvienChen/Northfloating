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
      *   首页广告管理（郭旭峰）
      **/
    public function advertisement(){
      //实例化表
      $advertisement = D("advertisement");
      //执行广告表中的查询语句
      $arr = $advertisement->select();
      if($arr){
        //如果能在数据表中查到数据，那么就实现分页显示数据信息！如果查不到记录，直接就显示添加界面！
          $data=D("advertisement");
          $arr=$data->searc_a();
          //print_r($arr);die;


          $zongshu=$arr['0'];
          $xinxi=$arr['1'];


          //获取当前页
          $page=$_GET['page']?$_GET['page']:1;
          //echo $page;
          
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
          if($page+1>$zongshu){
            $b = $zongshu;
          }else{
            $b = $page+1;
          }
          $next="<a href='javascript:void(0)' onclick='pag($b)'>下一页|</a>";
          //尾页
          $last="<a href='javascript:void(0)' onclick='pag($zongshu)'>尾页</a>";

          //返回页数
          $shu=$first.$prev.$next.$last;
          //赋值
          $this->assign("page",$shu);
          $this->assign("arr",$xinxi);
          //显示
          $this->display("advertisement");
      }else{
        $this->display("addadvertisement");
      }
    }


    public function addadv(){
      $this->display("addadvertisement");
    }


    /*
    * 首页广告添加（郭旭峰）
    */
    public function addadvertisement(){
      $data = D("advertisement");
      $arr = $data->addadvertisement();
      if($arr){
        $this->success("添加成功");
      }else{
        $this->success("添加失败");
      }
    }


    /*
    * 首页广告删除功能(郭旭峰)
    */
    public function advertisementdel(){
      $data = D("advertisement");
      $arr = $data->advertisementdel();
      if($arr){
        $this->success("删除成功");
      }else{
        $this->success("删除失败");
      }
    }

    /**
      *   首页导航栏管理(郭旭峰)
      **/
    public function nav(){
    	//实例化表
      $nav = D("nav");
      //执行广告表中的查询语句
      $arr = $nav->select();
      if($arr){
          $data=D("nav");
          $arr=$data->searc_a();
          //print_r($arr);die;


          $zongshu=$arr['0'];
          $xinxi=$arr['1'];


          //获取当前页
          $page=$_GET['page']?$_GET['page']:1;
          //echo $page;
          
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
          if($page+1>$zongshu){
            $b = $zongshu;
          }else{
            $b = $page+1;
          }
          $next="<a href='javascript:void(0)' onclick='pag($b)'>下一页|</a>";
          //尾页
          $last="<a href='javascript:void(0)' onclick='pag($zongshu)'>尾页</a>";

          //返回页数
          $shu=$first.$prev.$next.$last;
          //赋值
          $this->assign("page",$shu);
          $this->assign("arr",$xinxi);
          //显示
          $this->display("nav");
      }else{
        $this->display("addnav");
      }
    }



    /*
    *   首页广告添加(郭旭峰)
    */
    public function addnav(){
      //实例化model用来实现信息的接收和添加
      $nav = D("nav");
      $arr = $nav->addnav();
      if($arr){
        $this->success("添加成功");
      }else{
        $this->error("添加失败");
      }
    }


    /*
    * 加入回收站
    */
    public function savenavstatus(){
      $nav = D("nav");
      $arr = $nav->savenavstatus();
      if($arr){
        $this->success("加入回收站成功");
      }else{
        $this->error("加入回收站失败");
      }
    }



    /*
    * 实现启用状态的修改
    */
    public function savetrue(){
      $nav = D("nav");
      $arr = $nav->savetrue();
      if($arr){
        $this->success("操作成功");
      }else{
        $this->error("操作失败");
      }
    }


    public function savefalse(){
       $nav = D("nav");
       $arr = $nav->savefalse();
       if($arr){
         $this->success("操作成功");
       }else{
         $this->error("操作失败");
       }
    }



    /*
    * 导航详情
    */
    public function navabout(){
      //接收id
      $id = $_GET['id'];
      //实例化nav实现查询操作
      $data = D("nav");
      $arr = $data->navabout($id);
      //赋值实现页面显示
      $this->assign("arr",$arr);
      $this->display("navabout");
    }


    /*
    * 导航详情修改
    */
    public function savenavabout(){
      //接收id
      $id = $_POST['id'];
      //实例化模板
      $data = D("nav");
      $arr = $data->savenavabout($id);
      if($arr){
        $this->success("操作成功");
      }else{
        $this->error("操作失败");
      }
    }


    /*
    * 回收站
    */
    public function bin(){
          $data=D("nav");
          $arr=$data->searc_b();
          //print_r($arr);die;


          $zongshu=$arr['0'];
          $xinxi=$arr['1'];


          //获取当前页
          $page=$_GET['page']?$_GET['page']:1;
          //echo $page;
          
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
          if($page+1>$zongshu){
            $b = $zongshu;
          }else{
            $b = $page+1;
          }
          $next="<a href='javascript:void(0)' onclick='pag($b)'>下一页|</a>";
          //尾页
          $last="<a href='javascript:void(0)' onclick='pag($zongshu)'>尾页</a>";

          //返回页数
          $shu=$first.$prev.$next.$last;
          //赋值
          $this->assign("page",$shu);
          $this->assign("arr",$xinxi);
          //显示
          $this->display("bin");
    }


    /*
    * 回收站恢复使用
    */
    public function saveuse(){
       $nav = D("nav");
       $arr = $nav->saveuse();
       if($arr){
         $this->success("操作成功");
       }else{
         $this->error("操作失败");
       }
    }



    /*
    * 导航界面
    */
    public function addna(){
      $this->display("addnav");
    }

    /**
      *   前台图片错误处理
      **/
    public function photoerror(){
    	$data = D("DoError");
      $arr = $data->errorsele();
      if($arr){
          $data=D("DoError");
          $arr=$data->searc_b();
          //print_r($arr);die;


          $zongshu=$arr['0'];
          $xinxi=$arr['1'];


          //获取当前页
          $page=$_GET['page']?$_GET['page']:1;
          //echo $page;
          
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
          if($page+1>$zongshu){
            $b = $zongshu;
          }else{
            $b = $page+1;
          }
          $next="<a href='javascript:void(0)' onclick='pag($b)'>下一页|</a>";
          //尾页
          $last="<a href='javascript:void(0)' onclick='pag($zongshu)'>尾页</a>";

          //返回页数
          $shu=$first.$prev.$next.$last;
          //赋值
          $this->assign("page",$shu);
          $this->assign("arr",$xinxi);
          //显示
          $this->display("errorlist");
      }else{
        $this->display("error");
      }
    }

    public function adderror(){
      $data = D("DoError");
      $arr = $data->adderror();
      if($arr){
        $this->success("上传成功");
      }else{
        $this->error("上传失败");
      }
    }


    //删除
    public function errordele(){
      $data = D("DoError");
      $arr = $data->errordele();
      if($arr){
        $this->success("操作成功");
      }else{
        $this->error("操作失败");
      }
    }

    //显示添加错误处理
    public function adderr(){
      $this->display("error");
    }


    /*
    * 详情处理
    */
    public function errorabout(){
      //接收id
      $id = $_GET['id'];
      //实例化model
      $data = D("DoError");
      $arr = $data->errorabout($id);
      $this->assign("arr",$arr);
      $this->display("errorabout");
    }


    /*
    * 修改
    */
    public function updateerror(){
      //接收id
      $id = $_POST['id'];
      $data = D("DoError");
      $arr = $data->updateerror($id);
      if($arr){
        $this->success("上传成功");
      }else{
        $this->error("上传失败");
      }
    }


}