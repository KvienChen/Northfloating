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
<body background="/Public/images/logo_header.png"style="background-repeat:no-repeat;background-position:450px 320px;
">
<br>
<center>
    <form action="<?php echo U('Person/personchange');?>" method="post">
        <table>
            <tr>
                <td>
    人员名称:<select name="userid">
        <option>请选择</option>
    <?php foreach ($namelist as $v){?>
    <option value="<?php echo $v['u_id']?>"><?php echo $v['u_name']?></option>
    <?php }?>
    </select>
    配送角色:<select name="roleid">
    <option>请选择</option>
    <?php foreach ($rolelist as $r){?>
    <option value="<?php echo $r['r_id']?>"><?php echo $r['r_name']?></option>
    <?php }?>
</select>
    <input type="submit" value="修改">
    </td>
    </tr>
    </table>
    </form>
</center>
</body>
</html>