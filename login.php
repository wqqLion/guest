<?php
/*
 * @Description: 
 * @version: 1.1.0
 * @Author: wqq
 * @Date: 2021-01-21 17:01:08
 * @LastEditors: wqq
 * @LastEditTime: 2021-01-22 10:38:25
 */
//定义常量 授权调用includes 里的文件
error_reporting(0);
define('IN_TG', true);
require './includes/common.inc.php';
if ($_GET['action'] == 'login') {
  $username = $_POST['username'];
  $password = $_POST['password'];
  if ($username == '' || $password == '') {
    _alert_back('用户名或密码不能为空');
  }
  $password = sha1($password);
  $sql = "SELECT userName,password FROM user WHERE userName = '$username' AND password = '$password' ";
  $result = mysqli_query($conn, $sql);
  if (!$result) {
    die('登录失败：' . mysqli_error($conn));
  }
  $result = mysqli_fetch_array($result);
  if(count($result)===0){
    _alert_back('用户名或密码错误，请检查输入');
  }
  mysqli_close($conn);
  setcookie("username",$result['userName'], time()+3600*24);
  _location('登录成功','index.php');
}
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
  <div class="login">
    <h2>欢迎登录</h2>
    <form class="form-horizontal login-form" name="login" action="login.php?action=login" method="post">
      <div class="form-group">
        <label for="username" class="col-sm-2 control-label">用户名</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="username" name="username" placeholder="用户名">
        </div>
      </div>
      <div class="form-group">
        <label for="password" class="col-sm-2 control-label">密码</label>
        <div class="col-sm-10">
          <input type="password" class="form-control" id="password" name="password" placeholder="密码">
        </div>
      </div>
      <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
          <button type="submit" class="btn btn-default sumbit">登录</button>
        </div>
      </div>
    </form>
  </div>
  <?php
  include './includes/footer.inc.php';
  ?>
  <script src="./lib/bootstrap/js/jquery.min.js"></script>
  <script src="./lib/bootstrap/js/bootstrap.min.js"></script>
  <script>
    $(function() {
      $('.wq-nav').hide();
    })
  </script>
</body>

</html>