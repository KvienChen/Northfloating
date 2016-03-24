<?php
namespace Home\Model;
use Think\Model;
class UserRoleModel extends Model{
    /**
     * 用户--角色表
     */
    public function allot($useid,$roleid)
    {
        $status=$this->where("u_id='$useid'")->select();
        if($status==''){
            $sql=$this->query("insert into user_role (u_id,r_id) VALUES ($useid,$roleid)");
            return $sql;
        }else
        {
           $sql= $this->query("update use_role where u_id='$useid' set r_id=$roleid");
            return $sql;
        }
    }
}