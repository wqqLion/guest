<?php
/*
 * @Description: 
 * @version: 1.1.0
 * @Author: wqq
 * @Date: 2021-01-28 10:05:01
 * @LastEditors: wqq
 * @LastEditTime: 2021-01-28 11:05:24
 */
error_reporting(0);
define('IN_TG', true);
require './includes/common.inc.php';
if ($_GET['action'] == 'modfiy') {
  include './includes/register.func.php';
  $clean = array();
  $clean['username'] = _check_username($_POST['username'], 2, 16);
  $clean['qq'] = checkQQ($_POST['qq']);
  $clean['email'] = checkEmail($_POST['email']);
  $clean['sex'] = $_POST['sex'];
  $id = $_POST['id'];
  $set = "userName='{$clean['username']}',qq='{$clean['qq']}',email='{$clean['email']}',sex='{$clean['sex']}'";
  if (!empty($_POST['password'])) {
    $clean['password'] = checkAnswer($_POST['password'], 6, 100);
    $set = $set.',password='.$clean['password'];    
  }
  $sql = "UPDATE user SET ".$set." WHERE id = $id";
  $result = mysqli_query($conn, $sql);
  if(mysqli_affected_rows($conn)){
    _location('更新成功！', 'member.php');
  }else{
    _alert_back('更新失败!');
  }
  mysqli_close($conn);
}

//是否正常登录
if (isset($_COOKIE['username'])) {
  // 获取数据
  $sql = "SELECT id,userName,sex,qq,email,question FROM user WHERE userName = '{$_COOKIE['username']}'";
  $result = mysqli_query($conn, $sql);
  $result = mysqli_fetch_array($result, MYSQLI_ASSOC);
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
  <link rel="stylesheet" href="./styles/1/member.css">
</head>

<body>
  <?php
  include './includes/header.inc.php';
  ?>

  <div id="member">
    <h2>会员管理中心</h2>
    <form class="form-horizontal register-form" name="register" enctype="multipart/form-data" action="member.php?action=modfiy" method="post">
      <div class="form-group" style="display:none">
        <label for="username" class="col-sm-2 control-label">用户名</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="id" name="id" value="<?php echo $result['id']; ?>" placeholder="用户名">
        </div>
      </div>
      <div class="form-group">
        <label for="username" class="col-sm-2 control-label">用户名</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="username" name="username" value="<?php echo $result['userName']; ?>" placeholder="用户名">
        </div>
      </div>
      <div class="form-group">
        <label for="password" class="col-sm-2 control-label">密码</label>
        <div class="col-sm-10">
          <input type="password" class="form-control" id="password" name="password" placeholder="密码,不填写则不修改">
        </div>
      </div>
      <div class="form-group">
        <label for="password" class="col-sm-2 control-label">确认密码</label>
        <div class="col-sm-10">
          <input type="password" class="form-control" id="notpassword" name="notpassword" placeholder="确认密码">
        </div>
      </div>
      <div class="form-group">
        <label for="sex" class="col-sm-2 control-label">性别</label>
        <div class="col-sm-10">
          <label class="radio-inline">
            <?php
            if ($result['sex'] == 1) {
              echo '<input type="radio" name="sex" id="sex-man" value="1" checked> 男';
            } else {
              echo '<input type="radio" name="sex" id="sex-man" value="1"> 男';
            }
            ?>
          </label>
          <label class="radio-inline">
            <?php
            if ($result['sex'] == 1) {
              echo '<input type="radio" name="sex" id="sex-woman"  value="2" > 女';
            } else {
              echo '<input type="radio" name="sex" id="sex-woman" value="2" checked> 女';
            }
            ?>
          </label>
        </div>
      </div>
      <div class="form-group">
        <label for="email" class="col-sm-2 control-label">电子邮件</label>
        <div class="col-sm-10">
          <input type="email" class="form-control" id="email" name="email" value="<?php echo $result['email']; ?>" placeholder="电子邮件">
        </div>
      </div>
      <div class="form-group">
        <label for="qq" class="col-sm-2 control-label">QQ</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="qq" name="qq" value="<?php echo $result['qq']; ?>" placeholder="QQ">
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
          <button type="submit" class="btn btn-default sumbit">保存</button>
        </div>
      </div>
    </form>
  </div>

  <?php
  include './includes/footer.inc.php';
  ?>
  <script src="./lib/bootstrap/js/jquery.min.js"></script>
  <script src="./lib/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>