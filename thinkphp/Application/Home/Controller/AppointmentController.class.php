<?php
namespace Home\Controller;
use Think\Controller;

/*   @   预约看房管理
    列表或添加页面样式示例  : views里面的 list.html  和 add.html   
    大家写列表的时候注意样式  
    该控制器的模块方法已列出   显示页面为方法名加 .html
*/

class AppointmentController extends Controller {

  /**
    * 未处理信息
    * $where['status_id'] = 0
    * $where['del_id'] = 0
    **/

  public function undeal(){

    $where['status_id'] = 0;

    $where['del_id'] = 0;

    //实例化model 加载方法 获取数据

    $obj = D('Appointment');

    $data_undeal = $obj->selectdata($where);

    //print_r($data_undeal);exit;

    //发送数据到view 然后调用模板

    $this->assign('data',$data_undeal);

    $this->display('list');   
     
  }

  /**
   * 确定状态
   */

  public function updatestatus(){

    //接收数据

    $where['id'] = trim($_POST['id']);

    $status = trim($_POST['status']);

    //实例化model' 加载方法 获取数据

    $obj = D('Appointment');

    $data_update = $obj->updatestatus($where, $status);

    //判断是否修改成功

    if ($data_update) {
     
      echo "1";

    }else{

      echo "0";

    }
    
  }

    /**
      *  正在看房信息
      **/

    public function mydeal(){
       
      //echo '看房确认';

      $where['del_id'] = 0;

      $where['status_id'] = 1;
 
      $obj = D('Appointment');

      $data_undeal = $obj->selectdata($where); 

      //print_r($data_undeal);exit;

      //发送数据到view 然后调用模板

      $this->assign('data',$data_undeal);

      $this->display('list_status');

    }

}


/**
 * 首先: 前台用户提交数据
 *
 * 其次: 后台客服判断看房时间
 *
 *      时间不冲突 后台发送消息至用户 "请等待客服**与您联系, 于什么时候去看房"; 
 *      时间冲突   后台客服打电话联系用户 调解看房时间 确定看房时间的修改
 *
 * 最后: 后台客服在 发送消息 然后将看房信息 时间在推送给经纪人
 */