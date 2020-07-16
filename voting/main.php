<?php
require_once 'config.php';
session_start();
if (!empty($_SESSION['name'])) {
    // 用户信息
    $uid=$_SESSION['id'];
    $user=array('id'=>$uid,'name'=>$_SESSION['name']);
    $sql="SELECT * FROM `voying_count` WHERE `uid` = '$uid'";
    $result=mysqli_query($con, $sql);
    if (mysqli_num_rows($result)) {
        $user['voting']=1;
        $me=mysqli_fetch_assoc($result);
        $user['me']=$me['choose'];
    } else {
        $user['voting']=0;
    }
    // 投票信息
    $sql1="SELECT * FROM `voying_vote`";
    $result1=mysqli_query($con, $sql1);
    $row1=mysqli_fetch_assoc($result1);
    //投票总人数
    $sql4="SELECT count(*) as c FROM `voying_count` WHERE vid=1";
    $result4=mysqli_query($con, $sql4);
    $count=mysqli_fetch_assoc($result4);
    $vote=array('title'=>$row1['title'],'more'=>$row1['more'],'num'=>$count['c']);
    // 选项信息
    $arr=explode("/", $row1['option']);
    $num=count($arr);
    foreach ($arr as $key=>$value) {
        $option["$key"]['value']=$value;
    }	//统计数据
    for ($i=0; $i<$num; $i++) {
        $sql3="SELECT count(*) as b FROM `voying_count` WHERE choose=$i and vid=1";
        $result3=mysqli_query($con, $sql3);
        $count=mysqli_fetch_assoc($result3);
        $option["$i"]['num']=$count['b'];
    }
    //统计浏览人数
    $sql5="SELECT * FROM `voying_visitor`";
    $result5=mysqli_query($con, $sql5);
    $pp=mysqli_fetch_assoc($result5);
    // 集合输出数据
    $data=array('user'=>$user,'vote'=>$vote,'option'=>$option,'count'=>$pp['num']);
    // print_r($data);
    require 'main.html';
} else {
    header('Location:index.php');
}
