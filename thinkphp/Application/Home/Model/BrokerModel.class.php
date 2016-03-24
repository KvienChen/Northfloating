<?php
    namespace Home\Model;
    use Think\Model;
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
        //根据id在经纪人信息表中查询一条数据
        public function selectone($id){
            return $this->Table('broker')->join('area on broker.b_area_id=area.a_id')->where("b_id='$id'")->find();
        }
        //查询待处理信息表的数据条数
        public function pendingnum($where){
            return $this->Table('pending')->join('checkone on pending.p_room_id=checkone.h_id')->join('user on pending.p_people_id=user.u_id')->join('area on pending.p_area_id=area.a_id')->order('checkone.post_time desc')->where($where)->count();
        }
        //根据三表联查查询和待处理信息表有关的表
        public function selectpending($where,$start,$line){
            return $this->Table('pending')->join('checkone on pending.p_room_id=checkone.h_id')->join('user on pending.p_people_id=user.u_id')->join('area on pending.p_area_id=area.a_id')->order('checkone.post_time desc')->where($where)->limit($start,$line)->select();
        }
        //根据id和字段修改待处理信息表中的内容
        public function updatepending($id){
            return $this->Table('pending')->where("p_id=$id")->save();
        }
        //根据id在待处理信息表中查询一条数据
        public function selectpdone($id){
            return $this->Table('pending')->where("p_id='$id'")->find();
        }
        //根据id和状态三表联查数据
        public function selectdeallog($id,$where,$start,$line){
            return $this->Table('deallog')->join('checkone on deallog.d_room_id=checkone.h_id')->join('user on deallog.d_people_id=user.u_id')->join('broker on deallog.d_admin_id=broker.b_id')->where("broker.b_id=$id and deallog.d_status=3")->where($where)->limit($start,$line)->select();
        }
        //查询房屋出租记录所有条数
        public function deallognum($where){
            return $this->Table('deallog')->join('checkone on deallog.d_room_id=checkone.h_id')->join('user on deallog.d_people_id=user.u_id')->join('broker on deallog.d_admin_id=broker.b_id')->where($where)->count();
        }

        //查询经纪人id的所有的评论信息
    public function commentall($star,$size,$cid)
    {
        return D('comment')->join(" admin_user on comment.c_admin_id=admin_user.u_id")->join(" user on comment.c_user_id=user.u_id")->where(" admin_user.u_id = $cid")->order(' c_time desc')->limit($star,$size)->select();
    }

    public function brokerall($c_id)
    {
        return $this->Table('broker')->join(" area on broker.b_area_id=area.a_id")->where(" broker.u_id = $c_id")->find();
    }

    public function commentnum($cid)
    {
        return D('comment')->join(" admin_user on comment.c_admin_id=admin_user.u_id")->join(" user on comment.c_user_id=user.u_id")->where(" admin_user.u_id = $cid")->order(' c_time desc')->count();
    }

    //搜索条数
    public function commentday($time,$cid)
    {
        return D('comment')->join(" admin_user on comment.c_admin_id=admin_user.u_id")->join(" user on comment.c_user_id=user.u_id")->where(" admin_user.u_id = $cid and comment.c_time > $time")->count();
    }   

    public function commentadaycount($time,$cid)
    {
        return D('comment')->join(" admin_user on comment.c_admin_id=admin_user.u_id")->join(" user on comment.c_user_id=user.u_id")->where(" admin_user.u_id = $cid and comment.c_time>'$time'")->count();
    }
    //搜索数据
    public function commentadayall($star,$size,$time,$cid)
    {
        return D('comment')->join(" admin_user on comment.c_admin_id=admin_user.u_id")->join(" user on comment.c_user_id=user.u_id")->where(" admin_user.u_id = $cid and comment.c_time>'$time'")->limit($star,$size)->select();
    }
    //经纪人排行查新
    public function brokeralls($star,$size)
    {
        return D('broker')->order(' b_deal_num desc')->limit($star,$size)->select();
    }
    //经纪人排行总数
    public function brokernum()
    {
        return D('broker')->where(' b_id > 0')->count();
    }
    //我已经带看过的房间总数
    public function deallogcount($cid)
    {
        return D('deallog')->join("checkone on deallog.d_room_id = checkone.h_id")->join("user on deallog.d_people_id = user.u_id")->where("d_status = 1 and d_admin_id = $cid")->count();
    }
    //我已经带看过的房间所有数据
    public function deallogall($star,$size,$cid)
    {
        return D('deallog')->join("checkone on deallog.d_room_id = checkone.h_id")->join("user on deallog.d_people_id = user.u_id")->where("d_status = 1 and d_admin_id = $cid")->limit($star,$size)->select();
    }

    }
?>