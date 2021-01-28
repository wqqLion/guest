<?php
/*
 * @Description: 注册
 * @version: 1.1.0
 * @Author: wqq
 * @Date: 2021-01-20 15:27:44
 * @LastEditors: wqq
 * @LastEditTime: 2021-01-22 12:17:51
 */
//定义常量 授权调用includes 里的文件
error_reporting(0);
session_start();
define('IN_TG', true);
require './includes/common.inc.php';
if ($_GET['action'] == 'register') {
  if ($_POST['yzm'] !== $_SESSION['code']) {
    _alert_back('验证码不正确');
  }
  include './includes/register.func.php';
  $clean = array();
  $photoType = $_FILES["file"]["type"];
  $photoType = strtolower($photoType);
  if ($photoType !== 'image/jpg' && $photoType !== 'image.png' && $photoType !== 'image/jpeg') {
    _alert_back('只允许上传png或jpg图片');
  }

  if ($_FILES["file"]["size"] > 204800) {
    _alert_back('图片最大200kb');
  }
  $clean['username'] = _check_username($_POST['username'], 2, 16);
  $clean['qq'] = checkQQ($_POST['qq']);
  $clean['password'] = chechPassword($_POST['password'], $_POST['notpassword'], 6, 20);
  $clean['passt'] = checkQuestion($_POST['passt'], 6, 100);
  $clean['passd'] = checkAnswer($_POST['passd'], 6, 100);
  $clean['email'] = checkEmail($_POST['email']);
  $clean['sex'] = $_POST['sex'];

  $path = './upfiles/photo' . $_FILES['file']['name'];
  $filename = basename($path); // basename($path):返回基本的文件名，如：文件名.doc
  $actualname = $filename;
  $extpos = strrpos($filename, '.'); //返回字符串filename中'.'号最后一次出现的数字位置
  $ext = substr($filename, $extpos + 1);
  $studentid = $_SESSION['uid'];
  $file = $studentid . '.' . $ext;
  $path = 'uploads/photo/' . sha1($clean['username']) . '.' . $ext;
  //验证用户名是否存在
  $result = mysqli_query($conn, "SELECT userName FROM user WHERE userName = '{$clean['username']}'");
  if (!$result) {
    die('查询shib');
  }
  //新增用户
  $sqlAdd = "INSERT INTO user (
                          userName,
                          password,
                          question,
                          answer,
                          sex,
                          qq,
                          email,
                          regTime,
                          regIp,
                          face
                        ) VALUES (
                          '{$clean['username']}',
                          '{$clean['password']}',
                          '{$clean['passt']}',
                          '{$clean['passd']}',
                          '{$clean['sex']}',
                          '{$clean['qq']}',
                          '{$clean['email']}',
                          NOW(),
                          '{$_SERVER["REMOTE_ADDR"]}',
                          '$path'
                        )";
  $resultAdd = mysqli_query($conn, $sqlAdd);
  if (!$resultAdd) {
    die('新增用户失败：' . mysqli_error($conn));
  }
  mysqli_close($conn);
  move_uploaded_file($_FILES["file"]["tmp_name"], $path);
  _location('注册成功！', '/guest/index.php');
} else {
  $_SESSION['uniqid'] = $uniqid = sha1Uniqid();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>注册</title>
  <link rel="shortcut icon" href="favicon.ico" />
  <link rel="stylesheet" href="./lib/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="./styles/1/basic.css">
  <link rel="stylesheet" href="./styles/1/register.css">
</head>

<body>
  <?php
  include './includes/header.inc.php';
  ?>

  <div id="register">
    <form class="form-horizontal register-form" name="register" enctype="multipart/form-data" action="register.php?action=register" method="post">
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
        <label for="notpassword" class="col-sm-2 control-label">密码</label>
        <div class="col-sm-10">
          <input type="password" class="form-control" id="notpassword" name="notpassword" placeholder="密码">
        </div>
      </div>
      <div class="form-group">
        <label for="passt" class="col-sm-2 control-label">密码提示</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="passt" name="passt" placeholder="密码提示">
        </div>
      </div>
      <div class="form-group">
        <label for="passd" class="col-sm-2 control-label">密码回答</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="passd" name="passd" placeholder="密码回答">
        </div>
      </div>
      <div class="form-group">
        <label for="sex" class="col-sm-2 control-label">性别</label>
        <div class="col-sm-10">
          <label class="radio-inline">
            <input type="radio" name="inlineRadioOptions" id="sex-man" name="sex" value="1" checked> 男
          </label>
          <label class="radio-inline">
            <input type="radio" name="inlineRadioOptions" id="sex-woman" name="sex" value="2"> 女
          </label>
        </div>
      </div>
      <div class="form-group">
        <label for="email" class="col-sm-2 control-label">电子邮件</label>
        <div class="col-sm-10">
          <input type="email" class="form-control" id="email" name="email" placeholder="电子邮件">
        </div>
      </div>
      <div class="form-group">
        <label for="qq" class="col-sm-2 control-label">QQ</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="qq" name="qq" placeholder="QQ">
        </div>
      </div>
      <div class="form-group">
        <label for="yzm" class="col-sm-2 control-label">验证码</label>
        <div class="col-sm-10">
          <input type="text" class="form-control input-yzm" id="yzm" name="yzm" placeholder="验证码">
          <img class="yzm-img" title="点击刷新" src="code.php" align="absbottom"></img>
        </div>
      </div>
      <div class="form-group">
        <label for="qq" class="col-sm-2 control-label">头像</label>
        <div class="col-sm-10">
          <input type="file" accept=".png,.jpg" id="file" name="file" placeholder="QQ">
        </div>
      </div>
      <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
          <button type="submit" class="btn btn-default sumbit">注册</button>
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
      $('.yzm-img').click(function() {
        var src = 'code.php?t=' + (new Date()).getTime();
        $(this).attr('src', src);
      })
    })
  </script>
</body>

</html>