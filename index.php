<?php
//定义常量 授权调用includes 里的文件
define('IN_TG', true);
require './includes/common.inc.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>php学习项目</title>
  <link rel="shortcut icon" href="favicon.ico" />

  <link rel="stylesheet" href="./lib/bootstrap/css/bootstrap.min.css">

  <link rel="stylesheet" href="./styles/1/basic.css">
  <link rel="stylesheet" href="./styles/1/index.css">
</head>

<body>
  <?php
  include './includes/header.inc.php';
  ?>

  <div id="list">
    <h2>帖子列表</h2>
  </div>

  <div id="user">
    <h2>新进会员</h2>
  </div>

  <div id="pics">
    <h2>最新图片</h2>
  </div>

  <?php
  include './includes/footer.inc.php';
  ?>
  <script src="./lib/bootstrap/js/jquery.min.js"></script>
  <script src="./lib/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>