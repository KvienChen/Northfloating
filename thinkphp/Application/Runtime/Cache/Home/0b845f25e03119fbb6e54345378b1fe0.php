<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>错误图片详情</title>
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
		<h3>详情信息修改</h3>
		<form action="/index.php/Home/Message/updateerror" method="post" enctype="multipart/form-data">
			<table class="table table-bordered table-hover definewidth m10">
			<input type="hidden" name="id" value="<?php foreach($arr as $v){ echo $v['id'];}?>">
				<tr>
					<th>当前设置首页图片</th>
					<td>
						<?php if(is_array($arr)): foreach($arr as $key=>$v): ?><img src="/Public/<?php echo ($v["index_error"]); ?>" width="100" height="70"><?php endforeach; endif; ?>
						<br/>
						修改请点击按钮:<input type="file" name="img1">
					</td>
				</tr>
				<tr>
					<th>当前设置房源图片</th>
					<td>
						<?php if(is_array($arr)): foreach($arr as $key=>$v): ?><img src="/Public/<?php echo ($v["homeimg_error"]); ?>" width="100" height="70"><?php endforeach; endif; ?>
						<br/>
						修改请点击按钮:<input type="file" name="img2">
					</td>
				</tr>
				<tr>
					<th></th>
					<td><input type="submit" value="上传">&nbsp;&nbsp;&nbsp;&nbsp;<input type="reset" value="重置"></td>
				</tr>
			</table>
		</form>
	</center>
</body>
</html>