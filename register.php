<?php
/*
 * @Description: 注册
 * @version: 1.1.0
 * @Author: wqq
 * @Date: 2021-01-20 15:27:44
 * @LastEditors: wqq
 * @LastEditTime: 2021-01-20 16:50:14
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
    <!-- <form method="post" action="post.php">
      <dl>
        <dt>请认真填写一下内容</dt>
        <dd>用&nbsp; 户 &nbsp;名：<input type="text" name="username" class="text" />(*必填，至少两位)</dd>
        <dd>密　　码：<input type="password" name="password" class="text" />(*必填，至少六位)</dd>
        <dd>确认密码：<input type="password" name="notpassword" class="text" />(*必填，同上)</dd>
        <dd>密码提示：<input type="text" name="passt" class="text" />(*必填，至少两位)</dd>
        <dd>密码回答：<input type="text" name="passd" class="text" />(*必填，至少两位)</dd>
        <dd>性　　别：<input type="radio" name="sex" value="男" checked="checked" />男 <input type="radio" name="sex" value="女" />女</dd>
        <dd class="face"><img src="face/m01.gif" alt="头像选择" onclick="javascript:window.open('face.php','face','width=400,height=400,top=0,left=0')" /></dd>
        <dd>电子邮件：<input type="text" name="email" class="text" /></dd>
        <dd>　Q Q 　：<input type="text" name="qq" class="text" /></dd>
        <dd>主页地址：<input type="text" name="url" class="text" value="http://" /></dd>
        <dd>验 证 码：<input type="text" name="yzm" class="text yzm" /></dd>
        <dd><input type="submit" class="submit" value="注册" /></dd>
      </dl>
    </form> -->
    <form class="form-horizontal register-form">
      <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">用户名</label>
        <div class="col-sm-10">
          <input type="email" class="form-control" id="inputEmail3" placeholder="用户名">
        </div>
      </div>
      <div class="form-group">
        <label for="inputPassword3" class="col-sm-2 control-label">密码</label>
        <div class="col-sm-10">
          <input type="password" class="form-control" id="inputPassword3" placeholder="密码">
        </div>
      </div>
      <div class="form-group">
        <label for="inputPassword3" class="col-sm-2 control-label">密码</label>
        <div class="col-sm-10">
          <input type="password" class="form-control" id="inputPassword3" placeholder="密码">
        </div>
      </div>
      <div class="form-group">
        <label for="inputPassword3" class="col-sm-2 control-label">密码提示</label>
        <div class="col-sm-10">
          <input type="password" class="form-control" id="inputPassword3" placeholder="密码提示">
        </div>
      </div>
      <div class="form-group">
        <label for="inputPassword3" class="col-sm-2 control-label">密码回答</label>
        <div class="col-sm-10">
          <input type="password" class="form-control" id="inputPassword3" placeholder="密码回答">
        </div>
      </div>
      <div class="form-group">
        <label for="inputPassword3" class="col-sm-2 control-label">性别</label>
        <div class="col-sm-10">
          <label class="radio-inline">
            <input type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1"> 男
          </label>
          <label class="radio-inline">
            <input type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2"> 女
          </label>
        </div>
      </div>
      <div class="form-group">
        <label for="inputPassword3" class="col-sm-2 control-label">电子邮件</label>
        <div class="col-sm-10">
          <input type="password" class="form-control" id="inputPassword3" placeholder="电子邮件">
        </div>
      </div>
      <div class="form-group">
        <label for="inputPassword3" class="col-sm-2 control-label">QQ</label>
        <div class="col-sm-10">
          <input type="password" class="form-control" id="inputPassword3" placeholder="QQ">
        </div>
      </div>
      <div class="form-group">
        <label for="inputPassword3" class="col-sm-2 control-label">验证码</label>
        <div class="col-sm-10">
          <input type="password" class="form-control input-yzm" id="inputPassword3" placeholder="验证码">
          <!-- <img src="code.php" alt=""> -->
          <img class="yzm-img" title="点击刷新" src="code.php" align="absbottom" οnclick="this.src='code.php?'+Math.random();"></img>
        </div>
      </div>
      <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
          <div class="checkbox">
            <label>
              <input type="checkbox">记住密码
            </label>
          </div>
        </div>
      </div>
      <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
          <button type="submit" class="btn btn-default">注册</button>
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