<?php
require_once 'config.php';
session_start();
// 验证登录状态
if (empty($_GET['act'])) {
    header('Location:index.php');
} else {
    $act=$_GET['act'];
    switch ($act) {
        // 注册用户操作
        case 'register':
        // 格式验证
        $name=$_POST['name'];
        if (!preg_match('/^[\w\x{4e00}-\x{9fa5}]{2,10}$/u', $name)) {
            echo '用户名格式不符合要求';
            header('Refresh:1;url=index.php');
        }
        $password=$_POST['password'];
        if (!preg_match('/^\w{6,16}$/', $password)) {
            echo '密码格式不符合要求';
            header('Refresh:1;url=index.php');
            exit;
        }
        // 密码加密
        $password=md5($password);
        $email=$_POST['email'];
        $sql="SELECT * FROM `voying_user` WHERE `email` = '$email'";
        $result=mysqli_query($con, $sql);
        if (mysqli_num_rows($result)==0) {
            $sql1="INSERT INTO `voying_user` (`id`, `email`, `name`, `password`) VALUES (NULL, '$email', '$name', '$password')";
            $result1=mysqli_query($con, $sql1);
            if ($result1) {
                echo '注册成功';
            } else {
                echo '注册失败';
            }
        } else {
            echo '该账号已存在';
        }
        header('Refresh:1;url=index.php');
        break;
        // 用户登录操作
        case 'signin':
        $code = trim($_POST["captcha"]);
        if (strtolower($code)!=strtolower($_SESSION['captcha_code'])) {
            echo '验证码错误';
            header('Refresh:1;url=index.php');
            exit;
        }
        $email=$_POST['email'];
        $password=$_POST['password'];
        $password=md5($_POST['password']);
        $sql="SELECT * FROM `voying_user` WHERE `email` = '$email'";
        $result=mysqli_query($con, $sql);
        if (mysqli_num_rows($result)) {
            $row=mysqli_fetch_assoc($result);
            if ($password==$row['password']) {
                $_SESSION['id']=$row['id'];
                $_SESSION['name'] = $row['name'];
                $sql1="update voying_visitor set num=num+1";
                $resul1t=mysqli_query($con, $sql1);
                header('Location:main.php');
            } else {
                echo '密码错误';
                header('Refresh:1;url=index.php');
            }
        } else {
            echo '该用户不存在';
            header('Refresh:1;url=index.php');
        }
        break;
        // 退出登录操作
        case 'quit':
        // 清除会话
        session_destroy();
        echo '已退出登录';
        header('Refresh:1;url=index.php');
        break;

        default:header('Location:index.php');
    }
}
