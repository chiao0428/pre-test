<?php
$con = mysqli_connect("localhost","chiao","chiao2377");
if(!$con){
    echo $con;
    die('資料庫連接失敗').mysqli_error();
}
mysqli_select_db($con,'db');
mysqli_query($con,"SET NAMES 'utf8'"); 

$sql="update tb set sender='$_POST[sender]',content='$_POST[content]' where id='$_POST[id]'";
$res=mysqli_query($con,$sql);

if ($con->query($sql) === TRUE) {
          echo '<script>alert("修改成功"); </script>';
          $url = "index.html";
          echo "<script language='javascript' type='text/javascript'>";
          echo "window.location.href='$url'";
          echo "</script>";
      }else{
    //echo " " . $sql . "<br>" . $con->error;
          echo '<script>alert("修改失敗"); </script>';
          $url = "index.html";
          echo "<script language='javascript' type='text/javascript'>";
          echo "window.location.href='$url'";
          echo "</script>";
 }
?>