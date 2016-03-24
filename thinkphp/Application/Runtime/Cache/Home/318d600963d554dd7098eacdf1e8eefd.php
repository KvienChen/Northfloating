<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<?PHP
 use yii\helpers\Url; ?>

<html lang="en">

<head>
    <meta charset="utf-8" />
    <title></title>
    <link rel="stylesheet" type="text/css" href="/Public/css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="/Public/css/bootstrap-responsive.css" />
    <link rel="stylesheet" type="text/css" href="/Public/css/style.css" />
    <script type="text/javascript" src="/Public/Js/jquery.js"></script>
    <script type="text/javascript" src="/Public/Js/jquery.sorted.js"></script>
    <script type="text/javascript" src="/Public/Js/bootstrap.js"></script>
    <script type="text/javascript" src="/Public/Js/ckform.js"></script>
    <script type="text/javascript" src="/Public/Js/common.js"></script>
    <link rel="stylesheet" type="text/css" href="http://yui.yahooapis.com/2.8.1/build/reset/reset-min.css"/>
    <link rel="stylesheet" type="text/css" href="/Public/css/buttons.css"/>

    <style type="text/css">

        html {
            background-color: #ddd;
            font: 62.5%/1 "Lucida Sans Unicode","Lucida Grande",Verdana,Arial,Helvetica,sans-serif;
        }

        #wrapper { text-align: center; }


        /*It appears that the Pictos Font resets the line-height of the icon.. so if you are using them, delete the line below. */
        .icon:before { line-height: .7em; }

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
        marquee{
            font-family: 楷体;
            font-size: 25px;
            font-weight: bold;
            color: #99682b;
        }
    </style>


</head>

<body>


<div id="list">
<div id="wrapper">
    <a href="#" data-icon="♚" class="button orange shield glossy" onclick="first()">初步审核</a>
    <a href="#" data-icon="♚" class="button orange shield glossy" onclick="second()">审核当中</a>
    <a href="#" data-icon="♚" class="button orange shield glossy" onclick="third()">最终审核</a>
</div>
<marquee behavior="" direction=""><?php echo ($u_name); ?>审核的房源信息</marquee>
<div id="one">
    <table class="table table-bordered table-hover definewidth m10" class="one">
        <thead>
        <tr>
            <th>房主称呼</th>
            <th>联系电话</th>
            <th>房源名</th>
            <th>出租类型</th>
            <th>地址</th>
            <th>楼层</th>
            <th>总楼层</th>
            <th>提交时间</th>
            <th>用户</th>
            <th>建造时间</th>
            <th>审核人</th>
            <th>状态</th>
        </tr>
        </thead>

        <?php if(is_array($check_all)): foreach($check_all as $key=>$v): ?><tr>
                <td><?php echo ($v['host_name']); ?></td>
                <td><?php echo ($v['host_phone']); ?></td>
                <td><?php echo ($v['h_name']); ?></td>
                <td><?php echo ($v['rent_type']); ?></td>
                <td><?php echo ($v['roon_qu']); ?></td>
                <td><?php echo ($v['floor']); ?></td>
                <td><?php echo ($v['totalfloor']); ?></td>
                <td><?php echo ($v['post_time']); ?></td>
                <td><?php echo ($v['u_phone']); ?></td>
                <td><?php echo ($v['builttime']); ?></td>
                <td><?php echo ($v['u_name']); ?></td>
                <td>
                    <input title="审核" type="image" width="55px;" height="25px;" src="/public/images/but.png" value="<?php echo ($v['pass_status']); ?>" onclick="but(<?php echo ($v['h_id']); ?>)">||
                    <input title="删除" type="image" width="45px" height="22px;" src="/public/images/del.gif" value="<?php echo ($v['h_id']); ?>" onclick="del(<?php echo ($v['h_id']); ?>)">
                </td>
            </tr><?php endforeach; endif; ?>

    </table>
    <div align="center"><?php echo ($page); ?></div>
</div>
</div>
<div id="two" style="display:none">
    <table class="table table-bordered table-hover definewidth m10" class="two">
        <thead>
        <tr>
            <th>身份证号</th>
            <th>身份证住址</th>
            <th>现居住地</th>
            <th>身份证正面照片</th>
            <th>身份证背面照片</th>
            <th>本人持身份证照片</th>
            <th>证明业主身份的有效证件复印件</th>
            <th>审核人</th>
            <th>状态</th>
        </tr>
        </thead>

        <?php if(is_array($check_two)): foreach($check_two as $key=>$vt): ?><tr>
                <td><?php echo ($vt['idcard']); ?></td>
                <td><?php echo ($vt['id_site']); ?></td>
                <td><?php echo ($vt['now_site']); ?></td>
                <td><?php echo ($vt['id_front']); ?></td>
                <td><?php echo ($vt['id_beside']); ?></td>
                <td><?php echo ($vt['me_card']); ?></td>
                <td><?php echo ($vt['my_home']); ?></td>
                <td><?php echo ($vt['u_name']); ?></td>
                <td><input type="image" width="55px;" height="25px;" src="/public/images/but.png" value="<?php echo ($vt['is_pass']); ?>" onclick="buta(<?php echo ($vt['h_id']); ?>)"></td>
            </tr><?php endforeach; endif; ?>

    </table>
</div>


<div id="three" style="display:none">
    <table class="table table-bordered table-hover definewidth m10">
        <thead>
        <tr>
            <th>卧室</th>
            <th>客厅</th>
            <th>卫生间</th>
            <th>厨房</th>
            <th>阳台</th>
            <th>朝向</th>
            <th>租金</th>
            <th>大小(平米)</th>
            <th>配置设施</th>
            <th>房间特点</th>
            <th>路线描述</th>
            <th>实拍照片</th>
            <th>房源特点描述</th>
            <th>租客描述</th>
            <th>看房时间</th>
            <th>入住时间</th>
            <th>信息添加时间</th>
            <th>房源关注人数</th>
            <th>审核人</th>
            <th>是否被租</th>
            <th>状态</th>
        </tr>
        </thead>

        <?php if(is_array($check_three)): foreach($check_three as $key=>$ve): ?><tr>
                <td><?php echo ($ve['room_shi']); ?></td>
                <td><?php echo ($ve['room_ting']); ?></td>
                <td><?php echo ($ve['room_wei']); ?></td>
                <td><?php echo ($ve['room_kitchen']); ?></td>
                <td><?php echo ($ve['room_balcony']); ?></td>
                <td><?php echo ($ve['direct']); ?></td>
                <td><?php echo ($ve['h_money']); ?></td>
                <td><?php echo ($ve['h_size']); ?></td>
                <td><?php echo ($ve['configid']); ?></td>
                <td><?php echo ($ve['tag_id']); ?></td>
                <td><?php echo ($ve['route']); ?></td>
                <td><?php echo ($ve['room_img']); ?></td>
                <td><?php echo ($ve['extra_desc']); ?></td>
                <td><?php echo ($ve['expect_desc']); ?></td>
                <td><?php echo ($ve['look_time']); ?></td>
                <td><?php echo ($ve['live_time']); ?></td>
                <td><?php echo ($ve['add_time']); ?></td>
                <td><?php echo ($ve['focus_num']); ?></td>
                <td><?php echo ($ve['u_name']); ?></td>
                <td><?php echo ($ve['status']); ?></td>
                <td><input type="image" width="55px;" height="25px;" src="/public/images/but.png" value="<?php echo ($ve['is_pass']); ?>" onclick="buts(<?php echo ($ve['h_id']); ?>)"></td>
            </tr><?php endforeach; endif; ?>

    </table>
</div>
<script>
    function first(){
        document.getElementById('one').style.display='block';
        document.getElementById('two').style.display='none';
        document.getElementById('three').style.display='none';
    }
    function second(){
        document.getElementById('one').style.display='none';
        document.getElementById('two').style.display='block';
        document.getElementById('three').style.display='none';
    }
    function third(){
        document.getElementById('one').style.display='none';
        document.getElementById('two').style.display='none';
        document.getElementById('three').style.display='block';
    }
</script>
<div style="text-align:center;clear:both;margin-top:50px">
    <script src="/gg_bd_ad_720x90.js" type="text/javascript"></script>
    <script src="/follow.js" type="text/javascript"></script>
</div>

</body>

</html>
<script src="pubic/js/jquery.js"></script>
<script>
    //初步审核  不通过
    function but(id){
//        if(!confirm("")) return false;
        alert("该信息已经审核成功");
    }

    //审核中  不通过
    function buta(id){
//        if(!confirm("该信息已经审核成功")) return false;
        alert("该信息已经审核成功");
    } 

    //最终审核  不通过
    function buts(id){
//        if(!confirm("你确定要审批吗？")) return false;
        alert("该信息已经审核成功");
    }

    /*function del(id){
       if(!confirm("该信息已经通过审核，你确定要删除吗？")); return false;
        ajax = new XMLHttpRequest();
        ajax.open("get","/index.php/Home/Index/del/id/"+id,true);
        ajax.send();
        ajax.onreadystatechange=function(){

        }*/

    //ajax分页显示
    function pag(page){
        //创建ajax对象
        var ajax=new XMLHttpRequest();
        //连接服务器
        ajax.open("get","/index.php/Home/Index/myservice/page/"+page,true);
        //发送数据
        ajax.send();
        //函数回调
        ajax.onreadystatechange=function(){
            if(ajax.readyState==4 && ajax.status==200){
                document.getElementById("list").innerHTML=ajax.responseText;
            }
        }
    }
</script>