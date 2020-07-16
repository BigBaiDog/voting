<?php
// 配置数据库文件
define('host','localhost'); //服务器地址
define('username','root');  //用户名
define('password','');      //密码
define('dbname','voting');    //数据库名
define('port','3306');      //端口
$con=mysqli_connect(host,username,password,dbname);
if(!$con){
	die("连接数据库失败：".mysqli_connect_error());
}
mysqli_set_charset($con,"utf8");
