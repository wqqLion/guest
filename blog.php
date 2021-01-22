<?PHP
/*
 * @Description: 
 * @version: 1.1.0
 * @Author: wqq
 * @Date: 2021-01-22 11:10:03
 * @LastEditors: wqq
 * @LastEditTime: 2021-01-22 11:15:16
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
  <title>博友</title>
  <link rel="shortcut icon" href="favicon.ico" />

  <link rel="stylesheet" href="./lib/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="./styles/1/basic.css">
  <link rel="stylesheet" href="./styles/1/blog.css">
</head>

<body>
  <?php
  include './includes/header.inc.php';
  ?>
  <div id="blog">
    <h2>博友列表</h2>
    <?php for ($i = 10; $i < 30; $i++) { ?>
      <dl>
        <dd class="user">炎日</dd>
        <dt><img src="face/m<?php echo $i ?>.gif" alt="炎日" /></dt>
        <dd class="message">发消息</dd>
        <dd class="friend">加为好友</dd>
        <dd class="guest">写留言</dd>
        <dd class="flower">给他送花</dd>
      </dl>
    <?php } ?>
  </div>

  <?php
  include './includes/footer.inc.php';
  ?>
  <script src="./lib/bootstrap/js/jquery.min.js"></script>
  <script src="./lib/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>