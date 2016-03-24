<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <title></title>
 <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="/Public/css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="/Public/css/bootstrap-responsive.css" />
    <link rel="stylesheet" type="text/css" href="/Public/css/style.css" />
    <script type="text/javascript" src="/Public/Js/jquery.js"></script>
    <script type="text/javascript" src="/Public/Js/jquery.sorted.js"></script>
    <script type="text/javascript" src="/Public/Js/bootstrap.js"></script>
    <script type="text/javascript" src="/Public/Js/ckform.js"></script>
    <script type="text/javascript" src="/Public/Js/common.js"></script>
    <style type="text/css">
        body {
            padding-bottom: 40px;
        }
        .sidebar-nav {
            padding: 9px 0;
        }

        @media (max-width: 980px) {
            /* Enable use of floated navbar text */
            .navbar-text.pull-right {
                float: none;
                padding-left: 5px;
                padding-right: 5px;
            }
        }
    </style>
</head>
<center>
<div id="list">
		<h2>服务列表</h2>
		
		<table  class="table table-bordered table-hover definewidth m10">
			<th>服务名称</th>
			<th>服务图片</th>
			<th>服务描述</th>
			<th>操作</th>
			<?php  foreach($arr as $v){ ?>
			<tr>
				<td><?php  echo $v['ser_name']; ?></td>
				<td><img src="/Public/images/logo1.jpg" width="150px" height="100px" alt="" /></td>
				<td><?php  echo $v['ser_name']; ?></td>
				<td><a href="/index.php/Home/Message/service_del/ser_id/<?php echo ($v["ser_id"]); ?>">删除</a> |  <a href="/index.php/Home/Message/service_update/ser_id/<?php echo ($v["ser_id"]); ?>">修改</a>   |   <a href="">添加</a></td>
			</tr>
			<?php	 }　?>
		</table>
		<?php  echo $page; ?>
		</div>
</center>
</body>
</html>
<script>
    function pag(page){
    //创建ajax对象
    var ajax=new XMLHttpRequest();
    //连接服务器
    ajax.open("get","/index.php/Home/Message/service/page/"+page,true);
    //发送数据
    ajax.send();
    //函数回调
    ajax.onreadystatechange=function(){
      if(ajax.readyState==4 && ajax.status==200){
        document.getElementById("list").innerHTML=ajax.responseText;
      }
    }
  }
 </script>