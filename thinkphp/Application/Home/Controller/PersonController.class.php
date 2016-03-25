<?php
namespace Home\Controller;
use Think\Controller;
/*   @   房源信息管理控制器
列表或添加页面样式示例  : views里面的 list.html  和 add.html
大家写列表的时候注意样式
该控制器的模块方法已列出   显示页面为方法名加 .html
 */

class PersonController extends Controller {
    /**
     *   最近登录信息
     **/
    public function loglog(){
        /***获取登陆人的id***/
        $user_id=I('session.Uid');
        /***实例化登陆 信息的model层并且调用其中的log方法***/
        $model=D('LogMessage');
        $res=$model->log($user_id);
        /***将对应的信息传给视图层***/
        $this->assign('message',$res);
        $this->display('loglog');

    }
    /**
     *   密码管理
     **/
    public function pwdchange(){
        /**实现密码修改管理**/

        if(IS_AJAX){
            /**接收验证码**/
            $code=I('post.code');
            /**存入session**/
            $res=session('code',$code);
            if($_SESSION['code'])
            {
                print_r($_SESSION['code']);die;
            }
        }
        /**跳转到修改密码界面**/
        $this->display('changepwd');
    }
    /**
     *   密码修改
     */
    public function handle()
    {
        if(IS_AJAX)
        {
            /**接收用户session id**/
            $userid=I('session.Uid');
            /**接收验证码 session**/
            $code=I('session.code');
            /**接收表单传来的验证码**/
            $checkcode=I('post.checkcode');
            /**接收新密码**/
            $newpwd=I('post.newpwd');
            /**实例化后台登陆信息模板**/
            $model=D('AdminUser');
            /**调用其中的方法**/
            $status=$model->changepwd($userid,$code,$newpwd,$checkcode);
            echo $status;die;
        }
    }



    /*
    *   个人资料管理
    */
    public function personabout(){
        /**接收session用户**/
            $ses = session('user');
            $sesname = $ses['u_name'];
            if($sesname){
                //实例化model
                $data = D("personabout");
                $arr = $data->personabout();

                /*foreach($arr as $key => $v){
                    $v;
                }*/
                $uname = $arr[0]['uname'];
                $img = $arr[0]['img'];
                $phone = $arr[0]['phone'];
                $qq = $arr[0]['qq'];
                $email = $arr[0]['email'];
                //判断是否全部存在这些值
                if($uname&&$img&&$phone&&$qq&&$email){
                    //赋值然后显示
                    $this->assign("arr",$arr);
                    $this->display("completeperson");
                }else{
                    //赋值然后显示
                    $this->assign("arr",$arr);
                    $this->display("addcompleteperson");
                }

            }else{
                echo "<script>alert('加载失败');</script>";
            }
    }


    /*
    *   实现信息的完善
    */
    public function addpersonabout(){
        //接收session用户
        $ses = session('user');
        $sesname = $ses['u_name'];
        //实例化model
        $data = D("personabout");
        $arr = $data->addpersonabout($sesname);
        if($arr){
            $this->success("操作成功",U("Person/personabout"));
        }else{
            $this->error("操作存在错误，请您核对信息");
        }
    }

    /**
     *  人事调动  (超级管理员可以更改后台人员的角色)
     **/
    public function personchange(){
        if(IS_POST)
        {
            /**接收页面传来的值**/
            $useid= I('post.userid','','intval');
            //接收页面传来的角色id
            $roleid=I('post.roleid','','intval');
            /**实例化用户-角色表**/
            $user_role=D('UserRole');
            //调用方法
            $status=$user_role->allot($useid,$roleid);
            if($status){
                echo "<script type='text/javascript'>alert('调动成功');</script>";
            }
        }else{
            /**显示修改界面**/
            //实例化后台用户表
            $model=D('AdminUser');
            //调用方法
            $namelist=$model->name();
            /**实例化角色表**/
            $role=D('Role');
            //调用其中的方法
            $rolelist=$role->role();
            /**跳转到显示界面**/
            $this->assign('namelist',$namelist);
            $this->assign('rolelist',$rolelist);
            $this->display('personchange');
        }
    }

    /**
     *  我的同事  (列表显示qq在线 方便联系)分页
     **/
    public function personlist(){
        $db = M("broker");//实例化
        $count = $db->count();//总条数
        $pagecount = 5;//每页显示条数
        $page = new \Think\Page($count , $pagecount);
        $page->setConfig('first','首页');
        $page->setConfig('prev','上一页');
        $page->setConfig('next','下一页');
        $page->setConfig('last','尾页');
        $page->setConfig('theme','%FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END% 第 '.I('p',1).' 页/共 %TOTAL_PAGE% 页 ( '.$pagecount.' 条/页 共 %TOTAL_ROW% 条)');
        $show = $page->show();
        $list = $db->limit($page->firstRow.','.$page->listRows)->select();
        $this->assign('arr',$list);// 赋值数据集
        $this->assign('page',$show);// 赋值分页输出
        $this->display();// 输出模板

    }
    /**
     *删除
     **/
    public function del(){
        $data=D('broker');//实例化
        $arr=$data->del();
        if($arr){
            $this->success('删除成功',U('person/personlist'));
        }else{
            $this->success('删除失败',U('person/personlist'));
        }
    }
    /**
     *修改
     **/
    public function update(){
        $data=D('broker');//实例化
        $arr=$data->update();
        $this->assign('arr',$arr);// 赋值数据集
        $this->display('pupdate');// 输出模板
    }
    public function update_pro(){
        $data=D('broker');//实例化
        $info=$data->update_pro();
        if($info){
            $this->success('修改成功',U('person/personlist'));
        }else{
            $this->success('修改失败');
        }
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
    public function word() {

    }

}