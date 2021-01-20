<?php
/*
 * @Description: 公共方法
 * @version: 1.1.0
 * @Author: wqq
 * @Date: 2021-01-20 15:12:26
 * @LastEditors: wqq
 * @LastEditTime: 2021-01-20 15:18:12
 */
if(!defined('IN_TG')){
  exit('Access Denied');
}
//转换硬路径
define('ROOT_PATH',substr(dirname(__FILE__),0,-8));

//拒绝PHP低版本
if (PHP_VERSION < '4.1.0') {
	exit('Version is to Low!');
}
?>