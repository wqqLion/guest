<?php
/*
 * @Description: 公共方法
 * @version: 1.1.0
 * @Author: wqq
 * @Date: 2021-01-20 15:12:26
 * @LastEditors: wqq
 * @LastEditTime: 2021-01-21 16:16:56
 */
if (!defined('IN_TG')) {
  exit('Access Denied');
}
//转换硬路径
define('ROOT_PATH', substr(dirname(__FILE__), 0, -8));
//拒绝PHP低版本
if (PHP_VERSION < '4.1.0') {
  exit('Version is to Low!');
}
require 'global.func.php';
//数据库链接
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PWD', 'root');
define('DB_TABLE', 'guest');
$conn = mysqli_connect(DB_HOST, DB_USER, DB_PWD) or die('链接数据库失败' . mysqli_error($conn));
mysqli_select_db($conn, DB_TABLE) or die('选择数据库失败：' . mysqli_error($conn));
mysqli_set_charset($conn, 'utf8') or die('字符集设置错误');
