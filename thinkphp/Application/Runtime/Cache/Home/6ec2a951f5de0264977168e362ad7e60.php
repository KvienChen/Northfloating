<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
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
<body background="/Public/images/logo_header.png"style="background-repeat:no-repeat;background-position:450px 320px;
">
<br>
    <table class="table table-bordered table-hover definewidth m10">
        <tr>
            <td>新密码：<input type="password" name="newpwd" id="newpwd"></td>
        </tr>
    <tr>
        <td>
        <div>
            <font color="red">*</font>手机号码：
        </div>
        <div>
            <input type="text" id="phone" name="phone"/>
        </div>
        <div>
            <font color="red">*</font>验证码：
        </div>
        <div>
            <input type="text" id="checkCode" name="checkCode" size="6"/>
            <input id="btnSendCode" type="button" value="发送验证码" onclick="sendMessage()" />
        </div>
<input type="button" value="提交" id="push">
</td>
</tr>
</table>
    <!--验证码的倒计时-->
<script type="text/javascript">
    /*-------------------------------------------*/
    var InterValObj; //timer变量，控制时间
    var count = 120; //间隔函数，1秒执行
    var curCount;//当前剩余秒数
    var code = ""; //验证码
    var codeLength = 6;//验证码长度
    function sendMessage() {
        curCount = count;
        var phone=$("#phone").val();//手机号码
        if(phone != ""){
            //产生验证码
            for (var i = 0; i < codeLength; i++) {
                code += parseInt(Math.random() * 9).toString();
            }
            //设置button效果，开始计时
            $("#btnSendCode").attr("disabled", "true");
            $("#btnSendCode").val("请在" + curCount + "秒内输入验证码");
            InterValObj = window.setInterval(SetRemainTime, 1000); //启动计时器，1秒执行一次
            //向后台发送处理数据
            $.ajax({
                type: "POST", //用POST方式传输
                dataType: "text", //数据格式:JSON
                url:"/index.php/Home/Person/pwdchange", //目标地址
                data:{code:code},
                success: function (msg){
                    if(msg==code)
                    {
                        alert('你的验证码是:'+msg);
                    }
                }
            });
        }else{
            alert("手机号码不能为空！");
        }
    }
    //timer处理函数
    function SetRemainTime() {
        if (curCount == 0) {
            window.clearInterval(InterValObj);//停止计时器
            $("#btnSendCode").removeAttr("disabled");//启用按钮
            $("#btnSendCode").val("重新发送验证码");
            code = ""; //清除验证码。如果不清除，过时间后，输入收到的验证码依然有效
        }
        else {
            curCount--;
            $("#btnSendCode").val("请在" + curCount + "秒内输入验证码");
        }
    }
</script>
<!--验证码倒计时结束-->
<!--表单提交-->
<script>
  $('#push').click(function(){
      var newpwd=$('#newpwd').val();
      var phone=$('#phone').val();
      var checkcode=$('#checkCode').val();
      $.ajax({
          type: "POST", //用POST方式传输
          dataType: "text", //数据格式:JSON
          url:"/index.php/Home/Person/handle", //目标地址
          data:{newpwd:newpwd,checkcode:checkcode},
          success: function (msg){
             if(msg=='1')
             {
                 alert("修改成功");
             }
              if(msg=='2')
              {
                 alert('验证码不正确')
              }
              if(msg=='0')
              {
                  alert('修改失败')
              }
          }
      });
  })

</script>
<!--表单提交结束-->
</body>

</html>