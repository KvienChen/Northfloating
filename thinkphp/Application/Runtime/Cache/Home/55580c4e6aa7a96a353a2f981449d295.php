<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>回收站</title>
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
	<input type="button" value="添加导航" id="addtoadvertisement" onclick="fun();">&nbsp;&nbsp;&nbsp;&nbsp;<input type="button" value="进入回收站" id="addtoadvertisement" onclick="fun1();">
	<center>
		<h3>回收站</h3>

		<table class="table table-bordered table-hover definewidth m10">
			<tr>
				<th>导航名称</th>
				<th>导航链接</th>
				<th>导航排序</th>
				<th>是否启用</th>
				<th>操作</th>
			</tr>
			<?php if(is_array($arr)): foreach($arr as $key=>$v): ?><tr>
				<td><?php echo ($v["name"]); ?></td>
				<td><?php echo ($v["link"]); ?></td>
				<td><?php echo ($v["order"]); ?></td>
				<td>
					<?php if($v["status"] == 1): ?><a href="/index.php/Home/Message/savetrue/id/<?php echo ($v["id"]); ?>" style="text-decoration:none;">✔</a>
					<?php else: ?> <a href="/index.php/Home/Message/savefalse/id/<?php echo ($v["id"]); ?>" style="text-decoration:none;">✘</a><?php endif; ?>
				</td>
				<td><a href="/index.php/Home/Message/saveuse/id/<?php echo ($v["id"]); ?>">恢复使用</a></td>
			</tr><?php endforeach; endif; ?>
		</table>
		<?php echo ($page); ?>
</div>
<script>
	function pag(page){
		//创建ajax对象
		var ajax=new XMLHttpRequest();
		//连接服务器
		ajax.open("get","/index.php/Home/Message/bin/page/"+page,true);
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
		location.href="/index.php/Home/Message/addna";
	}


	function fun1(){
		location.href="/index.php/Home/Message/bin";
	}
</script>
	</center>
</body>
</html>