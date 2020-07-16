<?php
require_once 'config.php';
session_start();
// 查询用户列表
if (empty($_GET['act'])) {
    $sql="SELECT * FROM `voying_user`";
    $size=10;
    if (empty($_GET['page'])) {
        $page=1;
    } else {
        $page=$_GET['page'];
    }
    if ($result=mysqli_query($con, $sql)) {
        $count=mysqli_num_rows($result);
        $total=ceil($count/$size);
    } else {
        $total= 0; //总页数
    }
    $sql1=$sql." LIMIT ".(($page-1)*$size).", ".$size;
    $result1=mysqli_query($con, $sql1);
    $data=array();
    while ($row=mysqli_fetch_assoc($result1)) {
        $data[]=$row;
    }
    require 'userlist.html';
} else {
	// 管理员登录
    if ($_GET['act']=='signin') {
        $admin=$_POST['admin'];
        $password=$_POST['password'];
        $sql="SELECT * FROM `voying_admin` WHERE `admin` = '$admin'";
        $result=mysqli_query($con, $sql);
        if (mysqli_num_rows($result)) {
            $row=mysqli_fetch_assoc($result);
            if ($password==$row['password']) {
                session_destroy();
                $_SESSION['id']=$row['id'];
                $_SESSION['admin'] = $admin;
                header('Location:admin.php');
            } else {
                echo '密码错误';
                header('Refresh:1;url=index.php');
            }
        } else {
            echo '该管理员不存在';
            header('Refresh:1;url=index.php');
        }
    } //管理员退出
	elseif ($_GET['act']=='quit') {
        session_destroy();
        echo '已退出登录';
        header('Refresh:1;url=index.php');
    } else {
        header("Location:index.php");
    }
}
