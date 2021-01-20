<?php
/*
 * @Description: 
 * @version: 1.1.0
 * @Author: wqq
 * @Date: 2021-01-20 15:22:02
 * @LastEditors: wqq
 * @LastEditTime: 2021-01-20 15:23:20
 */

 function _runtimes(){
   $_mtime = explode('',microtime());
   return $_mtime[1]+$_mtime[0];
 }
?>