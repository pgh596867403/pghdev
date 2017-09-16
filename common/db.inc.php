<?php 
header("Content-Type:text/html;charset=utf-8");
//数据库配置文件
//1、连接数据库
mysql_connect("localhost","root","root");
//2、选择默认数据库
mysql_select_db("news");