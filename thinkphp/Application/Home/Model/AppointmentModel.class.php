<?php
namespace Home\Model;
use Think\Model;
class AppointmentModel extends Model {

	/**
	 * 查询获取数据  获取没有被删除的 还没有被处理的房屋的数据
	 */

	public function selectdata($where){

		return $this->where($where)->join('user on appointment.u_id = user.u_id')->join('checkone on appointment.room_id = checkone.h_id')->select();

	}

	/**
	 * 修改状态 可以看房 不可以看房 
	 */

	public function updatestatus($where, $status){

		$where['del_id'] = 0;

		$this->status_id = $status;

		return $this->where($where)->save();
	}

	/**
	 * 修改数据  开始处理房屋
	 */

	public function updateadminid($where){

		$where['status_id'] = 0;

			//先判断是否有人在处理这条数据

		$data = $this->where($where)->find();

		//print_r($data);exit;

		if ($data['admin_id']) {

			return "0";exit;
		}

			//获取到经纪人的id

		$admin_id = 1;;/*********************************************************还的修改*/

			//确定要修改的数据

		$this->admin_id = $admin_id;

		$this->status_id = 1;

			//确定该房屋信息没有被删除

		$where['del_id'] = 0;

		return $this->where($where)->save();

	}

	/**
	 * 删除数据
	 */

	public function delid($where){

		//先判断是否有人在处理这条数据 或者 这条数据是否是你在修改

		$data = $this->where($where)->find();

		//print_r($data);exit;

		//获取到经纪人的id

		$admin_id = 1;/*********************************************************还的修改*/

		if ( $data['admin_id']==0 || $data['admin_id'] ==$admin_id) {

			$this->del_id = 1;

			return $this->where($where)->save();
		}

	}

}
?>