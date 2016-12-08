<?php
ini_set("display_errors", "On");
error_reporting(E_ALL | E_STRICT);
    session_start();
//    include "../../assets/API/header_api_session.php";
//    include "../../assets/API/iapp.php";
    include "../../assets/API/config.php";
    include "../../assets/API/db_config.php";
?>
<!DOCTYPE html>
<html lang="en">
 <head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0" />
  <title>青春"罩"寒冬 - 活动报名系统 - 北邮易班</title>
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

      .a1{
          border: 1px solid #9e9e9e!important;
      }
    </style>
 </head>
 <body>
  <header>
   <nav class="light-blue lighten-1" role="navigation">
    <div class="nav-wrapper container hide-on-med-and-down">
     <a href="index_for_all.php" class="brand-logo">青春"罩"寒冬口罩绘制活动</a>
     <ul class="right">
      <li><a href="my.php">个人中心</a></li>
     </ul>
    </div>
    <div class="nav-wrapper hide-on-large-only">
     <a href="index_for_all.php" class="brand-logo">青春"罩"寒冬口罩绘制活动</a>
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
    <h3>青春"罩"寒冬口罩绘制活动 - 作品提交</h3>
    <hr /><br><br>
     <div class="input-field">
      <input class="a1" placeholder="组号" id="teamName" type="text" length="20" required />
     </div>
     <div class="input-field">
      <textarea class="a1" placeholder="作品介绍" class="browser-default" id="description" class="materialize-textarea" length="500"></textarea>
     </div>
     <div class="input-field">
      <small>注:请将报名表和口罩作品拍在一起提交</small><br />
      <a class="waves-effect waves-light btn" id="selector">选取图片</a>&nbsp;
      <a class="waves-effect waves-light btn" id="up">上传</a>
      <input type="text" readonly="readonly" value="" id="filepath" />

      <p id="state"></p>
     </div>
     <input type="hidden" id="imgName" /> <!--图片地址 hidden-->
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
      <p class="grey-text text-lighten-4">本系统致力于为北邮部署在易班平台上的活动提供查看活动详情、提交报名、提交作品等功能。</p>
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
  <script type="text/javascript" src="jquery-1.10.2.min.js"></script>
  <script src="assets/js/ajaxupload.js"></script>
  <script src="../../assets/js/materialize.js"></script>
  <script type="text/javascript">
$(function() {
  //window.uploadOK = false;
  // 创建一个上传参数
  var uploadOption = {
    // 提交目标
    action: "uploadimage.php",
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
        response = response.replace(/<\/?[^>]*>/g, "");
      if (response != "no files") {
        $("#state").text("上传完成！");
        window.uploadOK = true;
        //alert(response);
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
    if ($("#teamName").val() == "") {
        Materialize.toast("请填写组号!", 5000);
        $("#teamName").focus();
        return;
    }
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
            window.location.href = "../../index.php";
          });
          else if (data == "2") Materialize.toast("非法请求!", 5000);
          else if (data == "3") Materialize.toast("参数错误!请勿作死!", 5000);
          else if (data == "6") Materialize.toast("请先上传图片!", 5000);
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
