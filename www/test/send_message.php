<?php

$send_time = time();
$sender = $_POST['sender'];
$content = $_POST['content'];
$con = mysqli_connect("localhost","chiao","chiao2377");
if(!$con){
    echo $con;
    die('資料庫連接失敗sen').mysqli_error();
    
}
mysqli_select_db($con,'db');
mysqli_query($con,"SET NAMES 'utf8'"); 
$sql = "insert into tb(sender,content,send_time) values('$sender','$content','$send_time')";
$res = mysqli_query($con,$sql);
if($res){
    echo '<script>alert("留言成功");</script>';
}else{
    echo '<script>alert("留言失敗!");</script>';
}