<?php
/*

    session_start();
    include "assets/API/header_api_session.php";
    include "assets/API/iapp.php";
    include "assets/API/config.php";
    include "assets/API/db_config.php";

    */
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0" />
    <title>超轻粘土手工大赛 - 活动报名系统 - 北邮易班</title>
    <link href="../assets/css/materialize.min.css" type="text/css" rel="stylesheet" media="screen,projection" />
    <link href="assets/css/index.css" type="text/css" rel="stylesheet" />
    <style media="screen">
    body {
        display: flex;
        min-height: 100vh;
        flex-direction: column;
    }

    main {
        flex: 1 0 auto;
    }
    </style>
  </head>
  <body>
    <header>
      <nav class="light-blue lighten-1" role="navigation">
    <div class="nav-wrapper container hide-on-med-and-down">
        <a href="#" class="brand-logo">超轻粘土手工大赛</a>
      <ul class="right">
        <li><a href="my.php">个人中心</a></li>
      </ul>
    </div>
    <div class="nav-wrapper hide-on-large-only">
        <a href="index.php" class="brand-logo">超轻粘土手工大赛</a>
      <ul class="left">
        <li><a href="#"><img id="user" class="circle" src="../assets/img/user.png"></a></li>
      </ul>
    </div>
    
  </nav>
    </header>
  <main>
    <div class="container">
    
   <!-- 公告开始 -->
   <!-- 可以考虑移植健身房预约的公告系统 待添加 -->
   <!-- 公告结束 -->
      
   <h2>超轻粘土手工大赛</h2>
        
   <p>活动介绍活动图片啥的blablabla</p>
     <!--
     <div class="card blue-grey darken-1">
            <div class="card-content white-text">
              <span class="card-title">"易起写"轻应用设计大赛</span>
              <p>技术组设计大赛blabla</p>
            </div>
            <div class="card-action">
              <a href="#">我要报名(加群链接)</a>
            </div>
          </div>

    -->
    </div>
  <br />
  <br />
  <br /></main>
  <footer class="page-footer grey">
   <div class="container">
    <div class="row">
     <div class="col l6 s12">
      <h5 class="white-text">北邮易班活动报名系统</h5>
      <p class="grey-text text-lighten-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident</p>
     </div>
     <div class="col l4 offset-l2 s12">
      <h5 class="white-text">Links</h5>
      <ul>
       <li><a id="BTNinstruction" class="grey-text text-lighten-3" href="#">使用说明</a></li>
       <li><a id="BTNterms" class="grey-text text-lighten-3" href="#">使用条款</a></li>
       <li><a id="BTNfeedback" class="grey-text text-lighten-3" href="#">意见反馈</a></li>
      </ul>
     </div>
    </div>
   </div>
   <div class="footer-copyright">
    <div class="container">
      Copyright&copy; 北邮易班学生发展中心
     <a class="grey-text text-lighten-3" href="http://buptyiban.org/">BUPTYiban</a>
    </div>
   </div>


  </footer>
  <!--  Scripts-->
  <script src="http://apps.bdimg.com/libs/jquery/2.1.1/jquery.min.js"></script>
  <script src="assets/js/materialize.js"></script>
  <script src="assets/js/index.js"></script>
 </body>
</html>
