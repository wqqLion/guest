<?php
/*
 * @Description: 头部
 * @version: 1.1.0
 * @Author: wqq
 * @Date: 2021-01-20 15:10:25
 * @LastEditors: wqq
 * @LastEditTime: 2021-01-22 15:31:31
 */
if (!defined('IN_TG')) {
  exit('Access Defined');
}
?>
<div id="header">
  <h1><a href="index.php">瓢城Web俱乐部多用户留言系统</a></h1>
  <lo class="breadcrumb wq-nav">
    <li class="active">
      <a href="index.php">首页</a>
    </li>
    <li>
      <a href="blog.php?page=1">博友</a>
    </li>
    <?php
    if (isset($_COOKIE['username'])) {
      echo "<li><a href='login.php'>个人中心</a></li>";
    } else {
      echo "<li><a href='register.php'>注册</a></li>";
      echo "<li><a href='login.php'>登录</a></li>";
    }
    ?>
    <?php
    if (isset($_COOKIE['username'])) {
      echo "<li><a href='logout.php'>退出</a></li>";
    }
    ?>
    <!-- <li>
      <a href="">退出</a>
    </li> -->
  </lo>
</div>