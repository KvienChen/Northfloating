<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<?PHP  use yii\helpers\Url; ?>
<head>
    <title></title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="/Public/css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="/Public/css/bootstrap-responsive.css" />
    <link rel="stylesheet" type="text/css" href="/Public/css/style.css" />
    <script type="text/javascript" src="/Public/Js/jquery.js"></script>
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
<br>
&nbsp;&nbsp;&nbsp;
信息管理>法律法规
 <button type="button" class="btn btn-success" name="backid" id="backid">添加法律法规</button>
<table class="table table-bordered table-hover definewidth m10">
    <thead>
    <tr>
        <th>经纪人姓名</th>
        <th>经纪人联系QQ</th>
        <th>经纪人联系电话</th>
        <th>经纪人在职状态</th>
        <th>经纪人成交记录</th>
        <th>编辑</th>
    </tr>
    </thead>
    <?php foreach ($arr as $k => $v) { ?>
         <tr>
            <td><?php echo $v['b_name']?></td>
            <td><?php echo $v['b_qq']?></td>
            <td><?php echo $v['b_phone']?></td>
            <td><?php
 if($v['b_status'] == 1){ echo "在职"; }else{ echo "离职"; }?>
            </td>
            <td style="color:red"><?php echo $v['b_deal_num']?></td>
            <td>
                <a href="edit.html">修改</a>                
                <a href="javascript:void(0)" class='del'>删除</a>                
            </td>
        </tr>  
      <?php  }?>

</table>
<div class="list-page" align="center" style="font-size:15px;"> <?php echo ($page); ?></div>
</body>
</html>
<script> 

</script>