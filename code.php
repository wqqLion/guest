<?php
/*
 * @Description: 生成验证码
 * @version: 1.1.0
 * @Author: wqq
 * @Date: 2021-01-20 16:15:50
 * @LastEditors: wqq
 * @LastEditTime: 2021-01-21 09:37:02
 */
session_start();
require './includes/ValidateCode.class.php';
$_vc = new ValidateCode();  //实例化一个对象
$_vc->doimg();
$_SESSION['code'] = $_vc->getCode();//验证码保存到SESSION中
?>