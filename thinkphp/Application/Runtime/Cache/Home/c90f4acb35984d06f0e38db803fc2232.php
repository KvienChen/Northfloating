<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <title>预约看房管理</title>
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

<form class="form-inline definewidth m20" action="#" method="get">
    <strong>预约看房管理&nbsp;&nbsp;&nbsp;>>>&nbsp;&nbsp;&nbsp;已处理信息&nbsp;&nbsp;&nbsp;</strong>
</form>

<table class="table table-bordered table-hover definewidth m10">
    <thead>
        <tr>
            <th>编号</th>
            <th>房源名称</th>
            <th>房主电话</th>
            <th>租客电话</th>
            <th>开始时间</th>
            <th>计划入住时间</th>
            <th>租客其他需求</th>
            <th>看房状态</th>
            <th>管理操作</th>
        </tr>
    </thead>

    <!-- 循环显示数据 -->

    <?php foreach ($data as $key => $value) { ?>

        <tr dataid="<?php echo $value['id']; ?>">
            <td><?php echo $value['id'];?></td>
            <td><?php echo $value['h_name']; ?></td>
            <td><?php echo $value['host_phone']; ?></td>
            <td><?php echo $value['u_phone']; ?></td>
            <td><?php echo $value['look_time']; ?></td>
            <td><?php echo $value['live_time']; ?></td>
            <td><?php echo $value['extra_desc']; ?></td>
            <td> 
                <?php if ($value['status_id']==1) { ?>
                    <b>看房进行时</b>
                <?php }else if ($value['status_id']==2){ ?>
                    <b>及时与用户沟通</b>
                <?php } ?>
            </td>
            <td> 
                <a href="">删除</a>
            </td>
        </tr> 

    <?php } ?>

</table> 

</body>
</html>

<script>
    $(function(){ 

        $(".edit").click(function(){

            //获取本条数据的id 以及状态

            var id = $(this).parents('tr').attr('dataid');//alert(id);

            var status = $(this).attr('data');

            alert(status);

            //定义that

            var that = $(this);

            //alert(id);

            //POST 传值 删除

            $.post("/index.php/Home/Appointment/updatestatus", { id: id, status: status},function(data){

                //判断是否删除成功

                if (data==0) {

                    alert('系统繁忙,请稍后点击处理!');

                }else{

                    alert('请到已处理中心查看');

                    //成功 移除显示数据 对应的这一行

                    that.parents('tr').remove();

                }              
            });
        });

    });	
</script>