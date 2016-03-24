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
<div id="list1">
	<h2>合作商管理</h2>
	<table class="table table-bordered table-hover definewidth m10">
    
		<th class="tableleft">合作商名称</th>
		<th>链接地址</th>
		<th>合作状态</th>
		<th>是否删除</th>
		<th>操作</th>
		<?php foreach ($arr as $k => $v){ ?>
			<tr id="<?php echo $v['id'];?>" >
			<td ondblclick="update_name(this,'<?php echo ($v["name"]); ?>','<?php echo ($v["id"]); ?>')"><?php  echo $v['name']; ?></td>
			<td><?php  echo $v['link']; ?></td>
			<td>
<input type="image" src=/Public/images/<?php  if($v['status']==1){ echo 'd.png';}else{echo 'c.png';} ?> width="20" height="20"  class="status" value="<?php echo $v['status'];?>" onclick="check('<?php echo $v['id'];?>',this)" />
		   </td>
			<td>
<input type="image" src=/Public/images/<?php  if($v['del']==1){ echo "d.png";}else{echo "c.png";} ?>  width="20" height="20"  class="del" value="<?php echo $v['del'];?>" onclick="check1('<?php echo $v['id'];?>',this)" />
                </td>
				<td> <input type="button"  value="删除" onclick="check_del1('<?php echo $v['id']; ?>',this)"  >   |   <a href="/index.php/Home/Message/partner_update/id/<?php echo $v['id']; ?>"><input type="button" value="修改"></a></td>
			</tr>
		<?php  } ?>  
	</table>
    <?php  echo $page; ?>
    </div>
	</center>
</body>
</html>
<script>
//点击修改是否显示
    function check(id,obj){
        $that = $(this);
        $.ajax({
            url:"/index.php/Home/Message/partner_1",
            data:"id="+id,
            type:"GET",
            dataType:"json",
            success:function(data){
                if (data==1) {
                    obj.src='/Public/images/d.png'; 
                }else if(data==0){
                    obj.src='/Public/images/c.png';
                }else if(data==2){
                    alert('修改失败');
                }
            }
        })
    }
    //点击修改是否删除
    function check1(id,obj){
        $that = $(this);
        $.ajax({
            url:"/index.php/Home/Message/partner_del",
            data:"id="+id,
            type:"GET",
            dataType:"json",
            success:function(data){
                if (data==1) {
                    obj.src='/Public/images/d.png'; 
                }else if(data==0){
                    obj.src='/Public/images/c.png';
                }else if(data==2){
                    alert('修改失败');
                }
            }
        })
    }
    //分页
    function pag(page){
    //创建ajax对象
    var ajax=new XMLHttpRequest();
    //连接服务器
    ajax.open("get","/index.php/Home/Message/partner/page/"+page,true);
    //发送数据
    ajax.send();
    //函数回调
    ajax.onreadystatechange=function(){
      if(ajax.readyState==4 && ajax.status==200){
        document.getElementById("list1").innerHTML=ajax.responseText;
      }
    }
  }
  //删除
    function check_del1(id,obj){
       $.ajax({
            url:"/index.php/Home/Message/partner_del1",
            data:"id="+id,
            type:"GET",
            dataType:"json",
            success:function(data){
                $('#'+id).remove()
            }
        })
    }
    //即点即改(公司名称)
    function update_name(obj,val,id){
        obj.innerHTML = '';
        var aa = document.createElement("input");
        aa.type='text';
        aa.value = val;
        aa.setAttribute("className","text");
        aa.id='cc';
        obj.appendChild(aa);
        aa.select();
        aa.onblur=function(){
            aa.type='hidden';
            va = document.getElementById('cc').value;
            var ajax = new XMLHttpRequest();
            ajax.open('get','/index.php/Home/Message/partner_upda/id/'+id+'/val/'+va,true);
            ajax.send();
            ajax.onreadystatechange = function(){
                if(ajax.readyState==4 && ajax.status==200){
                   alert(ajax.responseText);
                   //document.getElementById('list').innerHTML = ajax.responseText;
                }
            }   
        }
    }
</script>