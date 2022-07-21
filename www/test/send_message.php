<?php

$send_time = time();
$sender = $_GET['sender'];
$content = $_GET['content'];
$con = mysqli_connect("localhost","chiao","chiao2377");
if(!$con){
    echo $con;
    die('資料庫連接失敗').mysqli_error();
    
}

//else echo '<script>alert("連線成功");</script>';

mysqli_select_db($con,'db');
mysqli_query($con,"SET NAMES 'utf8'");
$sql = "INSERT tb(sender, content, send_time) VALUES ('$sender','$content','$send_time')";
$res = mysqli_query($con,$sql);

if($res){
    echo '<script>alert("發布成功"); </script>';
    $url = "index.html"; 
    echo "<script language = 'javascript' type = 'text/javascript'> "; 
    echo "window.location.href = '$url' "; 
    echo "</script> "; 
}else{
    echo '<script>alert("發布失敗");</script>';
    $url = "index.html";
    echo "<script language='javascript' type='text/javascript'>";
    echo "window.location.href='$url'";
    echo "</script>";
}

?>