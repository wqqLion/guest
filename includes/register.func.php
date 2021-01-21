<?php
/*
 * @Description: 
 * @version: 1.1.0
 * @Author: wqq
 * @Date: 2021-01-21 09:38:48
 * @LastEditors: wqq
 * @LastEditTime: 2021-01-21 11:04:25
 */

/**
 * @name: 
 * @for: 
 * @param {String} $username 要校验的用户名
 * @param {Number} $min 用户名最小长度
 * @param {Number} $max 用户名最大长度
 * @return {String} 过滤后的用户名
 */
function _check_username($username, $min, $max)
{
  $username = trim($username);
  $len = mb_strlen($username, 'utf-8');
  if ($len < $min || $len > $max) {
    _alert_back("用户名长度应在" . $min . "与" . $max . "之间");
  }
  $char_patter = '/[<>\'\"\ \　]/';
  if (preg_match($char_patter, $username)) {
    _alert_back('用户名含有敏感字符');
  }
  return mysqlString($username);
  
}
/**
 * @name: 
 * @for: 
 * @param {String} $password 要检查的密码
 * @param {String} $repassword 确认密码
 * @param {Number} $min 密码的最小长度
 * @param {Number} $max 密码的最大长度
 * @return {String} 加密后的密码
 */
function chechPassword($password, $repassword, $min, $max)
{
  if ($password !== $repassword) {
    _alert_back('密码和确认密码不一致');
  }
  return sha1($password);
}
/**
 * @name: 
 * @for: 
 * @param {*} $question
 * @param {*} $min
 * @param {*} $max
 * @return {*}
 */
function checkQuestion($question, $min, $max)
{
  $len = mb_strlen($question, 'utf-8');
  if ($len < $min || $len > $max) {
    _alert_back('密码问题长度应在' . $min . '与' . $max . '之间');
  }
  return mysqlString($question);
}

function checkAnswer($answer, $min, $max)
{
  return sha1($answer);
}

function checkQQ($qq)
{
  if ($qq === '') {
    return '';
  }
  if (!preg_match("/^[1-9][0-9]{4,}$/", $qq)) {
    _alert_back('请输入正确的QQ');
  }
  return mysqlString($qq);
}

function checkEmail($email)
{
  if ($email === '') {
    return '';
  }
  if (!preg_match("/^[A-Za-z0-9\u4e00-\u9fa5]+@[a-zA-Z0-9_-]+(\.[a-zA-Z0-9_-]+)+$/", $email)) {
    _alert_back('请输入正确的Email');
  }
  return mysqlString($email);
}
