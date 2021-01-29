<?php
/*
 * @Description: 
 * @version: 1.1.0
 * @Author: wqq
 * @Date: 2021-01-29 15:55:39
 * @LastEditors: wqq
 * @LastEditTime: 2021-01-29 17:13:21
 */
//定义常量 授权调用includes 里的文件
error_reporting(0);
session_start();
define('IN_TG', true);
require './includes/common.inc.php';
//判断是否登录了
if (!isset($_COOKIE['username'])) {
  _alert_back('请先登录！');
}
$toId = $_GET['id'];
if (!isset($_GET['id'])) {
  _alert_back('非法操作');
}
include './includes/register.func.php';
if ($_GET['action'] == 'write') {
  if ($_POST['yzm'] !== $_SESSION['code']) {
    _alert_back('验证码不正确');
  }
  $sql = "SELECT userName FROM user WHERE id = '$toId' ";
  $result = mysqli_query($conn, $sql);
  
  if (!!$result) {
    $result = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $title = checkTitle($_POST['title']);
    $content = checkContent($_POST['content']);
    $addSql = "INSERT INTO message (
      title,
      content,
      toId,
      toName,
      fromName
    ) VALUES (
      '$title',
      '$content',
      '$toId',
      '{$result['userName']}',
      '{$_COOKIE['username']}'
    )";
    $resultAdd = mysqli_query($conn, $addSql);
    if (!$resultAdd) {
      _alert_back('消息发送失败' . mysqli_error($conn));
    }
    _location('消息发送成功','blog.php');
  } else {
    _alert_back('用户不存在');
  }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>写消息</title>
  <link rel="shortcut icon" href="favicon.ico" />
  <link rel="stylesheet" href="./lib/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="./styles/1/basic.css">
  <link rel="stylesheet" href="./styles/1/message.css">
</head>

<body>
  <div id="message">
    <h3>写短信</h3>
    <form class="form-horizontal message-form" name="register" enctype="multipart/form-data" action="message.php?action=write&id=<?php echo $_GET["id"]; ?>" method="post">
      <div class="form-group" style="display:none;">
        <label for="username" class="col-sm-2 control-label"></label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="toId" name="toId" value="<?php echo $_GET['id'] ?>">
        </div>
      </div>
      <div class="form-group">
        <label for="title" class="col-sm-2 control-label">标题</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="title" name="title" placeholder="标题">
        </div>
      </div>
      <div class="form-group">
        <label for="content" class="col-sm-2 control-label">内容</label>
        <div class="col-sm-10">
          <textarea class="form-control" id="content" name="content" rows="16" style="min-width: 90%"></textarea>
        </div>
      </div>
      <div class="form-group">
        <label for="yzm" class="col-sm-2 control-label">验证码</label>
        <div class="col-sm-10">
          <input autocomplete="off" class="form-control input-yzm" id="yzm" name="yzm" placeholder="验证码">
          <img class="yzm-img" title="点击刷新" src="code.php" align="absbottom"></img>
        </div>
      </div>
      <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
          <button type="submit" class="btn btn-default sumbit">保存</button>
        </div>
      </div>
    </form>
  </div>
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