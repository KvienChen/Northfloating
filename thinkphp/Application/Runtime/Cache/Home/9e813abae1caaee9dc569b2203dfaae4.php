<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>

    <title></title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="/thinkphp/Public/css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="/thinkphp/Public/css/bootstrap-responsive.css" />
    <link rel="stylesheet" type="text/css" href="/thinkphp/Public/css/style.css" />
    <script type="text/javascript" src="/thinkphp/Public/Js/jquery.js"></script>
    <script type="text/javascript" src="/thinkphp/Public/Js/jquery.sorted.js"></script>
    <script type="text/javascript" src="/thinkphp/Public/Js/bootstrap.js"></script>
    <script type="text/javascript" src="/thinkphp/Public/Js/ckform.js"></script>
    <script type="text/javascript" src="/thinkphp/Public/Js/common.js"></script>
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

<table class="table table-bordered table-hover definewidth m10">
    <tr>
        <td width="10%" class="tableleft">导航栏名称</td>
        <td><input type="text" name="name" placeholder='请输入导航栏名称'/></td>
    </tr>
    <tr>
        <td class="tableleft">链接地址</td>
        <td>
          <input type="text" name="cont" placeholder='请输入控制器名'/>
          &nbsp; <span>/</span> &nbsp;
          <input type="text" name="act" placeholder='请输入方法名'/>
        </td>
    </tr>   
    <tr>
        <td class="tableleft">排序id</td>
        <td>
            <input type="text" class='orderid' onblur='confi()' name="order_id" placeholder='请输入排序号'/>
             <span class='tishi'>*数字越小越靠前,请输入整数,否则我们会将您输入的数向上取整</span>
        </td>
    </tr>
    <tr>
        <td width="10%" class="tableleft">是否显示</td>
        <td>
            <input type="radio" name="isshow" value='1'> 是
            <input type="radio" name="isshow" value='0'> 否
        </td>
    </tr>
    <tr>
        <td class="tableleft"></td>
        <td>
            <button type="submit" class="btn btn-primary" type="button">保存</button>&nbsp;&nbsp;<button type="button" class="btn btn-success" name="backid" id="backid">返回列表</button>
        </td>
    </tr>
</table>

</body>
</html>