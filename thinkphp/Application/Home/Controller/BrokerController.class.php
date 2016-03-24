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
        //获取经纪人的session_Id 根据session_id获取对本经纪人的评价。
        $c=session('user');
        $cid = $c['u_id'];
        $User = D('broker'); // 实例化User对象
        $count = $User->commentnum($cid);// 查询满足要求的总记录数
        $Page       = new \Think\Page($count,4);// 实例化分页类 传入总记录数和每页显示的记录数(25)
        $list = $User->commentall($Page->firstRow,$Page->listRows,$cid);

        $Page->setConfig('first','首页');
        $Page->setConfig('prev','上一页');
        $Page->setConfig('next','下一页');
        $Page->setConfig('last','尾页');
        // $list = $User->where('c_id > 0')->order(' c_time desc')->limit()->select();
        $show = $Page->show();
        // print_r($show);die;
        $this->assign('arr',$list);// 赋值数据集
        $this->assign('page',$show);// 赋值分页输出
        $this->display(); // 输出模板
    }
    //sousuo
    public function brokersearch()
    {
        $day = $_GET['day'];
        if($day == 1){
            $time = date("Y-m-d H:i:s",time()-86400);
        }else if($day == 2){
            $time = date("Y-m-d H:i:s",time());
        }else if($day == 3){
            $time = date("Y-m-d H:i:s",time()+86400);
        }else{
            $time = 0;
        }
        $c=session('user');
        $cid = $c['u_id'];
        $db = D('broker');

        $count = $db->commentadaycount($time,$cid);// 查询满足要求的总记录数
        $Page       = new \Think\Page($count,2);// 实例化分页类 传入总记录数和每页显示的记录数(25)
        // 注意limit方法的参数要使用Page类的属性
        $list = $db->commentadayall($Page->firstRow,$Page->listRows,$time,$cid);
        $Page->setConfig('first','首页');
        $Page->setConfig('prev','上一页');
        $Page->setConfig('next','下一页');
        $Page->setConfig('last','尾页');
        $show       = $Page->show();// 分页显示输出// 进行分页数据查询 
        $this->assign('arr',$list);// 赋值数据集
        $this->assign('page',$show);// 赋值分页输出
        $this->display('mycomment'); // 输出模板
    }

    /**
      *   经纪人排行
      */
    public function brokerlist(){

        $User = M('broker'); // 实例化User对象
        $count      = $User->where('b_id>0')->count();// 查询满足要求的总记录数
        $Page       = new \Think\Page($count,4);// 实例化分页类 传入总记录数和每页显示的记录数(25)
        // 分页显示输出// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $list = $User->where('b_id > 0')->order(' b_deal_num desc')->limit($Page->firstRow.','.$Page->listRows)->select();
        $Page->setConfig('first','首页');
        $Page->setConfig('prev','上一页');
        $Page->setConfig('next','下一页');
        $Page->setConfig('last','尾页');
        $show       = $Page->show();
        $this->assign('arr',$list);// 赋值数据集
        $this->assign('page',$show);// 赋值分页输出
        $this->display('brokerlists'); // 输出模板
    }

     /**
      *   我的信息  (broker表)
      */
    public function mymes(){
        //将登陆的经理人的id存入session
        $c=session('user');
        $id=$c['u_id'];
        //实例化Model层
        $db=D('broker');
        //根据session里的id查询自己的信息
        $arr=$db->selectone($id);
        $this->assign('arr',$arr);
        $this->display('brokerlist');
    }

     /**
      *   已成交  
      */
    public function rebuy(){
        //接收经纪人的id
        $c=session('user');
        $id=$c['u_id'];
        //实例化Model
        $db=D('broker');
        //接收get值
        $sou=$_GET['sou'];
        if(empty($_GET['page'])){
            $page=1;
        }else{
            $page=$_GET['page'];
        }
        if(empty($_GET['re1'])){
            $re1=1;
        }else{
            $re1=$_GET['re1'];  
        }
        if($sou==""){
            $where=1;
        }else{
            $where="$re1 like '%$sou%'";
        }
        //查询房屋出租记录表的数据条数
        $num=$db->deallognum($where);
        //每页显示条数
        $line=2;
        $zongye=ceil($num/$line);//总页数
        $start=($page-1)*$line;//偏移量
        //利用三表联查查询所有的数据
        //根据id和状态查询房屋出租记录列表
        $arr=$db->selectdeallog($id,$where,$starts,$line);
        for($i=1;$i<=$zongye;$i++){
            $ajaxpage.="<a href='javascript:void(0)' onclick='lists($i);'>$i</a>&nbsp;&nbsp;";
        }
        //关键字标红
        foreach($arr as $k=>$v){
            $arr[$k][$re1]=str_replace($sou,"<font color='red'>".$sou."</font>",$v[$re1]);
        }
        $this->assign('arr',$arr);
        $this->assign('ajaxpage',$ajaxpage);
        $this->display('dealloglist');
    }
    /*
    *房屋出租记录分页显示
    */
    public function deallogfen(){
        //接收经纪人的id
        $c=session('user');
        $id=$c['u_id'];
        //实例化Model
        $db=D('broker');
        //接收get值
        $sou=$_GET['sou'];
        if(empty($_GET['page'])){
            $page=1;
        }else{
            $page=$_GET['page'];
        }
        if(empty($_GET['re1'])){
            $re1=1;
        }else{
            $re1=$_GET['re1'];  
        }
        if($sou==""){
            $where=1;
        }else{
            $where="$re1 like '%$sou%'";
        }
        //查询房屋出租记录表的数据条数
        $num=$db->deallognum($where);
        //每页显示条数
        $line=2;
        $zongye=ceil($num/$line);//总页数
        $start=($page-1)*$line;//偏移量
        //利用三表联查查询所有的数据
        //根据id和状态查询房屋出租记录列表
        $arr=$db->selectdeallog($id,$where,$start,$line);
        for($i=1;$i<=$zongye;$i++){
            $ajaxpage.="<a href='javascript:void(0)' onclick='lists($i);'>$i</a>&nbsp;&nbsp;";
        }
        //关键字标红
        foreach($arr as $k=>$v){
            $arr[$k][$re1]=str_replace($sou,"<font color='red'>".$sou."</font>",$v[$re1]);
        }
        $this->assign('arr',$arr);
        $this->assign('ajaxpage',$ajaxpage);
        $this->display('deallogfen');
    }
       /**
      *   已带看  
      */
    public function relook(){
        $c=session('user');
        $cid = $c['u_id'];
    
        $User = D('broker'); // 实例化User对象
        $count = $User->deallogcount($cid); // 查询满足要求的总记录数
        $Page  = new \Think\Page($count,2);// 实例化分页类 传入总记录数和每页显示的记录数(25)
        // 分页显示输出// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $list = $User->deallogall($Page->firstRow,$Page->listRows,$cid);
        // print_r($list);die;
        $Page->setConfig('first','首页');
        $Page->setConfig('prev','上一页');
        $Page->setConfig('next','下一页');
        $Page->setConfig('last','尾页');
        $show       = $Page->show();
        $this->assign('arr',$list);// 赋值数据集
        $this->assign('page',$show);// 赋值分页输出
        $this->display(); // 输出模板
    }

    public function pending(){
        //实例化Model层
        $db=D('broker');
        //接收get值
        if(empty($_GET['re1'])){
            $re1=1;
        }else{
            $re1=$_GET['re1'];  
        }
        if(empty($_GET['sou'])){
            $where=1;
        }else{
            $where="$re1 like '%$_GET[sou]%'";
        }
        if(empty($_GET['page'])){
            $page=1;
        }else{
            $page=$_GET['page'];
        }
        //查询数据总条数
        $num=$db->pendingnum($where);
        //每页显示条数
        $line=2;
        $zongye=ceil($num/$line);//总页数
        $start=($page-1)*$line;//偏移量
        //利用三表联查查询所有的数据
        $arr=$db->selectpending($where,$start,$line);
        for($i=1;$i<=$zongye;$i++){
            $ajaxpage.="<a href='javascript:void(0)' onclick='lists($i);'>$i</a>&nbsp;&nbsp;";
        }
        foreach($arr as $k=>$v){
            $arr[$k][$re1]=str_replace($sou,"<font color='red'>".$sou."</font>",$v[$re1]);
        }
        $this->assign('arr',$arr);
        $this->assign('ajaxpage',$ajaxpage);
        $this->display('pendinglist');
    }
    public function updatepending(){
        $id=$_GET['id'];
        //实例化Model层
        $db=D(broker);
        //根据id查询一条
        $arr=$db->selectpdone($id);
        //写修改代码
        $db2=M('pending');
        if($arr['p_status']==0){
            $db2->p_status=1;
            $upd=$db2->where("p_id=$id")->save();

            if($upd){
                echo 1;
            }else{
                echo 2;
            }
        }else{
            $db2->p_status=0;
            $upd=$db2->where("p_id=$id")->save();
            if($upd){
                echo 1;
            }else{
                echo 2;
            }
        }
    }
    /*
    *待处理信息分页
    */
    public function pendingfen(){
        //实例化Model层
        $db=D('broker');
        //接收get值
        $sou=$_GET['sou'];
        if(empty($_GET['page'])){
            $page=1;
        }else{
            $page=$_GET['page'];
        }
        if(empty($_GET['re1'])){
            $re1=1;
        }else{
            $re1=$_GET['re1'];  
        }
        if($sou==''){
            $where=1;
        }else{
            $where="$re1 like '%$sou%'";
        }
        //查询数据总条数
        $num=$db->pendingnum($where);
        //每页显示条数
        $line=2;
        $zongye=ceil($num/$line);//总页数
        $start=($page-1)*$line;//偏移量
        //利用三表联查查询所有的数据
        $arr=$db->selectpending($where,$start,$line);
        //print_r($arr);die;
        for($i=1;$i<=$zongye;$i++){
            $ajaxpage.="<a href='javascript:void(0)' onclick='lists($i);'>$i</a>&nbsp;&nbsp;";
        }
        //关键字标红
        foreach($arr as $k=>$v){
            $arr[$k][$re1]=str_replace($sou,"<font color='red'>".$sou."</font>",$v[$re1]);
        }
        $this->assign('arr',$arr);
        $this->assign('ajaxpage',$ajaxpage);
        $this->display('pendingfen');
    }
}