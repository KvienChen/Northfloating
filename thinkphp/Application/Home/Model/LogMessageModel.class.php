<?php
namespace Home\Model;
use Think\Model;
class LogMessageModel extends Model {
   public function log($user_id){
    return $this->join('inner join admin_user ON admin_user.U_id=log_message.admin_id' )->where("admin_id='$user_id'")->select();
   }
}