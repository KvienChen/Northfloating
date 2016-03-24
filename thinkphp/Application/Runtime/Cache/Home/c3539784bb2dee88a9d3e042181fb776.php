<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>首页导航栏添加</title>
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
		<marquee behavior=alternate><font size="5" style="font-family:楷体"><b>导航栏添加</b></font></marquee>
		<form action="/index.php/Home/Message/addnav" method="post">
			<table class="table table-bordered table-hover definewidth m10">
				<tr>
					<th>导航名称</th>
					<td><input type="text" name="name"></td>
				</tr>
				<tr>
					<th>导航链接</th>
					<td><input type="text" name="link"></td>
				</tr>
				<tr>
					<th>导航排序</th>
					<td><input type="text" name="order"></td>
				</tr>
				<tr>
					<th>是否启用</th>
					<td><input type="radio" name="status" value="1">是&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="status" value="0">否</td>
				</tr>
				<tr>
					<th></th>
					<td><input type="submit" value="添加">&nbsp;&nbsp;&nbsp;&nbsp;<input type="reset" value="重置"></td>
				</tr>
			</table>
		</form>
	</center>
</body>
</html>