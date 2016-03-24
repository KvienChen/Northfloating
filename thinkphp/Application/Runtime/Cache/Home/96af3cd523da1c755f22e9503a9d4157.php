<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>导航详情</title>
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
	<center>
		<h3>导航详情修改</h3>
		<form action="/index.php/Home/Message/savenavabout" method="post">
			<table class="table table-bordered table-hover definewidth m10">
			<input type="hidden" name="id" value="<?php foreach($arr as $v){ echo $v['id'];}?>">
				<tr>
					<th>首页</th>
					<td><input type="text" name="name" value="<?php foreach($arr as $v){ echo $v['name'];}?>"></td>
				</tr>
				<tr>
					<th>链接</th>
					<td><input type="text" name="link" value="<?php foreach($arr as $v){ echo $v['link'];}?>"></td>
				</tr>
				<tr>
					<th>排序</th>
					<td><input type="text" name="order" value="<?php foreach($arr as $v){ echo $v['order'];}?>"></td>
				</tr>
				<tr>
					<th>状态</th>
					<td>
						<!--<input type="radio" name="status">启用&nbsp;&nbsp;&nbsp;&nbsp;
						<input type="radio" name="status">关闭-->
						<?php
 foreach ($arr as $v) { if($v['status']==1){?>
									<input type="radio" name="status" value="1" checked=checked>启用&nbsp;&nbsp;&nbsp;&nbsp;
									<input type="radio" name="status" value="0">关闭
								<?php }else{?>
									<input type="radio" name="status" value="1" >启用&nbsp;&nbsp;&nbsp;&nbsp;
									<input type="radio" name="status" value="0" checked=checked>关闭
								<?php } } ?>
					</td>
				</tr>
				<tr>
					<th></th>
					<td><input type="submit" value="修改"></td>
				</tr>
			</table>
		</form>
	</center>
</body>
</html>