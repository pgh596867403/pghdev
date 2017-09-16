<?php
//引入公共配置文件 session_start();
include "./common/config.inc.php";
//清空session
$_SESSION=array();
//删除session文件
session_destroy();
//跳转回首页
header("location:index.php");
