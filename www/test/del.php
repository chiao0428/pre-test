<?php
$con = mysqli_connect("localhost","chiao","chiao2377");
if(!$con){
    echo $con;
    die('資料庫連接失敗').mysqli_error();
}
mysqli_select_db($con,'db');
mysqli_query($con,"SET NAMES 'utf8'"); 

$sql="delete from tb where id=". $_GET['id'];
$res = mysqli_query($con,$sql);

if ($con->query($sql) === TRUE) {
        echo '<script>alert("刪除成功"); </script>';
        //echo " " . $sql . "<br>" ;
        $url = "index.html"; 
        echo "<script language = 'javascript' type = 'text/javascript'> "; 
        echo "window.location.href = '$url' "; 
        echo "</script> ";
    } else {
        echo "Error: " . $sql . "<br>" . $con->error;
    }
?>