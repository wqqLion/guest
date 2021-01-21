<?php
/*
 * @Description: 
 * @version: 1.1.0
 * @Author: wqq
 * @Date: 2021-01-21 17:01:08
 * @LastEditors: wqq
 * @LastEditTime: 2021-01-21 17:20:59
 */
//定义常量 授权调用includes 里的文件
define('IN_TG', true);
require './includes/common.inc.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="shortcut icon" href="favicon.ico" />

  <link rel="stylesheet" href="./lib/bootstrap/css/bootstrap.min.css">

  <link rel="stylesheet" href="./styles/1/basic.css">
  <link rel="stylesheet" href="./styles/1/login.css">
</head>

<body>
  <?php
  include './includes/header.inc.php';
  ?>
  <div class="login"></div>
  <?php
  include './includes/footer.inc.php';
  ?>
  <script src="./lib/bootstrap/js/jquery.min.js"></script>
  <script src="./lib/bootstrap/js/bootstrap.min.js"></script>
  <script>
  $(function(){
    $('.wq-nav').hide();
  })
  </script>
</body>

</html>