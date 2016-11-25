<!DOCTYPE html>
<html lang="zh-cn">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>馋猫甜品店</title>
    <link rel="shortcut icon" type="image/x-icon" href="./favicon.ico" />
    <link href="./bootstrap-3.3.0/css/bootstrap.min.css" rel="stylesheet"/>
    <link href="./css/style.css" rel="stylesheet"/>
 		<script src="./js/jquery-2.1.4.min.js"></script>
    <script src="./bootstrap-3.3.0/js/bootstrap.min.js"></script>
    <script src="./js/script.js"></script>
    <script type="text/javascript">
      $(function(){
        $("#<?php echo $collapse ?>").addClass('in');
        $("#<?php echo $current_tag ?>").addClass('current');
      });
    </script>
  </head>
  <body>
    <!-- 顶端固定导航栏 -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container-fluid">
        <div class="navbar-header">
        	<!-- 屏幕小时出现的小菜单按钮 -->
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <!-- 三条横杆 -->
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <span class="navbar-brand"><img class="site-name" src="img/site-name.png"><span>小馋猫家后院的小花园</span></span>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#">设置</a></li>
            <li><a href="#">关于</a></li>
            <li><a href="#">退出</a></li>
          </ul>
        </div>
      </div>
      <div class="divider"></div>
    </nav>