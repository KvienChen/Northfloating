<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE HTML>
<html>
 <head>
  <title>后台管理系统</title>
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
   <link href="/thinkphp/Public/assets/css/dpl-min.css" rel="stylesheet" type="text/css" />
  <link href="/thinkphp/Public/assets/css/bui-min.css" rel="stylesheet" type="text/css" />
   <link href="/thinkphp/Public/assets/css/main-min.css" rel="stylesheet" type="text/css" />
 </head>
 <body>

  <div class="header">
    
      <div class="dl-title">
       <!--<img src="/chinapost/Public/assets/img/top.png">-->
      </div>

    <div class="dl-log">欢迎您，<span class="dl-log-user">root</span><a href="/thinkphp/index.php/Home/Index/log" title="退出系统" class="dl-log-quit">[退出]</a>
    </div>
  </div>
   <div class="content">
    <div class="dl-main-nav">
      <div class="dl-inform"><div class="dl-inform-title"><s class="dl-inform-icon dl-up"></s></div></div>
      <ul id="J_Nav"  class="nav-list ks-clear">
            <li class="nav-item dl-selected"><div class="nav-item-inner nav-home">房源审核</div></li>   
            <li class="nav-item dl-selected"><div class="nav-item-inner nav-home">经纪人管理</div></li>
            <li class="nav-item dl-selected"><div class="nav-item-inner nav-home">房间设施管理</div></li>      
            <li class="nav-item dl-selected"><div class="nav-item-inner nav-home">预约看房管理</div></li>      
            <li class="nav-item dl-selected"><div class="nav-item-inner nav-home">网站信息管理</div></li>
            <li class="nav-item dl-selected"><div class="nav-item-inner nav-home">个人中心</div></li>
            <li class="nav-item dl-selected"><div class="nav-item-inner nav-home">同事列表</div></li>
            <li class="nav-item dl-selected"><div class="nav-item-inner nav-home">人事调动</div></li>
        </ul>
    </div>
    <ul id="J_NavContent" class="dl-tab-conten">
    </ul>
   </div>
  <script type="text/javascript" src="/thinkphp/Public/assets/js/jquery-1.8.1.min.js"></script>
  <script type="text/javascript" src="/thinkphp/Public/assets/js/bui-min.js"></script>
  <script type="text/javascript" src="/thinkphp/Public/assets/js/common/main-min.js"></script>
  <script type="text/javascript" src="/thinkphp/Public/assets/js/config-min.js"></script>
  <script>
    BUI.use('common/main',function(){
      var config = 
      [
      {id:'1',homePage : '',menu:[{text:'房源审核',items:[
      {id:'11',text:'未审核房源信息',href:"<?php echo U('index/unservice');?>" },
      {id:'12',text:'我审核的房源信息',href:"<?php echo U('index/myservice');?>" },

      ]}]},

      {id:'2',homePage : '',menu:[{text:'经纪人管理',items:[
      {id:'25',text:'我的评价',href:"<?php echo U('broker/mycomment');?>" },
      {id:'27',text:'我的信息',href:"<?php echo U('broker/mymes');?>" },
      {id:'26',text:'经纪人排行',href:"<?php echo U('broker/brokerlist');?>" },
      {id:'28',text:'我已带看',href:"<?php echo U('broker/relook');?>" },
      {id:'29',text:'已成交',href:"<?php echo U('broker/rebuy');?>" },
      ]}]},
      
      {id:'3',homePage : '',menu:[{text:'房间默认信息管理',items:[
      {id:'13',text:'房间特点标签',href:"<?php echo U('home/tag');?>" },
      {id:'14',text:'配置设施表',href:"<?php echo U('home/config');?>" },    
      ]}]},
      

      {id:'4',homePage : '',menu:[{text:'预约看房管理',items:[
          {id:'16',text:'未处理信息',href:"<?php echo U('appointment/undeal');?>" },
          {id:'17',text:'我处理的信息',href:"<?php echo U('appointment/mydeal');?>" },
      ]}]},


      {id:'5',homePage : '',menu:[{text:'网站信息管理',items:[
      {id:'15',text:'首页服务表管理',href:"<?php echo U('message/service');?>" },
      {id:'7',text:'企业信息',href:"<?php echo U('message/firmmessage');?>" },
      {id:'8',text:'合作商管理',href:"<?php echo U('message/partner');?>" },
      {id:'9',text:'首页广告管理',href:"<?php echo U('message/advertisement');?>" },
      {id:'10',text:'导航栏管理',href:"<?php echo U('message/nav');?>" },
      {id:'20',text:'前台图片错误处理',href:"<?php echo U('message/photoerror');?>" },

      ]}]},

      {id:'6',homePage : '',menu:[{text:'个人中心',items:[
       {id:'21',text:'我的最近登录',href:"<?php echo U('person/loglog');?>" },
       {id:'22',text:'密码管理',href:"<?php echo U('person/pwdchange');?>" },
      ]}]},

      {id:'18',homePage : '',menu:[{text:'同事列表',items:[
          {id:'19',text:'我的同事',href:"<?php echo U('person/personlist');?>" },
      ]}]},


      {id:'23',homePage : '',menu:[{text:'人事调动',items:[
          {id:'24',text:'人员调动',href:"<?php echo U('person/personchange');?>" },
          {id:'25',text:'地区管理',href:"<?php echo U('person/city');?>" },
          {id:'30',text:'联想搜索词汇管理',href:"<?php echo U('person/word');?>" },
      ]}]}

      

      
      ];
      new PageUtil.MainPage({
        modulesConfig : config
      });
    })   ;
  </script>
 </body>
</html>