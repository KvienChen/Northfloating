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
<center>搜索：<input type="text" id='sou'>&nbsp;&nbsp;条件搜索：<input type="radio" id="ra1" name='aaa' checked value="roon_qu">地区&nbsp;&nbsp;<input type="radio" name='aaa' id="ra2" value="b_name">经纪人&nbsp;&nbsp;<button class="btn btn-primary" onclick="lists(1);" type="button">搜索</button>
</center>
<div id="sp">
<table class="table table-bordered table-hover definewidth m10">
    <thead>
    <tr>
        <th>房子名称</th>
        <th>房子地区</th>
        <th>租房人</th>
        <th>带看经纪人</th>
        <th>房子状态</th>
    </tr>
    </thead>
        <?php if(is_array($arr)): foreach($arr as $key=>$vo): ?><tr>
                <td><?php echo ($vo["h_name"]); ?></td>
                <td><?php echo ($vo["roon_qu"]); ?></td>
                <td><?php echo ($vo["u_phone"]); ?></td>
                <td><?php echo ($vo["b_name"]); ?></td>
                <td>已成交</td>
            </tr><?php endforeach; endif; ?>
</table>
<center><?php echo ($ajaxpage); ?></center>
</div>
</body>
</html>
<script>
    function lists(p){
        var sou=document.getElementById('sou').value;
        if(document.getElementById('ra1').checked==true){
            var re1=document.getElementById('ra1').value;
        }else{
            var re1=document.getElementById('ra2').value;
        }
        //创建ajax对象
        var ajax = new XMLHttpRequest();
         //alert(ajax.readyState)  
         //ajax事件
          ajax.onreadystatechange=function(){
           //alert(ajax.readyState)
           if (ajax.readyState==4)
              {
             //接收数据
             //alert(ajax.responseText);
            document.getElementById("sp").innerHTML = ajax.responseText;
            }
          }
          //与服务器建立连接
          ajax.open("get","/index.php/Home/Broker/deallogfen/re1/"+re1+"/page/"+p+"/sou/"+sou,true);
          //处理请求
          ajax.send(null);

            }
</script>