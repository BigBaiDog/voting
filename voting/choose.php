<?php
require_once 'config.php';
session_start();
$code = trim($_POST["captcha"]);
if (strtolower($code)!=strtolower($_SESSION['captcha_code'])) {
    echo '验证码错误';
    header('Refresh:1;url=index.php');
    exit;
}
$uid=$_SESSION['id'];
$choose=$_POST['choose'];
$sql="INSERT INTO `voying_count` (`vid`, `uid`, `choose`) VALUES ('1', '$uid', '$choose')";
$result=mysqli_query($con, $sql);
header('Location:main.php');
