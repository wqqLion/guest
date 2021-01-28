<?PHP
/*
 * @Description: 
 * @version: 1.1.0
 * @Author: wqq
 * @Date: 2021-01-22 11:10:03
 * @LastEditors: wqq
 * @LastEditTime: 2021-01-28 10:30:23
 */
//定义常量 授权调用includes 里的文件
error_reporting(0);
define('IN_TG', true);
require './includes/common.inc.php';
$page = $_GET['page'] || 1;
$pageSize = 20;
$pageNum = ($page - 1) * $pageSize;
$userName = '';
if (!empty($_COOKIE['username'])) {
  $userName = $_COOKIE['username'];
}
$num = mysqli_query($conn, "SELECT id FROM user WHERE userName != '$userName' ");
if (!$num) {
  die('博友查询失败：' . mysqli_error($conn));
}
$num = mysqli_num_rows($num);
$allPage = ceil($num / $pageSize);
$sql = "SELECT id,userName,face,sex FROM user WHERE userName != '$userName' ORDER BY regTime DESC LIMIT $pageNum,$pageSize";
$result = mysqli_query($conn, $sql);
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
    <div class="blog-main">
      <div class="row">
        <?php while (!!$rows = mysqli_fetch_array($result, MYSQLI_ASSOC)) { ?>
          <div class="col-md-3">
            <div class="username">
              <?php echo $rows['userName'] ?>
            </div>
            <div class="img-box">
              <?php if (empty($rows['face'])) {
                echo "<img src='images/defauclt_face.gif' />";
              } ?>
            </div>

            <div class="row">
              <div class="col-md-6 operation">
                发消息
              </div>
              <div class="col-md-6 operation">
                加为好友
              </div>
            </div>
            <div class="row">
              <div class="col-md-6 operation">
                写留言
              </div>
              <div class="col-md-6 operation">
                给她送花
              </div>
            </div>
          </div>
        <?php } ?>
      </div>

    </div>
    <nav aria-label="Page navigation" class="navigation" id="page" allPage="<?php echo $allPage; ?>">
    </nav>
  </div>

  <?php
  include './includes/footer.inc.php';
  ?>
  <script src="./lib/bootstrap/js/jquery.min.js"></script>
  <script src="./lib/bootstrap/js/bootstrap.min.js"></script>
  <script>
    $(function() {
      var allPage = $('#page').attr('allpage');
      $('#page').html(getPagination(allPage, 1));
    })
    /**
     * 获取分页
     * @param totalPage  页码总量
     * @param currentPage 当前页码
     * @returns {String}
     */
    function getPagination(totalPage, currentPage) {

      var paginationInfo = "<ul class=\"pagination\" >" +
        "<li><a href=\"javascript:void(0);\" " +
        " οnclick=\"refreshPages(" + totalPage + " , " + (currentPage - 1) +
        ")\"" + ">«</a></li>";

      if (totalPage <= 10) {
        for (var i = 1; i <= totalPage; i++) {
          paginationInfo += "<li><a href=\"javascript:void(0);\" " +
            " οnclick=\"refreshPages(" + totalPage + " , " + i + ")\">" + i + "</a></li>";
        }
      } else {
        if (currentPage <= 3) {
          for (var i = 1; i <= currentPage + 2; i++) {
            paginationInfo += "<li><a href=\"javascript:void(0);\" " +
              " οnclick=\"refreshPages(" + totalPage + " , " + i + ")\">" + i + "</a></li>";
          }
          paginationInfo += "<li><a href=\"#\">...</a></li>";
          paginationInfo += "<li><a href=\"javascript:void(0);\" " +
            " οnclick=\"refreshPages(" + totalPage + " , " + totalPage + totalPage + "</a></li>";
        } else if (currentPage <= totalPage - 5) {
          paginationInfo += "<li><a href=\"javascript:void(0);\" " +
            " οnclick=\"refreshPages(" + totalPage + " , " + 1 + ")\">" + 1 + "</a></li>";

          paginationInfo += "<li><a href=\"#\">...</a></li>";
          for (var i = currentPage - 1; i <= currentPage + 2; i++) {
            paginationInfo += "<li><a href=\"javascript:void(0);\" " +
              " οnclick=\"refreshPages(" + totalPage + " , " + i + ")\">" + i + "</a></li>";
          }
          paginationInfo += "<li><a href=\"#\">...</a></li>";
          paginationInfo += "<li><a href=\"javascript:void(0);\" " +
            " οnclick=\"refreshPages(" + totalPage + " , " + totalPage + ")\">" + totalPage + "</a></li>";
        } else {
          paginationInfo += "<li><a href=\"javascript:void(0);\" " +
            " οnclick=\"refreshPages(" + totalPage + " , " + 1 + ")\">" + 1 + "</a></li>";
          paginationInfo += "<li><a href=\"#\">...</a></li>";
          for (var i = currentPage - 1; i <= totalPage; i++) {
            paginationInfo += "<li><a href=\"javascript:void(0);\" " +
              " οnclick=\"refreshPages(" + totalPage + " , " + i + ")\">" + i + "</a></li>";
          }
        }
      }

      paginationInfo += "<li><a href=\"javascript:void(0);\" " +
        " οnclick=\"refreshPages(" + totalPage + " , " + (currentPage + 1) + ")\"" + ">»</a></li>";

      return paginationInfo;
    }
  </script>
</body>

</html>