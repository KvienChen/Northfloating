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
<h2>企业信息</h2>
<form action="/index.php/Home/Message/firmmessage_update/id/<?php echo $arr[0]['id']; ?>" method="post" enctype="multipart/form-data" >
	<table class="table table-bordered table-hover definewidth m10">
		<tr>
			<td>公司名称:</td>
			<td><input type="text" name="totalname" value="<?php echo $arr[0]['totalname']; ?>" /></td>
		</tr>
		<tr>
			<td >公司logo:</td>
			<td><img src="/Public/images/logo1.jpg" width="150px" height="100px" alt="" name="logo" /><input type="file" /></td>
		</tr>
		<tr>
			<td>公司网址:</td>
			<td><input type="text" name="site" value="<?php echo $arr[0]['site']; ?>" /></td>
		</tr>
		<tr>
			<td class="tableleft">联系电话:</td>
			<td><input type="text" name="phone" value="<?php echo $arr[0]['phone']; ?>" /></td>
		</tr>
		<tr>
			<td class="tableleft">网络经营许可证:</td>
			<td><input type="text" name="number" value="<?php echo $arr[0]['number']; ?>" /></td>
		</tr>
		<tr>
			<td>备案号:</td>
			<td><input type="text" name="bnumber" value="<?php echo $arr[0]['bnumber']; ?>" /></td>
		</tr>
		<tr>
			<td></td>
			<td  class="btn btn-primary" ><input type="submit" value="修改" /></td>
		</tr>
	</table>
	</form>
</center>
</body>
</html>