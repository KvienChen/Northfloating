<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>广告管理中心</title>
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
<body>
<div id="list">
<input type="button" value="添加新广告" id="addtoadvertisement" onclick="fun();">

	<center>
		<h3>首页广告列表管理</h3>
		<table class="table table-bordered table-hover definewidth m10">
			<tr>
				<th>广告名称</th>
				<th>广告标题</th>
				<th>广告内容</th>
				<th>开始时间</th>
				<th>结束时间</th>
				<th>备注</th>
				<th>操作</th>
			</tr>
			<?php if(is_array($arr)): foreach($arr as $key=>$v): ?><tr>
				<td><?php echo ($v["adv_name"]); ?></td>
				<td><?php echo ($v["adv_title"]); ?></td>
				<td><img src="/Public/<?php echo ($v["adv_img"]); ?>" width="100" height="70"></td>
				<td><?php echo ($v["adv_start"]); ?></td>
				<td><?php echo ($v["adv_end"]); ?></td>
				<td><?php echo ($v["adv_del"]); ?></td>
				<td>&nbsp;<a href="/index.php/Home/Message/advertisementdel/id/<?php echo ($v["adv_id"]); ?>" style="text-decoration:none;">删除</a>&nbsp;&nbsp;<a href="/index.php/Home/Message/advertisementabout/id/<?php echo ($v["adv_id"]); ?>" style="text-decoration:none;">详情</a>&nbsp;</td>
			</tr><?php endforeach; endif; ?>
		</table>
		<?php echo ($page); ?>
</div>
<script>
	function pag(page){
		//创建ajax对象
		var ajax=new XMLHttpRequest();
		//连接服务器
		ajax.open("get","/index.php/Home/Message/advertisement/page/"+page,true);
		//发送数据
		ajax.send();
		//函数回调
		ajax.onreadystatechange=function(){
			if(ajax.readyState==4 && ajax.status==200){
				document.getElementById("list").innerHTML=ajax.responseText;
			}
		}
	}


	function fun(){
		location.href="/index.php/Home/Message/addadv";
	}
</script>
	</center>
</body>
</html>