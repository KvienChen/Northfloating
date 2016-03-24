<?php
namespace Home\Model;
use Think\Model;
class adminUserModel extends Model {

  /**
  *   登录验证密码
  */
   function testpwd(){
        $map['u_name'] = $_POST['u_name'];
        $map['u_pwd'] = md5($_POST['u_pwd']);
        return $this->where($map)->find(); 
   }
    /**
    *  登录权限查询
    */
    public function  node(){
      $mes = session('user');
      $u_id = $mes['u_id'];
      $user = M('user_role');
      $roles = $user->where('u_id='.$u_id)->select();
    //用户对应角色id 字符串 以','分割
      foreach($roles as $k=>$v){
         if($k==0){
            $strs = $v['r_id'];
         }else{
               $strs .=','.$v['r_id'];      
         }
      } 
      unset($roles);
      $rn = M('role_node');
      $ro = $rn->where("r_id in ($strs)")->select();
      //用户对应角色id 字符串 以','分割
      foreach($ro as $k=>$v){
         if($k==0){
            $nid = $v['n_id'];
         }else{
            $nid .=','.$v['n_id'];      
         }
      } 
      unset($ro);
      $node = M('node');
      $nodes = $node->where("n_id in ($nid)")->select();
      /*foreach($nodes as $k=>$v){
          $link  =
      }*/


    }


}