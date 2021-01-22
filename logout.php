<?php
/*
 * @Description: 
 * @version: 1.1.0
 * @Author: wqq
 * @Date: 2021-01-22 11:00:26
 * @LastEditors: wqq
 * @LastEditTime: 2021-01-22 11:04:36
 */
define('IN_TG', true);
require './includes/common.inc.php';
session_start();
setcookie("username",'', time()-3600);
_location(null,'index.php');
?>