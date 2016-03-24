<?php
namespace Home\Model;
use Think\Model;
class RoleModel extends Model{
    /**
     * 角色model层
     */
    //查询其中所有的内容
    public function role()
    {
        return $this->select();
    }
}