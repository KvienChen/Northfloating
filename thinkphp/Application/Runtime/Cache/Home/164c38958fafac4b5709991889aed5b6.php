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
<br>

<table class="table table-bordered table-hover definewidth m10">
    <thead>
    <tr>
        <th>姓名</th>
        <th>QQ</th>
        <th>电话</th>
        <th>负责地区</th>
        <th>成交记录</th>
        <th>在职状态</th>
        <th>好评数</th>
        <th>差评数</th>
    </tr>
    </thead>
        <tr>
            <td><?php echo ($arr["b_name"]); ?></td>
            <td><?php echo ($arr["b_qq"]); ?></td>
            <td><?php echo ($arr["b_phone"]); ?></td>
            <td><?php echo ($arr["a_name"]); ?></td>
            <td><?php echo ($arr["b_deal_num"]); ?></td>
            <td>
            <?php if($arr["b_status"] == 1): ?>在职
            <?php else: ?>
                不在职<?php endif; ?>
            </td>
            <td><?php echo ($arr["b_good"]); ?></td>
            <td><?php echo ($arr["b_bad"]); ?></td>
        </tr> 
</table>
</body>
</html>