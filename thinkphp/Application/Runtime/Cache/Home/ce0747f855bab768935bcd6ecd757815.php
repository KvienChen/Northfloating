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
<table class="table table-bordered table-hover definewidth m10">
    
<?php foreach($message as $v){?>
<tr>
    <td>
    <h5 style="color: darkorange"><?php echo $v['u_name']; ?><b>登陆时间<?php echo $v['logtime']; ?></b>
        <b>登陆地点<?php echo $v['lpaddress']; ?></b></h5>
      <?php }?>
      </td>
</tr>
</table>
</body>
</html>