<?php
/*
 * @Description: 
 * @version: 1.1.0
 * @Author: wqq
 * @Date: 2021-01-20 15:22:02
 * @LastEditors: wqq
 * @LastEditTime: 2021-01-22 11:06:04
 */

function _runtimes()
{
  $_mtime = explode('', microtime());
  return $_mtime[1] + $_mtime[0];
}

function _alert_back($message)
{
  echo "<script type='text/javascript'>alert('" . $message . "');history.back();</script>";
  exit();
}

function sha1Uniqid()
{
  return mysqlString(sha1(sha1(uniqid(rand(), true))));
}

function mysqlString($string)
{
  global $conn;
  return mysqli_real_escape_string($conn, $string);
}
function _location($_info, $_url)
{
  if (!empty($_info)) {
    echo "<script type='text/javascript'>alert('$_info');location.href='$_url';</script>";
    exit();
  } else {
    header('Location:'.$_url);
  }
}
