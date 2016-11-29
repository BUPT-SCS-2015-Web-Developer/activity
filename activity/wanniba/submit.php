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
  <link href="../../assets/css/materialize.min.css" type="text/css" rel="stylesheet" media="screen,projection" /> 
  <link href="../../assets/css/index.css" type="text/css" rel="stylesheet" /> 
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
      <li><a href="#"><img id="user" class="circle" src="../../assets/img/user.png" /></a></li> 
     </ul> 
    </div> 
   </nav> 
  </header> 
  <main> 
   <div class="container"> 
    <!-- 公告开始 --> 
    <!-- 可以考虑移植健身房预约的公告系统 待添加 --> 
    <!-- 公告结束 --> 
    <h3>超轻粘土手工大赛 - 作品提交</h3> 
    <hr /> 
     <div class="input-field"> 
      <input id="teamName" type="text" length="20" /> 
      <label for="teamName">组名</label> 
     </div> 
     <div class="input-field"> 
      <textarea id="description" class="materialize-textarea" length="500"></textarea> 
      <label for="description">作品介绍</label> 
     </div> 
     <div class="input-field"> 
      <a class="waves-effect waves-light btn" id="selector">选取图片</a>&nbsp;
      <a class="waves-effect waves-light btn" id="up">上传</a> 
      <input type="text" readonly="readonly" value="" id="filepath" /> 
      <p id="state"></p> 
     </div> 
     <input type="hidden" id="imgName" /> <!--图片地址 --> 
     <button class="btn waves-effect waves-light" id="submit">提交作品</button> 
   </div> 
   <br /> 
   <br /> 
   <br />
  </main> 
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
  <script src="assets/js/ajaxupload.js"></script> 
  <script src="../../assets/js/materialize.js"></script> 
  <script type="text/javascript">
$(function() {
  window.uploadOK = false;
  // 创建一个上传参数
  var uploadOption = {
    // 提交目标
    action: "upload.php",
    // 服务端接收的名称
    name: "file",
    // 自动提交
    autoSubmit: false,
    // 选择文件之后…
    onChange: function(file, extension) {
      if (new RegExp(/(jpg)|(jpeg)|(bmp)|(gif)|(png)/i).test(extension)) {
        $("#filepath").val(file);
      } else {
        alert("只限上传图片文件，请重新选择！");
      }
    },
    // 开始上传文件
    onSubmit: function(file, extension) {
      $("#state").text("正在上传" + file + "..");
    },
    // 上传完成之后
    onComplete: function(file, response) {
      if (response != "no files") {
        $("#state").text("上传完成！");
        window.uploadOK = true;
        $("#imgName").val(response);
      } else {
        $("#state").text(response);
        window.uploadOK = false;
        $("#imgName").val("");
      }
    }
  }

  // 初始化图片上传框
  var oAjaxUpload = new AjaxUpload('#selector', uploadOption);

  // 给上传按钮增加上传动作
  $("#up").click(function() {
    oAjaxUpload.submit();
  });

  $("#submit").click(function() {

    //前端验证
    if (window.uploadOK) {
      var order_data = {};
      order_data.teamName = $("#teamName").val().trim();
      order_data.description = $("#description").val().trim();
      order_data.imgName = $("#imgName").val().trim();

      $.post("submitAll.php", order_data,
      function(data, status) {
        if (status == "success") {
          if (data == "1") Materialize.toast("提交成功!将在3秒后返回主页", 3000, '',
          function() {
            window.location.href = "../index.php";
          });
          else if (data == "2") Materialize.toast("非法请求!", 5000);
          else if (data == "3") Materialize.toast("参数错误!请勿作死!", 5000);
          else Materialize.toast("服务器异常，请稍后再试!", 5000);
        } else Materialize.toast("服务器异常，请稍后再试!", 5000);
      });
    } else {
      Materialize.toast("请先上传图片!", 5000);
    }
      return;
  });
});
 </script>   
 </body>
</html>