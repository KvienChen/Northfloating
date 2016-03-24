<?php
namespace Home\Model;
use Think\Model;

/**
 * 我的同事
 **/
class BrokerModel extends Model {
    public function del(){
        $b_id=$_GET['b_id'];
        $arr=$this->Table('broker')->where("b_id=$b_id")->delete();
        return $arr;
    }
    /**
    *修改
     **/
    public function update(){
        $id=I('get.b_id');
        $arr=$this->where("b_id=$id")->find();
        return $arr;
    }
    public function update_pro(){
        $arr=I('post.');
        $id=$arr['b_id'];
        $info=$this->where("b_id=$id")->save($arr);
        return $info;
    }




}


