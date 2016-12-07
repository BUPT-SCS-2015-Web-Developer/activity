<?php
    ini_set("display_errors", "On");
    error_reporting(E_ALL | E_STRICT);
  session_start();

  if(!(isset($_POST['description'])&&isset($_POST['teamName'])))
  {
      echo 2;
      die;
  }
  if(!isset($_POST['imgName']))
  {
      echo 6;
      die;
  }

  date_default_timezone_set('Asia/Shanghai');
  $upload_time = date("Ymd");

  if(isset($_SESSION['yibanID']))
    $yibanID = $_SESSION['yibanID'];
  else
    $yibanID = "test";
  $description = addslashes($_POST['description']);
  $team_name = addslashes($_POST['teamName']);
  $pic_src = addslashes($_POST['imgName']);

  include "../../assets/API/config.php";
  include "../../assets/API/db_config.php";

  $db = new mysqli($db_host,$db_user,$db_password,$db_database);
  if (!$db)
  {
    exit('Could not connect: ' . mysql_error());
  }
  $db->query("set names 'utf8'");

  //这里检验人数
  $sql_query = "INSERT INTO `drawmask` (id, yibanID, team_name, description, upload_time, pic_src)
        VALUES (null, '$yibanID', '$team_name', '$description', '$upload_time', '$pic_src')";
  $result = $db->query($sql_query);
  if (!$result)
  {
    echo "2";
    die;
  }
  else {
    echo "1";
  }
/*
返回值
1成功

2非法请求
3人数已满
5参数错误
*/
?>
