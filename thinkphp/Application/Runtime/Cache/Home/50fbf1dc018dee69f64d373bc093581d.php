<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>

<head>

    <title></title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="/Public/css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="/Public/css/bootstrap-responsive.css" />
    <link rel="stylesheet" type="text/css" href="/Public/css/style.css" />
    <link rel="stylesheet" type="text/css" href="/Public/css/mypage.css" />
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

 <!--<button type="button" class="btn btn-success" name="backid" id="backid">添加法律法规</button>-->
<table class="table table-bordered table-hover definewidth m10">
    <thead>
    <tr>
        <th>编号</th>
        <th>姓名</th>
        <th>电话</th>
        <th>QQ</th>
        <th>操作</th>
    </tr>
    </thead>



    <?php if(is_array($arr)): foreach($arr as $key=>$v): ?><tr>
            <td><?php echo ($v["b_id"]); ?></td>
            <td><?php echo ($v["b_name"]); ?></td>
            <td><?php echo ($v["b_phone"]); ?></td>
            <td><img  style="CURSOR: pointer" onclick="javascript:window.open('http://wpa.qq.com/msgrd?v=3&uin=<?php echo ($v["b_qq"]); ?>&site=qq&menu=yes', '_blank', 'height=502, width=644,toolbar=no,scrollbars=no,menubar=no,status=no');"  border="0" SRC=http://wpa.qq.com/pa?p=1:334694537:1 alt="点击这里给我发消息"></td>
            <td>



                <a href="/index.php/Home/Person/del/b_id/<?php echo ($v["b_id"]); ?>">删除</a>
                <a href="/index.php/Home/Person/update/b_id/<?php echo ($v["b_id"]); ?>">修改</a>
            </td>
        </tr><?php endforeach; endif; ?>

    <tr class="content">
        <!--<td colspan="3" bgcolor="#FFFFFF">&nbsp;<?php echo ($page); ?></td>-->
        <td colspan="3" bgcolor="#FFFFFF"><div class="pages">
            <?php echo ($page); ?>
        </div></td>
    </tr>

</table>

</body>

</html>
<script> 

</script>